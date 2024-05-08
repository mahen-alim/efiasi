<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function services()
    {
        return $this->belongsToMany(Service::class, 'service_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'income_id', 'id');
    }

    public function spareparts()
    {
        return $this->belongsTo(Sparepart::class);
    }

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}
