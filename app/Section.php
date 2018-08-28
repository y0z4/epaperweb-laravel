<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'id_section','nama_section','status','keyword','images','description','position',
        'urltitle',
    ];
    protected $table = 't_section';
    public function berita()
    {
        return $this->hasMany(DetailBerita::class);
    }
}
