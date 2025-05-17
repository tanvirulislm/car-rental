<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'car_id',
        'start_date',
        'end_date',
        'total_cost'
    ];


    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'total_cost' => 'decimal:2'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function car()
    {
        return $this->belongsTo(Car::class);
    }


    public function getDurationAttribute()
    {
        return $this->start_date->diffInDays($this->end_date) + 1;
    }


    public function getIsActiveAttribute()
    {
        $today = now()->startOfDay();
        return $today->between($this->start_date, $this->end_date);
    }


    public function getIsUpcomingAttribute()
    {
        return $this->start_date->isAfter(now()->startOfDay());
    }


    public function getIsCompletedAttribute()
    {
        return $this->end_date->isBefore(now()->startOfDay());
    }
}
