<?php

namespace App\Http\Controllers\Tentor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Mitra;

class AuthController extends Controller
{

	public function login(){
		return view('tentor.auth.login');
	}

	public function login_action(Request $request){

		$email= $request->email;
		$password = $request->password;

		$data = Mitra::where('email',$email)->first();

		if($data){

			if(Hash::check($password,$data->password)){

				Session::put('email',$data->email);
				Session::put('id',$data->id);
                Session::put('login',TRUE);

               return redirect('/tentor/dashboard');

			}

			else{

				return redirect('/tentor/login')->with('error','email / password anda salah');

			}


		}

		else{

			return redirect('/tentor/login')->with('error','email / password anda salah');

		}

	}

}