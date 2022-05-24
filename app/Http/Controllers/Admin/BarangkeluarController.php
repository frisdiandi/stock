<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class BarangkeluarController extends Controller
{
    public function read(){
        $barang_keluar = DB::table('barang_keluar')->orderBy('id','DESC')->get();
        return view('admin.barang_keluar.index',['barang_keluar'=>$barang_keluar]);
    }
    public function add(){
    	return view('admin.barang_keluar.tambah');
    }

    public function create(Request $request){
        DB::table('barang_keluar')->insert([  
            'id_barang' => $request->id_barang]);

        return redirect('/admin/barang_keluar')->with("success","Data Berhasil Ditambah !");
    }

    public function detail($id){
        $barang_keluar= DB::table('barang_keluar')->where('id',$id)->first();
        return view('admin.barang_keluar.detail',['barang_keluar'=>$barang_keluar]);
    }

    public function edit($id){
        $barang_keluar= DB::table('barang_keluar')->where('id',$id)->first();
        return view('admin.barang_keluar.edit',['barang_keluar'=>$barang_keluar]);
    }

    public function update(Request $request, $id) {
        DB::table('barang_keluar')  
            ->where('id', $id)
            ->update([
                'id_barang' => $request->id_barang,
                'tanggal' => $request->tanggal,
                'jumlah' => $request->jumlah]);

        return redirect('/admin/barang_keluar')->with("success","Data Berhasil Diupdate !");
    }

    public function delete($id)
    {
        $barang_keluar= DB::table('barang_keluar')->where('id',$id)->first();
        DB::table('barang_keluar')->where('id',$id)->delete();

        return redirect('/admin/barang_keluar')->with("success","Data Berhasil Didelete !");
    }

}
