<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rental;
use App\Models\User;
use App\Models\Car;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RentalController extends Controller
{

    public function Rentals()
    {
        $rentals = Rental::with('car', 'user')->get();
        $users = User::all(['id', 'name', 'email']);
        $cars = Car::all(['id', 'name', 'brand', 'model', 'daily_rent_price']);

        return Inertia::render('Admin/Rentals', [
            'rentals' => $rentals,
            'users' => $users,
            'cars' => $cars,
        ]);
    }

    public function CreateRental(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'total_cost' => 'required|numeric|min:0',
        ]);

        $rental = Rental::create($validated);

        return redirect()->back()->with('success', 'Rental created successfully.');
    }

    // cancel rental
    public function CancelRental(Rental $rental, $id)
    {
        $rental = Rental::findOrFail($id);
        dd($rental);

        $today = now();
        $rentalStartDate = $rental->start_date;


        if ($today < $rentalStartDate) {
            $rental->update(['end_date' => $today]);
            return redirect()->back()->with('success', 'Rental cancelled successfully.');
        } else {
            return redirect()->back()->with('error', 'Rentals that have already started cannot be cancelled.');
        }
    }
}
