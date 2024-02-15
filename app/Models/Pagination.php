<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagination extends Model
{
    use HasFactory;

    protected $table = 'services'; 

    protected $fillable = [
        'tipe_service', 'price', 'sparepart', 
      
    ];
   
}
