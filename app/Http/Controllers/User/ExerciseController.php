<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Exercise;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

    public function checkVoiceTest(Request $request)
    {

        $exercise = Exercise::find($request->exerciseId);
        $result = $request->result;
        $user = User::find(Auth::id());
        $user->exercises()->attach($request->exerciseId);


        if (strcasecmp($exercise->question, $result) == 0) {
            return response()->json([
                'currect_answer' => $exercise->question,
                'your__answer' => $result,
                'is_currect' => true
            ]);
        } else {
            return response()->json([
                'currect_answer' => $exercise->question,
                'your__answer' => $result,
                'is_currect' => false
            ]);
        }
    }


    public function checkTrueFalse(Request $request)
    {
        $exercise = Exercise::find($request->exerciseId);
        $answer = $request->answer;
        $user = User::find(Auth::id());
        $user->exercises()->attach($request->exerciseId);
        if ($exercise->answer == $answer) {
            return response()->json([
                'is_currect' => true
            ]);
        } else {
            return response()->json([
                'is_currect' => false
            ]);
        }
    }

    public function checkMultipleChoice(Request $request)
    {

        $exercise = Exercise::find($request->exerciseId);
        $answer = $request->answer;
        $user = User::find(Auth::id());
        $user->exercises()->attach($request->exerciseId);
        if ($exercise->answer == $answer) {
            return response()->json([
                'is_currect' => true
            ]);
        } else {
            return response()->json([
                'is_currect' => false
            ]);
        }
    }

    public function checkMultipleChoiceImage(Request $request)
    {
        $exercise = Exercise::find($request->exerciseId);
        $answer = $request->answer;
        $user = User::find(Auth::id());
        $user->exercises()->attach($request->exerciseId);
        if ($exercise->answer == $answer) {
            return response()->json([
                'is_currect' => true
            ]);
        } else {
            return response()->json([
                'is_currect' => false
            ]);
        }
    }
}
