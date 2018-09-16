<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Testimoni;
use App\DetailBerita;
use App\Epaper;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        $testi = Testimoni::orderBy('tgl_pub','DESC')
                           
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
        
        $epaper = Epaper::where('t_epaper.position','=',1)
                            ->where('t_epaper.parent_id','=',0)
                            ->orderBy('t_edisi.tgl_edisi','DESC')
                            ->leftJoin('t_admin','t_admin.id_adm','=','t_epaper.id_admin')
                            ->leftJoin('t_edisi','t_edisi.id','=','t_epaper.edisi')
                            ->select('t_epaper.*','t_admin.*','t_edisi.*','t_epaper.id as epaper_id')
                            ->limit(8)
                            ->get();
        $info = DB::table('t_website_info')
                            ->first();
        $epaperz = Epaper::whereDate('edisi',Carbon::today())
                            ->where('t_epaper.position','=',1)
                            ->where('t_epaper.parent_id','=',0)
                            ->leftJoin('t_admin','t_admin.id_adm','=','t_epaper.id_admin')
                            ->leftJoin('t_edisi','t_edisi.id','=','t_epaper.edisi')
                            ->limit(1)
                            ->select('t_epaper.*','t_admin.*','t_edisi.*','t_epaper.id as epaper_id')
                            ->first();
        if (!$epaperz) {
            $epaperz = Epaper::orderBy('t_edisi.tgl_edisi','DESC')
                            ->where('t_epaper.position','=',1)
                            ->where('t_epaper.parent_id','=',0)
                            ->leftJoin('t_admin','t_admin.id_adm','=','t_epaper.id_admin')
                            ->leftJoin('t_edisi','t_edisi.id','=','t_epaper.edisi')
                            ->limit(1)
                            ->select('t_epaper.*','t_admin.*','t_edisi.*','t_epaper.id as epaper_id')
                            ->first();
        } 
        

        $page = 'Home';
        return view('home.home',
        ['testi' =>$testi,
         'populer' =>$populer,
         'info' =>$info,
         'pop' =>$pop,
         'page' =>$page,
         'epaper'=>$epaper,
         'epaperz'=>$epaperz]);
    }
}
