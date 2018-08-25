<?php

namespace App\Http\Controllers\Auth;

use App\User;
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

class RegisterController extends Controller
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
    

    function signup(Request $request)
  {
    $dataz = User::where('email',$request->input('email'))
                ->where('provider','Manual')
                ->first();
    if(!empty($dataz)){
      $request->session()->flash('warning', 'Email already registered');
      return redirect('/register');
    }else{
      $dataz2 = [
        'provider'  =>  'Manual',
        'name'  =>  $request->input('name'),
        'username' =>  $request->input('username'),
        'email' =>  $request->input('email'),
        'password'  =>  md5($request->input('password')),
        'created_at'  =>  date('Y-m-d H:i:s'),
        'updated_at' =>  date('Y-m-d H:i:s'),
        'urlmember' =>  str_slug($request->input('name')),
      ];
      DB::table('users')->insert($dataz2);
      $id = DB::getPdo()->lastInsertId();
        Session::put('id',$id);
        Session::put('name',$request->input('name'));
        Session::put('username',$request->input('username'));
        Session::put('email',$request->input('email'));
        Session::put('urlmember',str_slug($request->input('name')));
        Session::put('provider','Manual');
        return redirect('/dashboard');
    }
  }

    // protected function signup(request $request) {
    //     echo $request->input('name').' '.$request->input('email').' '.$request->input('password').' '.$request->input('username');
    //     $check = DB::table('users')
    //                 ->where('email', $request->input('email'))
    //                 ->where('provider', 'Manual')
    //                 ->first();
    //     if(!empty($check)) {
    //       $request->session()->flash('warning', 'Email already registered');
    //       // return redirect()->action('AuthController@index');
    //       return redirect('/register');
    //     } else {
    //       $data = [
    //         'provider'  =>  'Manual',
    //         'name'  =>  $request->input('name'),
    //         'username' =>  $request->input('username'),
    //         'email' =>  $request->input('email'),
    //         'password'  =>  md5($request->input('password')),
    //         'created_at'  =>  date('Y-m-d H:i:s'),
    //         'updated_at' =>  date('Y-m-d H:i:s'),
    //         'urlmember' =>  str_slug($request->input('name')),
    //       ];
    //       $query = DB::table('users')->insert($data);
    //       $id = DB::getPdo()->lastInsertId();
    //       Session::put('id',$id);
    //       Session::put('name',$check->name);
    //       Session::put('email',$check->email);
    //       Session::put('urlmember',str_slug($check->name));
    //     return redirect('/dashboard');
    //     }
    //   }
}
