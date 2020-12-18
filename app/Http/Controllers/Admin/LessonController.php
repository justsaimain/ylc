<?php

namespace App\Http\Controllers\Admin;

use App\Models\Unit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lesson;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class LessonController extends Controller
{
    public function addLesson(Request $request, $id)
    {
        $unit = Unit::find($id);
        $prefix =  $unit->course->course_code . rand(001, 999);
        $lesson_code = IdGenerator::generate(['table' => 'units', 'length' => 20, 'prefix' => $prefix]);

        $lesson = new Lesson();
        $lesson->unit_id = $unit->id;
        $lesson->lesson_code = $lesson_code;
        $lesson->name = $request->lesson_name;
        $lesson->description = $request->lesson_description;

        if ($request->file('lesson_video')) {
            $video = $request->file('lesson_video');
            $video_name = $lesson_code . '.' . $video->getClientOriginalExtension();
            $path = public_path('storage/courses/') . $unit->course->course_code . '/videos';
            $video->move($path, $video_name);
            $lesson->video = $video_name;
        }

        $lesson->save();
        return back();
    }

    public function viewLesson($unit_code, $lesson_code)
    {
        $lesson = Lesson::where('lesson_code', $lesson_code)->first();
        return view('dashboard.course.lesson', compact('lesson'));
    }
}
