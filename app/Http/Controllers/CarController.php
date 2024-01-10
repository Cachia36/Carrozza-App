<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Manufacturer;
use Illuminate\Http\Request;

class CarController extends Controller
{   
    public function index(Request $request){

        $manufacturerId = $request->input("manufacturer_id");

        $query = Car::query();

        if($manufacturerId){
            $query->where("manufacturer_id", $manufacturerId);
        }

        $cars = $query->get();

        $manufacturers = Manufacturer::all();

        return view("cars", compact("cars","manufacturers"));
    }

    public function create(){
        $manufacturers = Manufacturer::all();
        return view("create_car_form", compact("manufacturers"));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'model' => 'required',
            'year' => 'required',
            'salesperson_email' => 'required|email',
            'manufacturer_id' => ['required','integer', 'min:1'],
            // Add validation rules for other fields
        ],[
            'model.required' => 'Please specify model.',
            'year.required' => 'Please specify year.',
            'salesperson_email.required' => 'Please specify email.',
            'manufacturer_id.min' => 'Please specify manufacturer.',
        ]);

        Car::create($validatedData);

        return redirect('/cars')->with('success', 'Car added successfully!');
    }

    public function show($id){
        $car = Car::find($id);
        return view('car_details', compact('car'));
    }
    public function edit(Request $request, $id){
        $car = Car::find($id);
        $manufacturers = Manufacturer::all();
        return view('car_edit', compact('car', 'manufacturers'));
    }
    public function update(Request $request, $id){

        $validatedData = $request->validate([
            'model' => 'required',
            'year' => 'required',
            'salesperson_email' => 'required|email',
            'manufacturer_id' => ['required','integer', 'min:1'],
            // Add validation rules for other fields
        ],[
            'model.required' => 'Please specify model.',
            'year.required' => 'Please specify year.',
            'salesperson_email.required' => 'Please specify email.',
            'manufacturer_id.min' => 'Please specify manufacturer.',
        ]);

        $car = Car::find($id);
        $car->update($validatedData);
        return redirect('/cars')->with('success','Car details have been updated!');
    }
    public function delete($id){
        $car = Car::findOrFail($id);
        $car->delete();

        return redirect('/cars')->with('success','Car has been successfully deleted');
    }
}
