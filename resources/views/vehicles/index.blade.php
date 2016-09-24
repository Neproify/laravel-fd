@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @foreach($vehicles as $vehicle)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-12">
                            <a href="{{ url('/vehicles', [$vehicle->id]) }}">{{ $vehicle->name }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection