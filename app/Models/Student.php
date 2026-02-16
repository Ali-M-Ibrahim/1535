<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function getPassport(){
        return $this->hasOne(Passport::class);
    }

    public function getGrades(){
        return $this->hasMany(Grade::class);
    }

    public function getCourses(){
        return $this->belongsToMany(
            Course::class,
            'course_students',
            'student_id',
            'course_id'
        );
    }
}
