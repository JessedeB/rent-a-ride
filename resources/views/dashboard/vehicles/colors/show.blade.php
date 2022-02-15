@extends('layouts.dashboard')

@section('content')

<x-card>
    <div class="row">
        <div class="col-8 d-flex align-items-start">
            <div class="color-swatch d-inline-block" style="background-color: {{"#$color->hex_code"}};"></div> <h1 class="d-inline-block ms-3 fw-bold">{{$color->name}}</h1>
        </div>
        <div class="col-4 text-end">
            <span class="fw-bold">Manufacturer:</span> {{$color->manufacturer->make}}<br/>
            <span class="fw-bold">Type:</span>  {{ucfirst($type)}}<br/>
            <span class="fw-bold">Hex Code:</span> {{$color->hex_code}}
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <h3 class="fw-bold ms-2">Models</h3>
            <div class="table-responsive mt-2">
                <table class="table">
                    <tr>
                        <th>Make</th>
                        <th>Year</th>
                        <th>Model</th>
                        <th>Rental Class</th>
                    </tr>
                    @forelse($color->yearModels as $model)
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
                        <p>No models associated with this Color</p>
                    @endforelse
                </table>
            </div>
        </div>
    </div>

</x-card>

@endsection
