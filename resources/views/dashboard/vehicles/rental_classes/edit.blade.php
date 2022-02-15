@extends('layouts.dashboard')

@section('content')
    <x-card>
        <form action="{{ route('rental-classes.update',$rentalClass->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{old('name')??$rentalClass->name}}">

                @error('name')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description">Description</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Description" value="{{old('description')??$rentalClass->description}}">

                @error('description')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="daily_rate">Daily Rate</label>
                <input type="text" name="daily_rate" id="daily_rate" class="form-control" placeholder="20.00" value="{{old('daily_rate')??$rentalClass->daily_rate}}">

                @error('daily_rate')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="weekly_rate">Weekly Rate</label>
                <input type="text" name="weekly_rate" id="weekly_rate" class="form-control" placeholder="100.00" value="{{old('weekly_rate')??$rentalClass->weekly_rate}}">

                @error('weekly_rate')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="monthly_rate">Monthly Rate</label>
                <input type="text" name="monthly_rate" id="monthly_rate" class="form-control" placeholder="500.00" value="{{old('monthly_rate')??$rentalClass->monthly_rate}}">

                @error('monthly_rate')
                <p class="text-danger">{{$message}}</p>
                @enderror

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </x-card>
@endsection
