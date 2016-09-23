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

		Route::post('standard-size-category/update','StandardSizeCategoryController@update_standardCategory');
		Route::post('standard-size-category/destroy','StandardSizeCategoryController@delete_standardCategory');

	Route::resource('standard-size-detail', 'StandardSizeDetailController');

		Route::post('standard-size-detail/update','StandardSizeDetailController@update_standardDetail');
		Route::post('standard-size-detail/destroy','StandardSizeDetailController@delete_standardDetail');


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

Route::group(['prefix' => 'maintenance'], function(){
	Route::resource('charges-category', 'ChargeCategoryController');

		Route::post('charges-category/update','ChargeCategoryController@updatechargeCat');
		Route::post('charges-category/destroy','ChargeCategoryController@deletechargeCat');
});

Route::group(['prefix' => 'maintenance'], function(){
	Route::resource('charges-detail', 'ChargeDetailController');

		Route::post('charges-detail/update','ChargeDetailController@updatechargeDetail');
		Route::post('charges-detail/destroy','ChargeDetailController@deletechargeDetail');
});

Route::group(['prefix' => 'transaction'], function(){
	Route::resource('walkin-individual', 'WalkInIndividualController');

	Route::resource('walkin-company', 'WalkInCompanyController',
		['only' => ['index']]);
});

Route::group(['prefix' => 'transaction'], function(){
	Route::get('online-customer-individual', 'ApproveOnlineCustomerIndividualController@index');
	Route::post('accept-online-customer-individual','ApproveOnlineCustomerIndividualController@accept');
	// Route::resource('online-customer-company', 'ApproveOnlineCustomerCompanyController',
	// 	['only' => ['index']]);
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

		Route::post('billing-payment/result', 'BillingPaymentController@searchCustomer');

	Route::resource('billing-collection', 'BillingCollectionController',
		['only' => ['index']]);
});

Route::get('billing-payment/pending-payment-pdf', 'BillingPaymentController@generateBill');
Route::get('billing-payment/payment-receipt-pdf', 'BillingPaymentController@generateReceipt');

Route::get('generate-payment-receipt', 'WalkInIndividualController@generateReceipt');

Route::group(['prefix' => 'utilities'], function(){
	Route::get('utilities-general','UtilitiesGeneralController@index');
	Route::post('utilities-general/update','UtilitiesGeneralController@updateSettings');

	Route::resource('utilities-VAT', 'UtilitiesVATController');
		Route::get('utilities-VAT','UtilitiesVATController@index');
		Route::post('utilities-VAT/update','UtilitiesVATController@updateVat');
	// Route::get('utilities-general/general','UtilitiesGeneralController@general');

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
		Route::post('inactive-data/reactivate-meas-detail', 'InactiveDataController@reactivate_detail');
		Route::post('inactive-data/reactivate-standard-category', 'InactiveDataController@reactivate_standardCategory');
		Route::post('inactive-data/reactivate-standard-detail', 'InactiveDataController@reactivate_standardDetail');
		Route::post('inactive-data/reactivate-fabricType', 'InactiveDataController@reactivate_fabrictype');
		Route::post('inactive-data/reactivate-fabric-color', 'InactiveDataController@reactivate_fabricColor');
		Route::post('inactive-data/reactivate-fabric-pattern', 'InactiveDataController@reactivate_fabricPattern');
		Route::post('inactive-data/reactivate-fabric-thread-count', 'InactiveDataController@reactivate_fabricThreadCount');
		Route::post('inactive-data/reactivate-fabric', 'InactiveDataController@reactivate_fabric');
		Route::post('inactive-data/reactivate-button', 'InactiveDataController@reactivate_button');
		Route::post('inactive-data/reactivate-hookAndEye', 'InactiveDataController@reactivate_hookeye');
		Route::post('inactive-data/reactivate-needle', 'InactiveDataController@reactivate_needle');
		Route::post('inactive-data/reactivate-thread', 'InactiveDataController@reactivate_thread');
		Route::post('inactive-data/reactivate-zipper', 'InactiveDataController@reactivate_zipper');
		Route::post('inactive-data/reactivate-charges', 'InactiveDataController@reactivate_charges');
		Route::post('inactive-data/reactivate-charges-details', 'InactiveDataController@reactivate_chargeDetails');
		Route::post('inactive-data/reactivate-catalogue', 'InactiveDataController@reactivate_catalogue');
		Route::post('inactive-data/reactivate-alteration', 'InactiveDataController@reactivate_alteration');
		Route::post('inactive-data/reactivate-packages', 'InactiveDataController@reactivate_package');
		
});

// //acceptance of order from online module
// Route::post('/accept-online-customer-individual','ApproveOnlineCustomerIndividualController@accept');
Route::get('/rejectIndividual','ApproveOnlineCustomerIndividualController@reject');
Route::get('/acceptCompany','ApproveOnlineCustomerCompanyController@accept');

Route::group(['prefix' => 'transaction'], function(){
	
	Route::get('walkin-individual-bulk-orders', 'WalkInIndividualController@bulkOrder');
	Route::get('walkin-individual-bulk-orders-customize', 'WalkInIndividualController@bulkOrderCustomize');
	Route::get('walkin-individual-bulk-orders-customize-per-piece', 'WalkInIndividualController@bulkOrderCustomizePerPiece');
	Route::get('walkin-individual-bulk-orders-payment-customer-info', 'WalkInIndividualController@bulkOrderCustomerInfo');
	Route::get('walkin-individual-bulk-orders-payment-payment-info', 'WalkInIndividualController@bulkOrderPayment');
	Route::get('walkin-individual-bulk-orders-payment-measure-detail', 'WalkInIndividualController@bulkOrderMeasure');
	Route::get('walkin-individual-bulk-orders-measure-now', 'WalkInIndividualController@bulkOrderMeasureNow');

	Route::get('walkin-individual-show-items', 'WalkInIndividualController@showItems');
	//customize view
	Route::post('walkin-individual-customize-orders', 'WalkInIndividualController@customizeOrder');
	Route::get('walkin-individual-show-customize-orders', 'WalkInIndividualController@showCustomizeOrder');
	//save segments
	Route::post('walkin-individual-save-segment', 'WalkInIndividualController@saveSegments');
	//customer check - new or existing
	Route::get('walkin-individual-customer-check', 'WalkInIndividualController@customerCheck');
	//customer information view
	Route::post('walkin-individual-customer-information', 'WalkInIndividualController@existingCustomerInformation');
	Route::get('walkin-individual-customer-information', 'WalkInIndividualController@customerInformation');
	Route::post('walkin-individual-save-customer', 'WalkInIndividualController@addCustomer');
	//measurements
	Route::get('walkin-individual-show-measurement-view', 'WalkInIndividualController@showMeasurementView');
	Route::post('walkin-individual-save-measurements', 'WalkInIndividualController@saveMeasurements');
	//payment view
	Route::get('walkin-individual-payment-information', 'WalkInIndividualController@showPayment');
	Route::post('walkin-individual-save-order', 'WalkInIndividualController@saveOrder');
	//for printing purposes
	// Route::get('walkin-individual-before-proceeding', 'WalkInIndividualController@print');
	Route::get('walkin-individual-print-receipt', 'WalkInIndividualController@submit');
	Route::post('walkin-individual-remove-item', 'WalkInIndividualController@removeItem');
	Route::post('walkin-individual-add-design', 'WalkInIndividualController@addDesign');
	Route::post('walkin-individual-clear-order', 'WalkInIndividualController@clearOrder');
	Route::get('walkin-individual-catalogue-designs', 'WalkInIndividualController@catalogueDesign');

});

Route::group(['prefix' => 'transaction'], function(){
	Route::get('walkin-company-retail-products', 'WalkInCompanyController@retailProduct');
	Route::get('walkin-company-customize-orders-package', 'WalkInCompanyController@customPackage');	
	Route::get('walkin-company-catalogue-designs', 'WalkInCompanyController@catalogueDesign');
	Route::get('walkin-company-payment-customer-information', 'WalkInCompanyController@companyInformation');
	Route::get('walkin-company-add-employees', 'WalkInCompanyController@addEmployees');
	Route::get('walkin-company-payment-info', 'WalkInCompanyController@payment');
	Route::get('walkin-company-payment-measure-detail', 'WalkInCompanyController@measurement');
	Route::get('walkin-company-show-order', 'WalkInCompanyController@showOrder');
	Route::get('walkin-company-show-customize', 'WalkInCompanyController@showCustomizeOrder');
	Route::get('walkin-company-show-packages', 'WalkInCompanyController@showPackages');

	Route::group(['prefix' => 'walkin-company'], function() {
		Route::get('customer-check', 'WalkInCompanyController@customerCheck');
	});

	/* Route for downloadable forms */
	Route::get('walkin-company-measure-download-forms', 'WalkInCompanyController@downloadForms');


	/* Route for adding measurement profile*/
	Route::get('walkin-company-measure-add-employee-profile', 'WalkInCompanyController@measureProfile');

	Route::post('walkin-company-payment-customer-information', 'WalkInCompanyController@existingCompanyInformation');
	Route::post('walkin-company-orders', 'WalkInCompanyController@listOfOrders');
	Route::post('walkin-company-customize-orders', 'WalkInCompanyController@customize');
	Route::post('walkin-company-save-design', 'WalkInCompanyController@saveDesign');
	Route::post('walkin-company-save-employees', 'WalkInCompanyController@saveEmployees');
	Route::post('walkin-company-save-new-company','WalkInCompanyController@saveNewCompany');
	Route::post('walkin-company-save-measurements', 'WalkInCompanyController@saveMeasurements');
	Route::post('walkin-company-save-order', 'WalkInCompanyController@saveOrder');
	Route::post('walkin-company-reset-order', 'WalkInCompanyController@resetOrder');
	Route::post('walkin-company-remove-package', 'WalkInCompanyController@removePackage');

});

Route::get('transaction-modifyindividualorders-modifyorder','ModifyIndividualOrdersController@modify');
Route::get('transaction-modifycompanyorders-modifyorder','ModifyCompanyOrdersController@modify');
Route::get('transaction-modifycompanyorders-modifyemployee','ModifyCompanyOrdersController@employee');
Route::get('transaction-modifycompanyorders-modifyemployeeorder','ModifyCompanyOrdersController@package');





/*---------------------------------------ADMIN TRANSACTION ALTERATION--------------------------------------------------*/
Route::group(['prefix' => 'transaction'], function(){		
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



		/*---------------------------------------ACCEPTANCE OF ONLINE TRANSACTION ALTERATION--------------------------------------------------*/
		Route::get('alteration-online-transaction', 'AcceptAlterationOnlineController@index');
		Route::get('alteration-online-transaction-details', 'AcceptAlterationOnlineController@alterationDetails');
		Route::post('alteration-reject-online-order', 'AcceptAlterationOnlineController@reject');
		Route::post('alteration-accept-online-order', 'AcceptAlterationOnlineController@accept');
});


/*JOB ORDER PROGRESS*/
Route::post('/update', 'JobOrderProgressController@updateJobDetails');
Route::get('/details','JobOrderProgressController@jobdetails');
Route::get('/track', 'OnlineCustomerProfileIndividualController@trackJob');

/*PAYMENT AND COLLECTION*/
/*Payment Part*/
	Route::group(['prefix' => 'transaction/payment'], function() {
		
		Route::group(['prefix' => 'individual'], function() {
			Route::get('home', 'PaymentIndividualController@index');
			Route::get('customer-info', 'PaymentIndividualController@custInfo');
			Route::post('save-payment', 'PaymentIndividualController@savePayment');
			Route::get('print-receipt', 'PaymentIndividualController@printReceipt');
			Route::get('generate-receipt', 'PaymentIndividualController@generateReceipt');
		});

		Route::group(['prefix' => 'company'], function() {
			Route::get('home', 'PaymentCompanyController@index');
			Route::get('company-info', 'PaymentCompanyController@companyInfo'); 
			Route::post('save-payment', 'PaymentCompanyController@savePayment');
			Route::get('print-receipt', 'PaymentIndividualController@printReceipt');
			Route::get('generate-receipt', 'PaymentIndividualController@generateReceipt');
		});
	});

/*Collection Part*/
	Route::group(['prefix' => 'transaction/collection'], function() {
		Route::group(['prefix' => 'individual'], function() {
			Route::get('home', 'CollectionIndividualController@index');
		});

		Route::group(['prefix' => 'company'], function() {
			Route::get('home', 'CollectionCompanyController@index');
		});
	});


/*------------------------------------ONLINE---------------------------------------------*/


Route::resource('online-home', 'OnlineHomeController',
		['only' => ['index']]);


/*Online Alteration New Customer*/
Route::group(['prefix' => 'transaction'], function(){

		Route::resource('online-alteration', 'OnlineAlterationController');
		Route::get('online-alteration-transact', 'OnlineAlterationController@transac');
		// Route::get('online-alterationtransaction-newcustomer', 'OnlineAlterationController@newcust');
		Route::get('online-alterationtransaction-patron', 'OnlineAlterationController@oldcust');
		Route::get('online-alterationtransaction-newcustomer', 'OnlineAlterationController@showCart');
		Route::get('online-alterationtransaction-newcustomer-update', 'OnlineAlterationController@updateCart');
		Route::get('online-alteration-oldcustomer', 'OnlineAlterationController@oldcust');
		Route::get('online-alteration-info', 'OnlineAlterationController@checkoutCustInfo');
		Route::get('online-alteration-payment', 'OnlineAlterationController@checkoutPayment');
		Route::get('online-alteration-measurement', 'OnlineAlterationController@checkoutAddMeasurement');
		Route::post('online-alterationtransaction-newcustomer', 'OnlineAlterationController@addValues');
		Route::post('online-alteration-newcustomer-delete', 'OnlineAlterationController@deleteOrder');
		Route::post('online-alteration-add-newcustomer-checkout-info', 'OnlineAlterationController@addNewCustomer');
		Route::post('online-alteration-newcustomer-save-transaction', 'OnlineAlterationController@saveTransaction');
		Route::post('online-alteration-newcustomer-cancel', 'OnlineAlterationController@cancelOrder');

});

/*End of Online Alteration New Customer*/



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

		Route::get('online-individual-checkout-info', 'OnlineIndividualController@info');
		Route::get('online-individual-checkout-payment', 'OnlineIndividualController@payment');
		Route::get('online-individual-checkout-measurement', 'OnlineIndividualController@measuredetails');


		Route::get('online-company-checkout-info', 'OnlineCheckoutCompanyController@info');
		Route::get('online-company-checkout-payment', 'OnlineCheckoutCompanyController@payment');
		Route::get('online-company-checkout-measurement', 'OnlineCheckoutCompanyController@measuredetails');
		Route::get('online-company-checkout-employee-details', 'OnlineCheckoutCompanyController@emp');
		Route::get('online-company-checkout-edit-set', 'OnlineCheckoutCompanyController@editset');

		Route::get('online-alteration-checkout-info', 'OnlineCheckoutAlterationController@info');
		Route::get('online-alteration-checkout-payment', 'OnlineCheckoutAlterationController@payment');
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

	Route::get('customize-suit-choose-suits', 'OnlineIndividualController@suitschoose');
	Route::post('customize-suit-fabric', 'OnlineIndividualController@suitsfabric');
	Route::post('customize-suit-style-jacket', 'OnlineIndividualController@suitsstylejacket');
	//Route::post('customize-suit-style-collar-pocket', 'OnlineCustomizeSuitController@stylecollarpocket');
	Route::post('customize-suit-style-pants', 'OnlineIndividualController@suitsstylepants');
	Route::post('customize-suit-style-monogram', 'OnlineIndividualController@suitsstylemonogram');

	//Route::post('customize-suit-fabric-customize', 'OnlineCustomizeSuitController@customfabricsuit');

	Route::get('customize-gown-fabric', 'OnlineCustomizeGownController@fabricgown');
	Route::get('customize-gown-style', 'OnlineCustomizeGownController@stylegown');

	Route::get('customize-mens-choose-shirt', 'OnlineIndividualController@menchoose');
	Route::get('customize-mens-fabric', 'OnlineIndividualController@menfabric');
	Route::post('customize-mens-style-collar', 'OnlineIndividualController@menstylecollar');
	Route::post('customize-mens-style-cuffs', 'OnlineIndividualController@menstylecuffs');
	Route::post('customize-mens-style-buttons', 'OnlineIndividualController@menstylebuttons');
	Route::post('customize-mens-style-pocket-monogram', 'OnlineIndividualController@menstylepocketmonogram');
	Route::get('customize-mens-style-others', 'OnlineIndividualController@menstyleothers');

	Route::post('customize-mens-fabrics', 'OnlineIndividualController@menfabric');

	Route::post('save-customer', 'OnlineIndividualController@addCustomer');

	Route::post('men-customize', 'OnlineIndividualController@menCustomize');

	Route::post('save-order', 'OnlineIndividualController@saveOrder');

	Route::get('checkout-payment', 'OnlineIndividualController@payment');
	
	Route::get('customize-womens-choose-shirt', 'OnlineIndividualController@womenchoose');
	Route::post('customize-womens-fabrics', 'OnlineIndividualController@womenfabric');
	Route::post('customize-womens-style-collar', 'OnlineIndividualController@womenstylecollar');
	Route::post('customize-womens-style-cuffs', 'OnlineIndividualController@womenstylecuffs');
	Route::post('customize-womens-style-buttons', 'OnlineIndividualController@womenstylebuttons');
	Route::post('customize-womens-style-pocket-monogram', 'OnlineIndividualController@womenstylepocketmonogram');
	Route::get('customize-womens-style-others', 'OnlineIndividualController@womenstyleothers');


	Route::get('customize-pants-choose-pants', 'OnlineIndividualController@pantschoose');
	Route::post('customize-pants-fabric', 'OnlineIndividualController@pantsfabric');
	Route::post('customize-pants-style-pleats', 'OnlineIndividualController@pantsstylepleats');
	Route::post('customize-pants-style-pockets', 'OnlineIndividualController@pantsstylepockets');
	Route::post('customize-pants-style-bottom', 'OnlineIndividualController@pantsstylebottom');
	
	Route::get('shopping-cart', 'OnlineIndividualController@tocart');

	Route::get('customize-sets-choose-set', 'OnlineCustomizeSetsController@choose');
	Route::get('customize-sets-list-of-orders', 'OnlineCustomizeSetsController@orderlist');
	Route::get('customize-sets-customize-order', 'OnlineCustomizeSetsController@customize');


  	/** Queries **/
	Route::group(['prefix' => 'queries'], function(){
		
		Route::get('list-of-top-companies','QueriesTopPickCompanyController@index');
		Route::get('list-of-top-customers','QueriesTopPickCustomerController@index');
		Route::get('list-of-top-pick-fabric','QueriesTopPickFabricController@index');
		Route::get('list-of-top-pick-design','QueriesTopPickDesignController@index');
		Route::get('list-of-top-pick-segment','QueriesTopPickSegmentController@index');
		Route::get('most-availed-alteration-service', 'QueriesAvailedAlterServiceController@index');
		Route::get('customers-with-balances', 'QueriesCustomerWithBalancesController@index');
		Route::get('companies-with-balances', 'QueriesCustomerWithBalancesController@company');
			
	});


	/** Reports **/
	//Sales Part
	Route::group(['prefix' => 'reports/sales'], function(){
		//controller for sales by job order
		Route::get('by-job-order', 'ReportsSalesByJobOrderController@index'); 
		Route::post('by-job-order-custom', 'ReportsSalesByJobOrderController@custom');
		Route::post('by-job-order-generate', 'ReportsSalesByJobOrderController@generate');
		//controller for sales by product
		Route::get('by-product', 'ReportsSalesByProductController@index'); 
		Route::post('by-product-custom', 'ReportsSalesByProductController@custom');
		Route::post('by-product-generate', 'ReportsSalesByProductController@generate');
		//controller for sales by customer
		Route::get('by-customer', 'ReportsSalesByCustomerController@index'); 
		Route::post('by-customer-custom', 'ReportsSalesByCustomerController@custom');
		Route::post('by-customer-generate', 'ReportsSalesByCustomerController@generate');

		
	});
	//Customers with Balance
	Route::group(['prefix' => 'reports/customers-with-balance'], function(){

Route::get('online-forms', 'OnlineFormsController@measurementforms');

		Route::get('individual', 'IndividualCustomerWithBalanceController@index'); //controlller for individuals with balance
		Route::get('company', 'CompanyCustomerWithBalanceController@index'); //controller for companies with balance		
	});


Route::get('company-checkout', 'CompanyCheckoutController@index');
Route::get('company-checkout-measure', 'CompanyCheckoutMeasureController@index');
Route::get('company-checkout-pay', 'CompanyCheckoutPayController@index');
