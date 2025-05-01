<?php

use App\Http\Controllers\Auth\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::match(['get', 'post'], '/registration', [UserController::class, 'RegistrationPage']);
Route::match(['get', 'post'], '/user-registration', [UserController::class, 'UserRegistration']);
// Route::post('/user-registration', [UserController::class, 'UserRegistration']);

Route::get('/login', [UserController::class, 'Login']);
