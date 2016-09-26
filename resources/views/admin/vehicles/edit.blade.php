@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edycja pojazdu {{ $vehicle->name }}
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/vehicles/update') }}">
                        {{ csrf_field() }}

                        <input name="vehicle" type="hidden" value="{{ $vehicle->id }}">

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Nazwa pojazdu</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $vehicle->name) }}" autofocus>
                            
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="combustion" class="col-md-4 control-label">Spalanie</label>
                            <div class="col-md-6">
                                <input id="combustion" type="text" class="form-control" name="combustion" value="{{ old('combustion', $vehicle->combustion) }}" autofocus>
                                @if ($errors->has('combustion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('combustion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="fuel" class="col-md-4 control-label">Paliwo</label>
                            <div class="col-md-6">
                                <input id="fuel" type="text" class="form-control" name="fuel" value="{{ old('fuel', $vehicle->fuel) }}" autofocus>
                            
                                @if ($errors->has('fuel'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fuel') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="milage" class="col-md-4 control-label">Przebieg</label>
                            <div class="col-md-6">
                                <input id="milage" type="text" class="form-control" name="milage" value="{{ old('milage', $vehicle->milage) }}" autofocus>
                            
                                @if ($errors->has('milage'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('milage') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="insurance" class="col-md-4 control-label">Ubezpieczenie</label>
                            <div class="col-md-6">
                                <input id="insurance" type="text" class="form-control" name="insurance" value="{{ old('insurance', $vehicle->insurance->format('d-m-Y')) }}" autofocus>
                            
                                @if ($errors->has('insurance'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('insurance') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="inspection" class="col-md-4 control-label">Przegląd techniczny</label>
                            <div class="col-md-6">
                                <input id="inspection" type="text" class="form-control" name="inspection" value="{{ old('inspection', $vehicle->inspection->format('d-m-Y')) }}" autofocus>
                            
                                @if ($errors->has('inspection'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('inspection') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="users" class="col-md-4 control-label">Kierowcy</label>
                                <div class="col-md-6">

                                    <select multiple class="form-control" id="users" name="users[]">
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}"@if($vehicle->users->contains($user)) selected @endif>{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Edytuj pojazd
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