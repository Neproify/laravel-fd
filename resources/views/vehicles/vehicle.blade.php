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
                                <input id="dateFrom" type="text" class="form-control" name="dateFrom" value="" autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="dateTo" class="col-md-4 control-label">Do(DD-MM-RRRR)</label>
                            <div class="col-md-6">
                                <input id="dateTo" type="text" class="form-control" name="dateTo" value="" autofocus>
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
            <div class="panel panel-default">
                <div class="panel-heading">Dodaj wyjazd</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/vehicles', [$vehicle->id, 'departure', 'add']) }}">
                        {{ csrf_field() }}

                        <input name="vehicle" type="hidden" value="{{ $vehicle->id }}">

                        <div class="form-group">
                            <label for="date" class="col-md-4 control-label">Data(DD-MM-RRRR)</label>
                            <div class="col-md-6">
                                <input id="date" type="text" class="form-control" name="date" value="" autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="reason" class="col-md-4 control-label">Cel wyjazdu</label>
                            <div class="col-md-6">
                                <input id="reason" type="text" class="form-control" name="reason" value="" autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="fromPlace" class="col-md-4 control-label">Skąd</label>
                            <div class="col-md-6">
                                <input id="fromPlace" type="text" class="form-control" name="fromPlace" value="" autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="toPlace" class="col-md-4 control-label">Do</label>
                            <div class="col-md-6">
                                <input id="toPlace" type="text" class="form-control" name="toPlace" value="" autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="supervisorName" class="col-md-4 control-label">Nazwisko dowódcy</label>
                            <div class="col-md-6">
                                <input id="supervisorName" type="text" class="form-control" name="supervisorName" value="" autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="driverName" class="col-md-4 control-label">Kierowca</label>
                            <div class="col-md-6">
                                <input id="driverName" type="text" class="form-control" name="driverName" value="" autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="departureTime" class="col-md-4 control-label">Godzina wyjazdu</label>
                            <div class="col-md-6">
                                <input id="departureTime" type="text" class="form-control" name="departureTime" value="" autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="returnTime" class="col-md-4 control-label">Godzina powrotu</label>
                            <div class="col-md-6">
                                <input id="returnTime" type="text" class="form-control" name="returnTime" value="" autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="beforeMilage" class="col-md-4 control-label">Przebieg przed wyjazdem</label>
                            <div class="col-md-6">
                                <input id="beforeMilage" type="text" class="form-control" name="beforeMilage" value="" autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="afterMilage" class="col-md-4 control-label">Przebieg po wyjeździe</label>
                            <div class="col-md-6">
                                <input id="afterMilage" type="text" class="form-control" name="afterMilage" value="" autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="stopTime" class="col-md-4 control-label">Czas na postoju</label>
                            <div class="col-md-6">
                                <input id="stopTime" type="text" class="form-control" name="stopTime" value="" autofocus>
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
        </div>
    </div>
</div>
@endsection