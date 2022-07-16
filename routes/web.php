<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;


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
    return view('admin.login');
});

/* Admin Account */
Route::get('login', [AdminController::class, 'login'])->name('login');
Route::post('submitLogin', [AdminController::class, 'submitLogin'])->name('submitLogin');

/* Employee */
Route::get('jobApplication', [EmployeeController::class, 'jobApplication'])->name('jobApplication');
Route::post('submitJobApplication', [EmployeeController::class, 'submitJobApplication'])->name('submitJobApplication');
Route::get('addWorkExperience', [EmployeeController::class, 'addWorkExperience'])->name('addWorkExperience');

/* Auth Access */
Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('JobApplicationList', [AdminController::class, 'JobApplicationList'])->name('JobApplicationList');
    // Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');;
    Route::get('logout', [AdminController::class, 'logout'])->name('logout');
    Route::get('deleteJobApplication', [EmployeeController::class, 'deleteJobApplication'])->name('deleteJobApplication');
    Route::get('editJobApplication/{id}', [EmployeeController::class, 'editJobApplication'])->name('editJobApplication');
    Route::post('updateJobApplication', [EmployeeController::class, 'updateJobApplication'])->name('updateJobApplication');
    Route::get('viewJobApplication/{id}', [EmployeeController::class, 'viewJobApplication'])->name('viewJobApplication');
});
