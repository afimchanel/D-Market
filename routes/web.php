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



Route::get('/as', function () {
    return view('buying.index');
});



Route::get('/buying', function () {
    return view('buying.index');
});
Route::resource('post', 'postController');
Route::resource('order', 'OrderController');
Route::resource('dog', 'DogController');
Route::resource('user', 'UserController');

Route::post('/search', 'searchController@show_index');
Route::get('/search/{ss}', 'searchController@search');
Route::post('/searchcategory', 'searchController@show_category');
Route::resource('Payment', 'PaymentController');
Route::get('Payment/success/{id}', 'PaymentController@success');

Route::get('notify/index', 'NotificationController@index');
Auth::routes(['verify' => true]);


//Route for normal user
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

    Route::get('user', 'UserController@index');
    Route::get('user/{id}', 'UserController@show');
    Route::get('/{id}/edit', 'UserController@edit');
    Route::post('/{id}/updateavater', 'UserController@update_avatar');
    Route::post('/{id}/update', 'UserController@update');
    //Dog
        Route::get('/post/dog/{iddog}/{id}', 'DogController@post');
        Route::post('/update/dog/{ID_dog}', 'DogController@update');
        Route::get('/edit/dog/{ID_dog}/', 'DogController@edit');
        
        Route::get('/view/dog/{ID_dog}', 'DogController@show');
        Route::get('/view/dogbreed/{ID_dog}', 'DogController@showbreed');
        Route::get('/view/dog/breed/{namedog}', 'DogController@showbreedm');
        Route::get('/delete/dog/{id}', 'DogController@destroy');
        //Post
            Route::get('/view/category', 'PostController@index');
            Route::get('/{ID_dog}/{Post_id}/view/post', 'PostController@show');
            Route::post('/{id}/{ID_dog}/create/post', 'PostController@store');
            //Order
                Route::get('/create/order/{id}/{ID_dog}/{id_post}', 'OrderController@store');
                Route::get('/show/order/{id}', 'OrderController@show');
                Route::get('/orders/{id}', 'OrderController@createorder');
                //Route::get('');
});

//Route for admin
Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => ['admin']], function () {
        Route::get('/dashboard', 'admin\AdminController@index');
        Route::get('/dashboard/edit/{id}', 'admin\AdminController@edit');
        Route::post('/dashboard/edit/{id}/update', 'admin\AdminController@update');
        Route::post('/dashboard/edit/{id}/destroy', 'admin\AdminController@destroy');
        Route::get('/listdogs', 'admin\AdminController@indexdogs');
        Route::get('/payment', 'admin\AdminController@indexpayment');
    });
});
//Route for facebook
Route::prefix('login')->group(function () {
    Route::get('/{provider}', 'Auth\LoginController@redirectToProvider')->name('login.provider');
    Route::get('/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('login.provider.callback');
});
//Route for google
Route::get('/redirect', 'SocialAuthGoogleController@redirect');
Route::get('/callback', 'SocialAuthGoogleController@callback');