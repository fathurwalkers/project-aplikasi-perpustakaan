<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Buku;
use App\Models\Pinjaman;

class PinjamanBuku extends Model
{
    use HasFactory;
    protected $table = 'pinjaman_buku';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
