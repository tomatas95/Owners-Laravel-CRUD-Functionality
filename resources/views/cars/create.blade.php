@extends('components.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        {{ __("Create a new Car Listing!") }}
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('cars.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="reg_number">{{ __("Register Number") }}</label>
                                    <input type="text" class="form-control @error('reg_number')is-invalid @enderror" id="reg_number" name="reg_number" placeholder="{{ __("Enter Car's Register Number..") }}" value="{{ old('reg_number') }}">
                                    <hr class="input-hover-effect">

                                    @error('reg_number')
                                    <div class="text-danger invalid-feedback small mt-1">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="model">{{ __("Model") }}</label>
                                    <input type="text" class="form-control @error('model')is-invalid @enderror" id="model" name="model" placeholder="{{ __("Enter Car's Model..") }}" value="{{ old('model') }}">
                                    <hr class="input-hover-effect">

                                    @error('model')
                                    <div class="text-danger invalid-feedback small mt-1">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col">
                                <label for="carname">{{ __("Brand") }}</label>
                                <input type="text" class="form-control @error('carname')is-invalid @enderror" id="carname" name="carname" placeholder="{{ __("What's the Car's Brand?") }}" value="{{ old('carname') }}">
                                <hr class="input-hover-effect">

                                @error('carname')
                                    <div class="text-danger invalid-feedback small mt-1">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group col">
                                <label for="owner_id">{{ __("Car's Owner") }}</label>
                                <select name="owner_id" class="form-control @error('owner_id') border-error @enderror" id="owner_id">
                                    <option value="" disabled {{ old('owner_id') == '' ? 'selected' : '' }}>{{ __("Select Car's Owner") }}</option> 
                                    @foreach ($owners as $owner)
                                    <option value="{{ $owner->id }}" {{ old('owner_id') == $owner->id ? 'selected' : '' }}>{{ $owner->name }}</option>
                                    @endforeach
                                </select>
                                <hr class="input-hover-effect">
                                @error('owner_id')
                                    <div class="text-danger invalid-feedback small mt-1">{{$message}}</div>
                                @enderror
                            </div>
                            </div>                            
                        <div class="form-group">
                            <label for="car_photos">{{ __("Car Photos") }}</label>
                            <div id="photo_inputs">
                                <input type="file" name="car_photos[]" class="form-control-file">
                            </div>
                        </div>
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <p>{{ __("You must fix these errors before proceeding") }}:</p>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                            <button type="submit" class="btn btn-primary">{{ __("Add a new Car Listing!") }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
