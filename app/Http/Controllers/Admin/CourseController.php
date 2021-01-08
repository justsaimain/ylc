<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\Teacher;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class CourseController extends Controller
{
    public function viewCourse()
    {
        $courses = Course::all();
        return view('dashboard.course.view', compact('courses'));
    }

    public function createCourse()
    {
        $categories = Category::all();
        $teachers = Teacher::all();
        return view('dashboard.course.create', compact('categories', 'teachers'));
    }

    public function createCoursePost(Request $request)
    {


        // $validateData = $request->validate([
        //     'name' => 'required',
        //     'description' => 'required',
        //     'category_id' => 'required',
        //     'teacher_id' => 'required',
        //     'duration' => 'required',
        //     'fees' => 'required',
        //     'image' => 'required|mimes:jpeg,png,jpg',
        //     'video' => 'mimes:mp4,mov'
        // ]);

        $prefix = date('ym') . $request->category_id . $request->teacher_id;
        $course_code = IdGenerator::generate(['table' => 'courses', 'field' => 'course_code', 'length' => 10, 'prefix' => $prefix]);


        $course = new Course();
        $course->name = $request->name;
        $course->course_code = $course_code;
        $course->description = $request->description;
        $course->category_id = $request->category_id;
        $course->teacher_id = $request->teacher_id;
        $course->duration = $request->duration;
        $course->fees = $request->fees;

        $image = $request->file('image');
        $image_name = time() . rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('storage/courses/pub/images'), $image_name);

        $course->image = $image_name;

        if ($request->file('video')) {
            $video = $request->file('video');
            $video_name = time() . rand() . '.' . $video->getClientOriginalExtension();
            $video->move(public_path('storage/courses/pub/videos'), $video_name);
            $course->video = $video_name;
        }
        $course->save();
        return redirect('/dashboard/course/' . $course_code . '/management');
    }

    public function manageCourse($course_code)
    {

        $course = Course::where('course_code', $course_code)->first();
        return view('dashboard.course.manage', compact('course'));
    }
}
