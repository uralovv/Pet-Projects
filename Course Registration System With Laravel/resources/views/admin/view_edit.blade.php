@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit') }}</div>

                <div class="card-body">
                    <form method="POST" action="/admin/courses">
                        @csrf
                        
                         <input type="hidden" name='id'value="{{$course['id']}}">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Course Code') }}</label>

                            <div class="col-md-6">
                                <input id="course_code" type="text" class="form-control @error('course_code') is-invalid @enderror" name="course_code" value="{{$course['course_code']}}" required autocomplete="course_code" autofocus>

                                @error('course_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="course_name" class="col-md-4 col-form-label text-md-right">{{ __('Course Name') }}</label>

                            <div class="col-md-6">
                                <input id="course_name" type="text" class="form-control @error('course_name') is-invalid @enderror" name="course_name" value="{{$course['course_name']}}" required autocomplete="course_name">

                                @error('course_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="course_instructor" class="col-md-4 col-form-label text-md-right">{{ __('Course Instructor') }}</label>

                            <div class="col-md-6">
                                <input id="course_instructor" type="text" class="form-control @error('course_instructor') is-invalid @enderror" name="course_instructor" value="{{$course['course_instructor']}}" required autocomplete="course_instructor" autofocus>

                                @error('course_instructor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="course_seat_limit" class="col-md-4 col-form-label text-md-right">{{ __('Course Seat Limit') }}</label>

                            <div class="col-md-6">
                                <input id="course_seat_limit" type="text" class="form-control @error('course_seat_limit') is-invalid @enderror" name="course_seat_limit" value="{{$course['course_seat_limit']}}" required autocomplete="course_seat_limit" autofocus>

                                @error('course_seat_limit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="course_credits" class="col-md-4 col-form-label text-md-right">{{ __('Course Credits') }}</label>

                            <div class="col-md-6">
                                <input id="course_credits" type="text" class="form-control @error('course_credits') is-invalid @enderror" name="course_credits" value="{{$course['course_credits']}}" required autocomplete="course_credits" autofocus>

                                @error('course_credits')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="course_semester" class="col-md-4 col-form-label text-md-right">{{ __('Course Semester') }}</label>

                            <div class="col-md-6">
                                <input id="course_semester" type="text" class="form-control @error('course_semester') is-invalid @enderror" name="course_semester" value="{{$course['course_semester']}}" required autocomplete="course_semester" autofocus>

                                @error('course_semester')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        

                       

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
