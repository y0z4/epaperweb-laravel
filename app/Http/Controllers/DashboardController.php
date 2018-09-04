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
use App\City;
use App\Province;
use DB;

class DashboardController extends Controller
{
	public function index(request $request)
	{
		if(!Session::get('id')){
			return redirect('login')->with('alert','Login First');
			$page = 'Dashboard';

		 	$getuser = User::where('id', '=', $id)
		            ->first();
		

		 return view ('dashboard.dashboard',[
		 	'page' => $page,
			'getuser' => $getuser,
			'prov'=>$prov,
		 	
		 ]);
		  }
		  else{
			return view('dashboard/dashboard');
		  }
		}

	
	public function province()
      {
        $prov = Province::orderBy("provinsi.id","ASC")
                        ->pluck("name","id");
        return view('dashboard.dashboard',compact('prov')); 
      }

      public function cities($id)
      {
        $city = City::where("id_provinsi",$id)
                      ->pluck("city_name","id");
        return json_encode($city);
        // return response()->json($city);
      }

	public function editaction(request $request)
	{
		$file = $request->file('photo');
      	
		// $data = User::where('id',$request->input('id'))
		// 			->update([
		// 				'name' => $request->input('name'),
		// 				'email' => $request->input('email'),
		// 				'gender' => $request->input('gender'),
		// 				'address' => $request->input('address'),
		// 				'image' => $file->move(env('APP_URL').'public/uploads',$imgname),
		// 			]);
	if(!empty($file)){
		$origin = $file->getClientOriginalName();
      	$imgname = uniqid(true).$origin;	
		$data = [
				
				'name' => $request->input('name'),
				'email' => $request->input('email'),
				'gender' => $request->input('gender'),
				'address' => $request->input('address'),
				'phone' => $request->input('phone'),
				'image' => $file->move(env('APP_URL').'public/uploads',$imgname),
				'provinsi_id' => $request->input('prov'),
				'city_id' =>$request->input('cities'),
		];
			DB::table('users')
			->where('id',$request->input('id'))
			->update($data);
	}else{
		$data = [
				'id'   => $request->input('id'),
				'name' => $request->input('name'),
				'email' => $request->input('email'),
				'gender' => $request->input('gender'),
				'address' => $request->input('address'),
				'phone' => $request->input('phone'),
				'provinsi_id' => $request->input('prov'),
				'city_id' =>$request->input('cities'),
		];
			DB::table('users')
			->where('id',$request->input('id'))
			->update($data);
		};
		
		$id = DB::getPdo()->lastInsertId();
      	$img = User::where('id','=',$id)->first();
        // Session::put('id',$id);
        Session::put('name',$request->input('name'));
		Session::put('email',$request->input('email'));
		Session::put('gender',$request->input('gender'));
		Session::put('address',$request->input('address'));
		Session::put('phone',$request->input('phone'));
		Session::put('provinsi_id',$request->input('prov'));
        Session::put('city_id',$request->input('cities'));

        // Session::put('urlmember',str_slug($user->name));
        // Session::put('provider','google');
        // Session::put('image',$img->image);
					// return redirect()->action('DashboardController@index',[session('id')]);
					return redirect('/dashboard');
	}

}