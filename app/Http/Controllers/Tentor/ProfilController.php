<?php

namespace App\Http\Controllers\Tentor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Murid;
use App\Models\Mitra;
use App\Models\Admin;
use App\Models\PengalamanMengajarMitra;
use App\Models\PrestasiMitra;

class ProfilController extends Controller
{

    public function index()
    {	
    	$data['pengalaman'] = PengalamanMengajarMitra::where('mitra_id',session('id'))->get();
        $data['prestasi'] = PrestasiMitra::where('mitra_id',session('id'))->get();
    	$data['tahun_awal'] = range(2020, 1960);
    	$hasil = $data['tahun_awal'];
    	array_unshift($hasil, "Sampai Sekarang");
    	$data['tahun_akhir'] = $hasil;
        return view('tentor.profil.index',$data);
    }

    public function store_pengalaman_mengajar_mitra(Request $request){

    	$data = $request->all();
    	$data['mitra_id'] = session('id');
    	PengalamanMengajarMitra::create($data);

    	return redirect('/tentor/profil')->with('msg','Pengalaman mengajar berhasil ditambahkan');

    }

}