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

class BackController extends Controller
{
    public function index()
    {
        $users = session('data_login');
        $count_users = Login::all()->count();
        $count_buku = Buku::all()->count();
        $count_pinjaman = Pinjaman::all()->count();
        $count_kategori = Kategori::all()->count();
        return view('admin.index', [
            'users' => $users,
            'count_users' => $count_users,
            'count_buku' => $count_buku,
            'count_pinjaman' => $count_pinjaman,
            'count_kategori' => $count_kategori,
        ]);
    }

    public function daftar_buku()
    {
        $findSession = session('data_login');
        $users = Login::find($findSession->id);
        $buku = Buku::all();

        // $arrKategori = [];

        // foreach ($buku as $asdfg) {
        //     foreach ($asdfg->kategori as $kategori) {
        //         $arrKategori = collect([$asdfg]);
        //     }
        // }
        // dd($arrKategori);

        return view('admin.daftar-buku', [
            'users' => $users,
            'buku' => $buku
        ]);
    }

    public function daftar_kategori()
    {
        $findSession = session('data_login');
        $users = Login::find($findSession->id);
        $kategori = Kategori::all();
        return view('admin.daftar-kategori', [
            'users' => $users,
            'kategori' => $kategori
        ]);
    }

    public function daftar_pengguna()
    {
        $findSession = session('data_login');
        $users = Login::find($findSession->id);
        $pengguna = Login::where('login_level', 'user')->get();
        return view('admin.daftar-pengguna', [
            'users' => $users,
            'pengguna' => $pengguna,
        ]);
    }

    public function daftar_laporan()
    {
        $findSession = session('data_login');
        $users = Login::find($findSession->id);
        return view('admin.daftar-laporan', [
            'users' => $users
        ]);
    }

    public function daftar_pinjaman()
    {
        $findSession = session('data_login');
        $users = Login::find($findSession->id);
        // dd($users->login_level);

        if ($users->login_level == 'admin') {
            $pinjaman = Pinjaman::all();
            return view('admin.daftar-pinjaman', [
                'users' => $users,
                'pinjaman' => $pinjaman,
            ]);
        }

        if ($users->login_level == 'user') {
            $pinjaman = Pinjaman::where('login_id', $users->id)->get();
            return view('admin.daftar-pinjaman', [
                'users' => $users,
                'pinjaman' => $pinjaman,
            ]);
        }

    }

    public function konfirmasi_pinjaman(Request $request)
    {
        $findSession = session('data_login');
        $users = Login::find($findSession->id);
        $pinjaman_id = $request->pinjaman_id;
        $pinjaman = Pinjaman::find($pinjaman_id);
        $pinjaman->update([
            'pinjaman_status' => "AKTIF",
            'updated_at' => now(),
        ]);
        return redirect()->route('daftar-pinjaman')->with('berhasil_tambah', 'Berhasil melakukan konfirmasi peminjaman');
    }

    public function konfirmasi_pengembalian(Request $request)
    {
        $findSession = session('data_login');
        $users = Login::find($findSession->id);
        $pinjaman_id = $request->pinjaman_id;
        $pinjaman = Pinjaman::find($pinjaman_id);
        $pinjaman->update([
            'tanggal_kembali' => now(),
            'pinjaman_status' => "BERAKHIR",
            'updated_at' => now(),
        ]);
        return redirect()->route('daftar-pinjaman')->with('berhasil_tambah', 'Berhasil melakukan pengembalian peminjaman');
    }

    public function hapus_pinjaman(Request $request)
    {
        $findSession = session('data_login');
        $users = Login::find($findSession->id);
        $pinjaman_id = $request->pinjaman_id;
        $pinjaman = Pinjaman::find($pinjaman_id);
        $pinjaman->forceDelete();
        return redirect()->route('daftar-pinjaman')->with('berhasil_tambah', 'Buku telah berhasil dihapus!');
    }

    public function profile()
    {
        $findSession = session('data_login');
        $users = Login::find($findSession->id);
        return view('admin.profile', [
            'users' => $users
        ]);
    }

    public function login()
    {
        $users = session('data_login');
        if ($users !== null) {
            return redirect('dashboard')->with('gagal_beralih', 'Anda telah login, tidak dapat beralih ke halaman login!');
        }
        return view('login');
    }

    public function register()
    {
        $users = session('data_login');
        if ($users !== null) {
            return redirect('dashboard')->with('gagal_beralih', 'Anda telah login, tidak dapat beralih ke halaman login!');
        }
        return view('register');
    }

    public function logout(Request $request)
    {
        $request->session()->forget(['data_login']);
        $request->session()->flush();
        return redirect()->route('login')->with('berhasil_logout', 'Anda telah logout!');
    }

    public function post_login(Request $request)
    {
        $cariUser = Login::where('login_username', $request->login_username)->get();
        if ($cariUser->isEmpty()) {
            return back()->with('status_fail', 'Maaf username atau password salah!')->withInput();
        }
        $data_login = Login::where('login_username', $request->login_username)->firstOrFail();
        switch ($data_login->login_level) {
            case 'admin':
                $cek_password = Hash::check($request->login_password, $data_login->login_password);
                if ($data_login) {
                    if ($cek_password) {
                        $users = session(['data_login' => $data_login]);
                        return redirect()->route('dashboard');
                    }
                }
                break;
            case 'petugas':
                $cek_password = Hash::check($request->login_password, $data_login->login_password);
                if ($data_login) {
                    if ($cek_password) {
                        $users = session(['data_login' => $data_login]);
                        return redirect()->route('dashboard');
                    }
                }
                break;
            case 'user':
                $cek_password = Hash::check($request->login_password, $data_login->login_password);
                if ($data_login) {
                    if ($cek_password) {
                        $users = session(['data_login' => $data_login]);
                        return redirect()->route('dashboard');
                    }
                }
                break;
        }
        return back()->with('status_fail', 'Maaf username atau password salah!')->withInput();
    }

    public function post_register(Request $request)
    {
        $login_data = new Login;
        $validatedLogin = $request->validate([
            'login_nama' => 'required',
            'login_username' => 'required',
            'login_password' => 'required',
            'login_email' => 'required',
            'login_telepon' => 'required'
        ]);
        $hashPassword = Hash::make($validatedLogin["login_password"], [
            'rounds' => 12,
        ]);
        $token = Str::random(16);
        $level = "user";
        $login_status = "verified";
        $login_data = Login::create([
            'login_nama' => $validatedLogin["login_nama"],
            'login_username' => $validatedLogin["login_username"],
            'login_password' => $hashPassword,
            'login_email' => $validatedLogin["login_email"],
            'login_telepon' => $validatedLogin["login_telepon"],
            'login_token' => $token,
            'login_level' => $level,
            'login_status' => $login_status,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $login_data->save();
        return redirect()->route('login')->with('berhasil_register', 'Berhasil melakukan registrasi!');
    }

    public function lihat_buku($id)
    {
        $findSession = session('data_login');
        $users = Login::find($findSession->id);
        $id_buku = $id;
        $buku = Buku::find($id_buku);
        return view('admin.lihat-buku', [
            'users' => $users,
            'buku' => $buku
        ]);
    }

    public function tambah_buku()
    {
        $findSession = session('data_login');
        $users = Login::find($findSession->id);
        $kategori = Kategori::all();
        return view('admin.tambah-buku', [
            'users' => $users,
            'kategori' => $kategori
        ]);
    }

    public function tambah_kategori()
    {
        $findSession = session('data_login');
        $users = Login::find($findSession->id);
        return view('admin.tambah-kategori', [
            'users' => $users
        ]);
    }

    public function tambah_pinjaman()
    {
        $findSession = session('data_login');
        $users = Login::find($findSession->id);
        $buku = Buku::all();
        return view('admin.tambah-pinjaman', [
            'users' => $users,
            'buku' => $buku
        ]);
    }

    public function post_tambah_pinjaman(Request $request)
    {
        $request_id_buku = $request->id_buku;
        // dd($request->id_buku);
        // $explode_id_buku = explode(",", $request_id_buku);

        // $id_buku_filtered = array_filter($explode_id_buku);
        $id_buku_filtered = array_filter($request_id_buku);

        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $pinjaman_kode = strtoupper(Str::random(5) . "-" . Str::random(5));
        $validatedData = $request->validate([
            'id_buku'     => 'required|filled',
        ]);

        $parameter_for = count($id_buku_filtered);

        for ($i=0; $i < $parameter_for; $i++) {
            $buku_for = Buku::find($id_buku_filtered[$i]);
            $default_support = intval($buku_for->buku_support_rekomendasi);
            $total_tambah_support = 1 + $default_support;
            $tambah_support = $buku_for->update([
                'buku_support_rekomendasi' => $total_tambah_support,
                'updated_at' => now()
            ]);
        }

        $pinjaman = new Pinjaman;
        $savePinjaman = $pinjaman->create([
            'pinjaman_kode' => $pinjaman_kode,
            'pinjaman_pengguna' => $users->login_nama,
            'pinjaman_status' => "PENDING",
            'tanggal_pinjam' => now(),
            'tanggal_kembali' => null,
            'login_id' => $users->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $savePinjaman->save();
        $savePinjaman->login()->associate($users->id);
        $savePinjaman->buku()->attach($id_buku_filtered);
        return redirect()->route('daftar-pinjaman')->with('berhasil_tambah', 'Berhasil menyimpan Pinjaman Baru.');
    }

    public function post_tambah_kategori(Request $request)
    {
        $findSession = session('data_login');
        $users = Login::find($findSession->id);
        $validatedData = $request->validate([
            'kategori_nama'     => 'required',
            'kategori_kode'     => 'required',
        ]);
        $kategori       = new Kategori;
        $saveKategori   = $kategori->create([
            'kategori_nama'     => $validatedData['kategori_nama'],
            'kategori_kode'     => $validatedData['kategori_kode'],
            'created_at'        => now(),
            'updated_at'        => now()
        ]);
        $saveKategori->save();
        return redirect()->route('daftar-kategori')->with('berhasil_tambah', 'Kategori Baru telah berhasil ditambahkan!');
    }

    public function hapus_kategori(Request $request, $id)
    {
        $findSession = session('data_login');
        $users = Login::find($findSession->id);
        $id_kategori = $id;
        $kategori = Kategori::find($id_kategori);
        $kategori->delete();
        return redirect()->route('daftar-kategori')->with('berhasil_tambah', 'Kategori telah berhasil dihapus!');
    }

    public function post_tambah_buku(Request $request)
    {
        $findSession = session('data_login');
        $users = Login::find($findSession->id);
        $buku_kode = strtoupper(Str::random(5) . "-" . Str::random(5));
        $validatedData = $request->validate([
            'buku_judul'            => 'required',
            'buku_penulis'          => 'required',
            'buku_penerbit'         => 'required',
            'buku_tahunterbit'      => 'required',
            'buku_jumlahhalaman'    => 'required',
            'buku_kodekategori'     => 'required',
            'id_kategori'           => 'required|filled'
        ]);
        $id_kategori = intval($validatedData['id_kategori']);
        $kategori = Kategori::find($id_kategori);

        $buku_baru = new Buku;

        $saveBuku = $buku_baru->create([
            'buku_judul'                => $validatedData['buku_judul'],
            'buku_kode'                 => $buku_kode,
            'buku_kodekategori'         => $validatedData['buku_kodekategori'],
            'buku_penerbit'             => $validatedData['buku_penerbit'],
            'buku_penulis'              => $validatedData['buku_penulis'],
            'buku_tahunterbit'          => $validatedData['buku_tahunterbit'],
            'buku_jumlahhalaman'        => $validatedData['buku_jumlahhalaman'],
            'buku_support_rekomendasi'  => 0,
            'created_at'                => now(),
            'updated_at'                => now()
        ]);
        $saveBuku->kategori()->associate($kategori->id);
        $saveBuku->save();
        return redirect()->route('daftar-buku')->with('berhasil_tambah', 'Buku telah berhasil ditambahkan!');
    }

    public function edit_buku($id)
    {
        $findSession = session('data_login');
        $users = Login::find($findSession->id);
        $id_buku = $id;
        $buku = Buku::find($id_buku);
        $kategori = Kategori::all();
        return view('admin.edit-buku', [
            'users' => $users,
            'buku' => $buku,
            'kategori' => $kategori
        ]);
    }

    public function update_buku(Request $request, $id)
    {
        $katid = intval($request->id_kategori);
        $id_kategori = $katid;
        $findSession = session('data_login');
        $users = Login::find($findSession->id);
        $id_buku = $id;
        $buku = Buku::find($id_buku);
        if($request->id_kategori == null){
            $id_kategori = $buku->kategori_id;
        } else {
            $id_kategori = $request->id_kategori;
        }
        $updateBuku = $buku->update([
            'buku_judul'                => $request->buku_judul,
            'buku_kodekategori'         => $request->buku_kodekategori,
            'buku_penerbit'             => $request->buku_penerbit,
            'buku_penulis'              => $request->buku_penulis,
            'buku_tahunterbit'          => $request->buku_tahunterbit,
            'buku_jumlahhalaman'        => $request->buku_jumlahhalaman,
            'updated_at'                => now()
        ]);
        $buku->kategori()->dissociate($buku->kategori->id);
        $buku->kategori()->associate($id_kategori);
        $buku->save();
        return redirect()->route('daftar-buku')->with('berhasil_tambah', 'Buku telah berhasil diubah!');
    }

    public function hapus_buku(Request $request, $id)
    {
        $findSession = session('data_login');
        $users = Login::find($findSession->id);
        $id_buku = $id;
        $buku = Buku::find($id_buku);
        $buku->kategori()->dissociate($buku->kategori_id);
        $buku->delete();
        return redirect()->route('daftar-buku')->with('berhasil_tambah', 'Buku telah berhasil dihapus!');
    }

    public function generate_buku()
    {
        $faker = Faker::create('id_ID');
        $buku_kode = strtoupper(Str::random(5) . "-" . Str::random(5));
        $kategori = Kategori::all()->toArray();

        $array_buku_judul = [
            'Pedoman Budidaya Jamur',
            'Pedoman Bertanam Coklat',
            'Kamus Praktik Keperawatan',
            'Pedoman Budidaya Ikan Gurami',
            'Pedoman Budidaya Ikan Nila',
            'Pedoman Budidaya Tambak Udang',
            'Pedoman Bertanam Bunga Mawar',
            'Nutrisi Janin & Bayi Sejak Usia Dalam Kandungan',
            'Panduan Budidaya Belut Secara Intensif',
            'Lobster Air Tawar Budi Daya dan Pascapanen',
            'Bahasa Indonesia',
            'Confidence',
            'Kado Buat Ayah Bunda',
            'Pilar-Pilar Kebahagiaan',
            'Materi Pokok Metode Penelitian',
            'Psikologi Praktis Remaja',
            'Dasar-Dasar Teknik Jahit Menjahit ',
            'Filsafat Ilmu Sebuah Pengantar Populer ',
            'Menyegarkan Islam Kita',
            'Jangan Sakiti Rasulullah Al-Musthafa',
            'Mudah Belajar Ruby ',
            'Sistem Informasi Manajemen',
            'RPUL (Rangkuman Pengetahuan Umum Lengkap)',
            '125 Tips Menguasai Bahasa PHP',
            '100 Cara Mengenali Karakter Dia',
            'Jurnalistik Teori dan Praktik',
            'Etika & Manajemen Kebidanan',
            'Psikologi Faal',
            'Akuntansi Intermediate',
            'Pengantar Psikologi untuk Kebidanan',
            'Etika Prosesi Kebidanan ',
            'Keajaiban Kekuatan Pikiran',
            'Dakwah Kampus',
            'Tradisi Islami  Panduan Prosesi Kelahiran, Perkawinan, Kematian',
            'Mengupas Seksualitas',
            'Biografi Muhammad Rasulullah',
            'Materi pokok Manajemen',
            'Tumbuh Kembang Remaja Dan Permasalahanya',
            'Materi pokok statistika',
            'Pengantar Ilmu Kebidanan',
            'Metode Inventaris Sumber Daya Lahan',
            'Pedoman Budidaya Kepiting',
            'Pedoman Bertanam Cabai',
            'Pedoman Bertanam Ubi',
            'Pedoman Bertanam Tomat',
            'Pedoman Bertanam Gandum',
            'Pedoman Ilmu Filsafat',
            'Pedoman Ilmu Rukun Islam',
        ];

        $array_buku_penerbit = [
            'Tim Karyan Mandiri',
            'Khasiko Publisher',
            'Nuansa Aulia',
            'Aneka Ilmu',
            'Dara Book',
            'Elex Media',
            'Penerbit Libri',
            'Media Komputindo',
            'Jaya Ilmu',
            'Serambi Ilmu Semesta'
        ];
        // dd($random_penerbit);
        // die;

        $count_array_judul_buku = count($array_buku_judul);

        for ($i = 1; $i < $count_array_judul_buku; $i++) {
            $random_support_rekomendasi = $faker->randomNumber(2);
            $random_penerbit = Arr::random($array_buku_penerbit);
            $kategori_random = Arr::random($kategori);
            $saveBuku = new Buku;
            $newbuku = $saveBuku->create([
                // 'buku_judul'                => $faker->words($faker->randomDigitNot(0), true),
                'buku_judul'                => $array_buku_judul[$i],
                'buku_kode'                 => $buku_kode,
                'buku_kodekategori'         => $faker->randomNumber(3) . "." . $faker->randomNumber(3),
                'buku_penulis'              => $faker->name,
                'buku_penerbit'             => $random_penerbit,
                'buku_tahunterbit'          => "201" . $faker->randomNumber(1),
                'buku_jumlahhalaman'        => $faker->randomNumber(3),
                'buku_support_rekomendasi'  => intval($random_support_rekomendasi),
                'kategori_id'               => $kategori_random["id"],
                'created_at'                => now(),
                'updated_at'                => now()
            ]);
            // $newbuku->kategori()->associate($kategori_idx);
            $newbuku->save();
        }
        $buku = Buku::all();
        dd($buku);
        die;
        return redirect()->route('daftar-buku')->with('berhasil_tambah', 'Berhasil generate 50 buku!');
    }
}
