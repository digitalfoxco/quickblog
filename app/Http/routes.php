<?php
use App\Posts;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('test', function(){
	
		$post = 'i m @here #for @demo text ? all';
		$post = preg_replace('/[^A-Za-z0-9\. -]/', '', $post);
		$post = str_limit($post, 30);
		echo '<pre>';
		print_r($post);
		die;
		
});


/*
|-----------------------------------
| Front End
|-----------------------------------
|
*/	
Route::group((['prefix' => '/']), function (){
	
	
	//Index View
	Route::get('/', 'FrontendController@indexView');

	//About View
	Route::get('about', 'FrontendController@aboutView');
	
	//Contact View
	Route::get('contact', 'FrontendController@contactView');
	
	//Contact Us View
	Route::post('contactus','FrontendController@contactus');
	
	//Post View
	Route::get('post/{id?}-{slug?}', 'FrontendController@postView');
	

});


/*
|------------------------------------
| Login View For Admin Back End
|------------------------------------
|
*/

Route::group((['prefix' => '']), function (){
	
	Route::get('/login', 'AdminController@loginView');
	
	Route::post('/login', 'AdminController@login');

});

Route::controllers([
	'password' => 'Auth\PasswordController',
]);
/*
|------------------------------------
| Admin Back End
|------------------------------------
|
*/

Route::group((['prefix' => 'admin', 'middleware' => 'auth']), function (){

	//Dashboard View
	Route::get('/dashboard', 'AdminController@dashboard');
	
	//Home View
	Route::get('/home', 'AdminController@home');
	
	//Add Home Content
	Route::post('/addhomecontent','AdminController@addhomecontent');
	
	//Delete Home Content
	Route::get('/home/delete/{id}','AdminController@deletehome');
	
	//About View
	Route::get('/about', 'AdminController@about');
	
	//Add About Content
	Route::post('/addaboutcontent','AdminController@addaboutcontent');
	
	//Delete About Content
	Route::get('/about/delete/{id}','AdminController@deleteabout');
	
	//Contact View
	Route::get('/contact', 'AdminController@contact');
	
	//Add Contact Content
	Route::post('/addcontactcontent','AdminController@addcontactcontent');
	
	//Delete Contact Content
	Route::get('/contact/delete/{id}','AdminController@deletecontact');
	
	//Post View
	Route::get('/post', 'AdminController@post');
	
	//Add Post Content
	Route::post('/addpostcontent','AdminController@addpostcontent');
	
	//Delete Post Content
	Route::get('/post/delete/{id}','AdminController@deletepost');
	
	//Menu View
	Route::get('/menu', 'AdminController@menu');
	
	//Add Menu
	Route::post('/addmenu','AdminController@addmenu');
	
	//Delete Menu
	Route::get('/menu/delete/{id}','AdminController@deletemenu');


});


/*
|------------------------------------
| Logout
|------------------------------------
|
*/
Route::group((['prefix' => '']), function (){
	
	Route::get('logout',function(){
	Auth::logout();
	return Redirect('/');
	});

});

