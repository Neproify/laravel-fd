@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if(Auth::User()->isPermittedEvenOrMore('announcments', 2))
            <div class="panel panel-default">
                <div class="panel-heading">Dodaj ogłoszenie</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/announcments/create') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="title" class="col-md-4 control-label">Tytuł</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="" autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="content" class="col-md-4 control-label">Zawartość</label>
                            <div class="col-md-6">
                                <input id="content" type="text" class="form-control" name="content" value="" autofocus>
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
            @endif
            @foreach($announcments as $announcment)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ $announcment->title }}
                        @if(Auth::User()->isPermittedEvenOrMore('announcments', 3))
                        <div class="pull-right">
                            <a href="{{ url('announcments/delete', $announcment->id) }}">Usuń ogłoszenie</a>
                        </div>
                        @endif
                    </div>
                    <div class="panel-body">
                        {{ $announcment->content }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection