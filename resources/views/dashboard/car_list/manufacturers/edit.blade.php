@extends('layouts.dashboard')

@section('content')
<x-card>
    <form action="{{ route('manufacturers.update', $manufacturer->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="make">Make</label>
            <input type="text" name="make" id="make" class="form-control" placeholder="Make" value="{{$manufacturer->make}}">

            @error('make')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</x-card>
@endsection
