@extends('layouts.dashboard')

@section('content')

@include('layouts.partials.message')

<x-card>
    <a href="{{ route('roles.create') }}" class="btn btn-primary">Create role</a>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th>Name</th>
                <th>Guard</th>
                <th>Options</th>
            </tr>
            @forelse($roles as $role)
                <tr>
                    <td>{{$role->name}}</td>
                    <td>{{$role->guard_name}}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary"><span data-feather="edit-2"></span></a>
                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger"><span data-feather="trash"></span></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                    <p>No roles are created</p>
                @endforelse

                <div class="mt-3">
                    {{ $roles->links() }}
                </div>
            </tr>
        </table>
    </div>
</x-card>
@endsection
