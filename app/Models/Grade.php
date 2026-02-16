<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    public function getStudent(){
        return $this->belongsTo(Student::class,'student_id','id');
    }
}
