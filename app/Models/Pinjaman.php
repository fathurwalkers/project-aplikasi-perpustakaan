<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Buku;
use App\Models\Login;
use App\Models\PinjamanBuku;

class Pinjaman extends Model
{
    use HasFactory;
    protected $table = 'pinjaman';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function buku()
    {
        return $this->belongsToMany(Buku::class);
    }

    public function login()
    {
        return $this->belongsTo(Login::class);
    }
}
