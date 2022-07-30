<?php

use App\Http\Controllers\CustomersController;
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
Route::middleware(['verify.shopify'])->group(function () {
    Route::get('/', 'App\Http\Controllers\CustomersController@appDashboard')->name('home');
    Route::get('/shopify/customer/create', 'App\Http\Controllers\CustomersController@addShopifyCustomer')->name('shopify-customer-create');
});
// Route::get('/', 'App\Http\Controllers\CustomersController@appDashboard')
// ->middleware(['verify.shopify'])->name('home');

// Route::get('/', function () {
//     return view('welcome');
// })->middleware(['verify.shopify'])->name('home');
