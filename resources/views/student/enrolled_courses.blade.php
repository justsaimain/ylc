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
        <div class="col-12 m-b-30">
            <h4 class="d-inline">Your Courses</h4>
            <div class="row mt-3">
                @foreach ($courses as $course)
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h5 class="card-title"><a
                                    href="{{ url('student/enrolled/' . $course->course_code) }}">{{ $course->name }}</a>
                            </h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $course->category->name }}</h6>
                        </div>
                        <img class="img-fluid" src="{{ asset('storage/courses/pub/images/' . $course->image) }}" alt="">
                        <div class="card-body">
                            <p class="card-text">{{ $course->description }}</p>
                        </div>
                        <div class="card-footer">
                            <p class="card-text d-inline"><small class="text-muted">Last updated 3 mins ago</small>
                            </p><a href="#" class="card-link float-right"><small>Card link</small></a>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- End Col -->
            </div>
        </div>
    </div>

    <!-- End Row -->
</div>
<!-- #/ container -->
@endsection
