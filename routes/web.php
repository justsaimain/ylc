<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\RegistrationController;
use Illuminate\Support\Facades\Storage;

Route::get('/', [PageController::class, 'index']);

Auth::routes();




Route::get('/login/dashboard', [LoginController::class, 'showAdminLoginForm']);
Route::get('/login/teacher', [LoginController::class, 'showTeacherLoginForm']);

Route::post('/login/admin', [LoginController::class, 'adminLogin']);
Route::post('/login/teacher', [LoginController::class, 'teacherLogin']);

// Storage Protect

Route::get('/storage/courses/{course_code}/videos/{file_name}', function ($course_code, $file_name) {
    dd($course_code);
})->middleware('auth:web');
// User (or) Student
Route::group(['middleware' => 'auth:web'], function () {
    Route::get('/student', function () {
        return view('student.index');
    });
});

// Teacher
Route::group(['middleware' => 'auth:teacher'], function () {
    Route::get('/teacher', function () {
        return view('teacher.index');
    });
});

// Admin
Route::group(['middleware' => 'auth:admin', 'prefix' => 'dashboard'], function () {


    Route::get('/', function () {
        return view('dashboard.index');
    });

    Route::get('/view-students', [StudentController::class, 'viewStudent'])->name('dashboard.view_student');

    Route::post('/student/approve/{id}', [StudentController::class, 'approveStudent'])->name('dashboard.approve_student');
    Route::post('/student/delete/{id}', [StudentController::class, 'deleteStudent'])->name('dashboard.delete_student');

    Route::get('/view-admins', [AdminController::class, 'viewAdmin'])->name('dashboard.view_admin');
    Route::post('/admin/update/{id}', [AdminController::class, 'updateAdmin'])->name('dashboard.admin_update');
    Route::post('/admin/update/password/{id}', [AdminController::class, 'changeAdminPassword'])->name('dashboard.admin_password_update');
    Route::post('/admin/delete/{id}', [AdminController::class, 'deleteAdmin'])->name('dashboard.admin_delete');
    Route::get('/admin/create', [AdminController::class, 'createAdmin'])->name('dashboard.create_admin');
    Route::post('/admin/create', [AdminController::class, 'createAdminPost'])->name('dashboard.create_admin_post');

    Route::get('/view-teacher', [TeacherController::class, 'viewTeacher'])->name('dashboard.view_teacher');
    Route::post('/teacher/update/{id}', [TeacherController::class, 'updateTeacher'])->name('dashboard.teacher_update');
    Route::post('/teacher/update/password/{id}', [TeacherController::class, 'changeTeacherPassword'])->name('dashboard.teacher_password_update');
    Route::post('/teacher/delete/{id}', [TeacherController::class, 'deleteTeacher'])->name('dashboard.teacher_delete');
    Route::get('/teacher/create', [TeacherController::class, 'createTeacher'])->name('dashboard.create_teacher');
    Route::post('/teacher/create', [TeacherController::class, 'createTeacherPost'])->name('dashboard.create_teacher_post');

    Route::get('/category', [CategoryController::class, 'viewCategory'])->name('dashboard.view_category');
    Route::get('/category/create', [CategoryController::class, 'createCategory'])->name('dashboard.create_category');
    Route::post('/category/create', [CategoryController::class, 'createCategoryPost'])->name('dashboard.create_category_post');
    Route::post('/category/delete/{id}', [CategoryController::class, 'deleteCategory'])->name('dashboard.category_delete');
    Route::post('/category/update/{id}', [CategoryController::class, 'updateCategory'])->name('dashboard.category_update');


    Route::get('/course', [CourseController::class, 'viewCourse'])->name('dashboard.view_course');
    Route::get('/course/create', [CourseController::class, 'createCourse'])->name('dashboard.create_course');
    Route::post('/course/create', [CourseController::class, 'createCoursePost'])->name('dashboard.create_course_post');

    Route::get('/course/{course_code}/management', [CourseController::class, 'manageCourse'])->name('dashboard.course_manage');


    Route::post('/course/{id}/add/unit', [UnitController::class, 'addUnit'])->name('dashboard.add_unit_to_course');
    Route::get('/course/{course_code}/unit/{unit_code}', [UnitController::class, 'viewUnit'])->name('dashboard.view_unit');

    Route::post('/unit/{id}/add/lesson', [LessonController::class, 'addLesson'])->name('dashboard.add_lesson_to_unit');
    Route::get('/unit/{unit_code}/lesson/{lesson_code}', [LessonController::class, 'viewLesson'])->name('dashboard.view_lessoon');
});


Route::get('/test', function () {
    $photo = storage_path('app/uploads/test/JSauanjWUAwj0Ald2kYgqpZKSmJwRWLFKC7vwvtm.jpg');
    return view('test', compact('photo'));
});

Route::post('/test', function (Request $request) {
    $filename = $request->file('file')->getClientOriginalName();
    Storage::disk('myDisk')->put('/test/', $request->file('file'));
    return back();
})->name('test');
