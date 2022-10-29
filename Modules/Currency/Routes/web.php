<?php

use Illuminate\Support\Facades\Route;
use Modules\Currency\Http\Controllers\CurrencyController;

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

// Route::prefix('currency')->group(function() {
//     Route::get('/', 'CurrencyController@index');
// });

Route::group(['as' => 'module.currency.', 'prefix' => 'admin/currency', 'middleware' => ['auth:super_admin', 'setlang']], function () {
    Route::get('/', [CurrencyController::class, 'index'])->name('index');
    Route::get('/create', [CurrencyController::class, 'create'])->name('create');
    Route::post('', [CurrencyController::class, 'store'])->name('store');
    Route::put('/default-currency', [CurrencyController::class, 'defaultCurrency'])->name('default');
    Route::get('{currency}/edit', [CurrencyController::class, 'edit'])->name('edit');
    Route::put('{currency}', [CurrencyController::class, 'update'])->name('update');
    Route::delete('{currency}', [CurrencyController::class, 'destroy'])->name('delete');
});
