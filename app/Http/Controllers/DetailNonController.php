<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\DetailBerita;
use App\Epaper;
use View;

class DetailNonController extends Controller
{
    public function index($id)
    {
        // $detailberita = DetailBerita::with('admin')
                        
        //                 //    ->orderBy('tgl_pub','DESC')
        //                 //    ->limit(3)
                        // ->first();
        
        // $getberita    = DetailBerita::where('id_artikel','=',$id_artikel)
        //                             ->leftJoin('t_admin','t_admin.id_adm','=','t_artikel_etopskor.id_admin')
        //                             ->leftJoin('t_section','t_section.id_section','=','t_artikel_etopskor.id_section')
        //                             ->first();
        $getsection   = DetailBerita::with('section');
        $epapercover = Epaper::where('t_epaper.id','=',$id)
                            ->where('t_epaper.publish','=','Y')
                            ->orderBy('t_edisi.tgl_edisi','DESC')
                            ->leftJoin('t_admin','t_admin.id_adm','=','t_epaper.id_admin')
                            ->leftJoin('t_edisi','t_edisi.id','=','t_epaper.edisi')
                            
                            ->select('t_epaper.*','t_edisi.*','t_epaper.judul as judul_inti')
                            ->first();
        $epaper = Epaper::where('t_epaper.parent_id','=',$id)
                            ->where('t_epaper.publish','=','Y')
                            ->orderBy('t_edisi.tgl_edisi','DESC')
                            ->leftJoin('t_admin','t_admin.id_adm','=','t_epaper.id_admin')
                            ->leftJoin('t_edisi','t_edisi.id','=','t_epaper.edisi')
                            // ->leftJoin('t_subjudul_epaper','t_subjudul_epaper.id_epaper','=','t_epaper.id')
                            ->get();
        
        $highlight = Epaper::where('t_epaper.parent_id','=',$id)
                            ->where('t_epaper.publish','=','Y')
                            ->orderBy('t_epaper.position','ASC')
                            
                            ->select('t_epaper.*')
                            ->get();
        
        $epapercover2 = Epaper::where('t_epaper.parent_id','=',$id)
                            ->where('t_epaper.publish','=','Y')
                            ->orderBy('t_epaper.position','ASC')
                            ->leftJoin('t_admin','t_admin.id_adm','=','t_epaper.id_admin')
                            ->leftJoin('t_edisi','t_edisi.id','=','t_epaper.edisi')
                            ->select('t_epaper.*','t_edisi.*','t_epaper.judul as judul_inti','t_epaper.id as epaper_id')
                            ->get();
        $epaperz = Epaper::where('t_epaper.id','=',$id)
                            ->where('t_epaper.position','=',1)
                            ->where('t_epaper.parent_id','=',0)
                            ->leftJoin('t_admin','t_admin.id_adm','=','t_epaper.id_admin')
                            ->leftJoin('t_edisi','t_edisi.id','=','t_epaper.edisi')
                            ->limit(1)
                            ->select('t_epaper.*','t_admin.*','t_edisi.*','t_epaper.id as epaper_id')
                            ->first();
        
        
        
        $page = 'Detailberita';
        // return View::make('detailberita.detailberita')->with(array('detailberita'=>$detailberita));
        return view('detailberita.detailberita',
        ['page' =>$page,
         'getsection'=>$getsection,
         'epaper' =>$epaper,
         'epaperz'=>$epaperz,
         'highlight' =>$highlight,
         'epapercover'=>$epapercover,
         'epapercover2'=>$epapercover2,]);
    }
}
