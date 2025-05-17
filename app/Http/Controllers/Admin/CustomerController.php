<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
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

    public function DeleteCustomer(User $customer)
    {
        try {

            $customer->delete();

            return redirect()->back()->with('success', 'Customer deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to delete car: ' . $e->getMessage());
        }
    }
}
