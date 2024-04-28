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
        return $this->belongsToMany(Service::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'income_id', 'id');
    }
}
