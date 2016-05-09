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
    return view('welcome');
});


//Route to work with angular
Route::resource('users','UserController');

//Route::resource('users.names', 'UserController');

//Search by name with RESTFul
Route::get('names/{name}', function ($name) {

    $userInfoModel 	= new \App\UserInfo();
	$userSearch 	= $userInfoModel::where('Name','like',"%{$name}%")->get();

	return response()->json($userSearch->toArray());
    
});

//Route to search number of input/output by user
Route::get('userreaded/{id}', function ($id) {
		
    $userActionModel 	= new \App\UserAction();
	$userReaded 		= $userActionModel::find($id);

	if (!is_null($userReaded)) {
		$timesSearched      = $userReaded->toArray();
		$response			= ['userTimesSearched' => $timesSearched['NumberOfI_O']];
	}else{
		$response  = ['error' => 'The user ID does not exists'];
	}
	
	return response()->json($response);
});