<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use App\Models\Enrollment;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    //Preventing Users to access Admin Panel
    public function __construct(){
        $this->middleware('role:administrator');
    }

    public function index(){
        return view('admin.index');
    }
    public function create_course(){
        $courses = Course::all();
        return view('admin.create_course');
    }
    //Storing created courses and applying validations 
    public function store(Request $req){
        $validator = $req->validate([
            'course_code'=>'unique:courses',
            'course_name' => 'unique:courses',
            'course_semester'=>'unique:courses'
        ]);
        $course = new Course();

        $course->course_code = request('course_code');
        $course->course_name = request('course_name');
        $course->course_instructor = request('course_instructor');
        $course->course_seat_limit = request('course_seat_limit');
        $course->course_credits = request('course_credits');
        $course->course_semester = request('course_semester');
        
        $course->save();
        //Redirecting to Admin's main page with session message after creating course
        return redirect('/admin')->with('message', 'Course Created Successfully ! ');
    }
    
    public function view(){
        $courses = Course::all();
        return view('admin.view',['courses'=>$courses]);
    }
    public function register(){
        $users = User::all();
        return view('admin.register');
    }
    // Creating new Students and applying validations 
    protected function create(Request $req)
    {
        
       $validator = $req->validate([
           'name' => ['required','string','max:50'],
           'email'=>['required','string','email','max:100','unique:users'],
           'student_id'=>['required','string','min:9','max:9','unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
       ]);
      

       $user =  User::create([
        'name' => request('name'),
        'email' => request('email'),
        'student_id'=>request('student_id'),
        'password' => Hash::make(request('password')),
    ]);
    $user->attachRole('user');

       return redirect('/admin')->with('msg','Student Created Successfully !');

    }
    //Listing all created Students
    public function list(){
        $users = User::all();
        return view('admin.list',['users'=>$users]);
    }
    //Listing all students' enrollment history
    public function history(){
        $history = Enrollment::all();
        return view('admin.history',['history'=>$history]);
    }
    //Deleting Student
    public function destroy($id){
        $data = User::findOrFail($id);
        $data->delete();
        return redirect('/admin')->with('msg_del', 'Student Deleted Successfully !');
    }
    public function show($id){
        $data =  User::findOrFail($id);
        return view('admin.edit',['data'=>$data]);
    }
    //Editing Student Details
    public function update(Request $req){
        $data = User::findOrFail($req->id);
        $data->name = $req->name;
        $data->email = $req->email;
        $data->student_id = $req->student_id;

        $data->save();
        return redirect('/admin/students')->with('msg','Changes Saved !');
    }
    public function view_courses($id){
     $course = Course::findOrFail($id);
     return view('admin.view_edit',['course'=>$course]);
    }
    //Deleting created course
    public function destroy_course($id){
        $data_course = Course::findOrFail($id);
        $data_course->delete();
        return redirect('/admin/courses')->with('msg_del', 'Course Deleted !');
    }
    //Editing created course details
    public function edit_course(Request $request){
        $data = Course::findOrFail($request->id);
        $data->course_code = $request->course_code;
        $data->course_name = $request->course_name;
        $data->course_instructor = $request->course_instructor;
        $data->course_seat_limit = $request->course_seat_limit;
        $data->course_credits = $request->course_credits;
        $data->course_semester = $request->course_semester;

        $data->save();

        return redirect('/admin/courses')->with('msg_edit','Course Edited !');
    }
}
