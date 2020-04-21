<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/post/{id}', ['as' => 'home.post', 'uses' => 'AdminPostsController@post']);

/*
Route::get('/admin', function() {
	
	return view('admin.index');
	
});*/

//Route::resource('/admin/users', 'AdminUsersController', ['as' => 'admin']);


Route::group(['middleware'=>'admin'], function(){
	
	Route::resource('/admin/users', 'AdminUsersController', ['as' => 'admin']);
	
	Route::resource('/admin/posts', 'AdminPostsController', ['as' => 'admin']);
	
	Route::resource('/admin/categories', 'AdminCategoriesController', ['as' => 'admin']);
	
	Route::resource('/admin/media', 'AdminMediasController', ['as' => 'admin']);
	
	Route::resource('/admin/comments', 'PostCommentsController', ['as' => 'admin']);
	
	Route::resource('admin/comment/replies', 'CommentRepliesController', ['as' => 'admin']);
	
	//Route::get('/admin/media/upload', ['as' => 'admin.media.upload', 'uses' => 'AdminMediasController@store']);
	
	Route::get('/admin', function() {
	
		return view('admin.index');
	
	});
	
});

Route::group(['middleware'=>'auth'], function(){
	
	Route::post('/comment/reply', 'CommentRepliesController@createReply');
	
});


Route::get('/logout', 'Auth\LoginController@logout');