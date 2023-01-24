<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\SiteController;
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
    return view('site.index');
});
Route::get('dash', function () {
    return view('dashboard.index');
});
Route::get('',[SiteController::class,'index'])->name('index');
Route::post('contact',[SiteController::class,'contact'])->name('contact');




Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix'=>'admin','as'=>'admin.','middleware' => ['auth']], function () {
    Route::get('/',[DashboardController::class,'index'])->name('home');
    Route::get('/information',[DashboardController::class,'information'])->name('information');
    Route::get('/order',[DashboardController::class,'order'])->name('order');
    Route::post('/setting',[DashboardController::class,'setting'])->name('setting');
    Route::post('/Homeinformation',[DashboardController::class,'Homeinformation'])->name('Homeinformation');
    Route::post('/About',[DashboardController::class,'About'])->name('About');
    Route::post('/contactsupdate/{id}',[DashboardController::class,'contactsupdate'])->name('contactsupdate');
    Route::post('/contactsdestroy/{id}',[DashboardController::class,'destroy'])->name('contactsdestroy');
    Route::resource('services',ServicesController::class);
    Route::resource('blogs',BlogController::class);

});
