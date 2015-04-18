<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Fileentry;

use App\Contus;
use Auth;
use App\User;
use App\Abouts;
use App\Posts;
use App\Contact;
use App\Homes;
use App\Menus;
use Hash;

class AdminController extends Controller {

	
	//Login View
	public function loginView()
	{
		return view('pages.admin.auth.login');
	}
	
	//Forgot Password View
	public function forgotpasswordView()
	{
		return view('pages.admin.auth.forgotpassword');
	}
	
	//Dashboard View
	public function dashboard()
	{
		return view('admin')->with('page', 'dashboard');
	}
	
	//Login To Dashboard
	public function login()
	{
		$rules = array(
    			'email'       => 'required|email',
    			'password'    => 'required'
    			
    		);
			$validator = Validator::make(Input::all(), $rules);
	    		if($validator->fails()){
					return redirect()->back()->withErrors($validator)->withInput();
				}else{
				$userdata = array(
					'email'    => Input::get('email'),
					'password' => Input::get('password'));
            	
				if(Auth::attempt($userdata))
				{
						return redirect('/admin/dashboard');
				}else{
					    return redirect('/login');
					 }
				}
	}

	
	//Home View
	public function home()
	{
		$home = Homes::all();
		return view('admin')->with('page', 'home')->with('home', $home);
	}
	
	//Add Home Content
	public function addhomecontent()
	{
		$validator = Validator::make(
					[
						'title'     => Input::get('title'),
						'sub_title' => Input::get('sub_title')
					],
					[
						'title'     => 'required',
						'sub_title' => 'required'
					]
           );
          if(Input::hasFile('file')){
			  $validator = Validator::make(
					[
						'file'     =>Input::file('file')
					],
					[
						'file'     => 'required|image|mimes:jpeg,jpg,png,bmp'
						
					]);
		}
			if ($validator->fails()){
					return redirect()->back()->withErrors($validator->errors());
				}else{
						if(!Input::has('id')){
							$home = new Homes;
						}else{
							$home = Homes::find(Input::get('id'));
						}
						
						
						
						if(Input::hasFile('file')){
							$file = Input::file('file');
							$destinationPath = 'images/';
							$extension = $file->getClientOriginalExtension(); 
							$filename = str_random(6).".".$extension;
							$upload_success = $file->move($destinationPath, $filename);
							$home->image = $filename;
						}
							$home->title = Input::get('title');
							$home->sub_title = Input::get('sub_title');
							
							if(Input::get('checkbox')){
								Homes::where('status','=','1')->update(array('status'=> '0'));
							$home->status = '1';
							}
							$home->save();
							return redirect()->back();
			     }
	
	}
	
	//Delete Home Content
	public function deletehome($id)
	{
		$deleteid = Homes::find($id);
		if($deleteid->id){
			$deleteid->delete();
			}
			return redirect()->back();
	}
	
	//About View
	public function about()
	{
		$about = Abouts::all();
		return view('admin')->with('page', 'about')->with('about', $about);
	}
	
	//Add About Content
	public function addaboutcontent()
	{
		$validator = Validator::make(
					[
						'title'     => Input::get('title'),
						'sub_title' => Input::get('sub_title'),
						'content'   => Input::get('content')
					],
					[
						'title'     => 'required',
						'sub_title' => 'required',
						'content'   => 'required'
					]
           );
            if(Input::hasFile('file')){
			  $validator = Validator::make(
					[
						'file'     =>Input::file('file')
					],
					[
						'file'     => 'required|image|mimes:jpeg,jpg,png,bmp'
						
					]);
			}
			if ($validator->fails()){
				return redirect()->back()->withErrors($validator->errors());
				}else{
					if(!Input::has('id')){
						$about = new Abouts;
					}else{
						$about = Abouts::find(Input::get('id'));
					}
					if(Input::hasFile('file')){
						$file = Input::file('file');
						$destinationPath = 'images/';
						$extension = $file->getClientOriginalExtension(); 
						$filename = str_random(6).".".$extension;
						$upload_success = $file->move($destinationPath, $filename);
						$about->image = $filename;
					}
						$about->title = Input::get('title');
						$about->sub_title = Input::get('sub_title');
						$about->content = Input::get('content');
						if(Input::get('checkbox')){
							Abouts::where('status','=','1')->update(array('status'=> '0'));
						$about->status = '1';
						}
						$about->save();
						return redirect()->back();
		        }
	
	}
	
	//Delete About Content
	public function deleteabout($id)
	{
		$deleteid = Abouts::find($id);
		if($deleteid->id){
			$deleteid->delete();
			}
			return redirect()->back();
	}
	
	//Contact View
	public function contact()
	{
		$contact = Contact::all();
		return view('admin')->with('page', 'contact')->with('contact', $contact);
	}
	
	//Add Contact Content
	public function addcontactcontent()
	{
		$validator = Validator::make(
					[
						'title'     => Input::get('title'),
						'sub_title' => Input::get('sub_title'),
						'content'   => Input::get('content')
					],
					[
						'title'     => 'required',
						'sub_title' => 'required',
						'content'   => 'required'
					]
           );
            if(Input::hasFile('file')){
			  $validator = Validator::make(
					[
						'file'     =>Input::file('file')
					],
					[
						'file'     => 'required|image|mimes:jpeg,jpg,png,bmp'
						
					]);
			}
			if ($validator->fails()){
				return redirect()->back()->withErrors($validator->errors());
				}else{
						if(!Input::has('id')){
							$contact = new Contact;
						}else{
							$contact = Contact::find(Input::get('id'));
						}
						if(Input::hasFile('file')){
							$file = Input::file('file');
							$destinationPath = 'images/';
							$extension = $file->getClientOriginalExtension(); 
							$filename = str_random(6).".".$extension;
							$upload_success = $file->move($destinationPath, $filename);
							$contact->image = $filename;
						}
							$contact->title = Input::get('title');
							$contact->sub_title = Input::get('sub_title');
							$contact->content = Input::get('content');
							if(Input::get('checkbox')){
								Contact::where('status','=','1')->update(array('status'=> '0'));
							$contact->status = '1';
							}
							$contact->save();
							return redirect()->back();
		        }
	
	}
	
	//Delete Contact Content
	public function deletecontact($id)
	{
		$deleteid = Contact::find($id);
		if($deleteid->id){
			$deleteid->delete();
			}
			return redirect()->back();
	}
	
	//Post View
	public function post()
	{
		$post = Posts::all();
		return view('admin')->with('page', 'post')->with('post', $post);
	}
	
	//Add Post Content
	public function addpostcontent()
	{
		$validator = Validator::make(
					[
						'title'     => Input::get('title'),
						'sub_title' => Input::get('sub_title'),
						'content'   => Input::get('content')
					],
					[
						'title'     => 'required|unique:post',
						'sub_title' => 'required',
						'content'   => 'required'
					]
           );
            if(Input::hasFile('file')){
			  $validator = Validator::make(
					[
						'file'     =>Input::file('file')
					],
					[
						'file'     => 'required|image|mimes:jpeg,jpg,png,bmp'
						
					]);
		}
			if ($validator->fails()){
				return redirect()->back()->withErrors($validator->errors());
				}else{
					if(!Input::has('id')){
						$post = new Posts;
					}else{
						$post = Posts::find(Input::get('id'));
					}
					if(Input::hasFile('file')){
						$file = Input::file('file');
						$destinationPath = 'images/';
						$extension = $file->getClientOriginalExtension(); 
						$filename = str_random(6).".".$extension;
						$upload_success = $file->move($destinationPath, $filename);
						$post->image = $filename;
					}
						$post->title = Input::get('title');
						$post->sub_title = Input::get('sub_title');
						$post->content = Input::get('content');
						if(Input::get('checkbox')){
							Posts::where('status','=','1')->update(array('status'=> '0'));
						$post->status = '1';
						}
						$post->save();
						return redirect()->back();
		}
	
	}
	
	//Delete Post Content
	public function deletepost($id)
	{
		$deleteid = Posts::find($id);
		if($deleteid->id){
			$deleteid->delete();
			}
			return redirect()->back();
	}
	
	//Menu View
	public function menu()
	{
		$menu = Menus::all();
		return view('admin')->with('page', 'menu')->with('menu', $menu);
	}
	
	//Add Menu
	public function addmenu()
	{
		$validator = Validator::make(
					[
						'name' => Input::get('name'),
						'path' => Input::get('path')
					],
					[
						'name' => 'required',
						'path' => 'required'
					]
           );
           
			if ($validator->fails()){
				return redirect()->back()->withErrors($validator->errors());
				}else{
					if(!Input::has('id')){
						$menu = new Menus;
					}else{
						$menu = Menus::find(Input::get('id'));
					}
					$menu->name = Input::get('name');
					$menu->path = Input::get('path');
					if(Input::get('checkbox')){
						Menus::where('status','=','1')->update(array('status'=> '0'));
					$menu->status = '1';
					}
					$menu->save();
					return redirect()->back();
		        }
	}
	
	//Delete Menu
	public function deletemenu($id)
	{
		$deleteid = Menus::find($id);
		if($deleteid->id){
			$deleteid->delete();
			}
			return redirect()->back();
	}
	
}
