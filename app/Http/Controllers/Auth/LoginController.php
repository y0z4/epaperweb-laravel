<?php

namespace App\Http\Controllers\Auth;

// use Auth;
use DB;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\Rule;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

//     public function doLogin()
// {
// // validate the info, create rules for the inputs
// $rules = array(
//     // 'email'    => 'required|email', // make sure the email is an actual email
//     'email' => ['required','string','email','max:255',Rule::exists('users','email')->where('provider','Manual')],
//     'password' => 'required|string|min:6', // password can only be alphanumeric and has to be greater than 3 characters

// );

// // run the validation rules on the inputs from the form
// $validator = Validator::make(Input::all(), $rules);

// // if the validator fails, redirect back to the form
// if ($validator->fails()) {
//     return redirect('/login')
//         ->withErrors($validator) // send back all errors to the login form
//         ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
// } else {

//     // create our user data for the authentication
//     $userdata = array(
//         'email'     => Input::get('email'),
//         'password'  => Input::get('password'),
//         'provider'  => 'Manual'
//     );

//     // attempt to do the login
//     if (Auth::attempt($userdata)) {

//         // validation successful!
//         // redirect them to the secure section or whatever
//         // return Redirect::to('secure');
//         // for now we'll just echo success (even though echoing in a controller is bad)
//         return redirect('/dashboard');
//         // dd($userdata);

//     } else {        

//         // validation not successful, send back to form 
//         dd($validator);
//         // return redirect('/zzz');

//     }

// }
// }

public function doLogin(request $request) {
    $check = DB::table('users')
                ->where('email', $request->input('email'))
                ->where('provider', 'Manual')
                ->first();
    if(!empty($check)) {
      $check2 = DB::table('users')
                  ->where('email', $request->input('email'))
                  ->where('password', md5($request->input('password')))
                  ->where('provider', 'Manual')
                  ->first();
    $request->session()->put('id',$check2->id);
    session(['id' => $check2->id]);
    session(['name' => $check2->name]);
    session(['email' => $check2->email]);
    session(['urlmember' => $check2->urlmember]);
      if(!empty($check2)) {
        /*echo 'Oke';*/
        // return redirect()->action('HomeController@index');
        // return redirect('/dashboard');
        echo 'Oke';
      } else {
        $request->session()->flash('warning', 'Wrong password');
        echo 'check2';
        dd($check2);

      }
    } else {
        $request->session()->flash('warning', 'Email not registered');
        echo 'check';
        dd($check);
    }
  }


    // public function logout(Request $request){
    //     Auth::logout();
    //     return redirect('/login');
    // }
}
