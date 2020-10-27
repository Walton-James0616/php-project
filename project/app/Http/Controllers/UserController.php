<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Language;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user');
    }

    public function index()
    {
        $user = Auth::guard('user')->user();
        $title = '';
        $details = '';
        if ($user->title != null && $user->details != null) {
            $title = explode(',', $user->title);
            $details = explode(',', $user->details);
        }
        return view('user.dashboard', compact('user', 'title', 'details'));
    }

    public function profile()
    {
        $user = Auth::guard('user')->user();
        $title = '';
        $details = '';
        if ($user->title != null && $user->details != null) {
            $title = explode(',', $user->title);
            $details = explode(',', $user->details);
        }
        $cats = Category::all();
        return view('user.profile', compact('user', 'cats', 'title', 'details'));
    }

    public function resetform()
    {
        $user = Auth::guard('user')->user();
        return view('user.reset', compact('user'));
    }

    public function reset(Request $request)
    {
        $input = $request->all();
        $user = Auth::guard('user')->user();
        if ($request->cpass) {
            if (Hash::check($request->cpass, $user->password)) {
                if ($request->newpass == $request->renewpass) {
                    $input['password'] = Hash::make($request->newpass);
                } else {
                    Session::flash('unsuccess', 'Confirm password does not match.');
                    return redirect()->back();
                }
            } else {
                Session::flash('unsuccess', 'Current password Does not match.');
                return redirect()->back();
            }
        }
        $user->update($input);
        Session::flash('success', 'Successfully updated your password');
        return redirect()->back();
    }

    public function profileupdate(Request $request)
    {
        $input = $request->all();
        //return $input['title'];
        $user = Auth::guard('user')->user();
        if (!in_array(null, $request->title) && !in_array(null, $request->details)) {
            $input['title'] = implode(',', $request->title);
            $input['details'] = implode(',', $request->details);
        } else {
            if (in_array(null, $request->title) || in_array(null, $request->details)) {
                $input['title'] = null;
                $input['details'] = null;
            } else {
                $title = explode(',', $user->title);
                $details = explode(',', $user->details);
                $input['title'] = implode(',', $title);
                $input['details'] = implode(',', $details);
            }
        }
        $user = Auth::guard('user')->user();
        if ($file = $request->file('photo')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('assets/images', $name);
            if ($user->photo != null) {
                unlink(public_path() . '/assets/images/' . $user->photo);
            }
            $input['photo'] = $name;
        }
        if (strpos($request->address, '&') === true) {
            $input['address'] = str_replace("&", "and", $request->address);
        }
        if (!empty($request->category_id)) {
            $input['category_id'] = implode(',', $request->category_id);
        }

        if (!empty($request->special)) {
            $input['special'] = implode(',', $request->special);
        }
        if (empty($request->special)) {
            $input['special'] = null;
        }
        $user->update($input);
        $language = Language::find(1);
        Session::flash('success', $language->success);
        return redirect()->route('user-profile');
    }

    public function publish()
    {
        $user = Auth::guard('user')->user();
        $user->status = 1;
        $user->active = 1;
        $user->update();
        return redirect(route('user-dashboard'))->with('success', 'Successfully Published The Profile.');
    }

    public function feature()
    {
        $user = Auth::guard('user')->user();
        $user->is_featured = 1;
        $user->featured = 1;
        $user->update();
        return redirect(route('user-dashboard'))->with('success', 'Successfully Featured The Profile.');
    }
}
