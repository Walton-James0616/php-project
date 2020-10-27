<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreValidationRequest;
use App\Http\Requests\UpdateValidationRequest;
use Auth;

class AdminUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        return view('admin.user.index', compact('users'));
    }

    public function status($id1, $id2)
    {

        $user = User::findOrFail($id1);
        $user->active = $id2;
        $user->featured = $id2;
        $user->update();
        Session::flash('success', 'Status updated Successfully');

        return redirect()->route('admin-user-index');
    }

    public function create()
    {
        $cats = Category::all();
        return view('admin.user.create', compact('cats'));
    }

    public function store(StoreValidationRequest $request)
    {

        $user = new User;
        $input = $request->all();
        if (!empty($request->category_id)) {
            $input['category_id'] = implode(',', $request->category_id);
        }
        if ($file = $request->file('photo')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('assets/images', $name);
            $input['photo'] = $name;
        }

        if (!empty($request->category_id)) {
            $input['category_id'] = implode(',', $request->category_id);
        }

        if ($request->featured == "") {
            $input['featured'] = 0;
        }

        if (in_array(null, $request->title) || in_array(null, $request->details)) {
            $input['title'] = null;
            $input['details'] = null;
        } else {
            $input['title'] = implode(',', $request->title);
            $input['details'] = implode(',', $request->details);
        }
        if (strpos($request->address, '&') === true) {
            $input['address'] = str_replace("&", "and", $request->address);
        }
        if (!empty($request->special)) {
            $input['special'] = implode(',', $request->special);
        }

        $input['password'] = bcrypt($request['password']);
        $user->fill($input)->save();
        Session::flash('success', 'New User added successfully.');
        return redirect()->route('admin-user-index');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $cats = Category::all();
        if ($user->title != null && $user->details != null) {
            $title = explode(',', $user->title);
            $details = explode(',', $user->details);
        }
        if ($user->category_id != null) {
            $categories = explode(',', $user->category_id);
        }
        if ($user->special != null) {
            $specials = explode(',', $user->special);
        }
        return view('admin.user.edit', compact('user', 'cats', 'title', 'details', 'categories', 'specials'));
    }

    public function update(UpdateValidationRequest $request, $id)
    {
        $input = $request->all();
        $user = User::findOrFail($id);
        if (!empty($request->title) && !empty($request->details)) {
            $input['title'] = implode(',', $request->title);
            $input['details'] = implode(',', $request->details);
        } else {
            if (empty($request->title) || empty($request->details)) {
                $input['title'] = null;
                $input['details'] = null;
            } else {
                $title = explode(',', $user->title);
                $details = explode(',', $user->details);
                $input['title'] = implode(',', $title);
                $input['details'] = implode(',', $details);
            }
        }
        if ($file = $request->file('photo')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('assets/images', $name);
            if ($user->photo != null) {
                unlink(public_path() . '/assets/images/' . $user->photo);
            }
            $input['photo'] = $name;
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
        if (!empty($input['password'])) {
            $input['password'] = bcrypt($request['password']);

        } else {
            $input['password'] = $user->password;
        }
        if ($request->featured == "") {
            $input['featured'] = 0;
        }
        $ck = strpos($request->address, '&');

        if ($ck !== false) {
            $input['address'] = str_replace("&", "and", $request->address);
        }

        $user->update($input);
        Session::flash('success', 'Successfully updated the User');
        return redirect()->route('admin-user-index');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->photo == null) {
            $user->delete();
            Session::flash('success', 'Successfully deleted your User');
            return redirect()->route('admin-user-index');
        }

        unlink(public_path() . '/assets/images/' . $user->photo);
        $user->delete();
        Session::flash('success', 'Successfully deleted your User');
        return redirect()->route('admin-user-index');
    }
}


