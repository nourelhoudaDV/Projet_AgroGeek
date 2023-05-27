<?php

use App\Http\Controllers\EspeceController;
use App\Http\Controllers\ModesTechniqueController;
use App\Http\Controllers\QualificationsControllers;
use App\Http\Controllers\TypesMaterielController;
use App\Http\Controllers\TechniqueSpecifiqueController;
use App\Http\Controllers\TypeMaterielController;



Route::name('TechniquesAgricole.')->prefix('TechniquesAgricole')->controller(TechniquesAgricoleController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('{id}/delete', 'destroy')->name('delete');
        Route::get('{id}/show', 'show')->name('show');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::post('{id}/update', 'update')->name('update');
        Route::post('delete', 'destroyGroup')->name('destroyGroup');

    });

Route::name('ModesTechnique.')->prefix('ModesTechnique')->controller(ModesTechniqueController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('{id}/delete', 'destroy')->name('delete');
        Route::get('{id}/show', 'show')->name('show');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::post('{id}/update', 'update')->name('update');
        Route::post('delete', 'destroyGroup')->name('destroyGroup');

    });

    
Route::name('qualifications.')->prefix('qualifications')->controller(QualificationsControllers::class)
->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('{id}/delete', 'destroy')->name('delete');
    Route::get('{id}/show', 'show')->name('show');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::post('{id}/update', 'update')->name('update');
    Route::post('delete', 'destroyGroup')->name('destroyGroup');

});

Route::name('typeMateriel.')->prefix('typeMateriel')->controller(TypeMaterielController::class)
->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('{id}/delete', 'destroy')->name('delete');
    Route::get('{id}/show', 'show')->name('show');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::post('{id}/update', 'update')->name('update');
    Route::post('delete', 'destroyGroup')->name('destroyGroup');

});


Route::name('techniquesSpecifiques.')->prefix('techniquesSpecifiques')->controller(TechniqueSpecifiqueController::class)
->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('{id}/delete', 'destroy')->name('delete');
    Route::get('{id}/show', 'show')->name('show');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::post('{id}/update', 'update')->name('update');
    Route::post('delete', 'destroyGroup')->name('destroyGroup');

});












