<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Konfirmasi extends Model
{
    protected $fillable = [
        'id_order','payment_methode','nama','email','total','no_rek','nama_rek','bank_asal','bank_tujuan','tanggal_bayar',
        'phone','created_at','bukti_pembayaran',
    ];
    protected $table = 't_konfirmasi';
}
