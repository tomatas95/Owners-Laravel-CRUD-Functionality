<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;
use App\Http\Requests\OwnerRequest;
use Illuminate\Support\Facades\Auth;

class OwnerAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Owner::all();        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $owner = new Owner();
        $owner->name = $request->name;
        $owner->surname = $request->surname;
        $owner->years = $request->years;
        $owner->user_id = $request->user_id;
        $owner->save();
    
        return $owner;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $owner = Owner::findOrFail($id);
        return $owner;
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
    public function update(OwnerRequest $request, string $id)
    {
        $owner = Owner::findOrFail($id);

        $owner->update($request->all());

        return $owner;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Owner::destroy($id);
        return true;
    }
}
