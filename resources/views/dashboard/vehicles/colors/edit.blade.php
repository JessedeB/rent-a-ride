@extends('layouts.dashboard')

@section('content')
<x-card>
    <form action="{{ route("$type-colors.update", $color->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="make">Make</label>
            <select id="make" name="manufacturer_id" class="form-select">
                @foreach($manufacturers as $manufacturer)
                    <option value="{{$manufacturer->id}}"
                            @if($color->manufacturer->id === $manufacturer->id) selected @endif>{{$manufacturer->make}}</option>
                @endforeach
            </select>
            @error('manufacturer_id')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Color Name" value="{{$color->name}}">

            @error('name')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="hex_code">Hex Code</label>
            <input type="text" name="hex_code" id="hex_code" class="form-control" placeholder="Hex Code" value="{{$color->hex_code}}">

            @error('hex_code')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</x-card>
@endsection
