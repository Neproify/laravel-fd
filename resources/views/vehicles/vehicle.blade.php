@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Aktualne dane pojazdu</div>
                <div class="panel-body">
                    Nazwa: <b>{{ $vehicle->name }}</b></b><br />
                    Spalanie: <b>{{ $vehicle->combustion }}</b></b><br />
                    Ilość paliwa: <b>{{ $vehicle->fuel }}</b><br />
                    Przebieg: <b>{{ $vehicle->milage }}</b><br />
                    Ubezpieczenie do: <b>{{ $vehicle->insurance }}</b><br />
                    Przegląd do: <b>{{ $vehicle->inspection }}</b><br />
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Generuj kartę pojazdu</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/vehicles', [$vehicle->id, 'departures', 'get']) }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="dateFrom" class="col-md-4 control-label">Od(DD-MM-RRRR)</label>
                            <div class="col-md-6">
                                <input id="dateFrom" type="text" class="form-control" name="dateFrom" value="{{ old('dateFrom') }}" autofocus>

                                @if ($errors->has('dateFrom'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dateFrom') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="dateTo" class="col-md-4 control-label">Do(DD-MM-RRRR)</label>
                            <div class="col-md-6">
                                <input id="dateTo" type="text" class="form-control" name="dateTo" value="{{ old('dateTo') }}" autofocus>
                            
                                @if ($errors->has('dateTo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dateTo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Generuj
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @if(Auth::User()->isPermittedEvenOrMore('vehicles', 2))
            <div class="panel panel-default">
                <div class="panel-heading">Dodaj wyjazd</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/vehicles', [$vehicle->id, 'departure', 'add']) }}">
                        {{ csrf_field() }}

                        <input name="vehicle" type="hidden" value="{{ $vehicle->id }}">

                        <div class="form-group">
                            <label for="date" class="col-md-4 control-label">Data(DD-MM-RRRR)</label>
                            <div class="col-md-6">
                                <input id="date" type="text" class="form-control" name="date" value="{{ old('date') }}" autofocus>

                                @if ($errors->has('date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="reason" class="col-md-4 control-label">Cel wyjazdu</label>
                            <div class="col-md-6">
                                <input id="reason" type="text" class="form-control" name="reason" value="{{ old('reason') }}" autofocus>

                                @if ($errors->has('reason'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('reason') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="fromPlace" class="col-md-4 control-label">Skąd</label>
                            <div class="col-md-6">
                                <input id="fromPlace" type="text" class="form-control" name="fromPlace" value="{{ old('fromPlace')}}" autofocus>
                            
                                @if ($errors->has('fromPlace'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fromPlace') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="toPlace" class="col-md-4 control-label">Do</label>
                            <div class="col-md-6">
                                <input id="toPlace" type="text" class="form-control" name="toPlace" value="{{ old('toPlace') }}" autofocus>

                                @if ($errors->has('toPlace'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('toPlace') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="supervisorName" class="col-md-4 control-label">Nazwisko dowódcy</label>
                            <div class="col-md-6">
                                <input id="supervisorName" type="text" class="form-control" name="supervisorName" value="{{ old('supervisorName') }}" autofocus>
                            
                                @if ($errors->has('supervisorName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('supervisorName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="driverName" class="col-md-4 control-label">Kierowca</label>
                            <div class="col-md-6">
                                <input id="driverName" type="text" class="form-control" name="driverName" value="{{ old('driverName') }}" autofocus>

                                @if ($errors->has('driverName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('driverName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="departureTime" class="col-md-4 control-label">Godzina wyjazdu</label>
                            <div class="col-md-6">
                                <input id="departureTime" type="text" class="form-control" name="departureTime" value="{{ old('departureTime') }}" autofocus>
                            
                                @if ($errors->has('departureTime'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('departureTime') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="returnTime" class="col-md-4 control-label">Godzina powrotu</label>
                            <div class="col-md-6">
                                <input id="returnTime" type="text" class="form-control" name="returnTime" value="{{ old('returnTime') }}" autofocus>

                                @if ($errors->has('returnTime'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('returnTime') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="beforeMilage" class="col-md-4 control-label">Przebieg przed wyjazdem</label>
                            <div class="col-md-6">
                                <input id="beforeMilage" type="text" class="form-control" name="beforeMilage" value="{{ old('beforeMilage') }}" autofocus>
                            
                                @if ($errors->has('beforeMilage'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('beforeMilage') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="afterMilage" class="col-md-4 control-label">Przebieg po wyjeździe</label>
                            <div class="col-md-6">
                                <input id="afterMilage" type="text" class="form-control" name="afterMilage" value="{{ old('afterMilage') }}" autofocus>
                            
                                @if ($errors->has('afterMilage'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('afterMilage') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="stopTime" class="col-md-4 control-label">Czas na postoju</label>
                            <div class="col-md-6">
                                <input id="stopTime" type="text" class="form-control" name="stopTime" value="{{ old('stopTime') }}" autofocus>

                                @if ($errors->has('stopTime'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('stopTime') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Dodaj wyjazd
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endif
            @if(Auth::User()->isPermittedEvenOrMore('vehicles', 2))
            <div class="panel panel-default">
                <div class="panel-heading">Dodaj tankowanie</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/vehicles', [$vehicle->id, 'refueling', 'add']) }}">
                        {{ csrf_field() }}

                        <input name="vehicle" type="hidden" value="{{ $vehicle->id }}">

                        <div class="form-group">
                            <label for="date" class="col-md-4 control-label">Data(DD-MM-RRRR)</label>
                            <div class="col-md-6">
                                <input id="date" type="text" class="form-control" name="date" value="{{ old('date') }}" autofocus>
                            
                                @if ($errors->has('date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="milage" class="col-md-4 control-label">Stan licznika</label>
                            <div class="col-md-6">
                                <input id="milage" type="text" class="form-control" name="milage" value="{{ old('milage') }}" autofocus>
                            
                                @if ($errors->has('milage'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('milage') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="typeOfFuel" class="col-md-4 control-label">Rodzaj paliwa</label>
                            <div class="col-md-6">
                                <select class="form-control" id="typeOfFuel" name="typeOfFuel">
                                    <option value="Benzyna">Benzyna</option>
                                    <option value="Diesel">Diesel</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="countOfFuel" class="col-md-4 control-label">Ilość paliwa</label>
                            <div class="col-md-6">
                                <input id="countOfFuel" type="text" class="form-control" name="countOfFuel" value="{{ old('countOfFuel') }}" autofocus>
                            
                                @if ($errors->has('countOfFuel'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('countOfFuel') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Dodaj tankowanie
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection