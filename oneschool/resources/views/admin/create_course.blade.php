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
                <form action="{{route('add_course')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <input type="hidden" name="course_id" value="{{$course->id}}">

                    <div class="mb-3">
                        <label for="course_name" class="form-label">Course Title</label>
                        <input type="text" class="form-control" name="course_name" value="{{old('course_name', $course->course_name)}}">
                    </div>
                    @error('course_name')
                        <div class="alert alert-danger ">{{$message}}</div>
                    @enderror

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" name="description" rows="3">{{old('description', $course->description)}}</textarea>
                    </div>
                    @error('description')
                        <div class="alert alert-danger ">{{$message}}</div>
                    @enderror

                    <div class="mb-3">
                        <label for="duration" class="form-label">Duration</label>
                        <input type="text" class="form-control" name="duration" value="{{old('duration', $course->duration)}}">
                    </div>
                    @error('duration')
                        <div class="alert alert-danger ">{{$message}}</div>
                    @enderror

                    <div class="input-group mb-3">
                        <label class="form-label">Price</label>
                        <span class="input-group-text">$</span>
                        <input type="number" class="form-control" name="price" value="{{old('price', $course->price)}}">
                        <span class="input-group-text">.00</span>
                    </div>
                    @error('price')
                        <div class="alert alert-danger ">{{$message}}</div>
                    @enderror

                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input class="form-control" type="file" name="image">
                    </div>
                    @error('image')
                        <div class="alert alert-danger ">{{$message}}</div>
                    @enderror

                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection