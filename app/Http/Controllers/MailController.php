<?php
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use App\Mail\KonfirmasiMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\PayMethode;
use App\Provider;
use App\Pelanggan;
use App\User;
use App\Konfirmasi;
use DB;
 
class MailController extends Controller
{
    public function send()
    {
        $info = Pelanggan::where('no_invoice','=',Session::get('no_invoice'))
                         ->Join('users','users.id','=','t_order.id_user')
                         ->Join('t_payMethode','t_payMethode.id','=','t_order.payment_methode')
                         ->Join('t_paket','t_paket.id','=','t_order.tipe_paket')
                         ->first();
        $objDemo = new \stdClass();
        $objDemo->email = $info->email;
        $objDemo->invoice = $info->no_invoice;
        $objDemo->total = $info->harga_paket;
        $objDemo->paket = $info->nama_paket;
        $objDemo->bank = $info->provider;
        $objDemo->norek = $info->no_rek;
        $objDemo->namarek = $info->nama_rek;
        $objDemo->receiver = $info->name;
 
        Mail::to("rahadian271094@gmail.com")->send(new KonfirmasiMail($objDemo));
        return redirect('/thankscart');
    }
}