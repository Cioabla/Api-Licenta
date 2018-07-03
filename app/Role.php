<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public static function findRoleByName($role)
    {
        return (self::where('role' , '=',$role)->get())[0];
    }

    public function user()
    {
        return $this->hasMany('App\User');
    }
}
