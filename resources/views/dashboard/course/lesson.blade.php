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
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <p class="card-title">Lesson Details</p>
                        <p class="card-title">{{ $lesson->lesson_code }}</p>
                    </div>
                    <dl class="row mt-3">
                        <dt class="col-sm-3">Name</dt>
                        <dd class="col-sm-9">{{ $lesson->name }}</dd>
                        <dt class="col-sm-3">Description</dt>
                        <dd class="col-sm-9">{{ $lesson->description }}</dd>
                        <dt class="col-sm-3">Created at</dt>
                        <dd class="col-sm-9">{{ $lesson->created_at->diffForHumans() }}</dd>

                    </dl>
                    <video class="w-100" controls>
                        <source
                            src="{{ asset('storage/courses/' . $lesson->unit->course->course_code . '/videos/' . $lesson->video) }}"
                            type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <p class="card-title">Exercise ( {{ $lesson->exercise->count() }} )</p>
                    </div>
                    <div class="border text-center p-3 mt-3">
                        <a href="{{ route('dashboard.add_exercise' , ['unit_code' => $lesson->unit->unit_code , 'lesson_code' => $lesson->lesson_code]) }}"
                            class="btn btn-primary">Add New</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- #/ container -->

@endsection
