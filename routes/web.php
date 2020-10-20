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

Route::post('reservation/rooms', 'Views\ReservationViewController@processRooms');
Route::post('reservation/customers', 'Views\ReservationViewController@processCustomers');

Route::get('administration/login', 'Views\AdministrationViewController@showIndex');
Route::post('administration/login', 'Views\AdministrationViewController@processIndex');
