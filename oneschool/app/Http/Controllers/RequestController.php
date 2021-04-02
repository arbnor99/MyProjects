<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\UserRequest;
use App\Models\StudentRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class RequestController extends Controller
{
        // TEACHER/ADM REQUESTS
        public function registerRequest(Request $request){
            $request->validate([
                'firstname' => ['required', 'string', 'max:255'],
                'lastname' => ['required', 'string', 'max:255'],
                'experience'=>['required','string', 'min:20'],
                'contact' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'photo' => ['nullable', 'image', 'mimes:jpeg,png'],
            ]);
    
            $firstname=filter_var($request->input('firstname'), FILTER_SANITIZE_STRING);
            $lastname=filter_var($request->input('lastname'), FILTER_SANITIZE_STRING);
            $experience=filter_var($request->input('experience'), FILTER_SANITIZE_STRING);
            $contact=filter_var($request->input('contact'), FILTER_SANITIZE_STRING);
            $email=filter_var($request->input('email'), FILTER_SANITIZE_STRING);
            $password=filter_var($request->input('password'), FILTER_SANITIZE_STRING);
    
            $req=new UserRequest;
            $req->name=$firstname." ".$lastname;
            $req->experience=$experience;
            $req->contact=$contact;
            $req->email=$email;
            $req->password=Hash::make($password);
            // photo
            if($request->file('photo')!==null){
                $req->photo=$request->file('photo')->store('users');
            }
            $req->save();
    
            return redirect(route('index'));
        }
    
    
        //STUDENT REQUESTS
        public function studentRequest(Request $request){
            $request->validate([
                'firstname' => ['required', 'string', 'max:255'],
                'lastname' => ['required', 'string', 'max:255'],
                'contact' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:student_requests,email', 'unique:students,email'],
                'photo' => ['nullable', 'image', 'mimes:jpeg,png'],
            ]);
    
            $course_id=$request->input('course_id');
            $firstname=filter_var($request->input('firstname'), FILTER_SANITIZE_STRING);
            $lastname=filter_var($request->input('lastname'), FILTER_SANITIZE_STRING);
            $contact=filter_var($request->input('contact'), FILTER_SANITIZE_STRING);
            $email=filter_var($request->input('email'), FILTER_SANITIZE_STRING);

            $req=new StudentRequest;
            $req->course_id=$course_id;
            $req->name=$firstname." ".$lastname;
            $req->contact=$contact;
            $req->email=$email;
            // photo
            if($request->file('photo')!==null){
                $req->photo=$request->file('photo')->store('students');
            }
            $req->save();
    
            $course=Course::where('id', $course_id)->first();
            session()->flash('apply', 'Your application was sent sussessfully!');
            return redirect(route('view_course', [$course]));
        }
}
