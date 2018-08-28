<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Testimoni;
use App\DetailBerita;

class BlogController extends Controller
{
    public function index()
    {
        $testi = Testimoni::orderBy('tgl_pub','DESC')
                           ->limit(3)
                           ->get();

        $populer = DetailBerita::orderBy('tgl_pub','DESC')
                            ->leftJoin('t_admin','t_admin.id_adm','=','t_artikel_etopskor.id_admin')
                            ->leftJoin('t_section','t_section.id_section','=','t_artikel_etopskor.id_section')
                            ->limit(3)
                            ->get();
        
        $blog = DetailBerita::orderBy('tgl_pub','DESC')
                            ->leftJoin('t_admin','t_admin.id_adm','=','t_artikel_etopskor.id_admin')
                            ->leftJoin('t_section','t_section.id_section','=','t_artikel_etopskor.id_section')
                            ->limit(6)
                            ->get();
    
        
        $page = 'Blog';
        return view('blog.blog',
        ['test' =>$testi,
         'populer' =>$populer,
         'blog' =>$blog,
            'page' =>$page]);
    }
}
