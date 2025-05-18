<?php

namespace App\Http\Controllers\Customer;

use App\Models\Car;
use Inertia\Inertia;
use App\Models\Rental;
use App\Mail\InvoiceMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RentalController extends Controller
{

    public function AllRentals()
    {
        $rentals = Rental::where('user_id', Auth::id())
            ->with('car')
            ->get();

        return Inertia::render('Customer/Rentals', [
            'rentals' => $rentals
        ]);
    }


    public function MakeRental(Request $request)
    {
        $validated = $request->validate([
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date',
            'total_cost' => 'required|numeric|min:0'
        ]);

        // Check if car is available for the selected dates
        $conflictingRentals = Rental::where('car_id', $request->car_id)
            ->where(function ($query) use ($request) {
                $query->whereBetween('start_date', [$request->start_date, $request->end_date])
                    ->orWhereBetween('end_date', [$request->start_date, $request->end_date])
                    ->orWhere(function ($q) use ($request) {
                        $q->where('start_date', '<=', $request->start_date)
                            ->where('end_date', '>=', $request->end_date);
                    });
            })
            ->exists();

        if ($conflictingRentals) {
            return back()->withErrors([
                'dates' => 'The car is not available for the selected dates.'
            ]);
        }

        // Create the rental
        $rental = Rental::create([
            'user_id' => Auth::id(),
            'car_id' => $request->car_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'total_cost' => $request->total_cost
        ]);

        Mail::to(Auth::user()->email)->send(new InvoiceMail($rental));

        return redirect()->route('customer.rentals.show', ['rental' => $rental->id])->with('success', 'Car booked successfully!');
    }


    public function ShowRental(Rental $rental)
    {
        // Check if rental belongs to authenticated user
        if ($rental->user_id !== Auth::id()) {
            abort(403);
        }

        $rental->load('car');

        return Inertia::render('Customer/ShowRental', [
            'rental' => $rental
        ]);
    }


    public function cancel(Rental $rental)
    {
        // Check if rental belongs to authenticated user
        if ($rental->user_id !== Auth::id()) {
            abort(403);
        }

        // Only allow cancellation if start date is in the future
        if (strtotime($rental->start_date) <= strtotime('today')) {
            return back()->withErrors([
                'cancel' => 'You cannot cancel bookings that have already started.'
            ]);
        }

        // Delete the rental
        $rental->delete();

        return redirect('/my-rentals')
            ->with('success', 'Booking cancelled successfully.');
    }
}
