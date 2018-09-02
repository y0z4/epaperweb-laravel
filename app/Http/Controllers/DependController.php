<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\City;
use App\Province;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;

class DependController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';
    protected $username = 'username';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'username' => 'required|max:255',
            // 'email' => 'required|string|email|max:255|unique:users,email,{$data->provider},provider',
            'email' => ['required','string','email','max:255',Rule::unique('users','email')->where('provider','Manual')],
            'password' => 'required|string|min:6|confirmed',
            'provider' => 'string|unique:users',
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
  
    // protected function create(array $data)
    // {
    //     // $prov = 'Email';
        
    //     return User::create([
    //         'name' => $data['name'],
    //         'username' => $data['username'],
    //         'email' => $data['email'],
    //         'password' => md5($data['password']),
    //         'provider' => 'Manual',
    //     ]);
    // }

      // public function index()
      // {
      //   $cityx = User::leftJoin('city','city.id','=','city_id')
      //               ->leftJoin('provinsi','provinsi.id','=','provinsi_id')
      //               ->get();

      //   $city = City::leftJoin('provinsi','provinsi.id','=','id_provinsi')
      //             ->orderBy("city.id","ASC")
      //             // ->where("provinsi.id","=",$id)
      //             ->get();
      //   $prov = Province::orderBy("provinsi.id","ASC")
      //                 // ->Join('city','city.id_provinsi','=','provinsi.id')
      //                 ->get();
      // $page = 'Register';
      // return view('auth.register',
      // ['city' =>$city,
      // 'prov' =>$prov,
      // 'cityx' =>$cityx,
      //  'page' =>$page]);
      // }

      public function myform()
      {
        $provinsi = DB::table("provinsi")->lists("name","id");
        return view('auth.register',compact('provinsi')); 
      }

      public function myformAjax($id)
      {
        $city = City::where("id_provinsi","=",$id)
                      ->lists("city_name","id");
        return json_encode($city);
      }


    

    
}
