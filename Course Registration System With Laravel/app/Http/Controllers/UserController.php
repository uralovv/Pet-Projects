<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;
use App\Models\Enrollment;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //Preventing unauthorized users accessing page
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('user.index');
    }
    public function view(){
        return view('user.profile');
    }
    public function enroll(){
        return view('user.enroll');
    }
    //Storing User's Enrollment details
    public function store(){
        $enrollment = new Enrollment();
        $enrollment->student_name = Auth::user()->name;
        $enrollment->course_name = request('course_name');
        $enrollment->course_instructor = request('course_instructor');
        $enrollment->course_semester = request('course_semester');
        $enrollment->student_id = Auth::user()->student_id;

        $enrollment->save();

        return redirect('/user')->with('msg','Registered Successfully !');

    }
    //Showing Enrollment History using Student's ID
    public function history(){
        
        $enrollments = Enrollment::where('student_id',Auth::user()->student_id)->get();
        return view('user.history',['enrollments'=>$enrollments]);
    }
}
