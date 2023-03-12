@extends('components.layout')

@section('content')
<div class="container">
    <x-flash-message />

    <div class="table-responsive table-striped table-dark table-hover mx-auto">
        <table class="table table-striped table-dark table-hover mx-auto">
            <caption>{{ __("List of Owners") }}</caption>
            <thead>
                <tr>
                    <th scope="col">{{ __("Name") }}</th>
                    <th scope="col">{{ __("Surname") }}</th>
                    <th scope="col">{{ __("Years") }}</th>
                    <th scope="col">{{ __("Owned Cars") }}</th>
                    <th scope="col">{{ __("Action") }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <form class="form-inline" action="{{ route('owners.search') }}" method="POST">
                        @csrf
                        <div class="input-fields form-group col-md-5">
                            <label for="name" class="sr-only">{{ __("Name") }}</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="{{ __("Name") }}" value="{{ $filterData->name }}">
                        </div>
                        <div class="input-fields form-group col-md-5">
                            <label for="surname" class="sr-only">{{ __("Surname") }}</label>
                            <input type="text" class="form-control" id="surname" name="surname" placeholder="{{ __("Surname") }}" value="{{  $filterData->surname }}">
                        </div>
                        <button type="submit" class="hover-shine btn btn-primary col-md-2">{{ __("Search") }}</button>
                        <a href="{{ route('owners.index', ['show_all' => 1]) }}" class="hover-shine btn btn-primary col-md-2 ms-2">{{ __("Show All") }}</a>
                    </form>
                </tr>
                @unless ($owners->isEmpty())
                    @foreach ($owners as $owner)
                        <tr>
                            <td>{{ $owner->name }}</td>
                            <td>{{ $owner->surname }}</td>
                            <td>{{ $owner->years }}</td>
                            <td>
                                <ul>
                                    @foreach ($owner->cars as $car)
                                        <li class="center-line">{{ $car->reg_number }}, {{ $car->model }}, {{ $car->carname }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <div class="d-inline-block">
                                    <a href="owners/{{ $owner->id }}/edit"><i class="text-warning fa-lg fa-solid fa-pen-to-square me-2 edit"></i></a>
                                    <form method="POST" action="{{ route('owners.destroy', [$owner->id]) }}">
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
                        <p class="mb-0">{{ __("Either such Owner is not Found or the table is empty") }}</p>
                    </td>
                </tr>
                @endunless
            </tbody>
        </table>
    </div>
</div>
