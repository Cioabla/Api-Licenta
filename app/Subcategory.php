<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{

    public static function findSubcategoyByName($name)
    {
        return self::where('name' , '=',$name)->get();
    }

}
