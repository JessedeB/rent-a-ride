@extends('layouts.dashboard')

@section('content')

@include('layouts.partials.message')

<x-card>
    <a href="{{ route('models.create') }}" class="btn btn-primary mb-3">New Model</a>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th>Make</th>
                <th>Year</th>
                <th>Model</th>
                <th>Rental Class</th>
            </tr>
            @forelse($yearModels as $model)
                <tr>
                    <td>{{$model->manufacturer->make}}</td>
                    <td>{{$model->year}}</td>
                    <td>{{$model->model}}</td>
                    <td>{{$model->rentalClass->name}}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('models.edit', $model->id) }}" class="btn btn-primary"><span data-feather="edit-2"></span></a>
                            <a href="{{ route('models.show', $model->id) }}" class="btn btn-warning"><span data-feather="eye"></span></a>
                            <form action="{{ route('models.destroy', $model->id) }}" method="POST" class="btn-group">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger"><span data-feather="trash"></span></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                    <p>No models are created</p>
                @endforelse
        </table>

        <div class="mt-3 d-flex justify-content-center">
            {{ $yearModels->links() }}
        </div>

    </div>
</x-card>
@endsection
