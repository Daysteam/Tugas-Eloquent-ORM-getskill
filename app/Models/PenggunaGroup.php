<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenggunaGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'pengguna_id',
        'group_id'
    ];
}
