@extends('components.layout')

@section('content')
<div class="container">
    <x-flash-message />
    <div class="table-responsive">
        <table class="table table-striped table-dark table-hover mx-auto" >
            <caption>List of owners</caption>
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Surname</th>
                    <th scope="col">Years</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @unless ($owners->isEmpty())
                    @foreach ($owners as $owner)
                        <tr>
                            <td>{{ $owner->name }}</td>
                            <td>{{ $owner->surname }}</td>
                            <td>{{ $owner->years }}</td>
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
                    <tr class="border-gray">
                        <td class="px-4 py-8 border-top border-bottom border-gray text-lg">
                            <p class="text-center">No Owners Found</p>
                        </td>
                    </tr>
                @endunless
            </tbody>
        </table>
    </div>
</div>

