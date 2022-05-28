<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\barang_masuks;
use App\barangs;
use Auth;

class BarangmasukController extends Controller
{

    public function read()
    {
            
        $barang_masuk = DB::table('barang_masuk')->orderBy('id','DESC')->get();
        return view('admin.barang_masuk.index',['barang_masuk'=>$barang_masuk]);

    }
    public function add(){
        $barang= DB::table('barang')->get();
    	return view('admin.barang_masuk.tambah',['barang'=>$barang]);
    }

    public function create(Request $request){
        DB::table('barang_masuk')->insert([
            'id_barang' => $request->id_barang,
            'tanggal' => $request->tanggal,
            'jumlah' => $request->jumlah,
            'id_user' => Auth::User()->id
        ]);

        $barang= DB::table('barang')->where('id',$request->id_barang)->first();

        $stock = $barang->jumlah + $request->jumlah;

        DB::table('barang')
            ->where('id', $request->id_barang)
            ->update([
            'jumlah' => $stock
        ]);


        return redirect('/admin/barang_masuk')->with("success","Data Berhasil Ditambah !");
    }

    public function detail($id){
        $barang_masuk= DB::table('barang_masuk')->where('id',$id)->first();
        return view('admin.barang_masuk.detail',['barang_masuk'=>$barang_masuk]);
    }

    public function edit($id){
        $barang_masuk= DB::table('barang_masuk')->where('id',$id)->first();
        $barang= DB::table('barang')->find($barang->id);
        return view('admin.barang_masuk.edit',['barang_masuk'=>$barang_masuk,'barang'=>$barang]);
      
        // $barang_masuk= DB::table('barang_masuk')->where('id',$id)->first();
        // return view('admin.barang_masuk.edit',['barang_masuk'=>$barang_masuk]);
    }

    public function update(Request $request, $id) {
        DB::table('barang_masuk')  
            ->where('id', $id)
            ->update([
                'id_barang' => $request->id_barang,
                'tanggal' => $request->tanggal,
                'jumlah' => $request->jumlah]);

        return redirect('/admin/barang_masuk')->with("success","Data Berhasil Diupdate !");
    }

    public function delete($id)
    {
        $barang_masuk= DB::table('barang_masuk')->where('id',$id)->first();
        DB::table('barang_masuk')->where('id',$id)->delete();

        return redirect('/admin/barang_masuk')->with("success","Data Berhasil Didelete !");
    }

}
