@extends('layouts.dashboard')

@section('content')

@include('layouts.partials.message')

<x-card>
    <form action="{{ route('manufacturers.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="make">Make</label>
            <input type="text" name="make" id="make" class="form-control" placeholder="Make">

            @error('make')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</x-card>
@endsection
