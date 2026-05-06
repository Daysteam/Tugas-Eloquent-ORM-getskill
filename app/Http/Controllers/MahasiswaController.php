<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index() {
        $mahasiswas = Mahasiswa::with('nim')->get();

        return view('mahasiswa.index',compact('mahasiswas'));
    }
}
