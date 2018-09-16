<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayMethode extends Model
{
    protected $fillable = [
        'id','no_rek','nama_rek','provider','image',
    ];
    protected $table = 't_payMethode';
}
