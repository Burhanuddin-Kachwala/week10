<?php

namespace App\Http\Controllers\User;


use App\Models\Address;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreAddressRequest;

class AddressController extends Controller
{
    public function index(){
       
        return view('address.index');
    }
    public function store(StoreAddressRequest $request)
    {
        // The request is already validated at this point
       

        $address = new Address([
            'user_id' => Auth::id(),
            'address_line_1' => $request->address_line_1,
            'address_line_2' => $request->address_line_2,
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postal_code,
            'country' => $request->country,
            'type' => $request->type,
        ]);

        $address->save();

        return redirect()->route('checkout.index')->with('success', 'Address saved successfully!');
    }
}
