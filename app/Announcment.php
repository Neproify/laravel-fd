<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcment extends Model
{
    protected $fillable = ['user_id', 'title', 'content'];
}
