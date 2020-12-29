<?php

namespace App\Http\Controllers\Admin;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function viewTeacher()
    {
        $teachers = Teacher::all();
        return view('dashboard.teacher.view', compact('teachers'));
    }

    public function createTeacher()
    {
        return view('dashboard.teacher.create');
    }

    public function updateTeacher(Request $request, $id)
    {
        $teacher = Teacher::find($id);
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->update();
        return back();
    }

    public function changeTeacherPassword(Request $request, $id)
    {
        $teacher = Teacher::find($id);
        $teacher->password = Hash::make($request->new_password);
        $teacher->update();
        return back();
    }

    public function deleteTeacher($id)
    {
        $teacher = Teacher::find($id);
        $teacher->delete();
        return back();
    }

    public function createTeacherPost(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string'],
            'education' => ['required', 'string'],
            'work' => ['required', 'string'],
            'job' => ['required', 'string']
        ]);

        $teacher = new Teacher();
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->password = Hash::make($request->password);
        $teacher->education = $request->education;
        $teacher->work = $request->work;
        $teacher->job = $request->job;
        $teacher->save();

        return back();
    }
}
