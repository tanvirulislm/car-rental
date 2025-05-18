<?php

namespace App\Http\Controllers\Auth;

use Exception;
use Carbon\Carbon;
use App\Models\Car;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Rental;
use App\Helper\JWTToken;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; // Import Auth facade

class UserController extends Controller
{
    public function RegistrationPage()
    {
        return inertia('Auth/Registration');
    }


    public function UserRegistration(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
                'role' => 'required',
            ]);

            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'role' => $request->input('role'),
            ]);


            return redirect('/login')->with('success', 'User registered successfully');
        } catch (Exception $e) {
            return redirect('/registration')->withErrors(['message' => $e->getMessage()]);
        }
    }

    public function Login()
    {
        return inertia('Auth/Login');
    }

    public function UserLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');


        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = JWTToken::CreateToken($user->email, $user->id, $user->role);

            $request->session()->regenerate();

            // Redirect based on role
            $redirectUrl = match ($user->role) {
                'admin' => '/dashboard',
                'customer' => '/my-rentals',
                default => '/',
            };

            return redirect($redirectUrl)->withCookie(cookie('token', $token, 60 * 24 * 30));
        } else {
            return back()->withErrors(['message' => 'Invalid email or password']);
        }
    }

    public function Dashboard()
    {
        $today = Carbon::today();

        // Total cars
        $totalCars = Car::count();

        // Cars that are rented today
        $rentedCarIdsToday = Rental::whereDate('start_date', '<=', $today)
            ->whereDate('end_date', '>=', $today)
            ->pluck('car_id');

        // Cars that are NOT rented today
        $availableCars = Car::whereNotIn('id', $rentedCarIdsToday)->count();

        // Total rentals
        $totalRentals = Rental::count();

        // Total earnings
        $totalEarnings = Rental::sum('total_cost');

        return inertia('Admin/Dashboard', [
            'totalCars' => $totalCars,
            'availableCars' => $availableCars,
            'totalRentals' => $totalRentals,
            'totalEarnings' => $totalEarnings,
        ]);
    }

    public function UserProfile()
    {
        $user = Auth::user();

        return inertia('Admin/Profile', [
            'user' => $user,
        ]);
    }

    public function UserLogout()
    {
        return redirect('/login')->withCookie(cookie('token', '', -1));
    }
}
