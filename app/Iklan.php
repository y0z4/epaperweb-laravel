<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Iklan extends Model
{
    protected $fillable = [
        'id','name','email','message',
    ];
    protected $table = 't_iklan';
}
