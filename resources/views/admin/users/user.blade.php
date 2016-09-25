<div class="panel panel-default">
    <div class="panel-body">
        <div class="col-md-10">
            {{ $user->name }}
        </div>
        <div class="col-md-2">
            <a href="{{ url('/admin/users/update', [$user->id]) }}">Edytuj</a>
            <a href="{{ url('/admin/users/delete', [$user->id]) }}">Usuń</a>
        </div>
    </div>
</div>