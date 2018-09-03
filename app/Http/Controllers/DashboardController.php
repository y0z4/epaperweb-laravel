<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\User;
use DB;

class DashboardController extends Controller
{
	public function index(request $request)
	{
		if(!Session::get('id')){
			return redirect('login')->with('alert','Login First');
		  }
		  else{
			return view('dashboard/dashboard');
		  }

		$page = 'Dashboard';

		 $getuser = User::where('id', '=', $id)
		            ->first();

		

		 return view ('dashboard.dashboard',[
		 	'page' => $page,
		 	'getuser' => $getuser,
		 	
		 ]);

		
	}
	public function editaction(request $request)
	{
		$file = $request->file('photo');
      	$origin = $file->getClientOriginalName();
      	$imgname = uniqid(true).$origin;
		// $data = User::where('id',$request->input('id'))
		// 			->update([
		// 				'name' => $request->input('name'),
		// 				'email' => $request->input('email'),
		// 				'gender' => $request->input('gender'),
		// 				'address' => $request->input('address'),
		// 				'image' => $file->move(env('APP_URL').'public/uploads',$imgname),
		// 			]);
		$data = ['name' => $request->input('name'),
				'email' => $request->input('email'),
				'gender' => $request->input('gender'),
				'address' => $request->input('address'),
				'image' => $file->move(env('APP_URL').'public/uploads',$imgname)
				];
		DB::table('users')->update($data);
		$id = DB::getPdo()->lastInsertId();
      	$img = User::where('id','=',$id)->first();
        Session::put('id',$id);
        Session::put('name',$request->input('name'));
		Session::put('email',$request->input('email'));
		Session::put('gender',$request->input('gender'));
		Session::put('address',$request->input('address'));
        // Session::put('urlmember',str_slug($user->name));
        // Session::put('provider','google');
        // Session::put('image',$img->image);
					// return redirect()->action('DashboardController@index',[session('id')]);
					return redirect('/dashboard');
	}

}