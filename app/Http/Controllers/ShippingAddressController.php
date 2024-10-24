<?php

namespace App\Http\Controllers;

use App\Models\Shipping;
use Illuminate\Http\Request;

class ShippingAddressController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'f_name' => 'required|string|max:255',
            'l_name' => 'required|string|max:255',
            'country' => 'required|string',
            'phone' => 'required|string|max:20',
            'city' => 'required|string|max:255',
            'address_2' => 'required|string|max:255',
            'zip_code' => 'required|string|max:10',
            'state' => 'required|string|max:255',
        ]);

        // Create a new shipping address record
        Shipping::create([
            'first_name' => $request->input('f_name'),
            'last_name' => $request->input('l_name'),
            'country' => $request->input('country'),
            'phone' => $request->input('phone'),
            'city' => $request->input('city'),
            'street_address' => $request->input('address_2'),
            'apt_suite_floor' => $request->input('address_3', null),
            'zip_code' => $request->input('zip_code'),
            'state_province' => $request->input('state'),
        ]);

        // Redirect back with success message
        return redirect()->route('customer.checkout.placeorder')->with('success', 'Shipping address saved successfully!');
    }
}
