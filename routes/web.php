<?php

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

Route::get('/', 'MovieController@index')->name('movies');;

Auth::routes();

//Gests
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/category', 'CategoryController@index')->name('category');
Route::get('/movies/category/{id}', 'MovieController@categoryMovies')->name('movie_from_category');
Route::get('/movies', 'MovieController@index')->name('movies');
Route::get('/actors', 'ActorsController@index')->name('actors');
Route::get('/actors/images/{id}', 'ActorsController@show')-> name('show_actor');
Route::get('/movie/images/{id}', 'MovieController@show')->name('show_movie');
//Route ::put('/movie/images/{id}', 'MovieController@storeMovieRating')->name('store_movie_rating');
Route::post('/movies/search', 'MovieController@searchMovies')->name('search_movies');
Route::get('/fb/login', 'FacebookController@redirect')->name('facebook_redirect');
Route::get('/fb/callback', 'FacebookController@callback')->name('facebook_callback');

//	Users middlware
Route::middleware('auth')->group(function() {
		Route ::get('/actors/images/form/{id}' , 'ImageController@createActorsImages')-> name('create_actors_image');
		Route ::post('actor/image/{id}', 'ImageController@storeActorImages')-> name('store_actor_image');
		Route ::get('/movies/images/form/{id}' , 'ImageController@createMoviesImages')-> name('create_movies_image');
		Route ::post('/movie/images/{id}', 'ImageController@storeMovieImages')->name('store_movie_images');
		Route ::put('/movie/images/{id}', 'MovieController@storeMovieRating')->name('store_movie_rating');
		Route ::put('/movie/images/{id}', 'MovieController@storeMovieRating')->name('store_movie_rating');
		
	});

//Admin middlware
Route::middleware('auth', 'role:admin')->group(function(){

//	Category
	Route::get('/admin/category', 'Admin\CategoryAdminController@show')->name('admin_category');
	Route::get('/admin/category/create', 'Admin\CategoryAdminController@create')->name('create_category');
	Route::post('/admin/category', 'Admin\CategoryAdminController@store')->name('store_category');
	Route::get('/admin/category/edit/{id}', 'Admin\CategoryAdminController@edit')->name('edit_category');
	Route::put('/admin/category/{id}', 'Admin\CategoryAdminController@update')->name('update_category');
	Route::delete('/admin/category/{id}', 'Admin\CategoryAdminController@destroy')->name('delete_category');
	
//	Movies
	Route::get('/admin/movies', 'Admin\MovieAdminController@index')->name('admin_movie');
	Route::get('/admin/movies/create', 'Admin\MovieAdminController@create')->name('create_movie');
	Route::post('/admin/movies', 'Admin\MovieAdminController@store')->name('store_movie');
	
	Route::get('/admin/movies/edit/{id}', 'Admin\MovieAdminController@edit')->name('edit_movie');
	Route::put('/admin/movies/{id}', 'Admin\MovieAdminController@update')->name('update_movie');
	Route::delete('/admin/movies/{id}', 'Admin\MovieAdminController@destroy')->name('delete_movie');
	
	
	
	//Actors
	Route::get('/admin/actors', 'Admin\ActorAdminController@index')->name('admin_actors');
	Route::get( '/admin/actors/creata', 'ActorsController@create' ) -> name( 'create_actor' );
	Route::post( '/admin/actors', 'ActorsController@store' ) -> name( 'store_actor' );
	Route::get('/admin/actors/edit/{id}', 'ActorsController@edit')->name('edit_actor');
	Route::put('/admin/actors/{id}', 'ActorsController@update')->name('update_actor');
	Route::delete('/admin/actors/{id}', 'ActorsController@destroy')->name('delete_actor');
	
	//Images
	Route::delete('/admin/movies/edit/{id}', 'ImageController@destroy')->name('delete_image');
	
//	Users
	Route::get('/admin/users', 'Admin\AdminUserController@index')->name('admin_users');
	Route::get('/admin/user/edit/{id}', 'Admin\AdminUserController@edit')->name('edit_user');
	Route::put('/admin/users', 'Admin\AdminUserController@update')->name('update_user');
	
	
	
	
	
});
