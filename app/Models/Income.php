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
        return $this->belongsToMany(Service::class, 'service_id');
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_id');
    }
}
