@extends('student.layouts.master')
@section('content')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        {{ Breadcrumbs::render('student.course',$course) }}

    </div>
</div>
<!-- row -->

<div class="container-fluid">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{ $course->name }}</h3>
                    <p class="card-text">{{ $course->description }}</p>
                    <div class="mt-3">
                        <video class="w-100" controls>
                            <source src="{{ asset('storage/courses/pub/videos/' . $course->video) }}" type="video/mp4">
                    </div>

                </div>
            </div>
        </div>
        <div class="col-6">
            @foreach ($course->unit as $unit)
            <div class="card">
                <div class="card-body">
                    <p>Unit {{ $loop->index + 1 }}</p>
                    <h3 class="card-title">{{ $unit->name }}</h3>
                    <p class="card-text">{{ $unit->description }}</p>
                    <div class="list-group">
                        @foreach ($unit->lesson as $lesson)
                        <a href="{{ route('student.lesson' , [$course->course_code, $unit->unit_code , $lesson->lesson_code]) }}"
                            class="list-group-item list-group-item-action @if (Auth::user()->lessons->count() > 0)
                            @if (Auth::user()->lessons->last()->id == $lesson->id)
                            active
                            @endif
                            @endif">
                            <div class="d-flex align-items-center">
                                <div class="mr-3">
                                    <i class="far fa-file-alt fa-2x"></i>
                                </div>
                                <div>
                                    <h5 class="mb-1  @if (Auth::user()->lessons->count() > 0) @if (Auth::user()->lessons->last()->id == $lesson->id)
                                        text-white
                                    @endif @endif">{{ $lesson->name }}</h5>
                                    <p class="mb-1">{{ $lesson->description }}</p>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
<!-- #/ container -->
@endsection
