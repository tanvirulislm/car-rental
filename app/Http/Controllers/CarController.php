<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function CreateCar(Request $request)
    {
        $user_id = $request->header('id');

        $request->validate([
            "name" => "required",
            "brand" => "required",
            "model" => "required",
            "year" => "required",
            "car_type" => "required",
            "daily_rent_price" => "required",
            "availability" => "nullable",
            "image" => "required",
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $imagePath = 'uploads/' . $imageName;
        }

        Car::create([
            'user_id' => $user_id,
            'name' => $request->input('name'),
            'brand' => $request->input('brand'),
            'model' => $request->input('model'),
            'year' => $request->input('year'),
            'car_type' => $request->input('car_type'),
            'daily_rent_price' => $request->input('daily_rent_price'),
            'availability' => $request->input('availability'),
            'image' => $imagePath,
        ]);
        return response()->json(['message' => 'Car created successfully']);
    }
}
