<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model

{
    protected $fillable = [
        'name',
        'about',
        'image',
        'speciality_id'
    ];
    use HasFactory;
    public function speciality()
    {
        return $this->belongsTo(Speciality::class);
    }
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('name', 'like', $term);
        });
    }
}
