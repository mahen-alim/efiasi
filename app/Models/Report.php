<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable = ['tipe_service', 'sparepart', 'qty', 'price_total', 'income', 'trans_time', 'money_type'];

    public function spareparts()
    {
        return $this->belongsToMany(Sparepart::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'report_service');
    }

    public function operationals()
    {
        return $this->belongsToMany(Operational::class, 'operational_report');
    }
}
