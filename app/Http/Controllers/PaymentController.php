<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\PayMethode;
use App\Provider;
use App\Pelanggan;
use App\User;
use DB;

class PaymentController extends Controller
{
   public function index()
   {
    if(Session::get('id')){
			
      $paymethode = PayMethode::orderBy('id','ASC')
      ->get();
      $paymethode2 = PayMethode::orderBy('id','ASC')
            ->first();
      $user = User::where('id','=',Session::get('id'))
      ->first();
      $paket = DB::table('t_paket')
      ->get();
      $page = 'Payment';
      return view('payment.payment',
      ['paymethode' =>$paymethode,
      'paymethode2' =>$paymethode2,
      'user'=>$user,
      'paket'=>$paket,
      'page' =>$page,        
      ]);
		}else{
			return redirect('login')->with('alert','Login First');
        }
   
    }
    function subs(Request $request)
  {
    
    $dataz = Pelanggan::where('id_user',Session::get('id'))
                ->where('status','requested')
                ->first();

    
          
      $dataz2 = [
        'id_user' => Session::get('id'),
        'no_invoice' => date('YmdHis'),
        'tipe_paket' => $request->input('paket'),
        'start_date' => date('Y-m-d'),
        'payment_methode'  =>  $request->input('bank'),        
      ];
      DB::table('t_order')->insert($dataz2);

      
      Session::put('id_user',Session::get('id'));
      Session::put('no_invoice',date('YmdHis'));
      Session::put('tipe_paket',$request->input('paket'));
      Session::put('start_date',date('Y-m-d'));
      Session::put('payment_methode',$request->input('bank'));
      // $photo = $request->file('photo');
      // $ext = $photo->getClientOriginalExtension();
      // Storage::disk('public')->put($photo->getFilename().'.'.$ext,File::get($photo));
      // $dataz3 = new User();
      // $dataz3 -> image = $photo->getClientOriginalName();
      // $dataz3->save();
        // return redirect()->action('ThankscartController@index', [$invoice]);
        return redirect('/mail/send');

        
    
    
  }
  
}
