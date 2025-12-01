<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    // GET /kamar
    public function index()
    {
        // ambil kamar yang tersedia saja
        $kamar = Kamar::where('status', 'tersedia')->get();

        return view('kamar.index', compact('kamar'));
    }

    // GET /kamar/{id}
    public function show($id)
    {
        $kamar = Kamar::where('id_kamar', $id)->firstOrFail();

        return view('kamar.show', compact('kamar'));
    }
}
