@extends('components.layout')

@section('content')
    <div class="box">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        {{ __("Edit") }} {{ $owner->name, $owner->surname }} {{ __("Information") }}
                    </div>
                    <div class="card-body">
                        <div class="form-container">
                        <form method="POST" action="{{ route('owners.update', $owner->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="name">{{ __("Name") }}</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="{{__("Enter Owner's Name..") }}" value="{{ $owner->name }}">
                                    <hr class="input-hover-effect">

                                    @error('name')
                                    <div class="text-danger invalid-feedback small mt-1">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="surname">{{ __("Surname") }}</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="surname" name="surname" placeholder="{{ __("Enter Owner's Surname..") }}  "  value="{{$owner->surname  }}">
                                    <hr class="input-hover-effect">

                                    @error('surname')
                                    <div class="text-danger invalid-feedback small mt-1">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="years">{{ __("Years") }}</label>
                                <input type="number" class="form-control @error('name')is-invalid @enderror" id="years" name="years" placeholder="{{ __("How old is the Owner?") }} "  value="{{$owner->years }}">
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
                            <button type="submit" class="btn btn-primary">{{ __("Save Information") }} </button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
