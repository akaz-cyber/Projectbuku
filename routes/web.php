<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardBookController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\DashboardCategoryController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Route::get('/admindashboard',function(){
//     return view('admin.admindashboard');
//     })->middleware(['auth', 'admin']);

Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/admindashboard', [AdminDashboardController::class, 'index'])->name('admin.admindashboard');
    });

Route::middleware(['auth'])->group(function () {
        Route::get('/userdashboard', [UserDashboardController::class, 'index'])->name('/');
    });

Route::resource('/admin/categories', DashboardCategoryController::class)->middleware('admin');
Route::resource('/admin/book', DashboardBookController::class)->middleware('admin');


