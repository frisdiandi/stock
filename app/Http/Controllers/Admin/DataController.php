<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class DataController extends Controller
{
    public function read(){
        $barang = DB::table('barang')->orderBy('id','DESC')->get();
        return view('admin.barang.index',['barang'=>$barang]);
    }

    public function add(){
        $satuan= DB::table('satuan')->get();
    	return view('admin.barang.tambah',['satuan'=>$satuan]);
    }

    public function create(Request $request){
        DB::table('barang')->insert([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
            'id_satuan' => $request->id_satuan,
            'id_jenis' => $request->id_jenis
        ]);

        return redirect('/admin/barang')->with("success","Data Berhasil Ditambah !");
    }

    public function detail($id){
        $barang= DB::table('barang')->where('id',$id)->first();
        return view('admin.barang.detail',['barang'=>$barang]);
    }

    public function edit($id){
        $barang= DB::table('barang')->where('id',$id)->first();

        $satuan= DB::table('satuan')->find($magang->id_universitas);
        $satuan_all= DB::table('satuan')->where('id','!=',$satuan->id)->get();

        return view('admin.barang.edit',['barang'=>$barang,'satuan'=>$satuan,'satuanAll'=>$satuanAll]);
    }

    public function update(Request $request, $id) {
        DB::table('barang')
            ->where('id', $id)
            ->update([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
            'id_satuan' => $request->id_satuan,
            'id_jenis' => $request->id_jenis
        ]);

        return redirect('/admin/barang')->with("success","Data Berhasil Diupdate !");
    }

    public function delete($id)
    {
        $barang= DB::table('barang')->where('id',$id)->first();
        DB::table('barang')->where('id',$id)->delete();

        return redirect('/admin/barang')->with("success","Data Berhasil Didelete !");
    }
}
