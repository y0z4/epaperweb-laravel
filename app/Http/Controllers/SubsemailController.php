<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubsEmail;
use DB;

class SubsemailController extends Controller
{
    function subsemail(Request $request)
    {
        $data = SubsEmail::where('email',$request->input('email'))
                        ->first();
        if(!empty($data)){
            $msg = 'Email Already Registered!';
           
        }else{
            $data2 = [
                'email' =>  $request->input('email'),
            ];
            DB::table('t_subsemail')->insert($data2);
            $msg = 'Terima kasih, email anda sudah terdaftar menjadi subscriber';
        }
        $page = 'Subsemail';
        return view('thankssubs.index',
        ['msg' =>$msg,
         'page' =>$page,       
        ]);
       
    }
    function index()
    {
        $page = 'Subsemail';
        return view('thankssubs.index',
        ['page' =>$page,
         
        ]);
    }
}
