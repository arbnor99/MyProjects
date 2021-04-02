@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 style="background-color:darkgrey">Dashboard</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h3>Users</h3>
                <table class="table table-striped">
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th></th>
                    </tr>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->role}}</td>
                            @if(Auth::user()->role=="admin")
                            @if($user->role!="admin")
                            <td><a href="{{route('delete_user', [$user])}}" class="btn btn-danger">Remove Teacher</a></td>
                            @endif
                            @endif
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h3>User Requests</h3>
                @if($countUR!=0)
                <table class="table table-striped">
                    <tr>
                        <th>Name</th>
                        <th>Experience</th>
                        <th></th>
                    </tr>
                    @foreach($userRequests as $req)
                        <tr>
                            <td>{{$req->name}}</td>
                            <td>{{$req->experience}}</td>
                            <td><a href="{{route('accept_user', [$req])}}" class="btn btn-primary">Accept Request</a></td>
                            <td><a href="{{route('decline_user', [$req])}}" class="btn btn-danger">Decline Request</a></td>
                        </tr>
                    @endforeach
                </table>
                @else
                    <div class="alert alert-info">There are no user requests currently!</div>
                @endif
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h3>Courses</h3>
                @if(session()->has('course'))
                <div class="alert alert-info alert-dismissible fade show">
                    {{ session('course') }}
                    <button type="button" class="close" data-dismiss="alert">x</button>
                </div>
                @endif
                @if($countC!=0)
                <table class="table table-striped">
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Teacher</th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach($courses as $course)
                        <tr>
                            <td>{{$course->course_name}}</td>
                            <td>{{$course->description}}</td>
                            <td>{{$course->price}}</td>
                            <td>{{$course->user->name}}</td>
                            <td><a href="{{route('create_course', [$course->id])}}" class="btn btn-primary">Edit Course</a></td>
                            <td><a href="{{route('delete_course', [$course])}}" class="btn btn-danger">Remove Course</a></td>
                        </tr>
                    @endforeach
                </table>
                @else
                    <div class="alert alert-info">There are no courses currently!</div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a class="btn btn-success" href="{{route('create_course')}}">Create Course</a>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h3>Students</h3>
                @if($countS!=0)
                <table class="table table-striped">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Course</th>
                        <th>Teacher</th>
                        <th></th>
                    </tr>
                    @foreach($students as $student)
                        <tr>
                            <td>{{$student->name}}</td>
                            <td>{{$student->email}}</td>
                            <td>{{$student->course->course_name}}</td>
                            <td>{{$student->course->user->name}} </td>
                            <td><a href="{{route('delete_student', [$student])}}" class="btn btn-danger">Remove Student</a></td>
                        </tr>
                    @endforeach
                </table>
                @else
                    <div class="alert alert-info">There are no students currently!</div>
                @endif
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h3>Student Requests</h3>
                @if($countSR!=0)
                <table class="table table-striped">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Applied for</th>
                        <th>Teacher</th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach($studentRequests as $req)
                        <tr>
                            <td>{{$req->name}}</td>
                            <td>{{$req->email}}</td>
                            <td>{{$req->course->course_name}}</td>
                            <td>{{$req->course->user->name}} </td>
                            <td><a href="{{route('accept_student', [$req])}}" class="btn btn-primary">Accept Request</a></td>
                            <td><a href="{{route('decline_student', [$req])}}" class="btn btn-danger">Decline Request</a></td>
                        </tr>
                    @endforeach
                </table>
                @else
                    <div class="alert alert-info">There are no student requests currently!</div>
                @endif
            </div>
        </div>
    </div>

@endsection