<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardUsersController;
use App\Http\Controllers\DashboardMajorsController;
use App\Http\Controllers\DashboardPaymentsController;
use App\Http\Controllers\DashboardRegistrationsController;
use App\Http\Controllers\DashboardRevocationsController;
use App\Http\Controllers\DashboardStudentsController;

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
Route::controller(LoginController::class)->group(function(){
    Route::get ('/', 'index')->name('login')->middleware('guest');
    Route::post('/', 'authenticate');
    Route::post('/logout', 'logout');
});

// Register --> guest (tamu belum login/belum ter-authentikasi)
Route::controller(RegisterController::class)->group(function(){
    Route::get('/register', 'index')->middleware('guest');
    Route::post('/register', 'store');
});

//Dashboard --> auth(sudah ter-authentikasi)
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::resource('/dashboard/users', DashboardUsersController::class)->except('show')->middleware('auth');
Route::get('/download/users', [DashboardUsersController::class, 'print'])->middleware('auth');

Route::resource('/dashboard/majors', DashboardMajorsController::class)->except('show')->middleware('auth');
Route::get('/download/majors', [DashboardMajorsController::class, 'print'])->middleware('auth');

Route::resource('/dashboard/students', DashboardStudentsController::class)->middleware('auth');
Route::get('/download/students', [DashboardStudentsController::class, 'print'])->middleware('auth');
Route::get('/download/detail-student/{student}', [DashboardStudentsController::class, 'print_detail'])->middleware('auth');

Route::resource('/dashboard/payments', DashboardPaymentsController::class)->except('show')->middleware('auth');
Route::get('/download/payments', [DashboardPaymentsController::class, 'print'])->middleware('auth');

Route::resource('/dashboard/registrations', DashboardRegistrationsController::class)->except('show')->middleware('auth');
Route::get('/download/registrations', [DashboardRegistrationsController::class, 'print'])->middleware('auth');

Route::resource('/dashboard/revocations', DashboardRevocationsController::class)->except('show')->middleware('auth');
Route::get('/download/revocations', [DashboardRevocationsController::class, 'print'])->middleware('auth');