<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Epaper extends Model
{
    protected $fillable = [
        'id','id_section','id_admin','edisi','image','tgl_pub','dibaca','publish',
    ];
    protected $table = 't_epaper';
}
