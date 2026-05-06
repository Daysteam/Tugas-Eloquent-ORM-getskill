<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_mahasiswa',
        'nim_id'
    ];

    public function nim() {
        return $this->belongsTo(Nim::class);
    }
}
