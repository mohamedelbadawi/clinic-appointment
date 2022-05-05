<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = ['request', 'status', 'doctor_id', 'user_id', 'appointment_time', 'amount', 'appointment_day', 'amount'];
    // protected $casts = [
    //     'appointment_time' => 'datetime:Y-m-d',
    // ];

    // public function getAppointmentTime()
    // {
    //     return $this->appointment_time->format("h:i");
    // }
    public function createdAt()
    {
        return $this->created_at->diffForHumans();
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function patient()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
