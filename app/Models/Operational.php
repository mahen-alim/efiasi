<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operational extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function outcomes()
    {
        return $this->hasMany(Outcome::class);
    }
}
