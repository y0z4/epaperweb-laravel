<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Epaper;


class EpaperController extends Controller
{
    public function index($id)
    {
        $epapercover = Epaper::where('t_epaper.id','=',$id)
                            ->where('t_epaper.publish','=','Y')
                            ->orderBy('t_edisi.tgl_edisi','DESC')
                            ->leftJoin('t_admin','t_admin.id_adm','=','t_epaper.id_admin')
                            ->leftJoin('t_edisi','t_edisi.id','=','t_epaper.edisi')
                            ->leftJoin('t_subjudul_epaper','t_subjudul_epaper.id_epaper','=','t_epaper.id')
                            ->first();
        $epaper = Epaper::where('t_epaper.parent_id','=',$id)
                            ->where('t_epaper.publish','=','Y')
                            ->orderBy('t_edisi.tgl_edisi','DESC')
                            ->leftJoin('t_admin','t_admin.id_adm','=','t_epaper.id_admin')
                            ->leftJoin('t_edisi','t_edisi.id','=','t_epaper.edisi')
                            // ->leftJoin('t_subjudul_epaper','t_subjudul_epaper.id_epaper','=','t_epaper.id')
                            ->get();

        $page = 'epaper';
        return view('detailepaper.index',
        ['epapercover' =>$epapercover,
        'epaper' =>$epaper,
            'page' =>$page]);
    }
}
