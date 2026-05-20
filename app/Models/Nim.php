<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nim extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_nim',
        'mahasiswa_id'
    ];

    public function mahasiswa() {
        return $this->belongsTo(Mahasiswa::class);
    }
}
