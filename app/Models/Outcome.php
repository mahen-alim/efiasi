<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outcome extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function spareparts()
    {
        return $this->belongsToMany(sparepart::class, 'sparepart_id');
    }

    public function operationals()
    {
        return $this->belongsToMany(Operational::class, 'operational_id');
    }
}
