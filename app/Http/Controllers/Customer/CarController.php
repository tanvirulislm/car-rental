<?php

namespace App\Http\Controllers\Customer;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarController extends Controller
{
    public function CarsPage()
    {
        $cars = Car::where('availability', true)->select([
            'id',
            'name',
            'brand',
            'model',
            'year',
            'car_type',
            'daily_rent_price',
            'image'
        ])->get();

        return inertia('Customer/Cars', [
            'cars' => $cars
        ]);
    }

    public function CarDetails($id)
    {
        $car = Car::findOrFail($id);
        return inertia('Customer/CarDetails', [
            'car' => $car
        ]);
    }
}
