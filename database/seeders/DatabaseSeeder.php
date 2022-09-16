<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Arr;
use App\Models\Login;
use App\Models\Buku;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        // ADMIN
        $token = Str::random(16);
        $role = "admin";
        $hashPassword = Hash::make('jancok', [
            'rounds' => 12,
        ]);
        $hashToken = Hash::make($token, [
            'rounds' => 12,
        ]);
        Login::create([
            'login_nama' => 'FathurWalkers',
            'login_username' => 'fathurwalkers',
            'login_password' => $hashPassword,
            'login_email' => 'fathurwalkers44@gmail.com',
            'login_telepon' => '085342072185',
            'login_token' => $hashToken,
            'login_level' => $role,
            'login_status' => "verified",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $token = Str::random(16);
        $role = "admin";
        $hashPassword = Hash::make('11223344', [
            'rounds' => 12,
        ]);
        $hashToken = Hash::make($token, [
            'rounds' => 12,
        ]);
        Login::create([
            'login_nama' => 'Yuyun',
            'login_username' => 'yuyun',
            'login_password' => $hashPassword,
            'login_email' => 'yuyun@gmail.com',
            'login_telepon' => '085342072185',
            'login_token' => $hashToken,
            'login_level' => $role,
            'login_status' => "verified",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // ---------------------------------------------------------------------------

        // Petugas
        $token = Str::random(16);
        $role = "petugas";
        $hashPassword = Hash::make('petugas', [
            'rounds' => 12,
        ]);
        $hashToken = Hash::make($token, [
            'rounds' => 12,
        ]);
        Login::create([
            'login_nama' => 'Petugas 1',
            'login_username' => 'petugas',
            'login_password' => $hashPassword,
            'login_email' => 'petugas@gmail.com',
            'login_telepon' => '085342072185',
            'login_token' => $hashToken,
            'login_level' => $role,
            'login_status' => "verified",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // ---------------------------------------------------------------------------

        // User Pertama
        $token = Str::random(16);
        $role = "user";
        $hashPassword = Hash::make('user1234', [
            'rounds' => 12,
        ]);
        $hashToken = Hash::make($token, [
            'rounds' => 12,
        ]);
        Login::create([
            'login_nama' => 'User 1',
            'login_username' => 'user1',
            'login_password' => $hashPassword,
            'login_email' => 'user1@gmail.com',
            'login_telepon' => '085342072185',
            'login_token' => $hashToken,
            'login_level' => $role,
            'login_status' => "verified",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // ---------------------------------------------------------------------------

        // User Kedua
        $token = Str::random(16);
        $role = "user";
        $hashPassword = Hash::make('user1234', [
            'rounds' => 12,
        ]);
        $hashToken = Hash::make($token, [
            'rounds' => 12,
        ]);
        Login::create([
            'login_nama' => 'User 2',
            'login_username' => 'user2',
            'login_password' => $hashPassword,
            'login_email' => 'user2@gmail.com',
            'login_telepon' => '085342072185',
            'login_token' => $hashToken,
            'login_level' => $role,
            'login_status' => "verified",
            'created_at' => now(),
            'updated_at' => now()
        ]);




        // DATABASE SEEDER UNTUK KATEGORI
        $array_nama_kategori = [
            'Karya Umum',
            'Filsafat',
            'Agama',
            'Ilmu-ilmu Sosial',
            'Sastra',
            'Sastra Indonesia',
            'Sastra Inggris',
            'Ilmu-ilmu Murni',
            'Ilmu-ilmu Terapan',
            'Kesenian, Hiburan dan Olahraga',
            'Kesusastraan',
            'Geografi dan Sejarah',
            'Jurnal (Teori & Praktik)',
            'Bahasa Pemrograman',
            'Penanganan Ternak',
            'Informasi dan Teknologi',
            'Ensiklopedia',
            'Bisnis',
            'Humor',
            'Pertanian',
            'Budidaya Ternak',
            'Kebidanan',
            'Politik',
            'Moral',
            'Biologi',
            'Psikologi',
            'Akuntansi',
            'Pendidikan Anak Usia Dini',
            'Kesehatan',
            'Ekonomi',
            'Flora',
            'Fauna',
            'Matematika',
            'Teknik',
            'Mesin',
            'Ilmu Astronomi',
            'Ternak',
            'Statistik',
            'Sains',
            'Manajemen',
            'Ilmu Sejarah',
            'RPUL',
        ];

        $array_kode_kategori = [
            '000',
            '100',
            '200',
            '300',
            '400',
            '500',
            '600',
            '700',
            '800',
            '900'
        ];
        $kode_kategori_default = 100;
        for ($i = 0; $i < count($array_nama_kategori); $i++) {
            $kode_kategori = $kode_kategori_default + $i;
            Kategori::create([
                'kategori_nama' => $array_nama_kategori[$i],
                // 'kategori_kode' => $array_kode_kategori[$i],
                'kategori_kode' => $kode_kategori,
            ]);
        }
    }
}
