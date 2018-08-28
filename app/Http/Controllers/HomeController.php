<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Testimoni;
use App\DetailBerita;
use App\Epaper;

class HomeController extends Controller
{
    public function index()
    {
        $testi = Testimoni::orderBy('tgl_pub','DESC')
                           ->limit(3)
                           ->get();

        $populer = DetailBerita::orderBy('dibaca','DESC')
                            ->orderBy('tgl_pub','DESC')
                            ->leftJoin('t_admin','t_admin.id_adm','=','t_artikel_etopskor.id_admin')
                            ->leftJoin('t_section','t_section.id_section','=','t_artikel_etopskor.id_section')
                            ->where('publish','=','Y')
                            ->limit(3)
                            ->get();
        
        $pop = DetailBerita::orderBy('tgl_pub','DESC')
                            ->leftJoin('t_admin','t_admin.id_adm','=','t_artikel_etopskor.id_admin')
                            ->limit(3)
                            ->first();
        
        $epaper = Epaper::orderBy('edisi','DESC')
                            ->leftJoin('t_admin','t_admin.id_adm','=','t_epaper.id_admin')
                            ->limit(8)
                            ->get();
        $epaperz = Epaper::whereDate('edisi',Carbon::today())
                            ->leftJoin('t_admin','t_admin.id_adm','=','t_epaper.id_admin')
                            ->limit(8)
                            ->first();
        if (!$epaperz) {
            $epaperz = Epaper::orderBy('edisi','DESC')
                            ->leftJoin('t_admin','t_admin.id_adm','=','t_epaper.id_admin')
                            ->limit(8)
                            ->first();
        } 
        

        $page = 'Home';
        return view('home.home',
        ['testi' =>$testi,
         'populer' =>$populer,
         'pop' =>$pop,
         'page' =>$page,
         'epaper'=>$epaper,
         'epaperz'=>$epaperz]);
    }
}