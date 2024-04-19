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
        return $this->hasOne(Report::class, 'report_service')->withTimeStamps();
    }

    public function incomes()
    {
        return $this->belongsToMany(Income::class, 'service_id', 'id');
    }
}
