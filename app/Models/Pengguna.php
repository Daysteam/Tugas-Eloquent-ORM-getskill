<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name_pengguna'
    ];

    public function group()
    {
        return $this->belongsToMany(Group::class,'pengguna_groups');
    }
}
