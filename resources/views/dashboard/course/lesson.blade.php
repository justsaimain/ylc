@extends('dashboard.layouts.master')
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
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Lesson Name - {{ $lesson->name }}</h4>
                    <p>Body</p>
                    <p>
                        {{ Storage::url('courses/' . $lesson->unit->course->course_code . '/videos/' . $lesson->video) }}
                    </p>
                    <video class="w-100" controls>
                        <source
                            src="{{ asset('storage/courses/' . $lesson->unit->course->course_code . '/videos/' . $lesson->video) }}"
                            type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- #/ container -->

@endsection
