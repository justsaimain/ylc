<?php

namespace App\Http\Controllers\Admin;

use App\Models\Unit;
use App\Models\Lesson;
use App\Models\Exercise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class ExerciseController extends Controller
{
    public function addExercise($unit_code, $lesson_code)
    {
        $lesson = Lesson::where('lesson_code', $lesson_code)->first();
        return view('dashboard.course.add_exercise', compact('lesson'));
    }

    public function addExercisePost($unit_code, $lesson_code, Request $request)
    {

        $unit = Unit::where('unit_code', $unit_code)->first();
        $lesson = Lesson::where('lesson_code', $lesson_code)->first();

        $prefix = date('ym') . rand(00, 99);
        $exercise_code = IdGenerator::generate(['table' => 'exercises', 'field' => 'exercise_code', 'length' => 10, 'prefix' => $prefix]);


        $exercise = new Exercise();
        $exercise->lesson_id = $lesson->id;
        $exercise->exercise_code = $exercise_code;
        $exercise->section_a = $request->section_a;
        $exercise->section_b = $request->section_b;
        $exercise->type = $request->type;
        $exercise->question = $request->question;
        $exercise->option = $request->option;
        $exercise->answer = $request->answer;

        if ($request->file('option_images')) {
            $option_images = [];

            foreach ($request->file('option_images') as $file) {

                $fname = $file->getClientOriginalName();
                $path = public_path('storage/courses/' . $unit->course->course_code . '/lessons/exercise/images/');
                $file->move($path, $fname);
                array_push($option_images,  $fname);
            }

            $serializedArr = serialize($option_images);

            $exercise->option_images = $serializedArr;
        }

        if ($request->file('image')) {
            $file_name = time() . rand(000, 999) . '.' . $request->file('image')->getClientOriginalExtension();
            $path = public_path('storage/courses/' . $unit->course->course_code . '/lessons/images/');
            $request->file('image')->move($path, $file_name);
            $exercise->image = $file_name;
        }



        $exercise->save();
        return back();
    }

    public function uploadMultipleChoiceImages(Request $request)
    {

        $lesson = Lesson::where('lesson_code', $request->lesson_code)->first();

        $prefix = date('ym') . rand(00, 99);
        $exercise_code = IdGenerator::generate(['table' => 'exercises', 'field' => 'exercise_code', 'length' => 10, 'prefix' => $prefix]);

        $exercise  = new Exercise();
        $exercise->lesson_id = $lesson->id;
        $exercise->exercise_code = $exercise_code;
        $exercise->type = 'mcq_images';

        $files = $request['files'];
        $images = [];

        foreach ($files as $file) {
            if (is_file($file)) {    // not sure this is needed
                $fname = $file->getClientOriginalName();
                $path = public_path('storage/exercises/images');

                $file->move($path, $fname);
                array_push($images,  $fname);
            }
        }

        $serializedArr = serialize($images);

        $exercise->option_images = $serializedArr;
        $exercise->save();

        return response($images);
    }
}
