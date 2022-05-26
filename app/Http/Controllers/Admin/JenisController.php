<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class jenisController extends Controller
{
    public function read(){
        $jenis = DB::table('jenis')->orderBy('id' ,'DESC')->get();
        return view('admin.jenis_barang.index',['jenis'=>$jenis]);
    }

    public function add(){
    	return view('admin.jenis_barang.tambah');
    }

    public function create(Request $request){
        DB::table('jenis')->insert([
            'nama' => $request->nama
        ]);

        return redirect('/admin/jenis_barang')->with("success","Data Berhasil Ditambah !");
    }

    public function detail($id){
        $jenis= DB::table('jenis')->where('id',$id)->first();
        return view('admin.jenis_barang.detail',['jenis'=>$jenis]);
    }

    public function edit($id){
        $jenis= DB::table('jenis')->where('id',$id)->first();
        return view('admin.jenis_barang.edit',['jenis'=>$jenis]);
    }

    public function update(Request $request, $id) {
        DB::table('jenis')
            ->where('id', $id)
            ->update([
            'nama' => $request->nama
        ]);

        return redirect('/admin/jenis_barang')->with("success","Data Berhasil Diupdate !");
    }

    public function delete($id)
    {
        $jenis= DB::table('jenis')->where('id',$id)->first();
        DB::table('jenis')->where('id',$id)->delete();

        return redirect('/admin/jenis_barang')->with("success","Data Berhasil Didelete !");
    }
}
