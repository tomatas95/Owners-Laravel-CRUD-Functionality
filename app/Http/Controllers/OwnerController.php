<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;
use Illuminate\Support\Facades\Session;
use stdClass;

class OwnerController extends Controller
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
            // $owners = Owner::all();
            $filterData = $request->session()->get('filterOwners', (object)['name'=>null,'surname'=>null]);

            $owners = Owner::with('cars')->filter($filterData)->orderBy('name')->get();

            if ($request->has('name') || $request->has('surname')) {
                $filterData->name = $request->input('name');
                $filterData->surname = $request->input('surname');
                $request->session()->put('owner_filter', $filterData);
            }
        
            if ($request->has('show_all')) {
                $request->session()->forget('owner_filter');
                $owners = Owner::with('cars')->orderBy('name')->get();
            } 

            return view('owners.index',[
                "owners" => $owners,
                "filterData" => $filterData,
            ]);

        }
        
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('owners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $formFields = $request->validate([
        'name' => 'required|max:30',
        'surname' => 'required|max:30',
        'years' => 'required|integer|max:200|gte:1'
    ],
    [
        'name' => __("Name is required."),
        'surname.required' => __("Surname is required."),
        'years.required' =>__("Years is required."),
    ]);
    

    $owner = Owner::create($formFields);

    if ($owner) {
        Session::flash('message', __("A new Owner has been created successfully!"));
        Session::flash('alert-class', 'alert-success');
        return redirect('/owners');
    } else {
        return redirect('/owners/create')->withErrors([__("An error occurred while creating the owner")]);
    }
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $owner = Owner::findOrFail($id);
        return view('owners.edit', ['owner' => $owner]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $formFields = $request->validate([
            'name' => 'required|max:30',
            'surname' => 'required|max:30',
            'years' => 'required|integer|max:200|gte:1'
        ],
        [
            'name' => __("Name is required."),
            'surname.required' => __("Surname is required."),
            'years.required' =>__("Years is required."),
        ]);
        
        $owner = Owner::findOrFail($id);
        $owner->update($formFields);
    
        if ($owner) {
            Session::flash('message', __("Owner updated successfully!"));
            Session::flash('alert-class', 'alert-success');
            return redirect('/owners');
        } else {
            return redirect('/owners/create')->withErrors([__("An error occurred while creating the owner")]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        
        $owner = Owner::findOrFail($id);
        $owner->delete();
        Session::flash('message', __("Owner Listing deleted successfully"));
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('owners.index');
        }

    public function search(Request $request){
        $filterOwners = new \stdClass;
        $filterOwners->name = $request->name;
        $filterOwners->surname = $request->surname;

        $request->session()->put('filterOwners', $filterOwners);
        return redirect()->route('owners.index');
    }

}
