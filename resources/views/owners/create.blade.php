@extends('components.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        {{ __("Create a new Owner!"); }}
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('owners.store') }}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="name">{{ __("Name") }}</label>
                                    <input type="text" class="form-control @error('name')is-invalid @enderror" id="name" name="name" placeholder="{{ __("Enter Owner's Name..") }}." value="{{ old('name') }}">
                                    <hr class="input-hover-effect">

                                    @error('name')
                                    <div class="text-danger invalid-feedback small mt-1">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="surname">{{ __("Surname") }}</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="surname" name="surname" placeholder="{{ __("Enter Owner's Surname..") }}" value="{{ old('surname') }}">
                                    <hr class="input-hover-effect">

                                    @error('surname')
                                    <div class="text-danger invalid-feedback small mt-1">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="years">{{ __("Years") }}</label>
                                <input type="number" min="1" class="form-control @error('name')is-invalid @enderror" id="years" name="years" placeholder="{{ __("How old is the Owner?") }}" value="{{ old('years') }}">
                                <hr class="input-hover-effect">

                                @error('years')
                                    <div class="text-danger invalid-feedback small mt-1">{{$message}}</div>
                                @enderror
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
                            <button type="submit" class="btn btn-primary">{{ __("Add a new Owner!") }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
