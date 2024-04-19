<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operational extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function reports()
    {
        return $this->hasOne(Report::class, 'operational_report');
    }

    public function outcomes()
    {
        return $this->belongsToMany(Outcome::class, 'operational_id', 'id');
    }
}
