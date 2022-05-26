<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\barang_masuks;

class barangs extends Model
{
    protected $table = "barang";
    protected $primaryKey = "id";
    protected $fillable = [
        'id','nama','harga','jumlah'];

    public $timestamp = false;

    public function barang_masuks()
    {
        return $this->hasMany(barang_masuks::class);
    }
}