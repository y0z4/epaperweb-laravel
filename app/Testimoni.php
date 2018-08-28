<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    //
    protected $fillable = [
        'nama','profesi','company','isi_testi','photo',
    ];
    protected $table = 't_testimoni';
}
