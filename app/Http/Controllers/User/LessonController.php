<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Unit;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function viewLesson($course_code, $unit_code, $lesson_code)
    {
        $course = Course::where('course_code', $course_code)->first();
        $unit = Unit::where('unit_code', $unit_code)->first();
        $lesson = Lesson::where('lesson_code', $lesson_code)->first();
        return view('student.lesson', compact('course', 'unit', 'lesson'));
    }
}
