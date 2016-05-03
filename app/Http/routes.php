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

Route::get('/', 'HomeController@showWelcome');
Route::post('/login', 'HomeController@LogIn');


Route::group(['prefix' => 'maintenance'], function(){
	Route::resource('individual', 'CustomerIndividualController',
		['only' => ['index']]);

	Route::resource('company', 'CustomerCompanyController',
		['only' => ['index']]);
});

Route::group(['prefix' => 'maintenance'], function(){
	Route::resource('employee', 'EmployeeController');

	Route::resource('role', 'EmployeeRoleController',
		['only' => ['index']]);

});

Route::group(['prefix' => 'maintenance'], function(){
	Route::resource('category', 'GarmentCategoryController',
		['only' => ['index']]);

	Route::resource('segment', 'GarmentSegmentController', 
		['only' => ['index']]);

	Route::resource('segment_pattern', 'SegmentPatternController',
		['only' => ['index']]);

	Route::resource('measure_category', 'MeasurementCategoryController',
		['only' => ['index']]);

	Route::resource('measure_detail', 'MeasurementDetailController',
		['only' => ['index']]);
});

Route::group(['prefix' => 'maintenance'], function(){
	Route::resource('fabric_type', 'FabricTypeController',
		['only' => ['index']]);

	Route::resource('swatch', 'SwatchController',
		['only' => ['index']]);

	Route::resource('materials', 'MaterialsController',
		['only' => ['index']]);
});

Route::group(['prefix' => 'maintenance'], function(){
	Route::resource('catalogue', 'CatalogueController',
		['only' => ['index']]);
});

<<<<<<< Updated upstream
=======
Route::group(['prefix' => 'transaction/walkIn'], function(){
	Route::resource('walkIndiv', 'WalkInIndividualController',
		['only' => ['index']]);
	Route::resource('walkCompany', 'WalkInCompanyController',
		['only' => ['index']]);
});

Route::group(['prefix' => 'transaction/onlineCust'], function(){
	Route::resource('onlineCustIndiv', 'OnlineCustomerIndividualController',
		['only' => ['index']]);
	Route::resource('onlineCustComp', 'OnlineCustomerCompanyController',
		['only' => ['index']]);
});

>>>>>>> Stashed changes
