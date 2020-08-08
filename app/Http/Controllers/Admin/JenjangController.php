<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Jenjang;

class JenjangController extends Controller
{
    public function index()
    {	
    	$data['jenjang'] = Jenjang::all();
        return view('admin.pembelajaran.jenjang.index',$data);
    }

    public function delete_jenjang(Request $request){
        $id = $request->id;

        $jenjang = Jenjang::findOrFail($id);
        $jenjang->delete();

        return redirect('admin.pembelajaran.jenjang.index')->with('msg','data berhasil hapus');
    }

}
