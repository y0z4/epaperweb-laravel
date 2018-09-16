<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laman;

class LamanController extends Controller
{
    public function index($title=0)
    {
        $laman = Laman::where('seo_hs','=',$title)
                      ->first();
        $page = 'Laman';

        return view('static.index',
        ['laman' =>$laman,
         'page' =>$page]);

    }
}
