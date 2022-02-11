@extends('layouts.dashboard')

@section('content')

@include('layouts.partials.message')

<x-card>
    <form action="{{ route("$type-colors.store") }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="make">Make</label>
            <select id="make" name="manufacturer_id" class="form-select">
                @forelse($manufacturers as $manufacturer)
                    @if($loop->first)
                        <option id="make-default" value="null">Select a make</option>
                    @endif
                    <option value="{{$manufacturer->id}}">{{$manufacturer->make}}</option>
                @empty
                    <option value="null">No Makes available. Add a make first.</option>
                @endforelse
            </select>
            @error('manufacturer_id')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Color Name">

            @error('name')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="hex_code">Hex Code</label>
            <input type="text" hex_code="hex_code" id="hex_code" class="form-control" placeholder="Hex Code">

            @error('hex_code')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</x-card>
@endsection
