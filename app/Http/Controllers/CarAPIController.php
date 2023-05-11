<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Models\Car;
use Illuminate\Http\Request;

class CarAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Car::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarRequest $request)
    {
        $car = new Car();
        $car->reg_number = $request->reg_number;
        $car->model = $request->model;
        $car->carname = $request->carname;
        $car->owner_id = $request->owner_id;
        $car->save();

        return $car;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::findOrFail($id);
        return $car;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarRequest $request, string $id)
    {
        $car = Car::findOrFail($id);
        $car->update($request->all());
        return $car;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Car::destroy($id);
        return true;
    }
}
