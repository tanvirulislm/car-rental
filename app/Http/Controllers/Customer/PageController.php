<?php

namespace App\Http\Controllers\Customer;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function HomePage()
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
        ])->take(6)->get();
        return inertia('Customer/Home', [
            'cars' => $cars
        ]);
    }
}
