<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

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

            User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'role' => $request->input('role'),
            ]);

            // dd($request->all());

            return redirect('/login')->with('success', 'User registered successfully');
        } catch (Exception $e) {
            return redirect('/user-registration')->withErrors(['message' => $e->getMessage()]);
        }
    }

    public function Login()
    {
        return inertia('Auth/Login');
    }
}
