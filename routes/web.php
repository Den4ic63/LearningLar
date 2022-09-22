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

Route::get('send',[\App\Http\Controllers\Controller::class,'send'])->name('send');

Route::middleware(['set_locale'])->group(function (){

    Route::get('locale/{locale}',[\App\Http\Controllers\Controller::class,'Chlocale'])->name('locale');

    Route::middleware(['auth'])->group(function (){

        Route::get('/dashboard', [\App\Http\Controllers\UserController::class,'dashIn'])->name('dashboard');
        Route::get('add-user',[\App\Http\Controllers\UserController::class, 'create'])->name('add-user');
        Route::post('store-user',[\App\Http\Controllers\UserController::class, 'store'])->name('store-user');
        Route::get('edit-user/{id}',[\App\Http\Controllers\UserController::class, 'edit'])->name('edit-user');
        Route::put('update-user/{id}',[\App\Http\Controllers\UserController::class, 'update'])->name('update-user');
        Route::delete('delete-user/{id}',[\App\Http\Controllers\UserController::class, 'delete'])->name('delete-user');

        Route::resource('roles',\App\Http\Controllers\RoleController::class);

        Route::get('edit-role/{id}',[\App\Http\Controllers\RoleController::class,'edit'])->name('edit-role');
        Route::put('update-role/{id}',[\App\Http\Controllers\RoleController::class, 'upd'])->name('update-role');

        Route::get('pdf',[\App\Http\Controllers\PdfController::class,'view_pdf'])->name('pdf');
        Route::post('pdf',[\App\Http\Controllers\PdfController::class,'CreatePdf'])->name('CreatePdf');


    });

});



require __DIR__.'/auth.php';
