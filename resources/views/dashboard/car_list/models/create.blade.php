@extends('layouts.dashboard')

@section('content')

    @include('layouts.partials.message')

    <x-card>
        <form action="{{ route('models.store') }}" method="POST">
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
                <label for="year">Year</label>
                <input type="text" name="year" id="year" class="form-control" placeholder="Year">

                @error('year')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="model">Year</label>
                <input type="text" name="model" id="model" class="form-control" placeholder="Model">

                @error('model')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="rental-class">Rental Class</label>
                <select id="rental-class" name="rental_class_id" class="form-select">
                    @forelse($rentalClasses as $rentalClass)
                        @if($loop->first)
                            <option id="make-default">Select a Rental Class</option>
                        @endif
                        <option value="{{$rentalClass->id}}">{{$rentalClass->name}}</option>
                    @empty
                        <option>No Rental Classes available. Add a Rental Class first.</option>
                    @endforelse
                </select>
                @error('rental_class_id')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </x-card>
@endsection
