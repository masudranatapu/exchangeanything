<?php

use Illuminate\Support\Facades\Route;
use Modules\Location\Http\Controllers\CountryController;
use Modules\Location\Http\Controllers\StateController;
use Modules\Location\Http\Controllers\CityController;

Route::middleware(['auth:super_admin', 'setlang'])->group(function () {
    // City CRUD
    Route::prefix('admin/country')->group(function () {
        Route::get('/', [CountryController::class, 'index'])->name('module.city.index');
        Route::get('create', [CountryController::class, 'create'])->name('module.city.create');
        Route::post('store', [CountryController::class, 'store'])->name('module.city.store');
        Route::get('edit/{city}', [CountryController::class, 'edit'])->name('module.city.edit');
        Route::put('update/{city}', [CountryController::class, 'update'])->name('module.city.update');
        Route::get('/{city}/ads', [CountryController::class, 'show'])->name('module.city.show');
        Route::delete('delete/{city}', [CountryController::class, 'destroy'])->name('module.city.delete');
    });

    // Town CRUD
    Route::prefix('admin/city')->group(function () {
        Route::get('/', [StateController::class, 'index'])->name('module.town.index');
        Route::get('create', [StateController::class, 'create'])->name('module.town.create');
        Route::post('store', [StateController::class, 'store'])->name('module.town.store');
        Route::get('edit/{town}', [StateController::class, 'edit'])->name('module.town.edit');
        Route::put('update/{town}', [StateController::class, 'update'])->name('module.town.update');
        Route::delete('delete/{town}', [StateController::class, 'destroy'])->name('module.town.delete');
    });

    // Route::prefix('admin/city')->group(function () {
    //     Route::get('/', [CityController::class, 'index'])->name('module.area.index');
    //     Route::get('create', [CityController::class, 'create'])->name('module.area.create');
    //     Route::post('store', [CityController::class, 'store'])->name('module.area.store');
    //     Route::get('edit/{id}', [CityController::class, 'edit'])->name('module.area.edit');
    //     Route::post('update/{id}', [CityController::class, 'update'])->name('module.area.update');
    //     Route::get('delete/{id}', [CityController::class, 'destroy'])->name('module.area.delete');
    //     Route::get('country-get-ajax/{countryid}', [CityController::class, 'countryGetAjax']);
    // });

});

Route::get('/get-towns/{city_id}', [CityController::class, 'getTowns']);
