@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @each('admin.roles.role', $roles, 'role')
        </div>
    </div>
</div>
@endsection
