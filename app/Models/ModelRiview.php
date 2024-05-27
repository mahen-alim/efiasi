<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelRiview extends Model
{
    use HasFactory;

    protected $table = 'ulasan';
    protected $primaryKey = "id_ulasan"; // Specify the correct primary key column
    public $incrementing = true;
    public $timestamps = true;


    protected $fillable = [
        'id_ulasan',
        'ulasan',
        'id',
    ];
}
