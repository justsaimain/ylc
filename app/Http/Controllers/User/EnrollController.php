<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrollController extends Controller
{
    public function enrollCourse($course_code)
    {
        $course = Course::where('course_code', $course_code)->first();

        if (Auth::check()) {
            $user = Auth::user();
            $user->courses()->attach($course);
            return back();
        } else {
            return bacK();
        }
    }
}
