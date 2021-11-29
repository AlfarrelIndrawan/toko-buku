<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'penulis',
        'tahun_terbit',
        'penulis',
        'kategori',
        'harga',
        'stok',
        'foto',
    ];
}
