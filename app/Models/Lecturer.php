<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function courses()
    {
    return $this->hasMany(Course::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
