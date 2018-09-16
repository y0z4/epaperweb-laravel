<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\PayMethode;
use App\Provider;
use App\Pelanggan;
use App\User;
use DB;

class ThankscartController extends Controller
{
    
    function index()
    {
        $infox = Pelanggan::Join('users','users.id','=','t_order.id_user')
                         ->Join('t_payMethode','t_payMethode.id','=','t_order.payment_methode')
                         ->Join('t_paket','t_paket.id','=','t_order.tipe_paket')
                         ->first();

        $info = Pelanggan::Join('users','users.id','=','t_order.id_user')
                         ->Join('t_payMethode','t_payMethode.id','=','t_order.payment_methode')
                         ->Join('t_paket','t_paket.id','=','t_order.tipe_paket')
                         ->first();
        $page = 'Thankscart';
        return view('thankssubs.thankscart',
        [   'info' =>$info,
            'infox' =>$infox,
            'page' =>$page,
         
        ]);
    }
}
