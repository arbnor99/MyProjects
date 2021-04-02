<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\UserRequest;
use App\Models\Student;
use App\Models\Comment;
use App\Models\StudentRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function __construct(){
        return $this->middleware('is_teacher');
    }

    public function dashboard(){
        $courses=Course::orderBy('created_at', 'desc')->get();
        $countC=DB::table('courses')->count();
        $users=User::orderBy('id')->get();
        $userRequests=UserRequest::orderBy('id')->get();
        $countUR=DB::table('user_requests')->count();
        $students=Student::orderBy('id')->get();
        $countS=DB::table('students')->count();
        $studentRequests=StudentRequest::orderBy('id')->get();
        $countSR=DB::table('student_requests')->count();

        return view('admin.dashboard', compact('courses', 'users', 'userRequests', 'countUR', 'countC', 'students', 'studentRequests', 'countS', 'countSR'));
    }

    public function createCourse($id=null){
        if($id!=null){
            $course=Course::findOrFail($id);
        }else{
            $course=(object)[
                'id'=>0,
                'user_id'=>0,
                'course_name'=>"",
                'description'=>"",
                'duration'=>"",
                'course_image'=>"",
                'price'=>"",
                'nr_students'=>0,
            ];
        }

        return view('admin.create_course', compact('course'));
    }

    public function addCourse(Request $request){
        $request->validate([
            'course_name'=>'required|string|min:3',
            'description'=>'required|string|min:50',
            'duration'=>'required|string|min:5',
            'price'=>'required|integer|min:0',
            'image'=>'nullable|image|mimes:jpeg,png',
        ]);

        $cname=filter_var($request->input('course_name'), FILTER_SANITIZE_STRING);
        $description=filter_var($request->input('description'), FILTER_SANITIZE_STRING);
        $duration=filter_var($request->input('duration'), FILTER_SANITIZE_STRING);
        $price=(int)$request->input('price');
        $cname=filter_var($request->input('course_name'), FILTER_SANITIZE_STRING);
        
        $course_id=$request->input('course_id');
        if($course_id==0){
            $course=new Course;
        }else{
            $course=Course::findOrFail($course_id);
            Gate::authorize('update-course', $course);
        }
        $course->course_name=$cname;
        $course->description=$description;
        $course->duration=$duration;
        $course->price=$price;
        $course->user_id=Auth::user()->id;
        if($request->file('image')!==null){
            $course->course_image=$request->file('image')->store('courses');
        }
        
        $course->save();

        session()->flash('course', 'Course created/updated successfully!');
        return redirect(route('dashboard'));
    }

    // ACCEPT USER
    public function acceptUser(UserRequest $userRequest){
        $user=new User;
        $user->name=$userRequest->name;
        $user->experience=$userRequest->experience;
        $user->email=$userRequest->email;
        $user->contact=$userRequest->contact;
        $user->password=$userRequest->password;
        $user->photo=$userRequest->photo;
        $user->save();

        $userRequest->delete();
        return redirect(route('dashboard'));
    }

    // DECLINE USER REQUEST
    public function declineUser(UserRequest $userRequest){
        $imagePath=$userRequest->photo;
        if(Storage::exists($imagePath)){
            Storage::delete($imagePath);
        }
        $userRequest->delete();
        return redirect(route('dashboard'));
    }

    // DELETE COURSE
    public function deleteCourse(Course $course){
        Gate::authorize('delete-course', $course);
        $imagePath=$course->course_image;
        if(Storage::exists($imagePath)){
            Storage::delete($imagePath);
        }
        $course->delete();
        return redirect(route('dashboard'));
    }

    // DELETE USER
    public function deleteUser(User $user){
        $imagePath=$user->photo;
        if(Storage::exists($imagePath)){
            Storage::delete($imagePath);
        }
        $user->delete();
        return redirect(route('dashboard'));
    }

    // ACCEPT STUDENT REQUEST
    public function acceptStudent(StudentRequest $studentRequest){
        Gate::authorize('acc/dec-student', $studentRequest);
        $student=new Student;
        $student->course_id=$studentRequest->course_id;
        $student->name=$studentRequest->name;
        $student->email=$studentRequest->email;
        $student->contact=$studentRequest->contact;
        $student->photo=$studentRequest->photo;
        $student->save();

        Course::where('id', $studentRequest->course_id)->increment('nr_students');

        $studentRequest->delete();
        return redirect(route('dashboard'));
    }

    // DECLINE STUDENT REQUEST
    public function declineStudent(StudentRequest $studentRequest){
        Gate::authorize('acc/dec-student', $studentRequest);
        $imagePath=$studentRequest->photo;
        if(Storage::exists($imagePath)){
            Storage::delete($imagePath);
        }
        $studentRequest->delete();
        return redirect(route('dashboard'));
    }

    // DELETE STUDENT
    public function deleteStudent(Student $student){
        Gate::authorize('delete-student', $student);
        $imagePath=$student->photo;
        if(Storage::exists($imagePath)){
            Storage::delete($imagePath);
        }
        Course::where('id', $student->course_id)->decrement('nr_students');
        $student->delete();
        return redirect(route('dashboard'));
    }

    // DELETE COMMENT
    public function deleteComment(Comment $comment){
        Gate::authorize('delete-comment', [$comment]);
        $comment->delete();

        $course=Course::find($comment->course_id);
        return redirect(route('view_course', [$course]));
    }
}
