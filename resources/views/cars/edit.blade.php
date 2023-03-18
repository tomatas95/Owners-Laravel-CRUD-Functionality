@extends('components.layout')

@section('content')
    <div class="box">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        {{ __("Edit") }} {{ $car->reg_number, $car->carname }} {{ __("Information") }}!
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('cars.update', $car->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="reg_number">{{ __("Register Number") }}</label>
                                    <input type="text" class="form-control @error('reg_number')is-invalid @enderror" id="reg_number" name="reg_number" placeholder="{{ __("Enter Car's Register Number..") }}" value="{{$car->reg_number }}">
                                    <hr class="input-hover-effect">

                                    @error('reg_number')
                                    <div class="text-danger invalid-feedback small mt-1">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="model">{{ __("Model") }}</label>
                                    <input type="text" class="form-control @error('model')is-invalid @enderror" id="model" name="model" placeholder="{{ __("Enter Car's Model..") }}" value="{{$car->model }}">
                                    <hr class="input-hover-effect">

                                    @error('model')
                                    <div class="text-danger invalid-feedback small mt-1">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="carname">{{ __("Brand") }}</label>
                                    <input type="text" class="form-control @error('carname')is-invalid @enderror" id="carname" name="carname" placeholder="{{ __("What's the Car's Brand?") }}" value="{{$car->carname }}">
                                    <hr class="input-hover-effect">
    
                                    @error('carname')
                                        <div class="text-danger invalid-feedback small mt-1">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="owner_id">{{ __("Car's Owner") }}</label>
                                    <select class="form-control @error('owner_id') is-invalid @enderror" id="owner_id" name="owner_id">
                                        <option disabled value="">{{ __("Select Car's Owner") }}</option>
                                        @foreach ($owners as $owner)
                                            <option value="{{ $owner->id }}" {{ $owner->id == $car->owner_id ? 'selected' : '' }}>{{ $owner->name }}</option>
                                        @endforeach
                                        <hr class="input-hover-effect">
                                    </select>
                                    @error('owner_id')
                                        <div class="text-danger invalid-feedback">{{ $message }}</div>
                                    @enderror
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
                            <button type="submit" class="btn btn-primary">{{ __("Save Information") }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
