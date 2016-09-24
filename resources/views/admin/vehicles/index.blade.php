@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a class="btn btn-default" href="{{ url('/admin/vehicles/create') }}">Stwórz nowy</a>
            @each('admin.vehicles.vehicle', $vehicles, 'vehicle')
        </div>
    </div>
</div>
@endsection
