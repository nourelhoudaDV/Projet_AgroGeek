<?php

// use App\Http\Controllers\ClientController;
// use App\Http\Controllers\DashboardController;

use App\Http\Controllers\CultureParcelleController;
use App\Http\Controllers\FermeController;
use App\Http\Controllers\StorageController;
//use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TypesolController;
use App\Http\Controllers\ParcelleController;
use App\Http\Controllers\GerantFermeController;

use App\Http\Controllers\EspeceController;
use App\Http\Controllers\Qualifications;
use App\Http\Controllers\VarieteController;
use App\Http\Controllers\StadeVarieteController;
use App\Http\Controllers\StadeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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
    return view('index');
})->name('dashboard');


Route::name('TechniquesAgricole.')->prefix('TechniquesAgricole')->controller(CultureParcelleController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit', 'edit')->name('edit');
        Route::post('/update', 'update')->name('update');
        Route::post('/delete', 'delete')->name('delete');
    });

Route::name('cultureparcelle.')->prefix('cultureparcelle')->controller(CultureParcelleController::class)
    ->group(function () {
        Route::get('/', 'create')->name('create');
        Route::post('store', 'store')->name('store');
    });

Route::name('users.')->prefix('users')->controller(UserController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('{id}/delete', 'destroy')->name('delete');
        Route::get('{id}/show', 'show')->name('show');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::post('{id}/update', 'update')->name('update');
        Route::post('delete', 'destroyGroup')->name('destroyGroup');
    });


    
    Route::name('GerantFermes.')->prefix('GerantFermes')->controller(GerantFermeController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('{id}/delete', 'destroy')->name('delete');
        Route::get('{id}/show', 'show')->name('show');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::post('{id}/update', 'update')->name('update');
        Route::post('delete', 'destroyGroup')->name('destroyGroup');
    });



Route::name('fermes.')->prefix('fermes')->controller(FermeController::class)
->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('{idF}/delete', 'destroy')->name('delete');
    Route::get('{idF}/show', 'show')->name('show');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::post('{idF}/update', 'update')->name('update');
    Route::post('delete', 'destroyGroup')->name('destroyGroup');
});

Route::name('parcelles.')->prefix('parcelles')->controller(ParcelleController::class)
->group(function () {
    Route::get('{idp}/delete', 'destroy')->name('delete');
    Route::get('{idp}/show', 'show')->name('show');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::post('{idp}/update', 'update')->name('update');
    Route::post('delete', 'destroyGroup')->name('destroyGroup');
});

Route::name('typesols.')->prefix('typesols')->controller(TypesolController::class)
->group(function () {
    Route::get('{idTS}/delete', 'destroy')->name('delete');
    Route::get('{idTS}/show', 'show')->name('show');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::post('{idTS}/update', 'update')->name('update');
    Route::post('delete', 'destroyGroup')->name('destroyGroup');
});

Route::name('especes.')->prefix('especes')->controller(EspeceController::class)
->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('{ide}/delete', 'destroy')->name('delete');
    Route::get('{ide}/show', 'show')->name('show');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::post('{ide}/update', 'update')->name('update');
    Route::post('delete', 'destroyGroup')->name('destroyGroup');
});
Route::name('varietes.')->prefix('varietes')->controller(VarieteController::class)
->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('{idV}/delete', 'destroy')->name('delete');
    Route::get('{idV}/show', 'show')->name('show');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::post('{idV}/update', 'update')->name('update');
    Route::post('delete', 'destroyGroup')->name('destroyGroup');
});
Route::name('stadeVarietes.')->prefix('stadeVarietes')->controller(StadeVarieteController::class)
->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('{idS}/delete', 'destroy')->name('delete');
    Route::get('{idS}/show', 'show')->name('show');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::post('{idS}/update', 'update')->name('update');
    Route::post('delete', 'destroyGroup')->name('destroyGroup');
});
Route::name('stades.')->prefix('stades')->controller(StadeController::class)
->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('{idS}/delete', 'destroy')->name('delete');
    Route::get('{idS}/show', 'show')->name('show');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::post('{idS}/update', 'update')->name('update');
    Route::post('delete', 'destroyGroup')->name('destroyGroup');
});

Route::group(['prefix' => 'admins'], function () {
    Route::get('', [AdminController::class, 'index'])
        ->name('admins');
    Route::get('delete/{id}', [AdminController::class, 'delete'])
        ->name('admin.delete');
    Route::get('create', [AdminController::class, 'create'])
        ->name('admin.create');
    Route::post('store', [AdminController::class, 'store'])
        ->name('admin.store');
    Route::get('/{id}/get', [AdminController::class, 'show'])
        ->name('admin.show');
    Route::post('update/{id}', [AdminController::class, 'update'])
        ->name('admin.update');
    Route::get('status/{id}/{status}', [AdminController::class, 'status'])
        ->name('admin.change.status');
    Route::get('rule/{id}/{rule}', [AdminController::class, 'rule'])
        ->name('admin.change.rule');
});


Route::get('language/{locale}', function ($locale = 'fr') {
    Session::put('locale', $locale);
    return back();
})->name('setLang');

// // delete all users
// Route::delete('/users/delete-all', [UserController::class, 'deleteAllUsers'])->name('users.deleteAll');

Route::get('file/{file?}', [StorageController::class, 'public'])
    ->where('file', '.*')
    ->name('file.get');


Route::get('private/{file?}', [StorageController::class, 'private'])
    ->where('file', '.*')
    ->name('file.private.get');


Route::get('/error', function () {
    abort(500);
});


require __DIR__ . '/auth.php';



