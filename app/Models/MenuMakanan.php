<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuMakanan extends Model
{
    protected $fillable = [
        'nama',
        'deskripsi',
        'kategori',
        'harga',
        'foto',
    ];
    use HasFactory;
}
