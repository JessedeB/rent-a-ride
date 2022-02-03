@extends('layouts.dashboard')

@section('content')
    <x-card>
        <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Role name" value="{{$role->name}}">

                @error('name')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="guard_name">Guard name</label>
                <input type="text" name="guard_name" id="guard_name" class="form-control" placeholder="Guard name" value="{{$role->guard_name}}">

                @error('guard')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </x-card>
@endsection
