<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Auth\UserController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/registration', [UserController::class, 'RegistrationPage'])->name('register.page');
Route::post('/user-registration', [UserController::class, 'UserRegistration'])->name('register.submit');


Route::get('/login', [UserController::class, 'Login'])->name('login.page');
Route::post('/user-login', [UserController::class, 'UserLogin'])->name('login.submit');


Route::get('/dashboard', [UserController::class, 'Dashboard'])->name('dashboard');

Route::post('/CreateCar', [CarController::class, 'CreateCar']);
Route::get('/add-car', [CarController::class, 'AddCar']);
Route::get('/cars', [CarController::class, 'Cars']);
