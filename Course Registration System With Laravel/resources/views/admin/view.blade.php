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

                    List of Created Courses
                    <p>{{session('msg_del')}}</p>
                    <p>{{session('msg_edit')}}</p>
                </div>
                
            </div>
            
        </div>
        <br><br>
        <br>
        <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Course Code</th>
      <th scope="col">Course Name</th>
      <th scope="col">Course Instructor</th>
      <th scope="col">Course Seat Limit</th>
      <th scope="col">Course Credits</th>
      <th scope="col">Course Semester</th>
      <th scope="col">Action</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($courses as $course)
    <tr>
      
      <td>{{$course->course_code}}</td>
      <td>{{ $course->course_name }}</td>
      <td>{{$course->course_instructor}}</td>
      <td>{{$course->course_seat_limit}}</td>
      <td>{{$course->course_credits}}</td>
      <td>{{$course->course_semester}}</td>
      <td><a href="courses/edit/{{$course->id}}" class='btn btn-primary' role='button'>Edit</a></td>
      <td><a href="courses/delete/{{$course->id}}" class='btn btn-danger' role='button'>Delete</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
    </div>
    
    
    
</div>

</div>

@endsection
