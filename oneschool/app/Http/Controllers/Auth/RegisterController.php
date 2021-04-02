<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'contact' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // return User::create([
        //     'name' => $data['firstname']." ".$data['lastname'],
        //     'contact' => $data['contact'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        // ]);

        $user=new User;
        $user->name=$data['firstname']." ".$data['lastname'];
        $user->contact=$data['contact'];
        $user->email=$data['email'];
        $user->password=Hash::make($data['password']);
        // if($data['photo']!==null){
        //     $user->photo=$data['photo']->store('users');
        // }
        $user->save();
    }

    public function register(Request $request){
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

        $user=new User;
        $user->name=$firstname." ".$lastname;
        $user->experience=$experience;
        $user->contact=$contact;
        $user->email=$email;
        $user->password=Hash::make($password);
        // photo
        if($request->file('photo')!==null){
            $user->photo=$request->file('photo')->store('users');
        }
        $user->save();

        return redirect(route('index'));
    }
}
