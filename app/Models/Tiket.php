<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;

    protected $fillable = ['jenis_tiket', 'tanggal', 'harga_tiket', 'jumlah_tiket', 'desc_tiket'];
}

