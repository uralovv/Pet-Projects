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
                     
                    Main Information
                </div>
                <table>
    <tbody>
        <tr>
            <th scope="row">Name:</th>
            <td>{{ Auth::user()->name }}</td>
        </tr>
        <tr>
            <th scope="row">Email:</th>
            <td>{{ Auth::user()->email }}</td>
        </tr>
        <tr>
            <th scope="row">Student ID:</th>
            <td>{{Auth::user()->student_id}}</td>
        </tr>
        
    </tbody>
</table>
            </div>
        </div>
    </div>
</div>
@endsection
