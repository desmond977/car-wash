<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Customer;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $cars = Car::all(); // Retrieve all cars from the database
        return view('car.index', ['cars' => $cars]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('car.create');
    }

    public function customercar(Customer $customer)
    {
        //
        return view('car.create')
            ->with('customer', $customer);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request-> name);
        $data = $request->validate([
            'name' => 'required',
            'color' => 'required',
            'plate_number' => 'required',
            'customers_id' => 'required|exists:customers,id',
        ]);
        $newCar = car::create($data);

        return redirect(route('customer.view', ['customer'=>$newCar->customer]))->with('success', 'Car Added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        return view('car.edit')
            ->with('car', $car);
        //dd($car);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Car $car, Request $request)
    {
        //
        // return $request;
        $data = $request->validate([
            'name' => 'required',
            'color' => 'required',
            'plate_number' => 'required',
            'customers_id' => 'required|exists:customers,id',
        ]);

        $car->update($data);

        return redirect(route('car.index'))->with('success', 'Car Updated Succesfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Car $car)
    {
        //
        $car->delete();
        return redirect()->route('car.index')->with('success', 'Car deleted successfully');
    }
}
