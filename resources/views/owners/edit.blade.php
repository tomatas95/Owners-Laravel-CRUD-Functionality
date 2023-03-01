@extends('components.layout')

@section('content')
    <div class="box">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        Edit {{ $owner->name, $owner->surname }} Information!
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('owners.update', $owner->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control @error('name')border-error @enderror" id="name" name="name" placeholder="Enter Owner's Name.." value="{{$owner->name }}">
                                    <hr class="input-hover-effect">

                                    @error('name')
                                    <div class="text-danger small mt-1">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="surname">Surname</label>
                                    <input type="text" class="form-control @error('name')border-error @enderror" id="surname" name="surname" placeholder="Enter Owner's Surname.."  value="{{$owner->surname }}">
                                    <hr class="input-hover-effect">

                                    @error('surname')
                                    <div class="text-danger small mt-1">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="years">Years</label>
                                <input type="number" class="form-control @error('name')border-error @enderror" id="years" name="years" placeholder="How old is the Owner?"  value="{{$owner->years }}">
                                <hr class="input-hover-effect">

                                @error('years')
                                    <div class="text-danger small mt-1">{{$message}}</div>
                                @enderror
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
                            <button type="submit" class="btn btn-primary">Save Information </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
