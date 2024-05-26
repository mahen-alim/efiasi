<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_mobil',
        'keluhan',
        'harga',
        'gambar',
        'tanggal_pemesanan',
        'service_id'
    ];
}
