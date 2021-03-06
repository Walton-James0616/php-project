<?php

namespace App\Http\Controllers;

use App\Admin;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreValidationRequest;
use App\Http\Requests\UpdateValidationRequest;
use App\User;
use App\Category;
use App\Advertise;
use App\Counter;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $users = User::all();
        $cats = Category::all();
        $ads = Advertise::all();
        $referrals = Counter::where('type','referral')->orderBy('total_count','desc')->take(5)->get();
        $browsers = Counter::where('type','browser')->orderBy('total_count','desc')->take(5)->get();
        return view('admin.index',compact('users','cats','ads','referrals','browsers'));
    }

    public function profile()
    {
        return view('admin.profile');
    }


    public function profileupdate(UpdateValidationRequest $request)
    {

        $input = $request->all();  
        $admin = Auth::guard('admin')->user();        
            if ($file = $request->file('photo')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);
                if($admin->photo != null)
                {
                    unlink(public_path().'/assets/images/'.$admin->photo);
                }            
            $input['photo'] = $name;
            } 

        $admin->update($input);
        Session::flash('success', 'Successfully updated your profile');
        return redirect()->back();
    }


    public function passwordreset()
    {
        return view('admin.reset-password');
    }

    public function changepass(Request $request)
    {

        $admin = Auth::guard('admin')->user();
        if ($request->cpass){
            if (Hash::check($request->cpass, $admin->password)){
                if ($request->newpass == $request->renewpass){
                    $input['password'] = Hash::make($request->newpass);
                }else{
                    Session::flash('unsuccess', 'Confirm password does not match.');
                    return redirect()->back();
                }
            }else{
                Session::flash('unsuccess', 'Current password Does not match.');
                return redirect()->back();
            }
        }
        $admin->update($input);
        Session::flash('success', 'Successfully updated your password');
        return redirect()->back();
    }
    
}
