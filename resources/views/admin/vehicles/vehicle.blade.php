<div class="panel panel-default">
    <div class="panel-body">
        <div class="col-md-10">
            {{ $vehicle->name }}
        </div>
        <div class="col-md-2">
            <a href="{{ url('/admin/vehicles/update', [$vehicle->id]) }}">Edytuj</a>
        </div>
    </div>
</div>