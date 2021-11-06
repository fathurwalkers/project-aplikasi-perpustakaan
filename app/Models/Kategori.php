<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Buku;
use App\Models\KategoriBuku;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function buku()
    {
        return $this->hasMany(Buku::class);
    }
}
