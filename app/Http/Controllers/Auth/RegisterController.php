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
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
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

      public function province()
      {
        $prov = Province::orderBy("provinsi.id","ASC")
                        ->pluck("name","id");
        return view('auth.register',compact('prov')); 
      }

      public function cities($id)
      {
        $city = City::where("id_provinsi",$id)
                      ->pluck("city_name","id");
        return json_encode($city);
        // return response()->json($city);
      }


    function signup(Request $request)
  {
    
    $dataz = User::where('email',$request->input('email'))
                ->where('provider','Manual')
                ->first();

    if(!empty($dataz)){
      $request->session()->flash('warning', 'Email already registered');
      return redirect('/register');
    
    }else{
      $img = 'https://dev.topskor.id/epaper.topskor.id/public/uploads/';
      $file = $request->file('photo');
      $origin = $file->getClientOriginalName();
      $imgname = uniqid(true).$origin;
      
      $dataz2 = [
        'provider'  =>  'Manual',
        'name'  =>  $request->input('name'),
        'username' =>  $request->input('username'),
        'gender' => $request->input('gender'),
        'phone' => $request->input('phone'),
        'provinsi_id' => $request->input('prov'),
        'city_id' =>$request->input('cities'),
        'address' =>$request->input('address'),
        'email' =>  $request->input('email'),
        // 'image' => $request->file('photo')->move(public_path('uploads/' .)),
        'image' => $file->move(env('APP_URL').'public/uploads',$imgname),
        'password'  =>  md5($request->input('password')),
        'created_at'  =>  date('Y-m-d H:i:s'),
        'updated_at' =>  date('Y-m-d H:i:s'),
        'urlmember' =>  str_slug($request->input('name')),
      ];
      DB::table('users')->insert($dataz2);
      // $photo = $request->file('photo');
      // $ext = $photo->getClientOriginalExtension();
      // Storage::disk('public')->put($photo->getFilename().'.'.$ext,File::get($photo));
      // $dataz3 = new User();
      // $dataz3 -> image = $photo->getClientOriginalName();
      // $dataz3->save();
      
      
      $id = DB::getPdo()->lastInsertId();
      $img = User::where('id','=',$id)->first();
        Session::put('id',$id);
        Session::put('name',$request->input('name'));
        Session::put('username',$request->input('username'));
        Session::put('gender',$request->input('gender'));
        Session::put('phone',$request->input('phone'));
        Session::put('provinsi_id',$request->input('prov'));
        Session::put('city_id',$request->input('cities'));
        Session::put('address',$request->input('address'));
        Session::put('email',$request->input('email'));
        Session::put('image',$img->image) ;
        Session::put('urlmember',str_slug($request->input('name')));
        Session::put('provider','Manual');
        return redirect('/');

        
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
