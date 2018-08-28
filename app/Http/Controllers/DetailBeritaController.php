<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\DetailBerita;
use View;

class DetailBeritaController extends Controller
{
    public function index($id_artikel)
    {
        // $detailberita = DetailBerita::with('admin')
                        
        //                 //    ->orderBy('tgl_pub','DESC')
        //                 //    ->limit(3)
                        // ->first();
        
        $getberita    = DetailBerita::where('id_artikel','=',$id_artikel)
                                    ->leftJoin('t_admin','t_admin.id_adm','=','t_artikel_etopskor.id_admin')
                                    ->leftJoin('t_section','t_section.id_section','=','t_artikel_etopskor.id_section')
                                    ->first();
        $getsection   = DetailBerita::with('section');
        
        $page = 'Detailberita';
        // return View::make('detailberita.detailberita')->with(array('detailberita'=>$detailberita));
        return view('detailberita.detailberita',
        ['page' =>$page,
         'getberita'=>$getberita,
         'getsection'=>$getsection]);
    }
}
