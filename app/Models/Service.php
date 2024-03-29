<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = ['tipe_service', 'price', 'sparepart', 'qty', 'file'];

    public function reports()
    {
        return $this->belongsToMany(Report::class, 'report_service')->withTimeStamps();
    }
}
