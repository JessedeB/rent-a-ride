@extends('layouts.dashboard')

@section('content')
    <x-card>
        <form action="{{ route('rental-classes.update',$rentalClass->id) }}" method="POST">
            @csrf


            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </x-card>
@endsection
