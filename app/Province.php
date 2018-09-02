<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $fillable = [
        'id','name','status',
    ];
    protected $table = 'provinsi';
}
