<div class="panel panel-default">
    <div class="panel-body">
        <div class="col-md-10">
            {{ $role->name }}
        </div>
        <div class="col-md-2">
            <a href="{{ url('/admin/roles/update', [$role->id]) }}">Edytuj</a>
        </div>
    </div>
</div>