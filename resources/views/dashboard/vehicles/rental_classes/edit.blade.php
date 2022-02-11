@extends('layouts.dashboard')

@section('content')
    <x-card>
        <form action="{{ route('models.update',$model->id) }}" method="POST">
            @csrf


            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </x-card>
@endsection
