<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timeslot extends Model
{
    /** @use HasFactory<\Database\Factories\TimeslotFactory> */
    use HasFactory;

    protected $fillable = ['sport_id', 'starts_at', 'ends_at', 'capacity'];

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

}
