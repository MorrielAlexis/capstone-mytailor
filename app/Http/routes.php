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
Route::post('/update', 'JobOrderProgressController@updateJobDetails');
Route::get('/details','JobOrderProgressController@jobdetails');
Route::get('/track', 'OnlineCustomerProfileIndividualController@trackJob');
Route::get('/', 'HomeController@showWelcome');
Route::post('/login', 'HomeController@LogIn');
Route::get('/logout', 'HomeController@LogOut');
Route::post('/signup/individual', 'RegisterIndividualController@store');
Route::get('/register/profile/individual', 'HomeController@indiv');
Route::post('/register/profile/individual/success', 'HomeController@saveDetailsIndiv');
Route::post('/signup/company', 'RegisterCompanyController@store');
Route::get('/register/profile/company', 'HomeController@comp');
Route::post('/register/profile/company/success', 'HomeController@saveDetailsComp');
Route::get('/register/verify/{confirmationCode}', 'RegisterIndividualController@confirm');

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
		
	Route::resource('segment-style', 'SegmentStyleController');

		Route::post('segment-style/update','SegmentStyleController@updateSegmentStyle');
		Route::post('segment-style/destroy','SegmentStyleController@deleteSegmentStyle');


	Route::resource('segment-pattern', 'SegmentPatternController');

		Route::post('segment-pattern/update','SegmentPatternController@update_segmentpattern');
		Route::post('segment-pattern/destroy','SegmentPatternController@delete_segmentpattern');


	

});

Route::group(['prefix' => 'maintenance'], function(){
	Route::resource('body-part-category', 'BodyPartCategoryController');
		
		Route::post('body-part-category/update','BodyPartCategoryController@update_bodyPartCategory');
		Route::post('body-part-category/destroy','BodyPartCategoryController@delete_bodyPartCategory');


	Route::resource('body-part-form', 'BodyPartFormController');

		Route::post('body-part-form/update','BodyPartFormController@update_bodyPartForm');
		Route::post('body-part-form/destroy','BodyPartFormController@delete_bodyPartForm');

	Route::resource('standard-size-category', 'StandardSizeCategoryController');

		Route::post('standard-size-category/update','StandardSizeCategoryController@update_fabricPattern');
		Route::post('standard-size-category/destroy','StandardSizeCategoryController@delete_fabricPattern');

	Route::resource('standard-size-detail', 'StandardSizeDetailController');

		Route::post('standard-size-detail/update','StandardSizeDetailController@update_fabricColor');
		Route::post('standard-size-detail/destroy','StandardSizeDetailController@delete_fabricColor');


	Route::resource('measurement-category', 'MeasurementCategoryController');

		Route::post('measurement-category/update', 'MeasurementCategoryController@updateMeasurementCategory');
		Route::post('measurement-category/destroy', 'MeasurementCategoryController@deleteMeasurementCategory');

	Route::resource('measurement-detail', 'MeasurementDetailController');

		Route::post('measurement-detail/update','MeasurementDetailController@update_measurementdetail');
		Route::post('measurement-detail/destroy','MeasurementDetailController@delete_measurementdetail');



});

Route::group(['prefix' => 'maintenance'], function(){
	Route::resource('fabric-type', 'FabricTypeController');
		
		Route::post('fabric-type/update','FabricTypeController@update_fabricType');
		Route::post('fabric-type/destroy','FabricTypeController@delete_fabricType');


	Route::resource('fabric-thread-count', 'FabricThreadCountController');

		Route::post('fabric-thread-count/update','FabricThreadCountController@update_threadCount');
		Route::post('fabric-thread-count/destroy','FabricThreadCountController@delete_threadCount');

	Route::resource('fabric-pattern', 'FabricPatternController');

		Route::post('fabric-pattern/update','FabricPatternController@update_fabricPattern');
		Route::post('fabric-pattern/destroy','FabricPatternController@delete_fabricPattern');

	Route::resource('fabric-color', 'FabricColorController');

		Route::post('fabric-color/update','FabricColorController@update_fabricColor');
		Route::post('fabric-color/destroy','FabricColorController@delete_fabricColor');


	Route::resource('fabric', 'FabricController');

		Route::post('fabric/update','FabricController@update_fabric');
		Route::post('fabric/destroy','FabricController@delete_fabric');



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
	Route::resource('sets', 'PackagesController');

		Route::post('sets/update','PackagesController@update_package');
		Route::post('sets/destroy','PackagesController@delete_package');
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

Route::get('billing-payment/pending-payment-pdf', 'BillingPaymentController@generateBill');
Route::get('billing-payment/payment-receipt-pdf', 'BillingPaymentController@generateReceipt');

Route::group(['prefix' => 'utilities'], function(){
	Route::resource('inactive-data', 'InactiveDataController');

		Route::post('inactive-data/reactivate-individual', 'InactiveDataController@reactivate_individual');
		Route::post('inactive-data/reactivate-company', 'InactiveDataController@reactivate_company');
		Route::post('inactive-data/reactivate-employeeRole', 'InactiveDataController@reactivate_emprole');
		Route::post('inactive-data/reactivate-employee', 'InactiveDataController@reactivate_employee');
		Route::post('inactive-data/reactivate-garmentCategory', 'InactiveDataController@reactivate_category');
		Route::post('inactive-data/reactivate-segment', 'InactiveDataController@reactivate_segment');
		Route::post('inactive-data/reactivate-segment-style', 'InactiveDataController@reactivate_segmentStyle');
		Route::post('inactive-data/reactivate-segmentPattern', 'InactiveDataController@reactivate_segmentPattern');
		Route::post('inactive-data/reactivate-meas-category', 'InactiveDataController@reactivate_measCategory');
		Route::post('inactive-data/reactivate-detail', 'InactiveDataController@reactivate_detail');
		Route::post('inactive-data/reactivate-fabricType', 'InactiveDataController@reactivate_fabrictype');
		Route::post('inactive-data/reactivate-fabric-thread-count', 'InactiveDataController@reactivate_fabricThreadCount');
		Route::post('inactive-data/reactivate-button', 'InactiveDataController@reactivate_button');
		Route::post('inactive-data/reactivate-hookAndEye', 'InactiveDataController@reactivate_hookeye');
		Route::post('inactive-data/reactivate-needle', 'InactiveDataController@reactivate_needle');
		Route::post('inactive-data/reactivate-thread', 'InactiveDataController@reactivate_thread');
		Route::post('inactive-data/reactivate-zipper', 'InactiveDataController@reactivate_zipper');
		Route::post('inactive-data/reactivate-catalogue', 'InactiveDataController@reactivate_catalogue');
		Route::post('inactive-data/reactivate-alteration', 'InactiveDataController@reactivate_alteration');
		Route::post('inactive-data/reactivate-packages', 'InactiveDataController@reactivate_package');
		
});

//acceptance of order from online module
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
	Route::post('walkin-individual-payment-customer-info', 'WalkInIndividualController@information');
	Route::post('walkin-individual-remove-item', 'WalkInIndividualController@removeItem');
	Route::post('walkin-individual-add-design', 'WalkInIndividualController@addDesign');
	Route::post('walkin-individual-clear-order', 'WalkInIndividualController@clearOrder');
	Route::post('walkin-individual-save-order', 'WalkInIndividualController@saveOrder');
	Route::post('walkin-individual-save-customer', 'WalkInIndividualController@addCustomer');
	Route::post('walkin-individual-payment-measure-detail', 'WalkInIndividualController@measurement');
	
	Route::get('walkin-individual-show-customize-orders', 'WalkInIndividualController@showCustomizeOrder');

	Route::get('walkin-individual-catalogue-designs', 'WalkInIndividualController@catalogueDesign');
	Route::get('walkin-individual-payment-info', 'WalkInIndividualController@payment');
});

Route::group(['prefix' => 'transaction'], function(){
	Route::get('walkin-company-retail-products', 'WalkInCompanyController@retailProduct');
	Route::get('walkin-company-customize-orders-package', 'WalkInCompanyController@customPackage');	
	Route::get('walkin-company-catalogue-designs', 'WalkInCompanyController@catalogueDesign');
	Route::get('walkin-company-payment-customer-info', 'WalkInCompanyController@information');
	Route::get('walkin-company-add-employees', 'WalkInCompanyController@addEmployee');
	Route::get('walkin-company-payment-payment-info', 'WalkInCompanyController@payment');
	Route::get('walkin-company-payment-measure-detail', 'WalkInCompanyController@measurement');
	Route::get('walkin-company-show-order', 'WalkInCompanyController@showOrder');
	Route::get('walkin-company-show-customize', 'WalkInCompanyController@showCustomizeOrder');

	Route::post('walkin-company-orders', 'WalkInCompanyController@listOfOrders');
	Route::post('walkin-company-customize-orders', 'WalkInCompanyController@customize');

});

Route::get('transaction-modifyindividualorders-modifyorder','ModifyIndividualOrdersController@modify');
Route::get('transaction-modifycompanyorders-modifyorder','ModifyCompanyOrdersController@modify');
Route::get('transaction-modifycompanyorders-modifyemployee','ModifyCompanyOrdersController@employee');
Route::get('transaction-modifycompanyorders-modifyemployeeorder','ModifyCompanyOrdersController@package');


Route::group(['prefix' => 'transaction'], function(){
	Route::get('billing-payment-bill-customer', 'BillingPaymentController@billCustomer');
});

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////------ PDF GENERATOR (temp) -------/////////////////////////////////////////////////////////////

Route::get('/pdf', 'PdfController@converToPdf');

/*---------------------------------------ADMIN TRANSACTION ALTERATION--------------------------------------------------*/
Route::group(['prefix' => 'transaction'], function(){		
		Route::get('alteration-online-transaction', 'AlterationOnlineController@index');
		Route::get('alteration-acceptorder', 'AlterationOnlineController@accept');
		Route::get('alteration-walkin-transaction', 'AlterationWalkInController@index');
		Route::get('alteration-walkin-newcustomer', 'AlterationWalkInController@showCart');
		Route::get('alteration-walkin-newcustomer-update', 'AlterationWalkInController@updateCart');
		Route::get('alteration-walkin-oldcustomer', 'AlterationWalkInController@oldcust');
		Route::get('alteration-checkout-info', 'AlterationWalkInController@checkoutCustInfo');
		Route::get('alteration-checkout-payment', 'AlterationWalkInController@checkoutPayment');
		Route::get('alteration-checkout-measurement', 'AlterationWalkInController@checkoutAddMeasurement');

		Route::post('alteration-walkin-newcustomer', 'AlterationWalkInController@addValues');
		Route::post('alteration-walkin-newcustomer-delete', 'AlterationWalkInController@deleteOrder');
		Route::post('alteration-walkin-add-newcustomer-info', 'AlterationWalkInController@addNewCustomer');
		Route::post('alteration-walkin-newcustomer-save-transaction', 'AlterationWalkInController@saveTransaction');
		Route::post('alteration-walkin-newcustomer-cancel', 'AlterationWalkInController@cancelOrder');
});

/*---------------------------------------------ONLINE---------------------------------------------------*/


Route::resource('online-home', 'OnlineHomeController',
		['only' => ['index']]);

Route::resource('online-alteration', 'OnlineAlterationController',
		['only' => ['index']]);
Route::get('online-alteration-transact', 'OnlineAlterationController@transac');

Route::get('online-alterationtransaction-newcustomer', 'OnlineAlterationController@newcust');
Route::get('online-alterationtransaction-patron', 'OnlineAlterationController@oldcust');

Route::resource('online-garment-gown', 'OnlineGarmentGownController',
		['only' => ['index']]);

Route::resource('online-garment-sets', 'OnlineGarmentSetsController',
		['only' => ['index']]);

Route::resource('online-garment-suit', 'OnlineGarmentSuitController',
		['only' => ['index']]);

Route::resource('online-garment-pants', 'OnlineGarmentPantsController',
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
Route::get('online-measurements', 'OnlineOrderNowController@meas');

Route::resource('online-order-tracking', 'OnlineOrderTrackingController',
		['only' => ['index']]);

Route::resource('online-women-fullprof-tutorial', 'OnlineWomenFullProfileTutorialController',
		['only' => ['index']]);

Route::resource('online-women-pants-skirt-tutorial', 'OnlineWomenPantsAndSkirtTutorialController',
		['only' => ['index']]);

Route::resource('online-women-shirt-tutorial', 'OnlineWomenShirtTutorialController',
		['only' => ['index']]);

Route::get('online-individual-checkout-info', 'OnlineCheckoutIndividualController@info');
Route::get('online-individual-checkout-payment', 'OnlineCheckoutIndividualController@payment');
Route::get('online-individual-checkout-measurement', 'OnlineCheckoutIndividualController@measuredetails');

Route::get('online-company-checkout-info', 'OnlineCheckoutCompanyController@info');
Route::get('online-company-checkout-payment', 'OnlineCheckoutCompanyController@payment');
Route::get('online-company-checkout-measurement', 'OnlineCheckoutCompanyController@measuredetails');
Route::get('online-company-checkout-employee-details', 'OnlineCheckoutCompanyController@emp');
/*-------------------------------------------ONLINE CUSTOMER PROFILE---------------------------------------------------*/

	Route::get('customerprofile-individual', 'OnlineCustomerProfileIndividualController@index');
	Route::get('customerprofile-individual-measurement-details', 'OnlineCustomerProfileIndividualController@measure');
	Route::get('customerprofile-individual-order-details', 'OnlineCustomerProfileIndividualController@order');
	Route::get('customerprofile-individual-order-tracking', 'OnlineCustomerProfileIndividualController@tracking');
	Route::get('customerprofile-individual-payment-history', 'OnlineCustomerProfileIndividualController@pay');

	Route::get('customerprofile-company', 'OnlineCustomerProfileCompanyController@index');
	Route::get('customerprofile-company-measurement-details', 'OnlineCustomerProfileCompanyController@measure');
	Route::get('customerprofile-company-order-details', 'OnlineCustomerProfileCompanyController@order');
	Route::get('customerprofile-company-order-tracking', 'OnlineCustomerProfileCompanyController@tracking');
	Route::get('customerprofile-company-payment-history', 'OnlineCustomerProfileCompanyController@pay');

/*-------------------------------------------ONLINE CUSTOMIZE GARMENTS---------------------------------------------------*/

	Route::get('customize-suit-fabric', 'OnlineCustomizeSuitController@fabric');
	Route::post('customize-suit-style-jacket', 'OnlineCustomizeSuitController@stylejacket');
	Route::post('customize-suit-style-collar-pocket', 'OnlineCustomizeSuitController@stylecollarpocket');
	Route::post('customize-suit-style-pants', 'OnlineCustomizeSuitController@stylepants');
	Route::get('customize-suit-style-monogram', 'OnlineCustomizeSuitController@stylemonogram');

	//Route::post('customize-suit-fabric-customize', 'OnlineCustomizeSuitController@customfabricsuit');

	Route::get('customize-gown-fabric', 'OnlineCustomizeGownController@fabricgown');
	Route::get('customize-gown-style', 'OnlineCustomizeGownController@stylegown');

	Route::get('customize-mens-fabric', 'OnlineCustomizeMensController@fabric');
	Route::post('customize-mens-style-collar', 'OnlineCustomizeMensController@stylecollar');
	Route::get('customize-mens-style-cuffs', 'OnlineCustomizeMensController@stylecuffs');
	Route::post('customize-mens-style-buttons', 'OnlineCustomizeMensController@stylebuttons');
	Route::post('customize-mens-style-pocket-monogram', 'OnlineCustomizeMensController@stylepocketmonogram');
	Route::get('customize-mens-style-others', 'OnlineCustomizeMensController@styleothers');

	Route::get('customize-womens-fabric', 'OnlineCustomizeWomensController@fabricwomens');
	Route::get('customize-womens-style', 'OnlineCustomizeWomensController@stylewomens');

	Route::get('customize-womens-fabric', 'OnlineCustomizeWomensController@fabric');
	Route::post('customize-womens-style-collar', 'OnlineCustomizeWomensController@stylecollar');
	Route::get('customize-womens-style-cuffs', 'OnlineCustomizeWomensController@stylecuffs');
	Route::get('customize-womens-style-buttons', 'OnlineCustomizeWomensController@stylebuttons');
	Route::get('customize-womens-style-pocket-monogram', 'OnlineCustomizeWomensController@stylepocketmonogram');
	Route::get('customize-womens-style-others', 'OnlineCustomizeWomensController@styleothers');


	Route::get('customize-pants-fabric', 'OnlineCustomizePantsController@fabric');
	Route::post('customize-pants-style-pleats', 'OnlineCustomizePantsController@stylepleats');
	Route::post('customize-pants-style-pockets', 'OnlineCustomizePantsController@stylepockets');
	Route::post('customize-pants-style-bottom', 'OnlineCustomizePantsController@stylebottom');
	Route::get('shopping-cart', 'OnlineCustomizePantsController@tocart');

	Route::get('customize-sets-customize-order', 'OnlineGarmentSetsController@customize');
