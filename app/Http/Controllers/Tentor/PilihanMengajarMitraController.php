<?php

namespace App\Http\Controllers\Tentor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mitra;
use App\Models\PilihanMengajarMitra;

class PilihanMengajarMitraController extends Controller
{

    public function store(Request $request){

    	$data = $request->all();
    	$data['mitra_id'] = session('id');
    	PilihanMengajarMitra::create($data);

    	return redirect('/tentor/profil')->with('msg','Pilihan Mengajar berhasil ditambahkan');

    }

}