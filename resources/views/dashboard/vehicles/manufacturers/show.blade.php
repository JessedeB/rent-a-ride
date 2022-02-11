@extends('layouts.dashboard')

@section('content')

<x-card>
    <div class="card-header d-flex">
        <span class="fs-2">Models</span>
        <a href="#" class="btn btn-primary ms-auto me-5">New Model</a>
    </div>
    <!-- Goes to the create model page and preselcts manufacturer -->
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

<x-card>
    <div class="card-header d-flex">
        <span class="fs-2">Exterior Color Options</span>
        <!-- Goes to the create model page and preselcts manufacturer -->
        <a href="#" class="btn btn-primary ms-auto me-5">Add Color</a>
    </div>

    <div class="table-responsive">
        <table class="table">
            <tr>
                <td>Color Name</td>
                <th>Hex Code</th>
                <th>Options</th>
            </tr>

            @forelse($exteriorColors as $color)
                <tr>
                    <td>{{$color->name}}</td>
                    <td>#{{$color->hex_code}}</td>
                    <td>
                        <div class="btn-group">
                            <!-- Goes to the Edit Model Page -->
                            <a href="#" class="btn btn-primary"><span data-feather="edit-2"></span></a>
                        </div>
                    </td>
                </tr>
            @empty
                <p>This manufacturer doesn't have any Exterior Colors added</p>
            @endforelse
        </table>

        <div class="mt-3 d-flex justify-content-center">
            {{ $exteriorColors->links() }}
        </div>
    </div>
</x-card>

<x-card>
    <div class="card-header d-flex">
        <span class="fs-2">Interior Color Options</span>
        <!-- Goes to the create model page and preselcts manufacturer -->
        <a href="#" class="btn btn-primary ms-auto me-5">Add Color</a>
    </div>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <td>Color Name</td>
                <th>Hex Code</th>
                <th>Options</th>
            </tr>

            @forelse($interiorColors as $color)
                <tr>
                    <td>{{$color->name}}</td>
                    <td>#{{$color->hex_code}}</td>
                    <td>
                        <div class="btn-group">
                            <!-- Goes to the Edit Model Page -->
                            <a href="#" class="btn btn-primary"><span data-feather="edit-2"></span></a>
                        </div>
                    </td>
                </tr>
            @empty
                <p>This manufacturer doesn't have any Exterior Colors added</p>
            @endforelse
        </table>

        <div class="mt-3 d-flex justify-content-center">
            {{ $interiorColors->links() }}
        </div>
    </div>
</x-card>


@endsection
