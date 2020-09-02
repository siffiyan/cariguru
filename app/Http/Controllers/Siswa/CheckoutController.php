<?php

namespace App\Http\Controllers\Siswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Murid;
use App\Models\Mitra;
use App\Models\Jenjang;
use App\Models\Kurikulum;
use App\Models\Mapel;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data['mitra'] = Mitra::findOrFail($id);
        $data['murid'] = Murid::where('id',session()->get('id'))->first();

        return view('siswa.cariguru.checkout',$data);
    }

    public function promo($promo)
    {
        $promo = DB::table('diskon')->whereRaw('tanggal_mulai <= CURDATE() AND tanggal_akhir >= CURDATE() AND kode_promo = ?',[$promo])->first();
        
        if(!empty($promo)){
            $data['promo'] = $promo->presentase;
        }else{
            $data['promo'] = 'Kosong';
        }

        return $data;
    }
}
