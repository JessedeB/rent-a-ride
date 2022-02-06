@extends('layouts.dashboard')

@section('content')

@include('layouts.partials.message')

<x-card>
    <a href="{{ route('manufacturers.create') }}" class="btn btn-primary mb-3">New manufacturer</a>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th>Make</th>
                <th>Options</th>
            </tr>
            @forelse($manufacturers as $manufacturer)
                <tr>
                    <td>{{$manufacturer->make}}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('manufacturers.edit', $manufacturer->id) }}" class="btn btn-primary"><span data-feather="edit-2"></span></a>
                            <a href="{{ route('manufacturers.show', $manufacturer->id) }}" class="btn btn-warning"><span data-feather="eye"></span></a>
                            <form action="{{ route('manufacturers.destroy', $manufacturer->id) }}" method="POST" class="btn-group">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger"><span data-feather="trash"></span></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                    <p>No manufacturers are created</p>
                @endforelse
        </table>

        <div class="mt-3 d-flex justify-content-center">
            {{ $manufacturers->links() }}
        </div>

    </div>
</x-card>
@endsection
