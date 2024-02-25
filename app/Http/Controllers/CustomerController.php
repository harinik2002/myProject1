<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CustomerController extends Controller
{
    public function customerInsert()
    {
        return view('customerInsert');
    }

    public function insert(Request $request)
    {
        // Validation
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
        ]);

        $customer_name = $request->input('customer_name');
        $customer_email = $request->input('customer_email');

        // Check if a customer with the same name and email already exists
        $existingCustomer = DB::table('harinidb2.customer')
            ->where('customer_name', $customer_name)
            ->where('customer_email', $customer_email)
            ->first();

        if ($existingCustomer) {
            // Customer already exists, return an error message
            return Redirect::back()->withInput()->withErrors(['error' => 'Customer with the same name and email already exists.']);
        }

        DB::table('harinidb2.customer')->insert([
            'customer_name' => $customer_name,
            'customer_email' => $customer_email
        ]);

        return 'Customer inserted successfully! <a href="/">Click here to go back</a>';
    }
}
?>
