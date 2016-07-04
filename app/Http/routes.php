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
Route::get('/logout', 'HomeController@LogOut');

Route::get('/dashboard', 'DashboardController@dash');


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
	
		Route::post('material-thread/update','MaterialThreadController@editThread');

		Route::post('material-thread/destroy','MaterialThreadController@deleteThread');

	Route::resource('material-needle', 'MaterialNeedleController');

		Route::post('material-needle/update','MaterialNeedleController@editNeedle');

		Route::post('material-needle/destroy','MaterialNeedleController@delNeedle');

	Route::resource('material-button', 'MaterialButtonController');

		Route::post('material-button/destroy', 'MaterialButtonController@delete_button');

		Route::post('material-button/update', 'MaterialButtonController@update_button');

	Route::resource('material-zipper', 'MaterialZipperController');

		Route::post('material-zipper/destroy', 'MaterialZipperController@delete_zipper');

		Route::post('material-zipper/update', 'MaterialZipperController@update_zipper');

	Route::resource('material-hookandeye', 'MaterialHookAndEyeController');

		Route::post('material-hookandeye/destroy', 'MaterialHookAndEyeController@delete_hookeye');

		Route::post('material-hookandeye/update', 'MaterialHookAndEyeController@update_hookeye');
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

Route::group(['prefix' => 'maintenance'], function(){
	Route::resource('packages', 'PackagesController');

		Route::post('packages/update','PackagesController@update_package');
		Route::post('packages/destroy','PackagesController@delete_package');
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
	Route::resource('alteration-walkin', 'AlterationWalkInController');
		
	Route::resource('alteration-online', 'AlterationOnlineController',
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
	Route::resource('billing-payment', 'BillingPaymentController');

		Route::post('billing-payment/result', 'BillingPaymentController@search');

	Route::resource('billing-collection', 'BillingCollectionController',
		['only' => ['index']]);
});

Route::group(['prefix' => 'utilities'], function(){
	Route::resource('inactive-data', 'InactiveDataController');

		Route::post('inactive-data/reactivate-individual', 'InactiveDataController@reactivate_individual');
		Route::post('inactive-data/reactivate-company', 'InactiveDataController@reactivate_company');
		Route::post('inactive-data/reactivate-employeeRole', 'InactiveDataController@reactivate_emprole');
		Route::post('inactive-data/reactivate-employee', 'InactiveDataController@reactivate_employee');
		Route::post('inactive-data/reactivate-garmentCategory', 'InactiveDataController@reactivate_category');
		Route::post('inactive-data/reactivate-segment', 'InactiveDataController@reactivate_segment');
		Route::post('inactive-data/reactivate-segmentPattern', 'InactiveDataController@reactivate_segmentPattern');
		Route::post('inactive-data/reactivate-head', 'InactiveDataController@reactivate_head');
		Route::post('inactive-data/reactivate-detail', 'InactiveDataController@reactivate_detail');
		Route::post('inactive-data/reactivate-fabricType', 'InactiveDataController@reactivate_fabrictype');
		Route::post('inactive-data/reactivate-swatch', 'InactiveDataController@reactivate_swatch');
		Route::post('inactive-data/reactivate-swatchName', 'InactiveDataController@reactivate_swatchname');
		Route::post('inactive-data/reactivate-button', 'InactiveDataController@reactivate_button');
		Route::post('inactive-data/reactivate-hookAndEye', 'InactiveDataController@reactivate_hookeye');
		Route::post('inactive-data/reactivate-needle', 'InactiveDataController@reactivate_needle');
		Route::post('inactive-data/reactivate-thread', 'InactiveDataController@reactivate_thread');
		Route::post('inactive-data/reactivate-zipper', 'InactiveDataController@reactivate_zipper');
		Route::post('inactive-data/reactivate-catalogue', 'InactiveDataController@reactivate_catalogue');
		Route::post('inactive-data/reactivate-alteration', 'InactiveDataController@reactivate_alteration');
		Route::post('inactive-data/reactivate-packages', 'InactiveDataController@reactivate_package');
		
});

Route::get('/acceptAlteration','AlterationOnlineController@accept');
Route::get('/acceptIndividual','OnlineCustomerIndividualController@accept');
Route::get('/acceptCompany','OnlineCustomerCompanyController@accept');

Route::group(['prefix' => 'transaction'], function(){
	
	Route::get('walkin-individual-bulk-orders', 'WalkInIndividualController@bulkOrder');
	Route::get('walkin-individual-bulk-orders-customize', 'WalkInIndividualController@bulkOrderCustomize');
	Route::get('walkin-individual-bulk-orders-customize-per-piece', 'WalkInIndividualController@bulkOrderCustomizePerPiece');
	Route::get('walkin-individual-bulk-orders-payment-customer-info', 'WalkInIndividualController@bulkOrderCustomerInfo');
	Route::get('walkin-individual-bulk-orders-payment-payment-info', 'WalkInIndividualController@bulkOrderPayment');
	Route::get('walkin-individual-bulk-orders-payment-measure-detail', 'WalkInIndividualController@bulkOrderMeasure');
	Route::get('walkin-individual-bulk-orders-measure-now', 'WalkInIndividualController@bulkOrderMeasureNow');

	Route::post('walkin-individual-customize-orders', 'WalkInIndividualController@customize');
	Route::get('walkin-individual-catalogue-designs', 'WalkInIndividualController@catalogueDesign');
	Route::get('walkin-individual-payment-customer-info', 'WalkInIndividualController@information');
	Route::get('walkin-individual-payment-payment-info', 'WalkInIndividualController@payment');
	Route::get('walkin-individual-payment-measure-detail', 'WalkInIndividualController@measurement');
});

Route::group(['prefix' => 'transaction'], function(){
	Route::get('walkin-company-retail-products', 'WalkInCompanyController@retailProduct');
	Route::get('walkin-company-customize-orders', 'WalkInCompanyController@customize');
	Route::get('walkin-company-customize-orders-package', 'WalkInCompanyController@customPackage');
	Route::get('walkin-company-catalogue-designs', 'WalkInCompanyController@catalogueDesign');
	Route::get('walkin-company-payment-customer-info', 'WalkInCompanyController@information');
	Route::get('walkin-company-add-employees', 'WalkInCompanyController@addEmployee');
	Route::get('walkin-company-payment-payment-info', 'WalkInCompanyController@payment');
	Route::get('walkin-company-payment-measure-detail', 'WalkInCompanyController@measurement');
});

Route::get('/transaction-alterationwalkIn-newtransaction','AlterationWalkInController@newTrans');

Route::get('transaction-modifyindividualorders-modifyorder','ModifyIndividualOrdersController@modify');
Route::get('transaction-modifycompanyorders-modifyorder','ModifyCompanyOrdersController@modify');
Route::get('transaction-modifycompanyorders-modifyemployee','ModifyCompanyOrdersController@employee');
Route::get('transaction-modifycompanyorders-modifyemployeeorder','ModifyCompanyOrdersController@package');


Route::group(['prefix' => 'transaction'], function(){
	Route::get('billing-payment-bill-customer', 'BillingPaymentController@billCustomer');
});


Route::get('pdf', 'PdfController@invoice');



/*---------------------------------------------ONLINE---------------------------------------------------*/


Route::resource('online-home', 'OnlineHomeController',
		['only' => ['index']]);

Route::resource('online-alteration', 'OnlineAlterationController',
		['only' => ['index']]);
Route::get('online-alteration-transact', 'OnlineAlterationController@transac');

Route::get('online-alterationtransaction-newcustomer', 'OnlineAlterationController@newcust');
Route::get('online-alterationtransaction-patron', 'OnlineAlterationController@oldcust');

Route::get('online-customer-profile-individual', 'OnlineCustomerProfileController@indiv');
Route::get('online-customer-profile-company', 'OnlineCustomerProfileController@comp');

Route::resource('online-garment-gown', 'OnlineGarmentGownController',
		['only' => ['index']]);

Route::resource('online-garment-suit', 'OnlineGarmentSuitController',
		['only' => ['index']]);

Route::get('online-garment-uniform-male', 'OnlineGarmentUniformController@male');
Route::get('online-garment-uniform-female', 'OnlineGarmentUniformController@female');

Route::resource('online-how-it-works', 'OnlineHowItWorksController',
		['only' => ['index']]);

Route::resource('online-measuring-tutorial', 'OnlineMeasuringTutorialController',
		['only' => ['index']]);

Route::resource('online-men-fullprof-tutorial', 'OnlineMenFullProfileTutorialController',
		['only' => ['index']]);

Route::resource('online-men-pants-tutorial', 'OnlineMenPantsTutorialController',
		['only' => ['index']]);

Route::resource('online-men-shirt-tutorial', 'OnlineMenShirtTutorialController',
		['only' => ['index']]);

Route::resource('online-order-now', 'OnlineOrderNowController',
		['only' => ['index']]);
Route::get('online-check-out', 'OnlineOrderNowController@out');
Route::get('online-customize-order', 'OnlineOrderNowController@custom');
Route::get('online-measurement', 'OnlineOrderNowController@meas');

Route::resource('online-order-tracking', 'OnlineOrderTrackingController',
		['only' => ['index']]);

Route::resource('online-women-fullprof-tutorial', 'OnlineWomenFullProfileTutorialController',
		['only' => ['index']]);

Route::resource('online-women-pants-skirt-tutorial', 'OnlineWomenPantsAndSkirtTutorialController',
		['only' => ['index']]);

Route::resource('online-women-shirt-tutorial', 'OnlineWomenShirtTutorialController',
		['only' => ['index']]);

