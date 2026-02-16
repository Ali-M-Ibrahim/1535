<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Passport extends Model
{
    public function getStudent(){
        return $this->belongsTo(Student::class,'student_id','id');
    }
}
