<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $kategori = Kategori::all();
        return view('home.index', [
            'buku' => $buku,
            'kategori' => $kategori,
        ]);
    }

    public function post_search(Request $request)
    {
        $searchquery = $request->search;
        $cari = '%' . $searchquery . '%';
        $kategori = Kategori::all();
        $buku = Buku::where('buku_judul','LIKE','%'.$searchquery.'%')->get();
        return response()->json([
            'buku' => $buku,
            'kategori' => $kategori,
        ]);
    }

    public function post_search_kategori(Request $request)
    {
        $searchquery = $request->search;
        $kategori = Kategori::find(intval($searchquery));
        $buku = Buku::where('kategori_id', $kategori->id)->get();
        return response()->json([
            'buku' => $buku,
            'kategori' => $kategori,
        ]);
    }
}
