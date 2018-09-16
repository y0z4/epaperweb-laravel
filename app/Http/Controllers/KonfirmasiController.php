<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\Filesystem;
use League\Flysystem\Sftp\SftpAdapter;
use App\PayMethode;
use App\Provider;
use App\Pelanggan;
use App\User;
use App\Konfirmasi;
use DB;

class KonfirmasiController extends Controller
{
   public function index($invoice)
   {
    $info = Pelanggan::where('no_invoice','=',$invoice)
                         ->Join('users','users.id','=','t_order.id_user')
                         ->Join('t_payMethode','t_payMethode.id','=','t_order.payment_methode')
                         ->Join('t_paket','t_paket.id','=','t_order.tipe_paket')
                         ->first();
   $paymethode = PayMethode::orderBy('id','ASC')
                      ->get();
   $paymethode2 = PayMethode::orderBy('id','ASC')
                      ->first();
   $user = User::where('id','=',Session::get('id'))
                ->first();
   $paket = DB::table('t_paket')
                ->get();
    $page = 'Konfirmasi';
    return view('konfirmasi.konfirmasi',
    ['info' =>$info,
    'paymethode' =>$paymethode,
    'paymethode2' =>$paymethode2,
    'user'=>$user,
    'paket'=>$paket,
    'page' =>$page,        
    ]);
    }

    function konfirmasi(Request $request)
  {
      $file = $request->file('photo')->getClientOriginalName();
      $filename = pathinfo($file,PATHINFO_FILENAME);
      $ext = $request->file('photo')->getClientOriginalExtension();
      $filetostore = date('YmdHis').$filename.'.'.$ext;
      Storage::disk('sftp1')->put($filetostore, fopen($request->file('photo'), 'r+'));
      $dataz2 = [
        'no_invoice' => $request->input('invoice'),
        'nama' => $request->input('nama'),
        'email' => $request->input('email'),
        'phone' => $request->input('phone'),
        'total' => $request->input('total'),
        'tanggal_bayar' => $request->input('tanggal'),
        'bank_tujuan' => $request->input('banktujuan'),
        'bank_asal' => $request->input('bankasal'),
        'nama_rek' => $request->input('namarek'),
        'no_rek' => $request->input('norek'),
        'created_at' => date('Y-m-d'),
        // 'bukti_pembayaran'  =>  $file->move('https://static.topskor.id/epaper/buktipembayaran/',$imgname),
        'bukti_pembayaran'  =>  $filetostore,     
      ];
      DB::table('t_konfirmasi')->insert($dataz2);
      // $photo = $request->file('photo');
      // $ext = $photo->getClientOriginalExtension();
      // Storage::disk('public')->put($photo->getFilename().'.'.$ext,File::get($photo));
      // $dataz3 = new User();
      // $dataz3 -> image = $photo->getClientOriginalName();
      // $dataz3->save();
        // return redirect()->action('ThankscartController@index', [$invoice]);
        return redirect('/thankskonfirmasi');    
    
  }
  public function thanks()
   {
    $page = 'Thankskonfirmasi';
    return view('thankssubs.thankskonfirmasi',
    [
    'page' =>$page,        
    ]);
    }
}
