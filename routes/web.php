<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

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
Route::get('/admin/messages', 'MessagesController@index');
Route::get('/admin/messages/{id}', 'MessagesController@show');
Route::get('/admin/dashboard',[DashboardController::class, 'index'])->name('dashboard');