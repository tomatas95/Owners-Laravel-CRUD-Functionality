<?php

namespace App\Http\Controllers;

use stdClass;
use App\Models\Car;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CarController extends Controller

{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['create']);
        $this->middleware(['auth', 'super.permissions'])->only(['edit', 'destroy']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filterCars = $request->session()->get('filterCars', (object)['reg_number' => null, 'model' => null, 'brand' => null, 'owner_id' => null]);

        $cars = Car::with('owner')->filter($filterCars)->orderBy('reg_number')->get();

        $owners = Owner::orderBy('name')->get();

        return view('cars.index',[
            'cars' => $cars,
            'filterCars' => $filterCars,
            'owners' => $owners,
        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $owners = Owner::all();
        return view('cars.create', compact('owners'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'reg_number' => 'required|max:10',
            'model' => 'required|max:30',
            'carname' => 'required|max:50',
            'owner_id' => 'required',
        ],
        [
            'reg_number.required' => __("Register Number is required"),
            'model.required' => __("Model is required."),
            'carname.required' =>__("Brand Field is required."),
            'owner_id.required' => __("Selecting Car's Owner is required.")
        ]);
        
    
        $car = Car::create($formFields);
        // dd($car);

    
        if ($car) {
            Session::flash('message', __("A new Owner has been created successfully!"));
            Session::flash('alert-class', 'alert-success');
            return redirect('/cars');
        } else {
            return redirect('/cars/create')->withErrors([__("An error occurred while creating the car Listing.")]);
        }
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
    public function edit($id)
    {
        
        $owners = Owner::all();
        $car = Car::findOrFail($id);
        return view('cars.edit', ['car' => $car], compact('owners'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $formFields = $request->validate([
            'reg_number' => 'required|max:10',
            'model' => 'required|max:30',
            'carname' => 'required|max:50',
            'owner_id' => 'required',
        ],
        [
            'reg_number.required' => __("Register Number is required"),
            'model.required' => __("Model is required."),
            'carname.required' =>__("Brand Field is required."),
            'owner_id.required' => __("Selecting Car's Owner is required.")
        ]);
        
        $car = Car::findOrFail($id);
        $car->update($formFields);
    
        if ($car) {
            Session::flash('message', __("Owner updated successfully!"));
            Session::flash('alert-class', 'alert-success');
            return redirect('/cars');
        } else {
            return redirect('/cars/create')->withErrors([__("An error occurred while editing car listing.")]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();
        Session::flash('message', __("Car Listing deleted successfully!"));
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('cars.index');
    }

    
    public function search(Request $request){
        $filterCars = new \stdClass;

        if ($request->filled('reg_number')) {
            $filterCars->reg_number = $request->reg_number;
        }
        if ($request->filled('model')) {
            $filterCars->model = $request->model;
        }
        if ($request->filled('brand')) {
            $filterCars->brand = $request->brand;
        }
        
        if ($request->has('owner_id')) {
            $filterCars->owner_id = $request->owner_id;
        }
        $request->session()->put('filterCars',$filterCars);
        return redirect()->route('cars.index');
    }
}
