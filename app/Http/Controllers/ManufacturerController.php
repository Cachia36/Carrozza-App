<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
    public function index(){
        $manufacturers = Manufacturer::all();
        return view('manufacturers', ['manufacturers' => $manufacturers]);
    }

    public function create(){
        return view("create_manufacturer_form");
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required|regex:/^[0-9]{8,15}$/',
        ],[
            'name.required' => 'Please specify manufacturer.',
            'address.required' => 'Please specify address.',
            'phone.required' => 'Please specify phone number.',
            'phone.regex' => 'Phone must contain only digits and be at least 8 digits long.',
        ]);

        Manufacturer::create($validatedData);

        return redirect('/manufacturers')->with('success', 'Manufacturer added successfully!');
    }
}
