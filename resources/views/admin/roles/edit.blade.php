@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edycja roli {{ $role->name }}
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/roles/update') }}">
                        {{ csrf_field() }}

                        <input name="role" type="hidden" value="{{ $role->id }}">

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Nazwa roli</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $role->name) }}" autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        @include('admin.roles.permission', ['name' => 'admin', 'label' => 'Administracja', 'current' => $role->admin])
                        @include('admin.roles.permission', ['name' => 'announcments', 'label' => 'Ogłoszenia', 'current' => $role->announcments])
                        @include('admin.roles.permission', ['name' => 'training', 'label' => 'Treningi', 'current' => $role->training])
                        @include('admin.roles.permission', ['name' => 'members', 'label' => 'Lista strażaków', 'current' => $role->members])
                        @include('admin.roles.permission', ['name' => 'statute', 'label' => 'Statut', 'current' => $role->statute])
                        @include('admin.roles.permission', ['name' => 'equipment', 'label' => 'Wyposażenie', 'current' => $role->equipment])
                        @include('admin.roles.permission', ['name' => 'vehicles', 'label' => 'Pojazdy', 'current' => $role->vehicles])
                        @include('admin.roles.permission', ['name' => 'fuel', 'label' => 'Paliwo', 'current' => $role->fuel])
                        @include('admin.roles.permission', ['name' => 'conclusions', 'label' => 'Pisma, wnioski', 'current' => $role->conclusions])

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Edytuj role
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection