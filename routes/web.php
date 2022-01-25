<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\UnitsController;
use App\Http\Controllers\UnitTypesController;
use App\Http\Controllers\UnitTypesImgController;
use App\Http\Controllers\TowersController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\PaymentPlansController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ContactFormSubmissionController;
use Spatie\Honeypot\ProtectAgainstSpam;

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


/* Route::redirect('/', '/'.$locale);
Route::redirect('/towers', '/'.$locale.'/towers');
Route::redirect('/about', '/'.$locale.'/about');
Route::redirect('/contact', '/'.$locale.'/contact');
Route::redirect('/lifestyle', '/'.$locale.'/lifestyle'); */

$locale = App::currentLocale();

//Rutas con traducciones
Route::localized( function () {
    
    Route::get('/', [FrontController::class, 'home'])->name('home.page');

    Route::get('/contact', function () {
        return view('pages.contact');
    })->name('view.contact');

    Route::get('/about', function () {
        return view('pages.about');
    })->name('view.about');

    Route::get('/lifestyle', function () {
        return view('pages.lifestyle');
    })->name('view.lifestyle');

    Route::get('/progress', [FrontController::class, 'progress'])->name('view.progress');
    
    Route::get('/inventory/{id}', [FrontController::class, 'inventory'])->name('view.inventory');

    Route::get('/unit/{id}', [FrontController::class, 'unit'])->name('view.unit');

    Route::get('/towers',[FrontController::class, 'towers'])->name('view.towers');

    Route::get('/search/',[FrontController::class, 'search'])->name('view.search');
});

//Rutas sin traducciones
Route::get('/admin', function () {
    return view('auth.login');
});

//cookies
Route::get('/setAgentCookie', [FrontController::class, 'setAgentCookie'])->name('set.agent.cookie');
Route::get('/getAgentCookie', [FrontController::class, 'getAgentCookie'])->name('get.agent.cookie');


Route::post('/messages/store', [MessagesController::class, 'store'])->name('store.message')->middleware(ProtectAgainstSpam::class);

Route::post('/ajax/towers',[FrontController::class, 'allTowers'])->name('ajax.towers');

Route::redirect('/dashboard', '/admin/dashboard');

//admin routes
Route::prefix('admin')->middleware('auth')->group( function () {

    Route::get('/messages', [MessagesController::class, 'index'])->name('all.messages');
    Route::post('/messages/{id}/change-agent', [MessagesController::class, 'changeAgent'])->name('change.message.agent');
    Route::get('/messages/{id}', [MessagesController::class, 'show'])->name('show.message');
    Route::delete('/messages/{id}/delete', [MessagesController::class, 'destroy'])->name('delete.message');

    Route::get('/unit/create',[UnitsController::class, 'create'])->name('create.unit');
    Route::post('/unit/store', [UnitsController::class, 'store'])->name('store.unit');
    Route::get('/units', [UnitsController::class, 'index'])->name('all.units');
    Route::get('/unit/{id}', [UnitsController::class, 'show'])->name('show.unit');
    Route::post('/unit/{id}/update',[UnitsController::class, 'update'])->name('update.unit');

    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

    Route::get('/prototypes/create', [UnitTypesController::class, 'create'])->name('create.type');
    Route::post('/prototype/store', [UnitTypesController::class, 'store'])->name('store.type');
    Route::get('/prototypes', [UnitTypesController::class, 'index'])->name('all.prototypes');
    Route::get('/prototype/{id}', [UnitTypesController::class, 'edit'])->name('edit.prototypes');

    Route::post('/unit/types',[UnitTypesController::class, 'all'])->name('all.unit.types');
    Route::post('/prototype/{id}/update',[UnitTypesController::class, 'update'])->name('update.type');

    Route::get('/tower/create', [TowersController::class, 'create'])->name('create.tower');
    Route::post('/tower/store', [TowersController::class, 'store'])->name('store.tower');
    Route::get('/towers',[TowersController::class, 'index'])->name('all.towers');
    Route::post('/tower/visible/{id}',[TowersController::class, 'changeVisibility'])->name('tower.visible');
    Route::get('/tower/{id}', [TowersController::class, 'edit'])->name('edit.tower');
    Route::post('/tower/{id}/update',[TowersController::class, 'update'])->name('update.tower');

    Route::get('/progress', [ProgressController::class, 'index'])->name('all.progress');
    Route::get('/progress/create', [ProgressController::class, 'create'])->name('create.progress');
    Route::post('/progress/store', [ProgressController::class, 'store'])->name('store.progress');
    Route::post('/progress/update/{id}',[ProgressController::class, 'updateProgress'])->name('update.progress');
    Route::get('/progress/{id}', [ProgressController::class, 'edit'])->name('edit.progress');
    Route::post('/progress/update-post/{id}',[ProgressController::class, 'update'])->name('update.post');

    Route::get('/payment-plans', [PaymentPlansController::class, 'index'])->name('all.payments');
    Route::get('/payment-plans/create', [PaymentPlansController::class, 'create'])->name('create.payment');
    Route::post('/payment-plans/store', [PaymentPlansController::class, 'store'])->name('store.payment');
    Route::get('/payment-plans/edit/{id}', [PaymentPlansController::class, 'edit'])->name('edit.payment');
    Route::post('/payment-plans/update/{id}', [PaymentPlansController::class, 'update'])->name('update.payment');
    Route::delete('/payment-plans/delete/{id}', [PaymentPlansController::class, 'destroy'])->name('delete.payment');


    //Rutas para correr comandos en artisan en servidor
    Route::get('/cache-views', function() {
        $exitCode = Artisan::call('view:cache');
        return 'Application Views cached';
    });

    Route::get('/cache-routes', function() {
        $exitCode = Artisan::call('route:cache');
        return 'Application routes cached';
    });

    Route::get('/optimize', function() {
        $exitCode = Artisan::call('optimize');
        return 'Application optimized';
    });

});

require __DIR__.'/auth.php';
