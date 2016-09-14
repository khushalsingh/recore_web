<?php

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

Route::get('/', function () {
	return View::make('page.index');
});
Route::get('/what-is-reCore', function() {
	return View::make('page.about_us');
});
Route::get('/contact-us', function() {
	return View::make('page.contact');
});
Route::post('/add_contact_feed', 'PageController@post_contact_feed');
Route::match(['get', 'post'], '/register/{type}', 'AuthController@register');
Route::post('/validate_email', 'AuthController@validate_email');
Route::resource('/upload_files', 'AuthController@upload_files');
Route::post('/login', 'AuthController@login');
Route::get('/my-dashboard', 'DashboardController@index');
Route::get('/logout', function() {
	Auth::logout();
	return Redirect::to('/register/employer');
});
Route::get('/search-talent/{category}/{exp_level?}', 'UserController@search_talent');
Route::match(['get', 'post'], 'talent-network', 'UserController@talent_network');
Route::match(['get', 'post'], '/user/view-resume/{user_talent_id?}', 'UserController@view_resume');
Route::get('/talent-in-process/{date?}', 'UserController@talent_process');
Route::match(['get', 'post'], '/add-resume', 'UserController@add_resume');
Route::post('/get_course_by_qualification_id', 'UserController@get_course_by_qualification_id');
Route::match(['get', 'post'], '/change-password', 'UserController@change_password');
Route::match(['get', 'post'], '/forgot-password', 'AuthController@recover');
Route::get('/email/cron/{email_id?}', 'EmailController@cron');
Route::get('/user', 'UserController@index');
Route::get('/user_datatable', 'UserController@datatable');
Route::post('/change_user_status', 'UserController@change_status');
Route::get('/page/contact_datatable', 'PageController@contact_datatable');
Route::get('/contacts', 'PageController@contacts');
Route::get('/user/talent_datatable', 'UserController@talent_datatable');
Route::get('/user/talents', 'UserController@talents');
Route::post('/user/change_user_talent_status', 'UserController@change_user_talent_status');
Route::get('/user/interview_datatable', 'UserController@interview_datatable');
Route::get('/user/interviews', 'UserController@interviews');
