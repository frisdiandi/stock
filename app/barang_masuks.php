<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barang_masuks extends Model
{
    protected $table = "barang_masuk";
    protected $primaryKey = "id";
    protected $fillable = [
        'id','id_barang','tanggal','jumlah'];

    public function barangs()
    {
        return $this->belongsTo('App\barang_masuks');
    }
}