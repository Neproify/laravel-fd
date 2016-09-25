<div class="panel panel-default">
    <div class="panel-body">
        <div class="col-md-10">
            {{ $role->name }}
        </div>
        <div class="col-md-2">
            <a href="{{ url('/admin/roles/update', [$role->id]) }}">Edytuj</a>
            <a href="{{ url('/admin/roles/delete', [$role->id]) }}">Usuń</a>
        </div>
    </div>
</div>