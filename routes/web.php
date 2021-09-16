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
    return view('auth/login');
});

Route::get('/mydashboard', function () {
    return view('dashboard');
});





//auth route for both 
Route::group(['middleware' => ['auth']], function() { 
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});






Route::get('/token', function () {
    return csrf_token(); 
});



// for Admin
Route::group(['middleware' => ['auth', 'role:admin']], function() { 



    Route::get('/wallboard', function () {
        return view('mywallboard');
    });
    
    Route::get('/record', function () {
        return view('record');
    });
    
    
    
    Route::get('/add', function () {
        return view('registeruser');
    });


    Route::get('/users', function () {
        return view('users');
    });

Route::get('/API/APICalls', 'App\Http\Controllers\APICallController@index')->name('index');
Route::post('/user/updateAPI/{id}', 'App\Http\Controllers\UserController@updateAPI')->name('update');

Route::get('/wallboard/{id}', 'App\Http\Controllers\UserController@show')->name('index');
Route::get('/user/index', 'App\Http\Controllers\UserController@index')->name('index');
Route::post('/user/store', 'App\Http\Controllers\UserController@store')->name('store');
Route::get('/user/edit/{id}', 'App\Http\Controllers\UserController@edit')->name('edit');
Route::post('/user/update/{id}', 'App\Http\Controllers\UserController@update')->name('update');
Route::delete('/user/destroy/{id}', 'App\Http\Controllers\UserController@destroy')->name('destroy');


});


// for users
Route::group(['middleware' => ['auth', 'role:user']], function() { 
    Route::get('/dashboard/myprofile', 'App\Http\Controllers\DashboardController@myprofile')->name('dashboard.myprofile');

});

// for blogwriters
Route::group(['middleware' => ['auth', 'role:blogwriter']], function() { 
    Route::get('/dashboard/postcreate', 'App\Http\Controllers\DashboardController@postcreate')->name('dashboard.postcreate');
});



require __DIR__.'/auth.php';
