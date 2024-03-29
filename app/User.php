<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function vehicles()
    {
        return $this->belongsToMany('App\Vehicle');
    }

    public function isPermittedEvenOrMore($name, $permission)
    {
        foreach($this->roles as $role)
        {
            switch($name)
            {
                case 'admin':
                    if($role->admin >= $permission)
                        return true;
                    break;
                case 'announcments':
                    if($role->announcments >= $permission)
                        return true;
                    break;
                case 'vehicles':
                    if($role->vehicles >= $permission)
                        return true;
                    break;
            }
        }
        return false;
    }
}
