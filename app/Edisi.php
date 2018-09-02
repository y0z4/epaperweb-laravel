<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edisi extends Model
{
    protected $fillable = [
        'id','tgl_edisi',
    ];
    protected $table = 't_edisi';
}
