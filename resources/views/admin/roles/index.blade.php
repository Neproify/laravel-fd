@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <a class="btn btn-default" href="{{ url('/admin/roles/create') }}">Stwórz nową</a>
            @each('admin.roles.role', $roles, 'role')
        </div>
    </div>
</div>
@endsection
