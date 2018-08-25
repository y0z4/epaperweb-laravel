<?php

namespace App\Http\Controllers;

use App\ModelUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        if(!Session::get('login')){
            return redirect('login')->with('alert','You must login first to access this page!');
        }
        else{
            return view('home_user');
        }
    }
    public function login()
    {
        return view('auth/login');
    }
    public function loginPost(Request $request){
        $email = $request->email;
        $password = $request->password;
        $data = ModelUser::where('email',$email)->first();
        if(count($data) > 0){ //apakah email tersebut ada atau tidak
            if(md5($password,$data->password)){
                Session::put('name',$data->name);
                Session::put('email',$data->email);
                Session::put('login',TRUE);
                return redirect('home_user');
            }
            else{
                return redirect('login')->with('alert','Password atau Email, Salah !'.md5($password,$data->password));
            }
        }
        else{
            return redirect('login')->with('alert','Password atau Email, Salahaa!');
        }
    }

    public function logout(){
        Session::flush();
        return redirect('login')->with('alert','You have been logged out');
    }

    public function register(Request $request){
        return view('auth/register');
    }

    public function registerPost(Request $request){
        $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'required|min:4|email|unique:users',
            'password' => 'required',
            'confirmation' => 'required|same:password',
        ]);
        $data =  new ModelUser();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = md5($request->password);
        $data->save();
        return redirect('login')->with('alert-success','Registered Successfull!');
    }
}
