<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    /* public function getStudentID(){
    return Enrollment::where('student_id',$this->student_id)->first()->student_id;
    } */
    

}

/* @foreach($enrollments as $course)
    <tr>
      
      <td>{{$course->student_id}}</td>
      <td>{{$course->course_name }}</td>
      <td>{{$course->course_instructor}}</td>
      <td>{{$course->course_semester}}</td>
    </tr>
    @endforeach */