<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipe_service', // Assuming 'tipe_service' instead of 'type'
        'price',
        'description',
        'benefit',
        'duration',
        'file',
        'user_id'
    ];

    public function incomes()
    {
        return $this->hasOne(Income::class, 'service_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

}
