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
		Route::post('measurement-category/destroy', 'MeasurementCategoryController@delete_measurementcategory');

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


	Route::resource('swatch', 'SwatchController');


		Route::post('swatch/update','SwatchController@update_swatch');
	
		Route::post('swatch/destroy', 'SwatchController@delete_swatch');

});

Route::group(['prefix' => 'maintenance'], function(){
	Route::resource('material-thread', 'MaterialThreadController');

		Route::post('material-thread/add','MaterialThreadController@addThread');
		Route::post('material-thread/edit','MaterialThreadController@editThread');
		Route::post('material-thread/destroy','MaterialThreadController@deleteThread');

	Route::resource('material-needle', 'MaterialNeedleController');

		Route::post('material-needle/add','MaterialNeedleController@addNeedle');
		Route::post('material-needle/edit','MaterialNeedleController@editNeedle');
		Route::post('material-needle/destroy','MaterialNeedleController@delNeedle');

	Route::resource('material-button', 'MaterialButtonController');

		Route::post('material-button/destroy', 'MaterialButtonController@delete_button');

	Route::resource('material-zipper', 'MaterialZipperController');

		Route::post('material-zipper/destroy', 'MaterialZipperController@delete_zipper');

	Route::resource('material-hookandeye', 'MaterialHookAndEyeController');

		Route::post('material-hookandeye/destroy', 'MaterialHookAndEyeController@delete_hookeye');
});

Route::group(['prefix' => 'maintenance'], function(){
	Route::resource('alteration', 'AlterationController');

		Route::post('alteration/update','AlterationController@update_alteration');
		Route::post('alteration/destroy','AlterationController@delete_alteration');
});

Route::group(['prefix' => 'maintenance'], function(){
	Route::resource('catalogue', 'CatalogueController');

		Route::post('catalogue/update','CatalogueController@update_catalogue');
		Route::post('catalogue/destroy','CatalogueController@delete_catalogue');
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
	Route::resource('inactive-data', 'InactiveDataController');

		Route::post('inactive-data/reactivate_individual', 'InactiveDataController@reactivate_individual');
});

Route::get('/acceptIndividual','OnlineCustomerIndividualController@accept');
Route::get('/acceptCompany','OnlineCustomerCompanyController@accept');

Route::get('transaction/walkin-individual-payment', 'WalkInIndividualController@payment');
Route::get('transaction/walkin-company-payment', 'WalkInCompanyController@payment');

