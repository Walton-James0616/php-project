<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Language;
use Illuminate\Support\Facades\Session;
use Auth;
class LanguageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function lang()
    {
        $data = Language::findOrFail(1);
        return view('admin.language.index',compact('data'));
    }

    public function langup(Request $request)
    {   
   
        $input = $request->all(); 
        $lang = Language::findOrFail(1);                 
        $lang->update($input);
        Session::flash('success', 'Successfully updated the Data');
        return redirect()->route('admin-lang-index');
    }
}
