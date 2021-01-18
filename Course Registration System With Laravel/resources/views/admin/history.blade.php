@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <p style='font-size: 20px'>List of Created Users</p>
                    
                    
                        
                        
            </div>
            
        </div>
        
    </div>
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Student ID</th>
      <th scope="col">Student Name</th>
      <th scope="col">Course Name</th>
      <th scope="col">Course Instructor</th>
      <th scope="col">Course Semester</th>
      <th scope="col">Enrollment Time</th>
    </tr>
  </thead>
  <tbody>
  @foreach($history as $user)
 <tr>
 <td>{{$user->id}}</td>
 <td>{{$user->student_id}}</td>
 <td>{{$user->student_name}}</td>
 <td>{{$user->course_name}}</td>
 <td>{{$user->course_instructor}}</td>
 <td>{{$user->course_semester}}</td>
 <td>{{$user->created_at}}</td>
 </tr>
 @endforeach
 </tbody>
</table>
</div>
@endsection
