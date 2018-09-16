<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Iklan;
use DB;

class IklanController extends Controller
{
    function iklan(Request $request)
    {
        $data2 = [
            'name' =>$request->input('name'),
            'email' =>  $request->input('email'),
            'message' =>$request->input('message')
        ];
            DB::table('t_iklan')->insert($data2);
            $msg = 'Terimakasih, Permintaan Anda akan Kami Proses.';
        
        $page = 'Iklan';
        return view('iklan.iklan',
        ['msg' =>$msg,
         'page' =>$page,       
        ]);
       
    }
    function index()
    {
        $page = 'Iklan';
        return view('iklan.iklan',
        ['page' =>$page,
         
        ]);
    }
}
