<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Pembeli extends Authenticatable
{
    use notifiable, HasFactory;
    protected $guarded = [];

    public function penjualans()
    {
        return $this->hasMany(Penjualan::class);
    }
}
