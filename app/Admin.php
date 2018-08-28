<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
        'id_adm','nama','email','password','level','aktif','des_admin',
        'foto_admin','website','twitter',
    ];
    protected $table = 't_admin';
    public function detailberita()
    {
        return $this->hasMany('App\DetailBerita');
    }
}
