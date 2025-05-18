<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Car;
use App\Models\Rental;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CarController extends Controller
{
    public function CreateCar(Request $request)
    {
        // $user_id = $request->header('id');

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
            // 'user_id' => $user_id,
            'name' => $request->input('name'),
            'brand' => $request->input('brand'),
            'model' => $request->input('model'),
            'year' => $request->input('year'),
            'car_type' => $request->input('car_type'),
            'daily_rent_price' => $request->input('daily_rent_price'),
            'availability' => $request->input('availability'),
            'image' => $imagePath,
        ]);
        return redirect('/cars')->with('success', 'Car created successfully');
    }

    // public function AddCar()
    // {
    //     return inertia('Admin/AddCar');
    // }

    public function Cars()
    {
        $today = Carbon::today();

        $rentedCarIdsToday = Rental::whereDate('start_date', '<=', $today)
            ->whereDate('end_date', '>=', $today)
            ->pluck('car_id')
            ->toArray();


        $cars = Car::all()->map(function ($car) use ($rentedCarIdsToday) {
            $car->availability = !in_array($car->id, $rentedCarIdsToday);
            return $car;
        });

        return inertia('Admin/Car', [
            'car' => $cars
        ]);
    }

    public function UpdateCar(Request $request, Car $car)
    {
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

        $imagePath = $car->image;
        if ($request->hasFile('image')) {
            if ($imagePath && File::exists(public_path($imagePath))) {
                File::delete(public_path($imagePath));
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $imagePath = 'uploads/' . $imageName;
        }

        $updateData = $request->safe()->except(['image', '_method']);
        $updateData['image'] = $imagePath;


        $availability = $request->input('availability', false);
        if (is_string($availability)) {
            $updateData['availability'] = filter_var($availability, FILTER_VALIDATE_BOOLEAN);
        } else {
            $updateData['availability'] = (bool)$availability;
        }
        $car->update($updateData);

        return redirect('/cars')->with('success', 'Car updated successfully');
    }

    public function EditCar(Car $car)
    {
        return inertia('Admin/EditCar', [
            'car' => $car
        ]);
    }

    public function DeleteCar(Car $car)
    {
        try {
            $carImage = $car->image;
            if ($carImage && file_exists(public_path($carImage))) {
                unlink(public_path($carImage));
            }

            $car->delete();

            return redirect()->back()->with('success', 'Car deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to delete car: ' . $e->getMessage());
        }
    }
}
