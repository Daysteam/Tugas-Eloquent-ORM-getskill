<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembeli extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pembeli',
    ];

    // 1 pembeli punya banyak barang
    public function barangs()
    {
        return $this->hasMany(Barang::class, 'pembeli_id');
    }
}