@extends('layouts.dashboard')

@section('content')

@include('layouts.partials.message')

<x-card>
    <a href="{{ route('permissions.create') }}" class="btn btn-primary mb-3">New permission</a>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th>Name</th>
                <th>Guard</th>
                <th>Options</th>
            </tr>
            @forelse($permissions as $permission)
                <tr>
                    <td>{{$permission->name}}</td>
                    <td>{{$permission->guard_name}}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-primary"><span data-feather="edit-2"></span></a>
                            <a href="{{ route('permissions.show', $permission->name) }}" class="btn btn-warning"><span data-feather="eye"></span></a>
                            <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" class="btn-group">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger"><span data-feather="trash"></span></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                    <p>No permissions are created</p>
                @endforelse
        </table>

        <div class="mt-3 d-flex justify-content-center">
            {{ $permissions->links() }}
        </div>

    </div>
</x-card>
@endsection
