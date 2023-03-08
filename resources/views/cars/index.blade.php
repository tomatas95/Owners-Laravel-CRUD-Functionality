@extends('components.layout')

@section('content')
<div class="container">
    <x-flash-message />
    <div class="table-responsive table-striped table-dark table-hover mx-auto">
        <table class="table table-striped table-dark table-hover mx-auto" >
            <caption>List of owners</caption>
            <thead>
                <tr>
                    <th scope="col">Register Number</th>
                    <th scope="col">Model</th>
                    <th scope="col">Car's Brand</th>
                    <th scope="col">Car's Owner</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <form class="form-inline" action="{{ route('cars.search') }}" method="POST">
                        @csrf
                        <div class="input-fields form-group col-md-5">
                            <label for="reg_number" class="sr-only">Car's Register Number</label>
                            <input type="text" class="form-control" id="reg_number" name="reg_number" placeholder="Enter Car's Register Number">
                        </div>
                        <div class="input-fields form-group col-md-5">
                            <label for="model" class="sr-only">Car's Model</label>
                            <input type="text" class="form-control" id="model" name="model" placeholder="Enter Car's Model">
                        </div>
                        <div class="input-fields form-group col-md-5">
                            <label for="brand" class="sr-only">Car's Brand</label>
                            <input type="text" class="form-control" id="brand" name="brand" placeholder="Enter Car's Brand">
                        </div>
                        <div class="input-fields form-group col-md-5">
                            <label for="owner_id" class="sr-only">Owner's Name</label>
                            <select class="form-control" id="owner_id" name="owner_id">
                                <option value="all" {{ old('owner_id') == '' ? 'selected' : '' }}>All Owners</option>
                                @foreach ($owners as $owner)
                                <option value="{{ $owner->id }}" {{ optional($filterCars)->owner_id == $owner->id ? 'selected' : '' }}>{{ $owner->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="hover-shine btn btn-primary col-md-2">Search</button>
                    </form>
                </tr>
                @unless ($cars->isEmpty())
                    @foreach ($cars as $car)
                        <tr>
                            <td>{{ $car->reg_number }}</td>
                            <td>{{ $car->model }}</td>
                            <td>{{ $car->carname }}</td>
                            <td>{{ $car->owner->name }}</td>
                            <td>
                                <div class="d-inline-block">
                                    <a href="cars/{{ $car->id }}/edit"><i class="text-warning fa-lg fa-solid fa-pen-to-square me-2 edit"></i></a>
                                    <form method="POST" action="{{ route('cars.destroy', [$car->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"><i class="text-danger fa-lg fa-solid fa-trash delete"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                <tr class="text-center">
                    <td class="px-4 py-8 border-top border-bottom border-gray text-lg" colspan="5">
                        <p class="mb-0">Either such Car Listing is not Found or the table is empty!</p>
                    </td>
                </tr>
                
                @endunless
            </tbody>
        </table>
    </div>
</div>

