<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\SpecialityController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AppointmentContoller as bkAppointmentContoller;

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
    return redirect()->route('home');
});
// Route::get('/admin', function () {
//     return view('auth.admin.login');
// });

Auth::routes();

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });
    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/profile-settings', [AdminController::class, 'profileSettings'])->name('profile.settings');
    Route::post('/profile-settings/update', [AdminController::class, 'updateprofile'])->name('profile.update');

    Route::resource('/doctors', DoctorController::class);
    Route::resource('/specialites', SpecialityController::class);
    Route::resource('/patients', UserController::class);

    Route::get('/appointments/requests', [bkAppointmentContoller::class, 'appointmentRequests'])->name('appointment.request');
    Route::get('/appointments', [bkAppointmentContoller::class, 'index'])->name('appointments');
});
Route::resource('/appointments', AppointmentController::class);
Route::get('/appointments/make-appointment/{doctor}', [AppointmentController::class, 'bookAppointment'])->name('appointment.book');
Route::post('/appointments/make-appointment/{doctor}', [AppointmentController::class, 'makeAppointment'])->name('appointment.make');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/doctors', [App\Http\Controllers\HomeController::class, 'doctors'])->name('doctors');
