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

$api = app('Dingo\Api\Routing\Router');

Route::get('/', function () {
    return view('welcome');
});

$api->version('v1', function($api){
	// $api->get('api/dingo', function(){
	// 	return $api;
	// });
	$api->get('api/hello', 'App\Http\Controllers\HomeController@index');
	$api->get('api/users/{user_id}/roles/{role_name}', 'App\Http\Controllers\HomeController@attachUserRole');
	$api->get('api/users/{user_id}/roles/', 'App\Http\Controllers\HomeController@getUserRole');

	$api->post('api/role/permission/add', 'App\Http\Controllers\HomeController@attachPermission');
	$api->get('api/role/{role}/permissions', 'App\Http\Controllers\HomeController@getPermission');

	//JWT
	$api->post('api/authenticate', 'App\Http\Controllers\Auth\AuthController@authenticate');


});


$api->version('v1', ['middleware' => 'api.auth'], function($api){
	$api->get('api/users', 'App\Http\Controllers\Auth\AuthController@index');
	//$api->get('api/users/{id}', 'App\Http\Controllers\Auth\AuthController@show');
	$api->get('api/users', 'App\Http\Controllers\Auth\AuthController@show');

	$api->get('api/token', 'App\Http\Controllers\Auth\AuthController@getToken');

	$api->post('api/delete', 'App\Http\Controllers\Auth\AuthController@destroy');
});
