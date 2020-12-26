<?php

namespace App\Http\Controllers\User;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::orderBy('created_at', 'DESC')->get();
        return view('courses', compact('courses'));
    }

    public function view($course_code, $course_name)
    {
        $course = Course::where('course_code', $course_code)->where('name', $course_name)->first();
        return view('course_single', compact('course'));
    }

    public function enrolledCourse()
    {
        $courses = Auth::user()->courses;
        return view('student.enrolled_courses', compact('courses'));
    }

    public function viewEnrolledCourse($course_code)
    {
        $course = Course::where('course_code', $course_code)->first();
        $enrolled_courses = Auth::user()->courses;
        if ($enrolled_courses->contains($course)) {
            return view('student.course', compact('course'));
        } else {
            return back();
        }
    }
}
