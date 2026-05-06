<?php

namespace App\Http\Controllers;

use App\Models\Pembeli;

class PembeliController extends Controller
{
    public function index () {
        $pembelis = Pembeli::with('barang')->get();

        return view('pembeli.index', compact('pembelis'));
    }
}
