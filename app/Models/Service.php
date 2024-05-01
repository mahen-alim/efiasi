<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipe_service', // Assuming 'tipe_service' instead of 'type'
        'price',
        'description',
        'benefit',
        'duration',
        'file',
    ];

    public function reports()
    {
        return $this->hasOne(Report::class, 'report_service')->withTimeStamps();
    }

    public function incomes()
    {
        return $this->hasOne(Income::class, 'service_id');
    }

}
