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
	Route::resource('individual', 'CustomerIndividualController');

		Route::post('individual/update', 'CustomerIndividualController@updateIndividual');
		Route::post('individual/destroy', 'CustomerIndividualController@deleteIndividual');

	Route::resource('company', 'CustomerCompanyController');

		Route::post('company/update', 'CustomerCompanyController@updateCompany');
		Route::post('company/destroy', 'CustomerCompanyController@deleteCompany');
});

Route::group(['prefix' => 'maintenance'], function(){
	Route::resource('employee', 'EmployeeController');

		Route::post('employee/update', 'EmployeeController@updateEmployee');
		Route::post('employee/destroy', 'EmployeeController@deleteEmployee');

	Route::resource('employee-role', 'EmployeeRoleController');
	
		Route::post('employee-role/update','EmployeeRoleController@updateRole');
	    Route::post('employee-role/destroy','EmployeeRoleController@deleteRole');

});

Route::group(['prefix' => 'maintenance'], function(){
	Route::resource('garment-category', 'GarmentCategoryController');

		Route::post('garment-category/update','GarmentCategoryController@updateGarmentCategory');
		Route::post('garment-category/destroy','GarmentCategoryController@deleteGarmentCategory');

	Route::resource('garment-segment', 'GarmentSegmentController');

		Route::post('garment-segment/update','GarmentSegmentController@updateGarmentSegment');
		Route::post('garment-segment/destroy','GarmentSegmentController@deleteGarmentSegment');
		


	Route::resource('segment-pattern', 'SegmentPatternController');

		Route::post('segment-pattern/update','SegmentPatternController@update_segmentpattern');
		Route::post('segment-pattern/destroy','SegmentPatternController@delete_segmentpattern');

		Route::resource('measurement-category', 'MeasurementCategoryController');

		Route::resource('measurement-detail', 'MeasurementDetailController');

		Route::post('measurement-detail/update','MeasurementDetailController@update_measurementdetail');
		Route::post('measurement-detail/destroy','MeasurementDetailController@delete_measurementdetail');

	

});

Route::group(['prefix' => 'maintenance'], function(){
	Route::resource('fabric-type', 'FabricTypeController');
		
		Route::post('fabric-type/update','FabricTypeController@update_fabrictype');
		Route::post('fabric-type/destroy','FabricTypeController@delete_fabrictype');


	Route::resource('swatch-name', 'SwatchNameController');

		Route::post('swatch-name/update','SwatchNameController@update_swatchname');
		Route::post('swatch-name/destroy','SwatchNameController@delete_swatchname');


	Route::resource('swatch', 'SwatchController',
		['only' => ['index']]);

	Route::resource('material', 'MaterialsController');

		Route::post('material/addThread','MaterialsController@addThread');
		Route::post('material/editThread','MaterialsController@editThread');
		Route::post('material/destroyThread','MaterialsController@deleteThread');

		Route::post('material/addNeedle','MaterialsController@addNeedle');
		Route::post('material/editNeedle','MaterialsController@editNeedle');
		Route::post('material/destroyNeedle','MaterialsController@deleteNeedle');


});

Route::group(['prefix' => 'maintenance'], function(){
	Route::resource('catalogue', 'CatalogueController');

		Route::post('catalogue/update','CatalogueController@update_catalogue');
		Route::post('catalogue/destroy','CatalogueController@delete_catalogue');
});

Route::group(['prefix' => 'maintenance'], function(){
	Route::resource('alteration', 'AlterationController');

		Route::post('alteration/update','AlterationController@update_alteration');
		Route::post('alteration/destroy','AlterationController@delete_alteration');
});


Route::group(['prefix' => 'transaction'], function(){
	Route::resource('walkin-individual', 'WalkInIndividualController');

	Route::resource('walkin-company', 'WalkInCompanyController',
		['only' => ['index']]);
});

Route::group(['prefix' => 'transaction'], function(){
	Route::resource('online-customer-individual', 'OnlineCustomerIndividualController',
		['only' => ['index']]);
	Route::resource('online-customer-company', 'OnlineCustomerCompanyController',
		['only' => ['index']]);
});

Route::group(['prefix' => 'transaction'], function(){
	Route::resource('alterationWalkIn', 'AlterationWalkInController',
		['only' => ['index']]);
	Route::resource('alterationOnline', 'AlterationOnlineController',
		['only' => ['index']]);
});

Route::group(['prefix' => 'transaction'], function(){
	Route::resource('modifyIndividual', 'ModifyIndividualOrdersController',
		['only' => ['index']]);
	Route::resource('modifyCompany', 'ModifyCompanyOrdersController',
		['only' => ['index']]);
});

Route::group(['prefix' => 'transaction'], function(){
	Route::resource('orderProgress', 'JobOrderProgressController',
		['only' => ['index']]);
});

Route::group(['prefix' => 'transaction'], function(){
	Route::resource('materialPurchasing', 'MaterialPurchasingController',
		['only' => ['index']]);
});

Route::group(['prefix' => 'transaction'], function(){
	Route::resource('billingPayment', 'BillingPaymentController',
		['only' => ['index']]);
	Route::resource('billingCollection', 'BillingCollectionController',
		['only' => ['index']]);
});

Route::group(['prefix' => 'utilities'], function(){
	Route::resource('inactive-data', 'InactiveDataController',
		['only' => ['index']]);
});

Route::get('/acceptIndividual','OnlineCustomerIndividualController@accept');
Route::get('/acceptCompany','OnlineCustomerCompanyController@accept');

Route::get('transaction/walkin-individual-payment', 'WalkInIndividualController@payment');
Route::get('transaction/walkin-company-payment', 'WalkInCompanyController@payment');

