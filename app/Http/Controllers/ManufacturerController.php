<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;

class ManufacturerController extends Controller
{
    public function index(){
        $manufacturers = Manufacturer::all();
        return view('manufacturers', ['manufacturers' => $manufacturers]);
    }
}
