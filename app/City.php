<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'id','city_name','id_provinsi',
    ];
    protected $table = 'city';
}
