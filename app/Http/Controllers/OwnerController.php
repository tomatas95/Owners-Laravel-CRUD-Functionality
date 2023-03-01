<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;
use Illuminate\Support\Facades\Session;


class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        public function index()
        {
            // $owners = Owner::all();
            $owners = Owner::orderBy('name')->get();
            return view('owners.index', compact('owners'));
            
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
    ]);
    

    $owner = Owner::create($formFields);

    if ($owner) {
        Session::flash('message', 'A new Owner has been created successfully!');
        Session::flash('alert-class', 'alert-success');
        return redirect('/owners');
    } else {
        return redirect('/owners/create')->withErrors(['An error occurred while creating the owner.']);
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
        ]);
        
        $owner = Owner::findOrFail($id);
        $owner->update($formFields);
    
        if ($owner) {
            Session::flash('message', 'Owner updated successfully!');
            Session::flash('alert-class', 'alert-success');
            return redirect('/owners');
        } else {
            return redirect('/owners/create')->withErrors(['An error occurred while creating the owner.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        
        $owner = Owner::findOrFail($id);
        $owner->delete();
        Session::flash('message', 'Owner deleted successfully!');
        Session::flash('alert-class', 'alert-success');
        return redirect('/owners');
    }
}
