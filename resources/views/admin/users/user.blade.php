<div class="panel panel-default">
    <div class="panel-body">
        <div class="col-md-10">
            {{ $user->name }}
        </div>
        <div class="col-md-2">
            <a href="{{ url('/admin/users/update', [$user->id]) }}">Edytuj</a>
        </div>
    </div>
</div>