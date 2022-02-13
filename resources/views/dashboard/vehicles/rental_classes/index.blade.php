@extends('layouts.dashboard')

@section('content')

@include('layouts.partials.message')

<x-card>
    <a href="{{ route('rental-classes.create') }}" class="btn btn-primary mb-3">New Rental Class</a>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th>Class</th>
                <th>Description</th>
                <th>Daily Rate</th>
                <th>Weekly Rate</th>
                <th>Monthly Rate</th>
            </tr>
            @forelse($rentalClasses as $class)
                <tr>
                    <td>{{$class->name}}</td>
                    <td>{{$class->description}}</td>
                    <td>${{number_format($class->daily_rate,2)}}</td>
                    <td>${{number_format($class->weekly_rate,2)}}</td>
                    <td>${{number_format($class->monthly_rate,2)}}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('rental-classes.edit', $class->id) }}" class="btn btn-primary"><span data-feather="edit-2"></span></a>
                            <a href="{{ route('rental-classes.show', $class->id) }}" class="btn btn-warning"><span data-feather="eye"></span></a>
                            <form action="{{ route('rental-classes.destroy', $class->id) }}" method="POST" class="btn-group">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger"><span data-feather="trash"></span></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                    <p>No Rental Classes have been created</p>
                @endforelse
        </table>

        <div class="mt-3 d-flex justify-content-center">
            {{ $rentalClasses->links() }}
        </div>

    </div>
</x-card>
@endsection
