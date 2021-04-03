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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Items Route
Route::get('/listItem', [App\Http\Controllers\ItemController::class, 'index'])->name('list_item');
Route::get('/addItem', [App\Http\Controllers\ItemController::class, 'addItemView'])->name('add_item');
Route::post('/addItem/store', [App\Http\Controllers\ItemController::class, 'storeItemToDB'])->name('store_item');
Route::delete('/listItem/{id}', [App\Http\Controllers\ItemController::class, 'deleteItemFromList'])->name('delete_item');
Route::get('/listItem/edit/{id}', [App\Http\Controllers\ItemController::class, 'editItemFromList'])->name('edit_item');
Route::patch('/listItem/{id}', [App\Http\Controllers\ItemController::class, 'updateItem'])->name('update_item');
Route::get('/orderItem', [App\Http\Controllers\ItemController::class, 'selectItem'])->name('select_item');
Route::post('/orderItem', [App\Http\Controllers\ItemController::class, 'orderItem'])->name('order_item');
Route::get('/getSellPriceDesc/{id}', [App\Http\Controllers\AjaxController::class, 'getSellPriceDescItem'])->name('get_sellprice_description');
Route::get('/checkoutlist', [App\Http\Controllers\ItemController::class, 'checkoutlist'])->name('checkout_list_item');
Route::get('/checkoutlist/view/{id}', [App\Http\Controllers\ItemController::class, 'viewCheckoutDetail'])->name('view_detail');

