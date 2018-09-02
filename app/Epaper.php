<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Epaper extends Model
{
    protected $fillable = [
        'id','id_section','id_admin','parent_id','judul','position','gagasan_utama','edisi','image','thumb','tgl_pub','dibaca','publish',
    ];
    protected $table = 't_epaper';
}
