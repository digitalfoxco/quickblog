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

	//Index View
	public function indexView()
	{
		$home = Homes::where('status', '=', '1')->first();
		$post = Posts::all();
		$menu = Menus::all();
		return view('main')->with('page', 'index')->with('home', $home)->with('post', $post)->with('menu', $menu);
	    
	}
	
	//About View
	public function aboutView()
	{
		$about = Abouts::where('status', '=', '1')->get();
		$menu = Menus::all();
		return view('main')->with('page', 'about')->with('about', $about)->with('menu', $menu);
	}
	
	
	//Contact View
	public function contactView()
	{
		$contact = Contact::where('status', '=', '1')->get();
		$menu = Menus::all();
		return view('main')->with('page', 'contact')->with('contact', $contact)->with('menu', $menu);
	}
	
	//Post View
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
	
	//Contact US
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
