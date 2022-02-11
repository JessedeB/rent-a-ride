@extends('layouts.dashboard')

@section('content')

@include('layouts.partials.message')

<x-card>
    <a href="{{route("$type-colors.create")}}" class="btn btn-primary mb-3">New {{ucfirst($type)}} Color</a>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th>Manufacturer</th>
                <th>Name</th>
                <th>Hex Code</th>
                <th>Swatch</th>
                <th>Options</th>
            </tr>
            @forelse($colors as $color)
                <tr>
                    <td>{{$color->manufacturer->make}}</td>
                    <td>{{$color->name}}</td>
                    <td>#{{$color->hex_code}}</td>
                    <td>
                        <div style="width: 50px;height: 50px;background-color: #{{$color->hex_code}};"></div>
                    </td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route("$type-colors.edit", $color->id) }}" class="btn btn-primary"><span data-feather="edit-2"></span></a>
                            <a href="{{ route("$type-colors.show", $color->id) }}" class="btn btn-warning"><span data-feather="eye"></span></a>
                            <form action="{{ route("$type-colors.destroy", $color->id) }}" method="POST" class="btn-group">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger"><span data-feather="trash"></span></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                    <p>No {{ucfirst($type)}} Colors are created</p>
                @endforelse
        </table>

        <div class="mt-3 d-flex justify-content-center">
            {{ $colors->links() }}
        </div>

    </div>
</x-card>
@endsection
