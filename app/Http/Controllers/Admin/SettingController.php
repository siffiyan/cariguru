<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShareProfit;
use App\Models\KodePromo;
use App\Models\Diskon;

class SettingController extends Controller
{

	public function share_profit(){

		$data['profit'] = ShareProfit::find(1);
		return view('admin.setting.share_profit.index',$data);

	}

	public function edit_share_profit(Request $request,$id){

		if($request->owner + $request->mitra != 100){
			return redirect('/admin/setting/share_profit')->with('err','penjumlahan presentase antara owner dan mita harus = 100');
		}

		$data = ShareProfit::findOrFail($id);
		$data->update($request->all());

		return redirect('/admin/setting/share_profit')->with('msg','settingan profit berhasil di update');

	}

	public function atur_diskon(){

		$data['diskon'] = Diskon::all();
		return view('admin.setting.diskon.index',$data);

	}

	public function get_detail_diskon($id){

		$data = Diskon::findOrFail($id);
		return response()->json($data);

	}

	public function create_atur_diskon(Request $request){

		Diskon::create($request->all());
		return redirect('/admin/setting/atur_diskon')->with('msg','kode promo berhasil di tambahkan');
	}

	public function edit_atur_diskon(Request $request){

		$id = $request->id;

		$data = Diskon::findOrFail($id);
		$data->update($request->all());

		return redirect('/admin/setting/atur_diskon')->with('msg','kode promo berhasil di edit');

	}

	public function delete_atur_diskon(Request $request){

		$id = $request->id;
		$data = Diskon::findOrFail($id);
		$data->delete();

		return redirect('/admin/setting/atur_diskon')->with('msg','kode promo berhasil di hapus');

	}

}