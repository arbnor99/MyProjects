<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\Comment;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Access\Response;

class CommentController extends Controller
{
    public function addComment(Request $request){
        $request->validate([
            'email_c'=>'required|exists:students,email',
            'comment'=>'required|string|min:20',
        ]);

        $c_id=(int) $request->input('course_id');
        $email=filter_var($request->input('email_c'), FILTER_SANITIZE_STRING);
        $content=filter_var($request->input('comment'), FILTER_SANITIZE_STRING);
        
        $student=Student::where('email', $email)->first();

        if($student->course_id==$c_id){
            $comment=new Comment;
            $comment->course_id=$c_id;
            $comment->student_id=$student->id;
            $comment->from_name=$student->name;
            $comment->from_email=$email;
            $comment->comment=$content;
            $comment->save();
            
            $course=Course::find($c_id);
            return redirect(route('view_course', [$course]));
        }else{
            session()->flash('comm', 'You can only comment on the course that you are attending!');
            $course=Course::find($c_id);
            return redirect(route('view_course', [$course]));
            // echo "<script>alert('You can only comment on the course that you are attending!')</script>";
            // echo '<div class="alert alert-danger">You can only comment on the course that you are attending!</div>';
            // return Response::deny('You can only comment on the course that you are attending!');
        }
    }
}
