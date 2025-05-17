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

    public function index()
    {
        $rentals = Rental::with(['user', 'car'])
            ->latest()
            ->paginate(10);

        return Inertia::render('Admin/Rentals/Index', [
            'rentals' => $rentals
        ]);
    }

    public function create()
    {
        $cars = Car::where('is_available', true)->get();
        $users = User::where('role', 'customer')->get();

        return Inertia::render('Admin/Rentals/Create', [
            'cars' => $cars,
            'users' => $users
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date',
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
        Rental::create($validated);

        return redirect()->route('admin.rentals.index')
            ->with('success', 'Rental created successfully.');
    }

    public function show(Rental $rental)
    {
        $rental->load(['user', 'car']);

        return Inertia::render('Admin/Rentals/Show', [
            'rental' => $rental
        ]);
    }


    public function edit(Rental $rental)
    {
        $rental->load(['user', 'car']);
        $cars = Car::all();
        $users = User::where('role', 'customer')->get();

        return Inertia::render('Admin/Rentals/Edit', [
            'rental' => $rental,
            'cars' => $cars,
            'users' => $users
        ]);
    }


    public function update(Request $request, Rental $rental)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'total_cost' => 'required|numeric|min:0'
        ]);

        // Check if car is available for the selected dates (excluding this rental)
        $conflictingRentals = Rental::where('car_id', $request->car_id)
            ->where('id', '!=', $rental->id)
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

        // Update the rental
        $rental->update($validated);

        return redirect()->route('admin.rentals.index')
            ->with('success', 'Rental updated successfully.');
    }


    public function destroy(Rental $rental)
    {
        $rental->delete();

        return redirect()->route('admin.rentals.index')
            ->with('success', 'Rental deleted successfully.');
    }


    public function statistics()
    {
        $totalRentals = Rental::count();
        $totalRevenue = Rental::sum('total_cost');
        $averageRentalDuration = Rental::selectRaw('AVG(DATEDIFF(end_date, start_date) + 1) as avg_duration')
            ->first()
            ->avg_duration;

        $mostRentedCars = Car::withCount('rentals')
            ->orderByDesc('rentals_count')
            ->take(5)
            ->get();

        $monthlyRevenue = Rental::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(total_cost) as revenue')
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();

        return Inertia::render('Admin/Rentals/Statistics', [
            'totalRentals' => $totalRentals,
            'totalRevenue' => $totalRevenue,
            'averageRentalDuration' => $averageRentalDuration,
            'mostRentedCars' => $mostRentedCars,
            'monthlyRevenue' => $monthlyRevenue
        ]);
    }
}
