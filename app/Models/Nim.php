<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nim extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_nim'
    ];

    public function mahasiswa() {
        return $this->hasOne(Mahasiswa::class);
    }
}
