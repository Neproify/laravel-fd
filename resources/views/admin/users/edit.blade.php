@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edycja użytkownika <a href="$user->getUrl()">{{ $user->name }}</a>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/users/update') }}">
                        {{ csrf_field() }}

                        <input name="user" type="hidden" value="{{ $user->id }}">

                        <div class="form-group{{ $errors->has('roles') ? ' has-error' : '' }}">
                            <label for="role" class="col-md-4 control-label">Role</label>

                            <div class="col-md-6">
                                <!--<input id="role" type="text" class="form-control" name="name" value="{{ $user->name }}" autofocus>-->

                                <div class="form-group">
                                    <select class="form-control" id="role" name="role">
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}"@if($user->role == $role) selected @endif>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                @if ($errors->has('role'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Edytuj użytkownika
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