@if(session()->has('success'))
    <div class="alert alert-success text-center p-3" role="alert">
        {{session()->get('success')}}
    </div>
@endif

@if(session()->has('error'))
    <div class="alert alert-danger text-center p-3" role="alert">
        {{session()->get('error')}}
    </div>
@endif
