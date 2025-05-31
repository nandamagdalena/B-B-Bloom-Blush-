<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $guarded = [];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }



    public function detailPenjualans()
    {
        return $this->hasMany(DetailPenjualan::class);
    }
}
