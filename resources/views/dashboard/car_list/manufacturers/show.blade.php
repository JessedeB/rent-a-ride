@extends('layouts.dashboard')

@section('content')

<x-card>
    <!-- Goes to the create model page and preselcts manufacturer -->
    <a href="#" class="btn btn-primary mb-3">New Model</a>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <td>Make</td>
                <th>Model</th>
                <th>Year</th>
                <th>Rental Class</th>
                <th>Options</th>
            </tr>

            @forelse($models as $model)
                <tr>
                    <td>{{$model->manufacturer->make}}</td>
                    <td>{{$model->model}}</td>
                    <td>{{$model->year}}</td>
                    <td>{{$model->rentalClass->name}}</td>
                    <td>
                        <div class="btn-group">
                            <!-- Goes to the Edit Model Page -->
                            <a href="#" class="btn btn-primary"><span data-feather="edit-2"></span></a>
                        </div>
                    </td>
                </tr>
            @empty
                <p>This manufacturer doesn't have any models added</p>
            @endforelse
        </table>

        <div class="mt-3 d-flex justify-content-center">
            {{ $models->links() }}
        </div>
    </div>
</x-card>

@endsection
