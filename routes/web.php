<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
//Admin Panel
Route::get('/home', 'AdminController@index')->name('home');


//Employee Route Here------------------
Route::get('/add_employee', 'EmployeeController@add_employee');
Route::post('/save_employee', 'EmployeeController@save_employee');
Route::get('/manage_employee', 'EmployeeController@manage_employee');
Route::get('/view_employee/{id}', 'EmployeeController@view_employee');
Route::get('/edit_employee/{id}', 'EmployeeController@edit_employee');
Route::post('/update_employee/{id}', 'EmployeeController@update_employee');
Route::get('/delete_employee/{id}', 'EmployeeController@delete_employee');

//Customer Route Here---------------
Route::get('/add_customer','CustomerController@add_customer');
Route::post('/save_customer','CustomerController@save_customer');
Route::get('/manage_customer', 'CustomerController@manage_customer');
Route::get('/view_customer/{id}', 'CustomerController@view_customer');
Route::get('/edit_customer/{id}', 'CustomerController@edit_customer');
Route::post('/update_customer/{id}', 'CustomerController@update_customer');
Route::get('/delete_customer/{id}', 'CustomerController@delete_customer');

//Supplier Route Here----------------
Route::get('/add_supplier', 'SupplierController@add_supplier');
Route::post('/save_supplier','SupplierController@save_supplier');
Route::get('/manage_supplier', 'SupplierController@manage_supplier');
Route::get('/view_supplier/{id}', 'SupplierController@view_supplier');
Route::get('/edit_supplier/{id}', 'SupplierController@edit_supplier');
Route::post('/update_supplier/{id}', 'SupplierController@update_supplier');
Route::get('/delete_supplier/{id}', 'SupplierController@delete_supplier');

//Advance Salary Route Here------------
Route::get('/add_advance_salary','AdvanceSalaryController@add_advance_salary');
Route::post('/save_advance_salary','AdvanceSalaryController@save_advance_salary');
Route::get('/manage_advance_salary','AdvanceSalaryController@manage_advance_salary');

//Payment Salary Here---------------
Route::get('/payment','PaymentSalaryController@add_payment');


//Category Route Here----------
Route::get('/add_category','CategoryController@add_category');
Route::post('/save_category','CategoryController@save_category');
Route::get('/manage_category','CategoryController@manage_category');
Route::get('/edit_category/{id}','CategoryController@edit_category');
Route::post('/update_category/{id}','CategoryController@update_category');
Route::get('/delete_category/{id}','CategoryController@delete_category');

//Product Route Here----------
Route::get('/add_product','ProductController@add_product');
Route::post('/save_product','ProductController@save_product');
Route::get('/manage_product','ProductController@manage_product');
Route::get('/edit_product/{id}','ProductController@edit_product');
Route::post('/update_product/{id}','ProductController@update_product');
Route::get('/view_product/{id}','ProductController@view_product');
Route::get('/delete_product/{id}','ProductController@delete_product');
//excel import and export route here-------
Route::get('/import_product','ProductController@import_product');
Route::get('/export','ProductController@export');
Route::post('/import/','ProductController@import');


//Expenses Route Here-----------
Route::get('/add_expenses','ExpensesController@add_expenses');
Route::post('/save_expenses','ExpensesController@save_expenses');
Route::get('/manage_expenses','ExpensesController@manage_expenses');
Route::get('/edit_expenses/{id}','ExpensesController@edit_expenses');
Route::post('/update_expenses/{id}','ExpensesController@update_expenses');
Route::get('/total_expenses','ExpensesController@total_expenses');
Route::get('/previous_month','ExpensesController@previous_month');
Route::get('/today_expenses','ExpensesController@today_expenses');
Route::get('/this_month_expenses','ExpensesController@this_month_expenses');
Route::get('/year_expenses','ExpensesController@year_expenses');
Route::get('/monthly_expenses','ExpensesController@monthly_expenses');
Route::get('/january_expenses','ExpensesController@january_expenses');
Route::get('/february_expenses','ExpensesController@february_expenses');
Route::get('/march_expenses','ExpensesController@march_expenses');
Route::get('/april_expenses','ExpensesController@april_expenses');
Route::get('/may_expenses','ExpensesController@may_expenses');
Route::get('/june_expenses','ExpensesController@june_expenses');
Route::get('/july_expenses','ExpensesController@july_expenses');
Route::get('/august_expenses','ExpensesController@august_expenses');
Route::get('/september_expenses','ExpensesController@september_expenses');
Route::get('/october_expenses','ExpensesController@october_expenses');
Route::get('/november_expenses','ExpensesController@november_expenses');
Route::get('/december_expenses','ExpensesController@december_expenses');


//Attendance Route Here-------------------
Route::get('/take_attendance','AttendanceController@take_attendance');
Route::post('/save_attendance','AttendanceController@save_attendance');
Route::get('/all_attendance','AttendanceController@all_attendance');
Route::get('/edit_attendance/{edit_date}','AttendanceController@edit_attendance');
Route::post('/update_attendance','AttendanceController@update_attendance');

//Setting Route Here------------------
Route::get('/add_setting','SettingController@add_setting');
Route::post('/save_setting','SettingController@save_setting');
Route::get('/manage_setting','SettingController@manage_setting');
Route::get('/edit_setting/{id}','SettingController@edit_setting');
Route::post('/update_setting/{id}','SettingController@update_setting');

//Pos Route Here---------------
Route::get('/add_pos','PosController@add_pos');
Route::get('/search','PosController@search');
Route::post('/cart','PosController@cart');
Route::post('/invoice/','PosController@invoice');
Route::post('/cart_update/{rowId}','PosController@cart_update');
Route::get('/cart_remove/{rowId}','PosController@cart_remove');
Route::post('/final_invoice/','PosController@final_invoice');
//Order Route Here------
Route::get('/padding_order','PosController@padding_order');
Route::get('/order_status/{id}','PosController@order_status');
Route::get('/pos_done/{id}','PosController@pos_done');
Route::get('/confirm_order','PosController@confirm_order');




