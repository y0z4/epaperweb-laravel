<?php

namespace App\Http\Controllers;

use App\User;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Socialite;


class LoginController extends Controller
{
  public function index(){

    if(!Session::get('login')){
      return redirect('login')->with('alert','Login First');
    }
    else{
      return view('dashboard/dashboard');
    }

  }

  function login($provider) {
    return Socialite::driver($provider)->redirect();
  }

  function callbackfb()
  {
    $user = Socialite::driver('facebook')->user();
    $dataz = User::where('provider_id',$user->id)
                ->where('provider','facebook')
                ->first();
    if(!empty($dataz)){
      Session::put('id',$dataz->id);
      Session::put('name',$dataz->name);
      Session::put('email',$dataz->email);
      Session::put('urlmember',$dataz->urlmember);
      Session::put('provider',$dataz->provider);
      return redirect('/dashboard');
    }else{
      $dataz2 = [
        'name'  =>  $user->name,
        'email' =>  $user->email,
        'provider' => 'facebook',
        'provider_id' => $user->id,
        'urlmember' =>  str_slug($user->name)
      ];
      DB::table('users')->insert($dataz2);
      $id = DB::getPdo()->lastInsertId();
        Session::put('id',$id);
        Session::put('name',$user->name);
        Session::put('email',$user->email);
        Session::put('urlmember',str_slug($user->name));
        Session::put('provider','facebook');
        return redirect('/dashboard');
    }
  }

  function callbackgoogle()
  {
    $user = Socialite::driver('google')->user();
    $dataz = User::where('provider_id',$user->id)
                ->where('provider','google')
                ->first();
    if(!empty($dataz)){
      Session::put('id',$dataz->id);
      Session::put('name',$dataz->name);
      Session::put('email',$dataz->email);
      Session::put('urlmember',$dataz->urlmember);
      Session::put('provider',$dataz->provider);
      return redirect('/dashboard');
    }else{
      $dataz2 = [
        'name'  =>  $user->name,
        'email' =>  $user->email,
        'provider' => 'google',
        'provider_id' => $user->id,
        'urlmember' =>  str_slug($user->name)
      ];
      DB::table('users')->insert($dataz2);
      $id = DB::getPdo()->lastInsertId();
        Session::put('id',$id);
        Session::put('name',$user->name);
        Session::put('email',$user->email);
        Session::put('urlmember',str_slug($user->name));
        Session::put('provider','google');
        return redirect('/dashboard');
    }
  }

  function doLogin(Request $request)
  {
    $dataz = User::where('email',$request->input('email'))
                ->where('provider','Manual')
                ->where('password',md5($request->input('password')))
                ->first();
    if(!empty($dataz)){
      if(md5($request->password,$dataz->password)){
        Session::put('id',$dataz->id);
        Session::put('name',$dataz->name);
        Session::put('username',$dataz->username);
        Session::put('email',$dataz->email);
        Session::put('urlmember',$dataz->urlmember);
        Session::put('provider',$dataz->provider);
        // dd($dataz);
        // dd(Session::get('id'));
        return redirect('/dashboard');
      }
      else{
        return redirect('/login')->with('alert','Password Salah !');
      }
    }
    else{
      return redirect('/login')->with('alert','Email, Salahaa!');
        }
    
  }

  // function doLogin(Request $request) {
  //   $check = DB::table('users')
  //               ->where('email', $request->input('email'))
  //               ->where('provider', 'Manual')
  //               ->first();
  //   if(!empty($check)) {
  //     $check2 = DB::table('users')
  //                 ->where('email', $request->input('email'))
  //                 ->where('password', md5($request->input('password')))
  //                 ->where('provider', 'Manual')
  //                 ->first();
  //     Session::put('email',$check2->email);
  //     Session::put('name',$check2->name);
  //     Session::put('login',TRUE);
  //     if(!empty($check2)) {
  //       /*echo 'Oke';*/
  //       // return redirect()->action('DashboardController@index');
  //       return redirect('/home/home');
  //       // echo 'Oke';
  //     } else {
  //       $request->session()->flash('warning', 'Wrong password');
  //       return view('auth/login');
  //       // return redirect()->action('LoginController@index');
  //       // echo 'check2';
  //       // dd($check2);

  //     }
  //   } else {
  //       $request->session()->flash('warning', 'Email not registered');
  //       // echo 'check';
  //       return view('auth/login');
  //       // return redirect()->action('LoginController@index');
  //       // dd($check);
  //   }
  // }
  public function logout(){
    Session::flush();
    return redirect('login')->with('alert','Kamu sudah logout');
}
}
