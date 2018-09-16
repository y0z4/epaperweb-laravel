<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Epaper;


class EpaperController extends Controller
{
    public function index($id=0,$url=0)
    {
        if(Session::get('id')){
			
        
        $epapercover = Epaper::where('t_epaper.id','=',$id)
                            ->where('t_epaper.urltitle','=',$url)
                            ->where('t_epaper.publish','=','Y')
                            ->where('t_epaper.position','=',1)
                            ->orderBy('t_edisi.tgl_edisi','DESC')
                            ->leftJoin('t_admin','t_admin.id_adm','=','t_epaper.id_admin')
                            ->leftJoin('t_edisi','t_edisi.id','=','t_epaper.edisi')
                            ->first();
        $epaper = Epaper::where('t_epaper.parent_id','=',$id)
                            
                            ->where('t_epaper.publish','=','Y')
                            ->orderBy('t_edisi.tgl_edisi','DESC')
                            ->leftJoin('t_admin','t_admin.id_adm','=','t_epaper.id_admin')
                            ->leftJoin('t_edisi','t_edisi.id','=','t_epaper.edisi')
                            // ->leftJoin('t_subjudul_epaper','t_subjudul_epaper.id_epaper','=','t_epaper.id')
                            ->get();
        $epaper2 = Epaper::where('t_epaper.parent_id','=',$id)
                            ->where('t_epaper.urltitle','=',$url)
                            ->where('t_epaper.publish','=','Y')
                            ->orderBy('t_edisi.tgl_edisi','DESC')
                            ->leftJoin('t_admin','t_admin.id_adm','=','t_epaper.id_admin')
                            ->leftJoin('t_edisi','t_edisi.id','=','t_epaper.edisi')
                            // ->leftJoin('t_subjudul_epaper','t_subjudul_epaper.id_epaper','=','t_epaper.id')
                            ->first();
        $epaperz = Epaper::whereDate('edisi',Carbon::today())
                            ->where('t_epaper.position','=',1)
                            ->where('t_epaper.parent_id','=',0)
                            ->leftJoin('t_admin','t_admin.id_adm','=','t_epaper.id_admin')
                            ->leftJoin('t_edisi','t_edisi.id','=','t_epaper.edisi')
                            ->limit(1)
                            ->first();

        $page = 'epaper';
        return view('detailepaper.index',
        ['epapercover' =>$epapercover,
        'epaper' =>$epaper,
        'epaper2' =>$epaper2,
        'epaperz' =>$epaperz,
        'page' =>$page]);
        }else{
            return redirect('login')->with('alert','Login First');
        }
        
        
    }
}
