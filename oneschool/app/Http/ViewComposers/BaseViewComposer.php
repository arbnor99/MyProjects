<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Models\User;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class BaseViewComposer{
    public function compose(View $view){
        $data=$view->getData();

        $data['users']=User::orderBy('id')->get();
        $data['courses']=Course::orderBy('created_at')->get();

        $view->with($data);
    }
}