<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    // Tentukan nama kolom kunci primer
    // protected $primaryKey = 'id_service';

    protected $guarded = ['id'];
}
