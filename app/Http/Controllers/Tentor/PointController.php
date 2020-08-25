<?php

namespace App\Http\Controllers\Tentor;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Poin;


class PointController extends Controller
{
    public function index()
    {
        $id = session()->get('id');
        $data['total_point'] = DB::table('poin')->select(DB::raw('sum(poin) as total_poin'))->where('mitra_id',$id)->first();
        $data['point'] = Poin::where('mitra_id',$id)->get();

        return view('tentor.point.index',$data);
    }
}
