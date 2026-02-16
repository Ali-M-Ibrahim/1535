<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Grade;
use App\Models\Passport;
use App\Models\Student;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index(){

        // SELECT * FROM STUDENTS WHERE ID=?;
        $row = Student::find(1);
        $passport = $row->getPassport;
        $grades = $row->getGrades;
        $relatedCourses = $row->getCourses;
//        return $relatedCourses;

//        $passport = Passport::find(1);
//        $std = $passport->getStudent;
//        return $std;

//        $grade = Grade::find(1);
//        $student = $grade->getStudent;
//        return $student;


        $course = Course::find(2);
        $relatedStudents = $course->getStudents;
        return $relatedStudents;

    }
}
