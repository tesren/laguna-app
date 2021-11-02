<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\UnitsController;
use App\Http\Controllers\UnitTypesController;



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

//public routes
Route::get('/', function () {
    return view('pages.home');
});

Route::get('/admin', function () {
    return view('admin.login');
});

Route::get('/contact', function () {
    return view('pages.contact');
});

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/progress', function () {
    return view('pages.about');
});

Route::get('/inventory', function () {
    return view('pages.inventory');
});

//admin routes
Route::prefix('admin')->group(function () {
    Route::get('/messages', [MessagesController::class, 'index'])->name('all.messages');
    Route::get('/messages/{id}', [MessagesController::class, 'show'])->name('show.message');
    Route::delete('/messages/{id}/delete', [MessagesController::class, 'destroy'])->name('delete.message');

    Route::get('/units', [UnitsController::class, 'index'])->name('all.units');
    Route::get('/unit/{id}', [UnitsController::class, 'show'])->name('show.unit');

    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

    Route::post('/unit/types',[UnitTypesController::class, 'all'])->name('all.unit.types');
});


