<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function students()
    {
    return $this->belongsToMany(Student::class, 'course_registration');
    }

}
