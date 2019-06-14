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

Route::get('/', function () {
    return view('welcome');
}); 


Route::get('/aa', function () {
    return view('Dog.postdog11');
}); 

Route::get('/as', function () {
    return view('user.EditProfileuser1');
}); 

Route::resource('books', 'BookController');


Route::resource('dog','DogController');



Auth::routes(['verify' => true]);
 

//Route for normal user
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

    
    Route::get('user/{id}', 'UserController@show');
    Route::get('/{id}/edit', 'UserController@edit');
    Route::post('/{id}/updateavater','UserController@update_avatar');
    Route::post('/{id}/update', 'UserController@update');
    //Route::get('');
});

//Route for admin
Route::group(['prefix' => 'admin'], function(){
    Route::group(['middleware' => ['admin']], function(){
        Route::get('/dashboard', 'admin\AdminController@index');
        Route::get('/dashboard/edit/{id}', 'admin\AdminController@edit');
        Route::post('/dashboard/edit/{id}/update', 'admin\AdminController@update');
        Route::post('/dashboard/edit/{id}/destroy', 'admin\AdminController@destroy');
        Route::get('/listdogs', 'admin\AdminController@indexdogs');
    });
});
