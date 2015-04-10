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

Route::get('/', 'HomeController@index');
Route::get('/bus', 'HomeController@bus');
Route::get('/directory', 'HomeController@directory');
Route::resource('/account/del', 'HomeController@regdel');	
Route::get('/account', ['middleware' => 'auth', 'uses' => 'HomeController@account']);
Route::post('/account/update', 'HomeController@updateaccount');
Route::post('/account/update/pass', 'HomeController@updatepass');
Route::post('/account/update/email', 'HomeController@updateemail');
Route::get('/account/update', ['middleware' => 'auth', 'uses' => 'HomeController@update']);
Route::post('/searchresults', 'HomeController@search');	
Route::get('/searchresults', 'HomeController@search');

Route::get('/news', 'NewsController@index');
Route::resource('/news/details/{id}/del', 'NewsController@commentdel');	
Route::post('/news/details/{id}', 'NewsController@newscomment');	
Route::get('/news/details/{id}', 'NewsController@show');

Route::get('/events', 'EventsController@index');
Route::resource('/events/details/{id}/del', 'EventsController@commentdel');	
Route::post('/events/details/{id}', 'EventsController@eventcomment');
Route::post('/events/details/{id}/attend', 'EventsController@attend');
Route::get('/events/details/{id}', 'EventsController@show');

Route::get('/announcements', 'AnnouncementsController@index');
Route::resource('/announcements/details/{id}/del', 'AnnouncementsController@commentdel');	
Route::post('/announcements/details/{id}', 'AnnouncementsController@acomment');	
Route::get('/announcements/details/{id}', 'AnnouncementsController@show');

Route::get('/organizations', 'OrgController@index');
Route::post('/organizations/details/{id}', 'OrgController@register');
Route::get('/organizations/details/{id}', 'OrgController@show');


Route::group(['middleware' => 'creator'], function()
{
	Route::get('/dashboard', 'AdminController@index');
	Route::post('/search', 'AdminController@search');	
	Route::get('/search', 'AdminController@search');

	Route::get('/news/create', 'AdminController@newscreate');
	Route::post('/news/create', 'AdminController@newsstore');
	Route::post('/news/update/{id}', 'AdminController@newspost');
	Route::get('/news/update/{id}', 'AdminController@newsupdate');
	Route::resource('/news/pending', 'AdminController@newspendel');	
	Route::resource('/news/posted', 'AdminController@newspostdel');	
	Route::resource('/news/{id}/del', 'AdminController@newscomdel');	
	Route::get('/news/posted', 'AdminController@newspos');
	Route::get('/news/pending', 'AdminController@newspen');
	Route::get('/news/{id}', 'AdminController@newsarticle');	

	Route::get('/events/create', 'AdminController@eventcreate');
	Route::post('/events/create', 'AdminController@eventstore');
	Route::post('/events/update/{id}', 'AdminController@eventpost');
	Route::get('/events/update/{id}', 'AdminController@eventupdate');
	Route::resource('/events/pending', 'AdminController@eventpendel');	
	Route::resource('/events/posted', 'AdminController@eventpostdel');	
	Route::resource('/events/{id}/del', 'AdminController@eventcomdel');	
	Route::get('/events/posted', 'AdminController@eventpos');
	Route::get('/events/pending', 'AdminController@eventpen');
	Route::get('/events/{id}', 'AdminController@eventarticle');
	Route::get('/events/attendees/{id}', 'AdminController@attendees');

	Route::get('/org', 'OrgController@org');
	Route::resource('/org/applicants', 'OrgController@appdel');	
	Route::resource('/org/approved', 'OrgController@memdel');	
	Route::put('/org/applicants', 'OrgController@approve');
	Route::put('/org/approved', 'OrgController@reject');
	Route::get('/org/update/{id}', 'AdminController@orgupdate');
	Route::post('/org/update/{id}', 'AdminController@orgpost');
	Route::get('/org/approved', 'OrgController@approved');
	Route::get('/org/applicants', 'OrgController@applicants');
});


Route::group(['middleware' => 'admin'], function()
{
	Route::get('/announcements/create', 'AdminController@acreate');
	Route::post('/announcements/create', 'AdminController@astore');
	Route::post('/announcements/update/{id}', 'AdminController@apost');
	Route::get('/announcements/update/{id}', 'AdminController@aupdate');	
	Route::resource('/announcements/list', 'AdminController@adel');	
	Route::resource('/announcements/{id}/del', 'AdminController@acomdel');	
	Route::get('/announcements/list', 'AdminController@alist');
	Route::get('/announcements/{id}', 'AdminController@aarticle');


	Route::post('/org/create', 'AdminController@orgstore');
	Route::get('/org/create', 'AdminController@orgcreate');
	Route::resource('/org/list', 'AdminController@orgdel');	
	Route::get('/org/list', 'AdminController@orglist');
	Route::get('/org/{id}', 'AdminController@orgarticle'); 

	Route::resource('/users/pending', 'AdminController@pendel');	
	Route::resource('/users', 'AdminController@userdel');	
	Route::get('/users', 'AdminController@current');
	Route::get('/users/pending', 'AdminController@pending');
	Route::put('/users/pending', 'AdminController@approve');
	Route::get('/user/details', 'AdminController@user');  
});


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
