@extends('layouts.dashboard')

@section('content')

    <x-card>
        <div class="row">
            <div class="col-8">
                <h1>{{$rentalClass->name}}</h1>
                <p>{{$rentalClass->description}}</p>
            </div>
            <div class="col-4 text-end">
                <span class="fw-bold">Daily Rate:</span> ${{number_format($rentalClass->daily_rate,2)}}<br/>
                <span class="fw-bold">Weekly Rate:</span> ${{number_format($rentalClass->weekly_rate,2)}}<br/>
                <span class="fw-bold">Monthly Rate:</span> ${{number_format($rentalClass->monthly_rate,2)}}
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h3>Models</h3>
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>Make</th>
                            <th>Year</th>
                            <th>Model</th>
                            <th>Rental Class</th>
                        </tr>
                        @forelse($rentalClass->yearModels as $model)
                            <tr>
                                <td>{{$model->manufacturer->make}}</td>
                                <td>{{$model->year}}</td>
                                <td>{{$model->model}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('models.edit', $model->id) }}" class="btn btn-primary"><span data-feather="edit-2"></span></a>
                                        <a href="{{ route('models.show', $model->id) }}" class="btn btn-warning"><span data-feather="eye"></span></a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <p>No models associated with this Rental Class</p>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </x-card>

@endsection
