<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjudulEpaper extends Model
{
    protected $fillable = [
        'id_subjudul','id_epaper','judul','gagasan_utama',
    ];
    protected $table = 't_subjudul_epaper';
}
