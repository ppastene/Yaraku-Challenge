<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::prefix('book')->group(function () {
    Route::post('/', [HomeController::class, 'store'])->name('book.post');
    Route::put('/', [HomeController::class, 'update'])->name('book.edit');
    Route::delete('/{id}', [HomeController::class, 'destroy'])->name('book.delete');
    Route::get('/export/{type}/{format}', [HomeController::class, 'export'])->name('book.export');
    Route::get('/download/{file}', [HomeController::class, "download"])->name("book.download");
});
