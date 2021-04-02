<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->registerPolicies();

        Gate::define('delete-course', function($user, $course){
            return ($user->role=="admin" || $user->id==$course->user_id)
                ? Response::allow() 
                : Response::deny('You are not admin! You can only delete your courses!');
        });

        Gate::define('delete-student', function($user, $student){
            return ($user->role=="admin" || $user->id==$student->course->user_id)
                ? Response::allow()
                : Response::deny('You are not admin! You can only delete your students!');
        });

        Gate::define('acc/dec-student', function($user, $studentRequest){
            return ($user->role=="admin" || $user->id==$studentRequest->course->user_id)
                ? Response::allow()
                : Response::deny('You are not admin! You can only accept/decline students requests at your course!');
        });

        Gate::define('update-course', function($user, $course){
            return ($user->role=="admin"  || ($user->role=="teacher" && $user->id==$course->user_id))
                ? Response::allow()
                : Response::deny('You are not admin! You can only edit your courses!');
        });

        Gate::define('delete-comment', function($user, $comment){
            return ($user->role=="admin" || $user->id==$comment->course->user_id)
                ? Response::allow()
                : Response::deny("You are not authorized to delete this comment");
        });
    }
}
