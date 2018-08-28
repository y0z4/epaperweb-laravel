<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimoni;
use DB;

class TestimoniController extends Controller
{
    public function index()
    {
        $testi = Testimoni::orderBy('tgl_pub','DESC')
                           ->limit(3)
                           ->get();
    }
}
