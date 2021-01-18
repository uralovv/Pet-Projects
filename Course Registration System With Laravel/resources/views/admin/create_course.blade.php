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

                    Create New Course
                </div>
            </div>
        </div>
        
    </div>
    <div class="row justify-content-center">
   
    <form action="/admin/create_course" method = "POST">
    @csrf
    <br><br>
  <div class="form-group">
    <label for="email">Course Code:</label>
    <input type="text" class="form-control" placeholder="Enter Course Code" id="email" name="course_code" required>
    <span style ="color:red">@error('course_code'){{$message}}@enderror</span>
  </div>
  <div class="form-group">
  <label for="email">Course Name:</label>
    <input type="text" class="form-control" placeholder="Enter Course Name" id="email" name="course_name" required>
    <span style ="color:red">@error('course_name'){{$message}}@enderror</span>
  </div>
  <div class="form-group">
  <label for="email">Course Instructor:</label>
    <input type="text" class="form-control" placeholder="Enter Course Instructor" id="email" name="course_instructor" required>
    <span style ="color:red">@error('course_instructor'){{$message}}@enderror</span>
  </div>
  <div class="form-group">
  <label for="email">Course Seat Limit:</label>
    <input type="number" class="form-control" placeholder="Enter Course Seat Limit" id="email" name="course_seat_limit" required>
    <span style ="color:red">@error('course_seat_limit'){{$message}}@enderror</span>
  </div>
  <div class="form-group">
  <label for="email">Course Credits:</label>
    <input type="number" class="form-control" placeholder="Enter Course Credits" id="email" name="course_credits" required>
    <span style ="color:red">@error('course_credits'){{$message}}@enderror</span>
  </div>
  <div class="form-group">
  <label for="email">Course Semester:</label>
    <input type="text" class="form-control" placeholder="Enter Course Semester" id="email" name="course_semester" required>
    <span style ="color:red">@error('course_semester'){{$message}}@enderror</span>
  </div>

  <div class="form-group">
  <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
</div>
</div>

@endsection
