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

Route::get('/', 'Views\ReservationViewController@showIndex');
Route::post('/', 'Views\ReservationViewController@processIndex');

Route::get('reservation/rooms', 'Views\ReservationViewController@showRooms');
Route::post('reservation/rooms', 'Views\ReservationViewController@processRooms');

Route::get('reservation/customers', 'Views\ReservationViewController@showCustomers');
Route::post('reservation/customers', 'Views\ReservationViewController@processCustomers');

Route::get('reservation/completion', 'Views\ReservationViewController@showCompletion');

Route::get('login', 'Views\AdministrationViewController@showIndex')->name('login');
Route::post('login', 'Views\AdministrationViewController@processIndex');

Route::group(['middleware' => 'auth'], function() {
    Route::get('dashboard', 'Views\AdministrationViewController@showDashboard');
    Route::post('dashboard', 'Views\AdministrationViewController@processDashboard');

    Route::get('logout', 'Views\LogoutViewController@showIndex');

    Route::get('customer', 'Views\AdministrationViewController@getCustomer');
    Route::get('rooms', 'Views\ManageRoomsViewController@getRooms');
    Route::get('users', 'Views\ManageUsersViewController@getUser');

    Route::post('reservation/add', 'Views\AdministrationViewController@addReservation');

    Route::get('manageUsers', 'Views\ManageUsersViewController@showIndex');
    Route::post('manageUsers', 'Views\ManageUsersViewController@processRequest');

    Route::get('manageRooms', 'Views\ManageRoomsViewController@showIndex');
    Route::post('manageRooms', 'Views\ManageRoomsViewController@processRequest');
});
