@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <p style='font-size: 20px'>List of Created Users</p>
                    <p style='font-size: 17px'>{{session('msg')}}</p>
                    <br><br>
                    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Student Name</th>
      <th scope="col">Student Email</th>
      <th scope="col">Student ID</th>
      <th scope="col">Action</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($users as $user)
 <tr>
 <td>{{$user->name}}</td>
 <td>{{$user->email}}</td>
 <td>{{$user->student_id}}</td>
<td><a href="update/{{$user->id}}" class="btn btn-primary" role="button" aria-pressed='true'>Edit</a></td>
<td><a href="delete/{{$user->id}}" class="btn btn-danger" role="button" aria-pressed='true'>Delete</a></td>


<!--<a href="#" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Primary link</a>-->
  
  
 </tr>
 @endforeach
 </tbody>
</table>
                        
                        
            </div>
        </div>
    </div>
</div>
@endsection
