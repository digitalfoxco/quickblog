<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

use App\Contus;
use Auth;
use App\User;
use App\Homes;
use App\Abouts;
use App\Posts;
use App\Contact;
use App\Menus;
use Hash;

use Illuminate\Http\Request;

class FrontendController extends Controller {

	//Dashboard View
	public function dashboardView()
	{
		$menu = Menus::all();
		return view('main')->with('page', 'dashboard')->with('menu', $menu);
	}
	
	public function loginView()
	{
		return view('pages.front_end.auth.login');
	}
	
	public function login()
	{
		$validator = Validator::make(
					[
						'email'     => Input::get('email'),
						'password'  => Input::get('password')
					],
					[
						'email'     => 'required',
						'password'  => 'required'
					]
           );
			if ($validator->fails()){
					return redirect()->back()->withErrors($validator->errors());
				}else{
					$userdata = array(
						'email'    => Input::get('email'),
						'password' => Input::get('password'));
					
					if(Auth::attempt($userdata))
					{
							return redirect('/index');
					}else{
							return redirect('/login');
						 }
				}
	}
	
	public function indexView()
	{
		$home = Homes::where('status', '=', '1')->first();
		$post = Posts::all();
		$menu = Menus::all();
		return view('main')->with('page', 'index')->with('home', $home)->with('post', $post)->with('menu', $menu);
	    
	}
	
	public function aboutView()
	{
		$about = Abouts::all();
		$menu = Menus::all();
		return view('main')->with('page', 'about')->with('about', $about)->with('menu', $menu);
	}
	
	public function contactView()
	{
		$contact = Contact::all();
		$menu = Menus::all();
		return view('main')->with('page', 'contact')->with('contact', $contact)->with('menu', $menu);
	}
	
	/*public function postView($id=null)
	{
		$menu = Menus::all();
		if($id){
		$postid = Posts::where('id',$id)->first();
		return view('main')->with('page', 'post')->with('postid', $postid)->with('menu', $menu);
		}else
		return view('main')->with('page', 'post')->with('menu', $menu);
	}*/
	
	
	public function postView($id=null, $slug=null)
	{
		$slug = Posts::all();
		$menu = Menus::all();
		if($id){
		$postid = Posts::where('id',$id)->first();
		return view('main')->with('page', 'post')->with('postid', $postid)->with('menu', $menu)->with('slug', $slug);
		}else
		return view('main')->with('page', 'post')->with('menu', $menu);
	}
	
	
	public function contactus()
	{
		$rules = array(
    			'name'    => 'required',
    			'email'   => 'required|email',
    			'phone'   => 'required|numeric',
    			'message' => 'required'
    		);
			$validator = Validator::make(Input::all(), $rules);
	    		if($validator->fails()){
					return redirect()->back()->withErrors($validator)->withInput();
				}else{
				$contactus = new Contus();
				$contactus->name 	 = Input::get('name');
				$contactus->email    = Input::get('email');
				$contactus->phone    = Input::get('phone');
				$contactus->message  = Input::get('message');
				$contactus->save();
					return redirect('/index');
				}
	}
	
	

}
