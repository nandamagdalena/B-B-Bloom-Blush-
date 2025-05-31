<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suplier extends Model
{
    protected $guarded = [];

    public function pembelians()
    {
        return $this->hasMany(Pembelian::class);
    }
}
