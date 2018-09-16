<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubsEmail extends Model
{
    protected $fillable = [
        'id','email',
    ];
    protected $table = 't_subsemail';
}
