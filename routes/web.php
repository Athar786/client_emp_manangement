<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth','employee-access:admin'])->group(function() {
    Route::get('admin/home',[HomeController::class,'adminHome'])->name('admin.home');
    Route::get('changeStatus', [HomeController::class,'changeStatus']);
    Route::get('employee/create',[EmployeeController::class,'create'])->name('emp.create');
    Route::post('employee',[EmployeeController::class,'store'])->name('emp.store');
});

Route::middleware(['auth','employee-access:employee'])->group(function() {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('client',[ClientController::class,'create'])->name('client.create');
    Route::post('client',[ClientController::class,'store'])->name('client.store');
    
});