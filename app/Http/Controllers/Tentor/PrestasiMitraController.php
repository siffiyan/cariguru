<?php

namespace App\Http\Controllers\Tentor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Murid;
use App\Models\Mitra;
use App\Models\Admin;
use App\Models\PengalamanMengajarMitra;
use App\Models\PrestasiMitra;

class PrestasiMitraController extends Controller
{

    public function store(Request $request){

    	$data = $request->all();
    	$data['mitra_id'] = session('id');
    	PrestasiMitra::create($data);

    	return redirect('/tentor/profil')->with('msg','Prestasi berhasil ditambahkan');

    }

}