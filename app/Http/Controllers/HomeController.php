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
        $kategori = Buku::all();
        return view('home.index', [
            'buku' => $buku,
            'kategori' => $kategori,
            // 'users' => $users
        ]);
    }

    public function post_search(Request $request)
    {
        $searchquery = $request->search;
        $cari = '%' . $searchquery . '%';
        // $buku = Buku::all();
        $buku = Buku::where('buku_judul','LIKE','%'.$searchquery.'%')->get();
        // $buku = Buku::where('buku_judul', 'LIKE', '%$searchquery%')->get();
        // $buku = Buku::where('buku_judul', 'LIKE', $cari)
        //         ->orWhere('buku_kategori', 'LIKE', $cari)
        //         ->orWhere('buku_penerbit', 'LIKE', $cari)
        //         ->orWhere('buku_penulis', 'LIKE', $cari)
        //         ->orWhere('buku_tahunterbit', 'LIKE', $cari)
        //         ->get();

        // return ['buku' => $buku];
        return response()->json([
            'buku' => $buku
        ]);

        // ['buku_judul','buku_kodekategori','buku_penerbit','buku_penulis','buku_tahunterbit','buku_jumlahhalaman','buku_support_rekomendasi']
    }
}
