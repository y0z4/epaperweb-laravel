<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $fillable = [
        'id','id_user','no_invoice','tipe_paket','start_date','end_date','status',
    ];
    protected $table = 't_order';
}
