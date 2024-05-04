<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outcome extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function operational()
    {
        return $this->hasMany(Operational::class, 'operational_id');
    }
}
