@extends('layouts.dashboard')

@section('content')

    @include('layouts.partials.message')

    <x-card>
        <form action="{{ route('rental-classes.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{old('name')}}">

                @error('name')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description">Description</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Description" value="{{old('description')}}">

                @error('description')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="daily_rate">Daily Rate</label>
                <input type="text" name="daily_rate" id="daily_rate" class="form-control" placeholder="20.00" value="{{old('daily_rate')}}">

                @error('daily_rate')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="weekly_rate">Weekly Rate</label>
                <input type="text" name="weekly_rate" id="weekly_rate" class="form-control" placeholder="100.00" value="{{old('weekly_rate')}}">

                @error('weekly_rate')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="monthly_rate">Monthly Rate</label>
                <input type="text" name="monthly_rate" id="monthly_rate" class="form-control" placeholder="500.00" value="{{old('monthly_rate')}}">

                @error('monthly_rate')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>


            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </x-card>
@endsection
