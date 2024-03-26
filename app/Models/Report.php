<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable = ['service_id', 'tipe_service', 'sparepart', 'qty', 'price_total', 'income', 'trans_time', 'money_type'];

    public function spareparts()
    {
        return $this->belongsToMany(sparepart::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'report_service')->withTimestamps();
    }

    public function operationals()
    {
        return $this->belongsToMany(Operational::class, 'operational_report');
    }
    
}
