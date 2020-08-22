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


class CariguruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['jenjang'] = Jenjang::all();
        $data['kurikulum'] = Kurikulum::all();
        $data['mapel'] = Mapel::all();
        $data['guru'] = Mitra::all();

        return view('siswa.cariguru.index',$data);
    }

    public function filter_mapel($jenjang, $kurikulum)
    {
        if($kurikulum == 1){
            $data['mapel'] = DB::table('mata_pelajaran')->where('jenjang', $jenjang)->get();
        }else{
            $data['mapel'] = DB::table('mata_pelajaran')->where([
                ['jenjang', $jenjang],
                ['kurikulum', $kurikulum]
            ])->get(); 
        }

        return $data;
    }

    public function action_filter($jenjang, $kurikulum, $mapel)
    {
        if($mapel != null){
            $data['guru'] = DB::table('pilihan_mengajar_mitra as a')->join('mitra as b', '.a.mitra_id', '=', 'b.id')->where([['jenjang_id',$jenjang],['kurikulum_id', $kurikulum],['mapel_id', $mapel]])->get();
        }else{
            $data['guru'] = DB::table('pilihan_mengajar_mitra as a')->join('mitra as b', '.a.mitra_id', '=', 'b.id')->where([['jenjang_id',$jenjang],['kurikulum_id', $kurikulum]])->get();
        }

        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
