<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Category;
use App\User;

class UserRegisterController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest:user', ['except' => ['logout']]);
    }


 	public function showRegisterForm()
    {
      $cats = Category::all();
      return view('user.register',compact('cats'));
    }

    public function register(Request $request)
    {
      // Validate the form data
//        dd($request->category_id);

      $this->validate($request, [
        'email'   => 'required|email|unique:users',
        'category_id'   => 'required',
        'password' => 'required|confirmed'
      ]);

        $user = new User;
        
        $input = $request->all();
        if (!empty($request->category_id)) {
            $input['category_id'] = implode(',', $request->category_id);
        }
        $input['password'] = bcrypt($request['password']);
        $user->fill($input)->save();
        Auth::guard('user')->login($user); 
        return redirect()->route('user-dashboard');
    }
  
}