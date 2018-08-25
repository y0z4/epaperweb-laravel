<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
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

		 $getuser = DB::table('users')
		            ->where('id', '=', $id)
		            ->first();

		

		 return view ('dashboard.dashboard',[
		 	'page' => $page,
		 	
		 	'getuser' => $getuser,
		 	
		 ]);

		
	}

}