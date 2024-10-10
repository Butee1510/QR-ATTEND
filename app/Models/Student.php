<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
    public function courseRegistration()
    {
        return $this->hasMany(CourseRegistration::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_registration');
    }

}
