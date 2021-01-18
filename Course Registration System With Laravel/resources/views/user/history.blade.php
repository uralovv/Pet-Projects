@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <h4>Your Enrollment History</h4>
                    

                    
                </div>
                <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Student ID</th>
      <th scope="col">Course Name</th>
      <th scope="col">Course Instructor</th>
      <th scope="col">Course Semester</th>
    </tr>
  </thead>
  <tbody>
  @foreach($enrollments as $course)
    <tr>
      
      <td>{{$course->student_id}}</td>
      <td>{{$course->course_name }}</td>
      <td>{{$course->course_instructor}}</td>
      <td>{{$course->course_semester}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
            </div>
        </div>
    </div>
</div>
@endsection
