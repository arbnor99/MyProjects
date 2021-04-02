<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function viewCourse(Course $course){
        $countC=DB::table('comments')->where('course_id', $course->id)->count();
        $comments=Comment::where('course_id', $course->id)->orderBy('created_at', 'desc')->get();
        return view('view_course', compact('course', 'comments', 'countC'));
    }
}
