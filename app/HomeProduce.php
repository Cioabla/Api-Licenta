<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class HomeProduce extends Model
{

    protected $table = 'homeproduces';

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
