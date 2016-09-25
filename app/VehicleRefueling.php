<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleRefueling extends Model
{
    protected $fillable =['date', 'vehicle_id', 'milage', 'type', 'count'];
}
