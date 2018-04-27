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
Route::resource('admin/users','admin\UsersController');
Route::post('admin/login', 'admin\UsersController@login');
Route::get('admin', function ()
{
    return view('admin/login');
});


// Single middleware For particular function

//Route:: get('admin',['middleware' => 'down.for.maintenance',function(){
//    
//}]);


// For mutliple middleware on specific function
//Route::get('admin', function ()
//{
//    return view('admin/login');
//})->middleware(['down.for.maintenance','authadmin']);



Route::group(['middleware' => 'authadmin'], function ()
{

    Route::get('admin/dashboard', function()
    {
        return view('admin/dashboard');
    });

    Route::get('admin/logout', 'admin\UsersController@logout');


//Projects
    Route::resource('admin/projects', 'admin\ProjectsController');
    Route::get('admin/newproject', 'admin\ProjectsController@newproject');
    
    Route::get('admin/users', 'admin\UsersController@users_list');
    Route::get('admin/adduser','admin\UsersController@adduser');
});
