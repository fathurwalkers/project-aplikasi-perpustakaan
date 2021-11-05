<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Buku;
use App\Models\Kategori;

class KategoriBuku extends Model
{
    use HasFactory;
    protected $table = 'buku_kategori';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
