@extends('layouts.dashboard')

@section('content')

    @include('layouts.partials.message')

    <x-card>
        <form action="{{ route('models.store') }}" method="POST">
            @csrf



            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </x-card>
@endsection
