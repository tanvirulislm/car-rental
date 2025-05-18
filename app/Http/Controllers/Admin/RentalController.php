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

        return Inertia::render('Admin/Rentals', [
            'rentals' => $rentals
        ]);
    }
}
