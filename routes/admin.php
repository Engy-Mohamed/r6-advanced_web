<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\carController;


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ 
        Route::get('cars/create', [carController::class, 'create'])->middleware('verified');
        Route::post('cars', [carController::class, 'store'])->name('car.store')->middleware('verified');
        Route::get('cars', [CarController::class, 'index'])->name('cars.index')->middleware('verified');
        Route::get('cars/{id}', [CarController::class, 'edit'])->name('cars.edit')->whereNumber('id')->middleware('verified');
        Route::post('cars/{id}', [CarController::class, 'update'])->name('cars.update')->middleware('verified');
        Route::get('cars/show/{id}', [CarController::class, 'show'])->name('cars.show')->middleware('verified');
        Route::get('cars/destroy/{id}', [CarController::class, 'destroy'])->name('cars.destroy')->middleware('verified');
        Route::get('cars/trashed', [CarController::class, 'showDeleted'])->name('cars.showDeleted')->middleware('verified');
        Route::patch('cars/restore', [CarController::class, 'restore'])->name('cars.restore')->middleware('verified');
        Route::delete('cars/trashed/delete', [CarController::class, 'force_delete'])->name('cars.force_delete')->middleware('verified');
    });

