<?php

namespace App\Http\Controllers\User;

use App\Models\Lesson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class ExerciseController extends Controller
{
    public function viewExercise($course_code, $unit_code, $lesson_code)
    {

        $lesson = Lesson::where('lesson_code', $lesson_code)->first();
        $course = Course::where('course_code', $course_code)->first();


        $exercises = [];

        foreach ($lesson->exercise as $exe) {
            if (!Auth::user()->exercises->contains($exe->id)) {
                array_push($exercises, $exe);
            }
        }
        $exe_for_answer = collect($exercises);
        // dump($lesson->exercise);
        return view('student.exercise', compact('lesson', 'course', 'exe_for_answer'));
    }
}
