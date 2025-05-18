<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Admin\RentalController;
use App\Http\Controllers\Customer\PageController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Middleware\TokenVerificationMiddleware;



Route::get('/registration', [UserController::class, 'RegistrationPage']);
Route::post('/user-registration', [UserController::class, 'UserRegistration']);


Route::get('/login', [UserController::class, 'Login']);
Route::post('/user-login', [UserController::class, 'UserLogin']);

Route::middleware([TokenVerificationMiddleware::class, 'role:admin'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'Dashboard'])->name('dashboard');
    Route::get('/customers', [CustomerController::class, 'AllCustomer']);
    Route::delete('/customers/{id}', [CustomerController::class, 'DeleteCustomer']);
    Route::get('/profile', [UserController::class, 'UserProfile']);
    Route::post('/CreateCar', [CarController::class, 'CreateCar']);
    Route::get('/cars', [CarController::class, 'Cars']);
    Route::put('/cars/{car}', [CarController::class, 'UpdateCar']);
    Route::delete('/cars/{car}', [CarController::class, 'DeleteCar']);

    Route::post('/CreateRental', [RentalController::class, 'CreateRental']);
    Route::get('/rentals', [RentalController::class, 'Rentals']);
});

Route::middleware(TokenVerificationMiddleware::class)->group(function () {
    Route::get('/logout', [UserController::class, 'UserLogout']);
});


// Frontend User Routes
Route::get('/', [PageController::class, 'HomePage']);
Route::get('/all-cars', [\App\Http\Controllers\Customer\CarController::class, 'CarsPage']);
Route::get('/car-details/{car}', [\App\Http\Controllers\Customer\CarController::class, 'CarDetails']);


Route::middleware([TokenVerificationMiddleware::class, 'role:customer,admin'])->group(function () {
    Route::post('/MakeRental', [\App\Http\Controllers\Customer\RentalController::class, 'MakeRental']);
    Route::get('/my-rentals', [\App\Http\Controllers\Customer\RentalController::class, 'AllRentals']);
    Route::get('/rentals/{rental}', [\App\Http\Controllers\Customer\RentalController::class, 'ShowRental'])->name('customer.rentals.show');
    Route::post('/rentals/{id}/cancel', [RentalController::class, 'CancelRental']);
});
