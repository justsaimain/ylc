@extends('student.layouts.master')
@section('content')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
        </ol>
    </div>
</div>
<!-- row -->

<div class="container-fluid">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{ $lesson->name }}</h3>
                    <p class="card-text">{{ $lesson->description }}</p>
                    <div class="">
                        <video class="w-100" controls>
                            <source
                                src="{{ asset('storage/courses/' . $course->course_code .'/lessons/videos/' . $lesson->video) }}"
                                type="video/mp4">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">There is {{ $lesson->exercise->count() }} exercises for this lesson.</p>
                    <div class="border text-center p-5 mt-3">
                        <a href="{{ url('/student/enrolled/' . $course->course_code . '/' . $unit->unit_code . '/' . $lesson->lesson_code . '/exercise') }}"
                            class="btn btn-primary">Go to
                            Exercise</a>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
<!-- #/ container -->
@endsection
