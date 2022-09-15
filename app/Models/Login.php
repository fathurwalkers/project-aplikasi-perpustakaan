<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pinjaman;

class Login extends Model
{
    use HasFactory;
    protected $table = 'login';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function pinjaman()
    {
        return $this->hasMany(Pinjaman::class);
    }
}
