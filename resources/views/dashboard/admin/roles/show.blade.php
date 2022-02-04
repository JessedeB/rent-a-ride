@extends('layouts.dashboard')

@section('content')

<x-card>
    <a href="#" class="btn btn-primary mb-3">Assign users</a>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Options</th>
            </tr>

            @forelse($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <div class="btn-group">
                            <!-- This goes to the user profile -->
                            <a href="#" class="btn btn-primary"><span data-feather="edit-2"></span></a>
                            <form action="{{ route('role.unassign', [request()->segment(2), $user->id]) }}" method="POST" class="btn-group">
                                @csrf
                                <button type="submit" class="btn btn-danger"><span data-feather="slash"></span></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <p>No users assigned to this role</p>
            @endforelse
        </table>

        <div class="mt-3 d-flex justify-content-center">
            {{ $users->links() }}
        </div>
    </div>
</x-card>

@endsection
