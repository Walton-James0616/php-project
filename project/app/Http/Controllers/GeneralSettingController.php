<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Generalsetting;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreValidationRequest;
use Auth;

class GeneralSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function logo()
    {
        $data = Generalsetting::findOrFail(1);
        return view('admin.generalsetting.logo',compact('data'));
    }

    public function logoup(StoreValidationRequest $request)
    {

        $input = $request->all(); 
        $logo = Generalsetting::findOrFail(1);        
            if ($file = $request->file('logo')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);
                if($logo->logo != null)
                {
                    unlink(public_path().'/assets/images/'.$logo->logo);
                }            
            $input['logo'] = $name;
            }         
        $logo->update($input);
        Session::flash('success', 'Successfully updated the logo');
        return redirect()->route('admin-gs-logo');
    }

  public function fav()
    {
        $data = Generalsetting::findOrFail(1);
        return view('admin.generalsetting.favicon',compact('data'));
    }

    public function favup(StoreValidationRequest $request)
    {

        $input = $request->all(); 
        $fav = Generalsetting::findOrFail(1);        
            if ($file = $request->file('favicon')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);
                if($fav->fav != null)
                {
                    unlink(public_path().'/assets/images/'.$fav->fav);
                }            
            $input['favicon'] = $name;
            }         
        $fav->update($input);
        Session::flash('success', 'Successfully updated the Favicon');
        return redirect()->route('admin-gs-fav');
    }

  public function load()
    {
        $data = Generalsetting::findOrFail(1);
        return view('admin.generalsetting.loader',compact('data'));
    }

    public function loadup(Request $request)
    {
        $this->validate($request, [
               'loader' => 'mimes:gif'
           ]);
        $input = $request->all(); 
        $fav = Generalsetting::findOrFail(1);        
            if ($file = $request->file('loader')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);
                if($fav->loader != null)
                {
                    unlink(public_path().'/assets/images/'.$fav->loader);
                }            
            $input['loader'] = $name;
            }         
        $fav->update($input);
        Session::flash('success', 'Successfully updated the Loader');
        return redirect()->route('admin-gs-load');
    }

    public function bgimg()
    {
        $data = Generalsetting::findOrFail(1);
        return view('admin.generalsetting.backgroundimage',compact('data'));
    }

    public function bgimgup(StoreValidationRequest $request)
    {

        $input = $request->all(); 
        $bgimg = Generalsetting::findOrFail(1);        
            if ($file = $request->file('bgimg')) 
            {              
                $name = time().$file->getClientOriginalName();
                $name = str_replace(' ','_', $name);
                $name = str_replace('%','_', $name);
                $file->move('assets/images',$name);
                if($bgimg->bgimg != null)
                {
                    unlink(public_path().'/assets/images/'.$bgimg->bgimg);
                }            
            $input['bgimg'] = $name;
            }         
        $bgimg->update($input);
        Session::flash('success', 'Successfully updated the background image');
        return redirect()->route('admin-gs-bgimg');
    }

    public function contents()
    {
        $data = Generalsetting::findOrFail(1);
        return view('admin.generalsetting.websitecontent',compact('data'));
    }

    public function contentsup(Request $request)
    {

        $content = Generalsetting::findOrFail(1);
        $input = $request->all(); 
            if ($file = $request->file('bimg')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);
                if($content->bimg != null)
                {
                    unlink(public_path().'/assets/images/'.$content->bimg);
                }            
            $input['bimg'] = $name;
            }  
        $content->update($input);
        Session::flash('success', 'Successfully updated the data');
        return redirect()->route('admin-gs-contents');
    }

    public function payments()
    {
        $data = Generalsetting::findOrFail(1);
        return view('admin.generalsetting.payments',compact('data'));
    }

    public function paymentsup(Request $request)
    {

        $data = Generalsetting::findOrFail(1);
        $data->update($request->all());
        Session::flash('success', 'Successfully updated the Data');
        return redirect()->route('admin-gs-payments');
    }

    public function about()
    {
        $data = Generalsetting::findOrFail(1);
        return view('admin.generalsetting.about',compact('data'));
    }

    public function aboutup(Request $request)
    {

        $about = Generalsetting::findOrFail(1);
        $about->update($request->all());
        Session::flash('success', 'Successfully updated the about section');
        return redirect()->route('admin-gs-about');
    }

    public function address()
    {
        $data = Generalsetting::findOrFail(1);
        return view('admin.generalsetting.address',compact('data'));
    }

    public function addressup(Request $request)
    {

        $address = Generalsetting::findOrFail(1);
        $address->update($request->all());
        Session::flash('success', 'Successfully updated the address section');
        return redirect()->route('admin-gs-address');
    }

    public function footer()
    {
        $data = Generalsetting::findOrFail(1);
        return view('admin.generalsetting.footer',compact('data'));
    }

    public function footerup(Request $request)
    {
        $footer = Generalsetting::findOrFail(1);
        $footer->update($request->all());
        Session::flash('success', 'Successfully updated the footer section');
        return redirect()->route('admin-gs-footer');
    }
    public function bginfo()
    {
        $data = Generalsetting::findOrFail(1);
        return view('admin.generalsetting.bg-info',compact('data'));
    }

    public function bginfoup(Request $request)
    {

        $bginfo = Generalsetting::findOrFail(1);
        $bginfo->update($request->all());
        Session::flash('success', 'Background Information content updated successfully.');
        return redirect()->route('admin-gs-bginfo');
    }
}
