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
                     
                    Here You Can Enroll For New Courses
                </div>
                
            </div>
            <br>
            <form action = '/user/register' method='POST'>
            @csrf
  <div class="form-group">
    <label for="formGroupExampleInput">Choose Your Course:</label> <br>
    <select name="course_name" id="">
     @foreach($classname_array as $data)
     <option value="{{ $data->course_name }}"> {{ $data->course_name }}</option>
     @endforeach
     </select>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput">Choose Course Instructor:</label> <br>
    <select name="course_instructor" id="">
     @foreach($classname_array as $data)
     <option value="{{ $data->course_instructor }}"> {{ $data->course_instructor }}</option>
     @endforeach
     </select>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput">Choose Course Semester:</label> <br>
    <select name="course_semester" id="">
     @foreach($classname_array as $data)
     <option value="{{ $data->course_semester }}"> {{ $data->course_semester }}</option>
     @endforeach
     </select>
  </div>
  <button class="btn btn-primary">
  Enroll</button>
</form>
        </div>
        
    </div>
    
</div>
@endsection
