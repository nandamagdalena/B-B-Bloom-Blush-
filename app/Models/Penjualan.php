<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $guarded = [];

    public function pembeli()
    {
        return $this->belongsTo(Pembeli::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function detailPenjualans()
    {
        return $this->hasMany(DetailPenjualan::class);
    }

    public function barang(){
        return $this->belongsTo(Barang::class, 'barang_id');
    }


}
