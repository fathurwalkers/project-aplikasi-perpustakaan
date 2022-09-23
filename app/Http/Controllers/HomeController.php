<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Arr;
use App\Models\Login;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Pinjaman;
use App\Models\PinjamanBuku;

class HomeController extends Controller
{
    public function index()
    {
        $buku = Buku::all();
        $kategori = Buku::all();
        return view('home.index', [
            'buku' => $buku,
            'kategori' => $kategori,
            // 'users' => $users
        ]);
    }

    public function post_search(Request $request)
    {
        $buku = Buku::all();
        $search = $request->search;
        dump($buku);
    }
}
