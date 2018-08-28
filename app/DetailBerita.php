<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailBerita extends Model
{
    protected $fillable = [
        'id_artikel','id_section','id_admin','judul_artikel','seo_artikel','isi_artikel','gagasan_utama','hari','tanggal',
        'jam','tgl_pub','dibaca','meta_key','meta_des','headline','publish','thumbnail','ket_thumbnail',
        'id_video','comment','url','parent_id','postdate','apps','dibaca_apps','thumbnail_watermark',
    ];
    protected $table = 't_artikel_etopskor';
    public function admin()
    {
        return $this->belongsTo('App\Admin','t_admin','id_adm');
    }
    public function section()
    {
        return $this->belongsTo(Section::class,'id_section');
    }
}
