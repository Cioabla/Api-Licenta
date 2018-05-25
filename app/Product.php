<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public static function findSubcategoryProducts($id , $offset)
    {
        return self::where('subcategory_id','=',$id)->skip($offset)->take(12)->get();
    }

    public static function length($id)
    {
        $array = self::where('subcategory_id','=',$id)->get();
        return sizeof($array);
    }

    public static function product($name)
    {
        return self::where('name','=',$name)->get();
    }

}
