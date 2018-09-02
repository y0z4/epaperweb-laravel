<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laman extends Model
{
    protected $fillable = [
        'id','judul','tgl','dibaca','isi_artikel','publish','meta_key',
        'meta_des','urltitle','thumbnail','ket_thumbnail',
    ];
    protected $table = 't_halamanstatis';
}
