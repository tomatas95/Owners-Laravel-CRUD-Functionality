@extends('components.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        Create a new Car Listing!
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('cars.store') }}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="reg_number">Register Number</label>
                                    <input type="text" class="form-control @error('reg_number')border-error @enderror" id="reg_number" name="reg_number" placeholder="Enter Car's Register Number.." value="{{ old('reg_number') }}">
                                    <hr class="input-hover-effect">

                                    @error('reg_number')
                                    <div class="text-danger small mt-1">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="model">Model</label>
                                    <input type="text" class="form-control @error('model')border-error @enderror" id="model" name="model" placeholder="Enter Car's Model.." value="{{ old('model') }}">
                                    <hr class="input-hover-effect">

                                    @error('model')
                                    <div class="text-danger small mt-1">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col">
                                <label for="carname">Brand</label>
                                <input type="text" class="form-control @error('carname')border-error @enderror" id="carname" name="carname" placeholder="What's the Car's Brand?" value="{{ old('carname') }}">
                                <hr class="input-hover-effect">

                                @error('carname')
                                    <div class="text-danger small mt-1">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group col">
                                <label for="owner_id">Car's Owner</label>
                                <select name="owner_id" class="form-control @error('owner_id') border-error @enderror" id="owner_id">
                                    <option value="" disabled {{ old('owner_id') == '' ? 'selected' : '' }}>Select Car's Owner</option> 
                                    @foreach ($owners as $owner)
                                    <option value="{{ $owner->id }}" {{ old('owner_id') == $owner->id ? 'selected' : '' }}>{{ $owner->name }}</option>
                                    @endforeach
                                </select>
                                <hr class="input-hover-effect">
                                @error('owner_id')
                                    <div class="text-danger small mt-1">{{$message}}</div>
                                @enderror
                            </div>
                            </div>                            
                            @if($errors->any())
                            <div class="alert alert-danger">
                                <p>You must fix these errors before proceeding:</p>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                            <button type="submit" class="btn btn-primary">Add a new Car Listing!</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
