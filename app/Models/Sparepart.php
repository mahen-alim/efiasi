<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sparepart extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function reports()
    {
        return $this->belongsToMany(Report::class, 'report_sparepart');
    }

    public function outcomes()
    {
        return $this->belongsToMany(Outcome::class, 'sparepart_id', 'id');
    }

}
