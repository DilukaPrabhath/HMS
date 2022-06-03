<?php

use App\Http\Controllers\AdminFullCalenderController;

Route::get('/s', function () {
    return view('welcome');

});

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


///////////Admin Routes////////////
Route::group(['middleware' => 'App\Http\Middleware\CheckAdmin'], function()
{
    Route::get('/dashboardAdmin', function () {
        return view('backend.admin.index');
    });

    //Change Password
    Route::get('change-password', 'AdminChangePasswordController@index');
    Route::post('change-password', 'AdminChangePasswordController@store')->name('change.password');

    //User
    Route::get('admin/users','AdminAddUserController@index');
    Route::get('admin/roomboy','AdminAddUserController@nonsystem');
    Route::get('admin/roomboy/add','AdminAddUserController@createroomboy');
    Route::post('admin/roomboy/save','AdminAddUserController@storeroomboy');
    Route::get('admin/users/add','AdminAddUserController@create');
    Route::post('admin/users/save','AdminAddUserController@store');
    Route::get('admin/users/view/{id}','AdminAddUserController@view');
    Route::get('admin/users/edit/{id}','AdminAddUserController@edit');
    Route::post('admin/users/edit/update/{id}','AdminAddUserController@update');
    Route::get('admin/users/change/password/{id}','AdminAddUserController@password');
    Route::post('admin/users/change/password/update/{id}','AdminAddUserController@passwordupdate');
    Route::post('admin/dynamic_dependent/fetch','AdminAddUserController@fetch')->name('admin/dynamic_dependent/fetch');


    //Room
    Route::get('admin/rooms','AdminRoomController@index');
    Route::get('admin/reserve','AdminRoomController@index1');
    Route::get('admin/available','AdminRoomController@index2');
    Route::get('admin/room/add','AdminRoomController@create');
    Route::post('admin/room/save','AdminRoomController@store');
    Route::get('admin/room/view/{id}','AdminRoomController@view');
    Route::get('admin/room/edit/{id}','AdminRoomController@edit');
    Route::get('admin/reserveroom/edit/{id}','AdminRoomController@EditReservRoom');
    Route::post('admin/room/edit/update/{id}','AdminRoomController@ChangeRoomUpdate');
    Route::post('dynamic_dependent/fetchroom','AdminRoomController@fetchroom')->name('dynamicdependent.fetchroom');
     Route::get('admin/room/edit/{id}','AdminRoomController@edit2');
    Route::post('admin/room/details/update/{id}','AdminRoomController@update');

    //Room Facility
    Route::get('admin/facility','AdminRoomFacilityController@index');
    Route::get('admin/facility/add','AdminRoomFacilityController@create');
    Route::post('admin/facility/save','AdminRoomFacilityController@store');
    Route::get('admin/facility/view/{id}','AdminRoomFacilityController@view');
    Route::get('admin/facility/edit/{id}','AdminRoomFacilityController@edit');
    Route::post('admin/facility/edit/update/{id}','AdminRoomFacilityController@update');

    //Room Type
    Route::get('admin/room_type','AdminRoomTypeController@index');
    Route::get('admin/room_type/add','AdminRoomTypeController@create');
    Route::post('admin/room_type/save','AdminRoomTypeController@store');
    Route::get('admin/room_type/view/{id}','AdminRoomTypeController@view');
    Route::get('admin/room_type/edit/{id}','AdminRoomTypeController@edit');
    Route::post('admin/room_type/edit/update/{id}','AdminRoomTypeController@update');

    //Customers
    Route::get('admin/customers','AdminNewCustomerController@index');
    Route::get('admin/customers/add','AdminNewCustomerController@create');
    Route::post('admin/customers/save','AdminNewCustomerController@store');
    Route::get('admin/customers/view/{id}','AdminNewCustomerController@view');
    Route::get('admin/customers/edit/{id}','AdminNewCustomerController@edit');
    Route::post('admin/customers/edit/update/{id}','AdminNewCustomerController@update');
    Route::post('dynamic_dependent/fetch','AdminNewCustomerController@fetch')->name('dynamicdependent.fetch');
    Route::get('admin/customers/checkout/{id}','AdminNewCustomerController@checkout');
    Route::post('admin/checkoutcustomers/update/{id}','AdminNewCustomerController@updatecheckout');
    Route::get('admin/customers/checkinlist','AdminNewCustomerController@checkinlist');
    Route::get('admin/customers/checkoutlist','AdminNewCustomerController@checkoutlist');
    Route::get('admin/customers/print','AdminNewCustomerController@print');
    Route::get('admin/customers/printreceipt/{id}','AdminNewCustomerController@printreceipt');
    Route::get('printcustrecepit/{id}',array('as'=>'printcustrecepit','uses'=>'AdminPDFController@printcustrecepit'));


    //Meals
    Route::get('admin/mealitems','AdminMealController@index');
    Route::post('admin/meals/save','AdminMealController@store');
    Route::get('admin/meals/edit/{id}','AdminMealController@edit');
    Route::post('admin/meals/edit/update/{id}','AdminMealController@update');

    //Offer
    Route::get('admin/offer','AdminOfferController@index');
    // Route::get('admin/offer/add','NewCustomerController@create');
    Route::post('admin/offer/save','AdminOfferController@store');
    Route::get('admin/offer/view/{id}','AdminOfferController@view');
    Route::post('admin/offer/edit/update/{id}','AdminOfferController@update');

    //Category
    Route::get('admin/category','AdminCategoryController@index');
    Route::get('admin/dinner','AdminCategoryController@dinner');
    Route::get('admin/breakfast','AdminCategoryController@breakfast');
    Route::get('admin/lunch','AdminCategoryController@lunch');
    Route::get('admin/dessert','AdminCategoryController@dessert');
    Route::get('admin/drink','AdminCategoryController@drink');
    Route::get('admin/snack','AdminCategoryController@snack');


    //Messages
    Route::get('admin/messages','AdminMessageController@index');
    Route::post('admin/message/save','AdminMessageController@store');
    Route::get('admin/messages/reply/{id}','AdminMessageController@GetMsg');
    Route::get('admin/message/view/{id}','AdminMessageController@load_message');


    //Orders
    Route::get('admin/pendingOrder','AdminOrderController@orderpending');
    Route::get('admin/completeOrder','AdminOrderController@ordercomplete');
    Route::get('admin/FeedbackOrder/{id}','AdminOrderController@OrderFeedback');
    Route::post('admin/feedback/save','AdminOrderController@store');
    Route::post('dynamic_dependent/fetchuser','AdminOrderController@fetchfeedback')->name('dynamicdependent.fetchuser');
    Route::get('/emp_search','AdminOrderController@empsearch');
    Route::post('dynamic_dependent/fetchname','AdminOrderController@fetchname')->name('dynamicdependent.fetchname');

    //Section
    Route::get('admin/add/section','AdminSectionController@index');
    Route::get('admin/view/section','AdminSectionController@view');
    Route::post('admin/save/section','AdminSectionController@store');
    Route::get('admin/add/section/customer','AdminSectionController@index2');
    Route::get('/findCus','AdminSectionController@getCusdetails');
    Route::post('dynamic_dependent/fetchcust','AdminSectionController@getCusdetails')->name('dynamicdependent.fetchcust');
    Route::post('admin/section/customer','AdminSectionController@storesection');

    //Chart
    Route::get('/pdfviewallroom', 'AdminPDFController@index');

    //Excel Report Customer
    Route::get('admin/report', 'AdminExportExcelController@index');
    Route::get('admin/customer_report', 'AdminExportExcelController@customerreport');
    // Route::get('admin/room_report', 'AdminExportExcelController@roomreport');
    Route::get('csv_file/export', 'AdminExportExcelController@csv_export_customer');
    Route::get('csv_file/export/checkin', 'AdminExportExcelController@csv_export_checkin_customer');
    Route::get('csv_file/export/checkout', 'AdminExportExcelController@csv_export_checkout_customer');
    Route::get('exportall', 'AdminDateRangeCustController@exportselect');

    //Excel Report user
    Route::get('admin/user_report', 'AdminExportExcelController@userreport');
    Route::get('csv_file/export/user', 'AdminExportExcelController@csv_export_user');
    Route::get('csv_file/export/activeuser', 'AdminExportExcelController@csv_export_activeuser');
    Route::get('csv_file/export/inactiveuser', 'AdminExportExcelController@csv_export_inactiveuser');

    Route::resource('daterange', 'AdminDateRangeController');
    Route::resource('daterangecust', 'AdminDateRangeCustController');
    // Route::get('csv_export_select_data', 'AdminDateRangeCustController@exportselect')->name('drc.export');
    Route::get('csv_export_all_data', 'AdminDateRangeCustController@exportall')->name('drc.export');
    Route::get('userinfo/export/', 'AdminDateRangeCustController@exportselect')->name('drc.export');
    Route::resource('column-searching1', 'AdminColumnSearchingController');
    // Route::resource('export', 'AdminDateRangeCustController');

    //PDF Room Report
    Route::get('admin/room_report', 'AdminExportExcelController@roomreport');
    Route::get('pdfviewallroom',array('as'=>'pdfviewallroom','uses'=>'AdminPDFController@pdfviewallroom'));
    Route::get('pdfviewavailableroom',array('as'=>'pdfviewavailableroom','uses'=>'AdminPDFController@pdfviewavailableroom'));
    Route::get('pdfviewnotavailableroom',array('as'=>'pdfviewnotavailableroom','uses'=>'AdminPDFController@pdfviewnotavailableroom'));
    Route::get('csv_file/export/allroom', 'AdminExportExcelController@csv_export_room');
    Route::get('csv_file/export/availableroom', 'AdminExportExcelController@csv_export_Availableroom');
    Route::get('csv_file/export/notavailableroom', 'AdminExportExcelController@csv_export_NotAvailableroom');
    Route::get('admin/room_vise', 'AdminExportExcelController@view');
    Route::get('admin/room_histroy', 'AdminExportExcelController@csv_export_roomhistroy');
    Route::get('admin/moredetails', 'AdminExportExcelController@moredetails');
     Route::get('admin/moredetails', 'AdminRoomChartController@index');
     Route::resource('daterange3', 'AdminRoomDateRangeController');


    //Customer PDF
    Route::get('pdfviewcustomer',array('as'=>'pdfviewcustomer','uses'=>'AdminPDFController@pdfviewcustomer'));
    Route::get('admin/report/individual', 'AdminPDFController@individualcustreport');
    Route::get('pdfviewactivecustomer',array('as'=>'pdfviewactivecustomer','uses'=>'AdminPDFController@pdfviewactivecustomer'));
    Route::get('pdfviewainactivecustomer',array('as'=>'pdfviewainactivecustomer','uses'=>'AdminPDFController@pdfviewainactivecustomer'));
    Route::get('individualcustreportview/{id}',array('as'=>'individualcustreportview','uses'=>'AdminPDFController@individualcustreportview'));

    //User PDF
    Route::get('admin/report/individual/user', 'AdminPDFController@individualuserreport');
    Route::get('pdfviewuser',array('as'=>'pdfviewuser','uses'=>'AdminPDFController@pdfviewuser'));
    Route::get('pdfviewactiveuser',array('as'=>'pdfviewactiveuser','uses'=>'AdminPDFController@pdfviewactiveuser'));
    Route::get('pdfviewinactiveuser',array('as'=>'pdfviewinactiveuser','uses'=>'AdminPDFController@pdfviewinactiveuser'));
    Route::get('individualuserreportview/{id}',array('as'=>'individualuserreportview','uses'=>'AdminPDFController@individualuserreportview'));

    //Order PDF
    Route::get('allorders',array('as'=>'allorders','uses'=>'AdminPDFController@allorders'));
    Route::get('completeorders',array('as'=>'completeorders','uses'=>'AdminPDFController@completeorders'));
    Route::get('pendingorders',array('as'=>'pendingorders','uses'=>'AdminPDFController@pendingorders'));

    //Order Excel
    Route::get('csv_export_all_orders', 'AdminExportExcelController@csv_export_allorders')->name('drc.export');
    Route::get('csv_export_complete_orders', 'AdminExportExcelController@csv_export_completeorders')->name('drc.export');
    Route::get('csv_export_pendingorders', 'AdminExportExcelController@csv_export_pendingorders')->name('drc.export');


    //Payment
    Route::get('admin/payment','AdminPaymentController@index');


//Calender

    Route::get('events', 'AdminFullCalenderController@index')->name('events.index');
    Route::post('events', 'AdminFullCalenderController@addEvent')->name('events.add');

    Route::get('/nic', function () {
    return view('backend.admin.user.nic');
});


    //Cart
    Route::get('website/cartdetails','CartController@view');
    Route::get('website/addtocart/{id}','CartController@add_to_cart');
    Route::post('order/place','CartController@addtocart');

});

    //Meal_Cart
    Route::post('store','MealCartController@store');
    Route::get('website/item', 'MealCartController@index');
    Route::get('website/placeorder', 'MealCartController@PlaceOrder');
    Route::get('cart', 'MealCartController@cart');
    Route::get('add-to-cart/{id}', 'MealCartController@addToCart');
    Route::patch('update-cart', 'MealCartController@update');
    Route::delete('remove-from-cart', 'MealCartController@remove');
    Route::get('admin/dinnerweb','MealCartController@dinner');
    Route::get('admin/breakfastweb','MealCartController@breakfast');
    Route::get('admin/lunchweb','MealCartController@lunch');
    Route::get('admin/dessertweb','MealCartController@dessert');
    Route::get('admin/drinkweb','MealCartController@drink');
    Route::get('admin/snackweb','MealCartController@snack');
    Route::get('/findCus','MealCartController@getCus');
    Route::post('dynamic_dependent/fetchdetails','MealCartController@getCus')->name('dynamicdependent.fetchdetails');

    //Web Room Category
    Route::get('single','WebController@single');
    Route::get('double','WebController@double');
    Route::get('family','WebController@family');
    Route::get('suite','WebController@suite');
    Route::get('doubleextra','WebController@doubleextra');




//////////Manager Routes////////////
Route::group(['middleware' => 'App\Http\Middleware\CheckManager'], function()
{

    Route::get('/dashboardManager', function () {
        return view('backend.manager.dashboard');
    });
    //Change Password
    Route::get('manager/change-password', 'ManagerChangePasswordController@index');
    Route::post('manager/change-password', 'ManagerChangePasswordController@store')->name('manager.change.password');

    //User
    Route::get('manager/roomboy','ManagerAddUserController@nonsystem');
    Route::get('manager/roomboy/add','ManagerAddUserController@createroomboy');
    Route::post('manager/roomboy/save','ManagerAddUserController@storeroomboy');
    Route::get('manager/users','ManagerAddUserController@index');
    Route::get('manager/users/add','ManagerAddUserController@create');
    Route::post('manager/users/save','ManagerAddUserController@store');
    Route::get('manager/users/view/{id}','ManagerAddUserController@view');
    Route::get('manager/users/edit/{id}','ManagerAddUserController@edit');
    Route::post('manager/users/edit/update/{id}','ManagerAddUserController@update');
    Route::get('manager/users/change/password/{id}','ManagerAddUserController@password');
    Route::post('manager/users/change/password/update/{id}','ManagerAddUserController@passwordupdate');
    Route::post('usr/dynamic_dependent/fetch','ManagerAddUserController@fetch')->name('usr/dynamic_dependent/fetch');

    //Room
    Route::get('manager/rooms','ManagerRoomController@index');
    Route::get('manager/reserve','ManagerRoomController@index1');
    Route::get('manager/available','ManagerRoomController@index2');
    Route::get('manager/room/add','ManagerRoomController@create');
    Route::post('manager/room/save','ManagerRoomController@store');
    Route::get('manager/room/view/{id}','ManagerRoomController@view');
    Route::get('manager/room/edit/{id}','ManagerRoomController@edit');
    Route::get('manager/reserveroom/edit/{id}','ManagerRoomController@EditReservRoom');
    Route::post('manager/room/edit/update/{id}','ManagerRoomController@ChangeRoomUpdate');
    Route::post('manager/dynamic_dependent/fetchroom','ManagerRoomController@fetchroom')->name('manager/dynamic_dependent/fetchroom');
    Route::get('manager/room/edit/{id}','ManagerRoomController@edit2');
    Route::post('manager/room/details/update/{id}','ManagerRoomController@update');

    //Room Facility
    Route::get('manager/facility','ManagerRoomFacilityController@index');
    Route::get('manager/facility/add','ManagerRoomFacilityController@create');
    Route::post('manager/facility/save','ManagerRoomFacilityController@store');
    Route::get('manager/facility/view/{id}','ManagerRoomFacilityController@view');
    Route::get('manager/facility/edit/{id}','ManagerRoomFacilityController@edit');
    Route::post('manager/facility/edit/update/{id}','ManagerRoomFacilityController@update');

    //Room Type
    Route::get('manager/room_type','ManagerRoomTypeController@index');
    Route::get('manager/room_type/add','ManagerRoomTypeController@create');
    Route::post('manager/room_type/save','ManagerRoomTypeController@store');
    Route::get('manager/room_type/view/{id}','ManagerRoomTypeController@view');
    Route::get('manager/room_type/edit/{id}','ManagerRoomTypeController@edit');
    Route::post('manager/room_type/edit/update/{id}','ManagerRoomTypeController@update');

    //Customers
    Route::get('manager/customers','ManagerNewCustomerController@index');
    Route::get('manager/customers/add','ManagerNewCustomerController@create');
    Route::post('manager/customers/save','ManagerNewCustomerController@store');
    Route::get('manager/customers/view/{id}','ManagerNewCustomerController@view');
    Route::get('manager/customers/edit/{id}','ManagerNewCustomerController@edit');
    Route::post('manager/customers/edit/update/{id}','ManagerNewCustomerController@update');
    Route::post('mng/dynamic_dependent/fetch','ManagerNewCustomerController@fetch')->name('mng/dynamic_dependent/fetch');
    Route::get('manager/customers/checkout/{id}','ManagerNewCustomerController@checkout');
    Route::post('manager/checkoutcustomers/update/{id}','ManagerNewCustomerController@updatecheckout');
    Route::get('manager/customers/checkinlist','ManagerNewCustomerController@checkinlist');
    Route::get('manager/customers/checkoutlist','ManagerNewCustomerController@checkoutlist');

    //Meals
    Route::get('manager/mealitems','ManagerMealController@index');
    Route::post('manager/meals/save','ManagerMealController@store');
    Route::get('manager/meals/edit/{id}','ManagerMealController@edit');
    Route::post('manager/meals/edit/update/{id}','ManagerMealController@update');

    //Offer
    Route::get('manager/offer','ManagerOfferController@index');
    // Route::get('admin/offer/add','NewCustomerController@create');
    Route::post('manager/offer/save','ManagerOfferController@store');
     Route::get('manager/offer/view/{id}','ManagerOfferController@view');
    Route::post('manager/offer/edit/update/{id}','ManagerOfferController@update');

    //Category
    Route::get('manager/category','ManagerCategoryController@index');
    Route::get('manager/dinner','ManagerCategoryController@dinner');
    Route::get('manager/breakfast','ManagerCategoryController@breakfast');
    Route::get('manager/lunch','ManagerCategoryController@lunch');
    Route::get('manager/dessert','ManagerCategoryController@dessert');
    Route::get('manager/drink','ManagerCategoryController@drink');
    Route::get('manager/snack','ManagerCategoryController@snack');

    //Messages
    Route::get('manager/messages','ManagerMessageController@index');
    Route::post('manager/message/save','ManagerMessageController@store');
    Route::get('manager/messages/reply/{id}','ManagerMessageController@GetMsg');
    Route::get('manager/message/view/{id}','ManagerMessageController@load_message');

    //Section
    Route::get('manager/add/section','ManagerSectionController@index');
    Route::get('manager/view/section','ManagerSectionController@view');
    Route::post('manager/save/section','ManagerSectionController@store');
    Route::get('manager/add/section/customer','ManagerSectionController@index2');
    Route::get('/findCus','ManagerSectionController@getCusdetails');
    Route::post('dynamic_dependent/fetchcust1','ManagerSectionController@getCusdetails1')->name('dynamicdependent.fetchcust1');
    Route::post('manager/section/customer','ManagerSectionController@storesection');

    //Orders
    Route::get('manager/pendingOrder','ManagerOrderController@orderpending');
    Route::get('manager/completeOrder','ManagerOrderController@ordercomplete');
    Route::get('manager/FeedbackOrder/{id}','ManagerOrderController@OrderFeedback');
    Route::post('manager/feedback/save','ManagerOrderController@store');
    Route::post('dynamic_dependent/fetchuser','ManagerOrderController@fetchfeedback')->name('dynamicdependent.fetchuser');
    Route::get('/emp_search','ManagerOrderController@empsearch');
    Route::post('dynamic_dependent/fetchname','ManagerOrderController@fetchname')->name('dynamicdependent.fetchname');

    //Report Customer Excel/PDF
    Route::get('manager/report', 'ManagerReportController@index');
    Route::get('manager/customer_report', 'ManagerReportController@customerreport');
    Route::get('manager/csv_file/export', 'ManagerReportController@csv_export_customer');
    Route::get('manager/csv_file/export/checkin', 'ManagerReportController@csv_export_checkin_customer');
    Route::get('manager/csv_file/export/checkout', 'ManagerReportController@csv_export_checkout_customer');
    Route::get('manager/pdfviewcustomer',array('as'=>'manager/pdfviewcustomer','uses'=>'ManagerPDFController@pdfviewcustomer'));
    Route::get('manager/report/individual', 'ManagerReportController@individualcustreport');
    Route::get('manager/pdfviewactivecustomer',array('as'=>'manager/pdfviewactivecustomer','uses'=>'ManagerPDFController@pdfviewactivecustomer'));
    Route::get('manager/pdfviewainactivecustomer',array('as'=>'manager/pdfviewainactivecustomer','uses'=>'ManagerPDFController@pdfviewainactivecustomer'));
    Route::get('manager/individualcustreportview/{id}',array('as'=>'individualcustreportview','uses'=>'ManagerPDFController@individualcustreportview'));
     Route::resource('manager/column-searching', 'ManagerColumnSearchingController');
     Route::resource('manager/daterange1', 'ManagerDateRangeCustController');

    //Report Room Excel/PDF
     Route::get('manager/room_report', 'ManagerReportController@roomreport');
    Route::get('manager/pdfviewallroom',array('as'=>'manager/pdfviewallroom','uses'=>'ManagerPDFController@pdfviewallroom'));
    Route::get('manager/pdfviewavailableroom',array('as'=>'manager/pdfviewavailableroom','uses'=>'ManagerPDFController@pdfviewavailableroom'));
    Route::get('manager/pdfviewnotavailableroom',array('as'=>'manager/pdfviewnotavailableroom','uses'=>'ManagerPDFController@pdfviewnotavailableroom'));
    Route::get('manager/csv_file/export/allroom', 'ManagerReportController@csv_export_room');
    Route::get('manager/csv_file/export/availableroom', 'ManagerReportController@csv_export_Availableroom');
    Route::get('manager/csv_file/export/notavailableroom', 'ManagerReportController@csv_export_NotAvailableroom');
    Route::get('manager/room_vise', 'ManagerReportController@view');
    Route::get('manager/room_histroy', 'ManagerReportController@csv_export_roomhistroy');
    Route::get('manager/moredetails', 'ManagerReportController@moredetails');
     Route::get('manager/moredetails', 'ManagerRoomChartController@index');
     Route::resource('manager/daterange4', 'ManagerRoomDateRangeController');

    //Web
    Route::get('website/site','WebController@index');
    Route::get('website/recipe','WebController@index1');
    Route::get('website/cart','WebController@index2');
    Route::get('website/roomlist','WebController@index3');

});


////////// Chef Routes////////////
Route::group(['middleware' => 'App\Http\Middleware\CheckChef'], function()
{
    Route::get('/dashboardChef', function () {
        return view('backend.chef.dashboard');
    });
    //Change Password
    Route::get('chef/change-password', 'ChefChangePasswordController@index');
    Route::post('chef/change-password', 'ChefChangePasswordController@store')->name('chef.change.password');
    //Order
    Route::get('chef/pending','ChefController@index');
    Route::get('chef/complete','ChefController@complete');
    Route::get('chef/pending/list/{id}','ChefController@PendingList');
    Route::get('chef/order/edit/update/{id}','ChefController@update');
});

//////////Receptionist Routes////////////
Route::group(['middleware' => 'App\Http\Middleware\CheckReceptionist'], function()
{
    Route::get('/dashboardReception', function () {
    return view('backend.receptionist.dashboard');
    });

    //Change Password
    Route::get('receptionist/change-password', 'ReceptionistChangePasswordController@index');
    Route::post('receptionist/change-password', 'ReceptionistChangePasswordController@store')->name('rec.change.password');

    //Customers
    Route::get('receptionist/customers','ReceptionistController@index');
    Route::get('receptionist/customers/add','ReceptionistController@create');
    Route::post('receptionist/customers/save','ReceptionistController@store');
    Route::get('receptionist/customers/view/{id}','ReceptionistController@view');
    Route::get('receptionist/customers/edit/{id}','ReceptionistController@edit');
    Route::post('receptionist/customers/edit/update/{id}','ReceptionistController@update');
    Route::post('customer/dynamic_dependent/fetch','ReceptionistController@fetch')->name('dynamicdependentres.fetch');
    Route::get('receptionist/customers/checkout/{id}','ReceptionistController@checkout');
    Route::post('receptionist/checkoutcustomers/update/{id}','ReceptionistController@updatecheckout');
    Route::get('receptionist/customers/checkinlist','ReceptionistController@checkinlist');
    Route::get('receptionist/customers/checkoutlist','ReceptionistController@checkoutlist');

    //Room
    Route::get('receptionist/rooms','ReceptionistRoomController@index');
    Route::get('receptionist/reserve','ReceptionistRoomController@index1');
    Route::get('receptionist/available','ReceptionistRoomController@index2');
    Route::get('receptionist/room/view/{id}','ReceptionistRoomController@view');
    Route::get('receptionist/reserveroom/edit/{id}','ReceptionistRoomController@EditReservRoom');
    Route::post('receptionist/room/edit/update/{id}','ReceptionistRoomController@ChangeRoomUpdate');
    Route::post('receptionist/dynamic_dependent/fetchroom','ReceptionistRoomController@fetchroom')->name('dynamicdependentres.fetchroom');

    //Section
    Route::get('receptionist/add/section/customer','ReceptionistSectionController@index2');
    Route::get('/findCus','ManagerSectionController@getCusdetails2');
    Route::post('dynamic_dependent/fetchcust2','ReceptionistSectionController@getCusdetails2')->name('dynamicdependent.fetchcust2');
    Route::post('receptionist/section/customer','ReceptionistSectionController@storesection');

    //Messages
    Route::get('receptionist/messages','ReceptionistMessageController@index');
    Route::post('receptionist/message/save','ReceptionistMessageController@store');
    Route::get('receptionist/message/view/{id}','ReceptionistMessageController@load_message2');
    Route::post('dynamic_dependent/fetchuser2','ReceptionistController@fetchfeedback')->name('dynamicdependent.fetchuser');
    Route::post('dynamic_dependent/fetchname2','ReceptionistController@fetchname')->name('dynamicdependent.fetchname');

});



//Web
    Route::get('website/site','WebController@index');
    Route::get('website/recipe','WebController@index1');
    Route::get('website/cart','WebController@index2');
    Route::get('website/roomlist','WebController@index3');
