<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class StudentController extends Controller
{
    public function viewStudent()
    {
        $students = User::all();
        return view('dashboard.student.view', compact('students'));
    }


    public function deleteStudent($id)
    {
        $user = User::find($id);
        $user->delete();
        return back();
    }
}
