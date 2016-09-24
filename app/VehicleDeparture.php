<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleDeparture extends Model
{
    protected $fillable = ['vehicle_id', 'date', 'reason', 'from',
        'to', 'supervisor', 'driver', 'departure',
        'return', 'beforeMilage', 'afterMilage', 'stopTime'];
}
