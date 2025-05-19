<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function AllCustomer()
    {
        $customers = User::where('role', 'customer')->select([
            'id',
            'name',
            'email',
        ])->orderBy('id', 'desc')->get();
        return inertia('Admin/Customers', [
            'customers' => $customers
        ]);
    }

    public function CreateCustomer(Request $request)
    {

        $request->validate([
            "name" => "required",
            "email" => "required|email",
            "password" => "required|min:8",
            "role" => "nullable",

        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'role' => $request->input('role', 'customer'),
        ]);
        // Send email to the customer
        // Mail::to($request->input('email'))->send(new CustomerCreated($request->input('name')));
        return redirect('/customers')->with('success', 'Customer created successfully');
    }

    public function deleteCustomer($id)
    {
        try {
            $customer = User::findOrFail($id);
            $customer->delete();

            return back()->with('success', 'Customer deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to delete customer: ' . $e->getMessage());
        }
    }

    public function updateCustomer(Request $request, $customer)
    {
        try {
            $customer = User::findOrFail($customer);

            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    Rule::unique('users')->ignore($customer->id)
                ],
            ]);

            $customer->update($validated);

            return back()->with('success', 'Customer updated successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to update customer: ' . $e->getMessage());
        }
    }
}
