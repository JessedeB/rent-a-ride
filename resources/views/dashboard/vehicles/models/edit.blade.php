@extends('layouts.dashboard')

@section('content')
    <x-card>
        <form action="{{ route('models.update',$model->id) }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="make">Make</label>
                <select id="make" name="manufacturer_id" class="form-select">
                    @foreach($manufacturers as $manufacturer)
                        <option value="{{$manufacturer->id}}"
                                @if($model->manufacturer->id === $manufacturer->id) selected @endif>{{$manufacturer->make}}</option>
                    @endforeach
                </select>
                @error('manufacturer_id')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="year">Year</label>
                <input type="text" name="year" id="year" class="form-control" placeholder="Year" value="{{$model->year}}">

                @error('year')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="model">Year</label>
                <input type="text" name="model" id="model" class="form-control" placeholder="Model" value="{{$model->model}}">

                @error('model')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="rental-class">Rental Class</label>
                <select id="rental-class" name="rental_class_id" class="form-select">
                    @foreach($rentalClasses as $rentalClass)
                        <option value="{{$rentalClass->id}}" @if($model->rentalClass->id === $rentalClass->id) selected @endif>{{$rentalClass->name}}</option>
                    @endforeach
                </select>
                @error('rental_class_id')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </x-card>
@endsection
