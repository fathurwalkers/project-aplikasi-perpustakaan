<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $buku = Buku::all();
        $kategori = Buku::all();
        return view('home.index', [
            'buku' => $buku,
            'kategori' => $kategori,
        ]);
    }
}
