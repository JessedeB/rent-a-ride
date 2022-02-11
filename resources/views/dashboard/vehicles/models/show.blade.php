@extends('layouts.dashboard')

@section('content')

    <x-card>
        <div class="row d-flex">
            <div class="col-12 col-md-6 order-last order-md-first">
            <span class="fs-2 fw-bold">{{$model->year}} {{$model->manufacturer->make}} {{$model->model}}</span><br/>
            <span>Rental Class: {{$model->rentalClass->name}}</span><br/>
            <span>Drivetrain Options:@forelse($model->drivetrainOptions as $drivetrain) {{" $drivetrain->drivetrain"}}@empty
                    " No Drivetrain Options Available" @endforelse</span>
            </div>
            <div class="col-12 col-md-6 order-first order-md-last">
                <img class="img img-fluid" src="{{$imgSrc}}" alt="Image"/>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12 col-md-6">
                <span class="fs-4 fw-bold">Available Exterior Colors</span>
                <table class="table table-responsive">
                    <tr>

                        <th>Exterior Color</th>
                        <th>Hex Code</th>
                        <th>Swatch</th>
                    </tr>
                    @forelse($model->exteriorColors as $color)
                        <tr>
                            <td>{{$color->name}}</td>
                            <td>#{{$color->hex_code}}</td>
                            <td>
                                <div class='color-swatch' style="background-color: #{{$color->hex_code}};"></div>
                            </td>
                        </tr>
                    @empty
                        <p>No Exterior Colors Associated With This Year Model</p>
                    @endforelse
                </table>
            </div>
            <div class="col-12 col-md-6">
                <span class="fs-4 fw-bold">Available Interior Colors</span>
                <table class="table table-responsive">
                    <tr>
                        <th>Interior Color</th>
                        <th>Hex Code</th>
                        <th>Swatch</th>
                    </tr>
                    @forelse($model->interiorColors as $color)
                        <tr>
                            <td>{{$color->name}}</td>
                            <td>#{{$color->hex_code}}</td>
                            <td>
                                <div class="color-swatch" style="background-color: #{{$color->hex_code}};"></div>
                            </td>
                        </tr>
                    @empty
                        <p>No Interior Colors Associated With This Year Model</p>
                    @endforelse
                </table>
            </div>
        </div>
    </x-card>

@endsection
