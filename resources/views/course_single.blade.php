@extends('layouts.master')
@section('content')


<!-- page title -->
<section class="page-title-section overlay" data-background="images/backgrounds/page-title.jpg">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ul class="list-inline custom-breadcrumb">
                    <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="courses.html">Our
                            Courses</a></li>
                    <li class="list-inline-item text-white h3 font-secondary nasted">{{ $course->name }}</li>
                </ul>
                <p class="text-lighten">Our courses offer a good compromise between the continuous assessment favoured
                    by some universities and the emphasis placed on final exams by others.</p>
            </div>
        </div>
    </div>
</section>
<!-- /page title -->

<!-- section -->
<section class="section-sm">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4">
                <!-- course thumb -->
                <img src="{{ asset('storage/courses/pub/images/' . $course->image) }}" class="img-fluid w-100">
            </div>
        </div>
        <!-- course info -->
        <div class="row align-items-center mb-5">
            <div class="col-xl-3 order-1 col-sm-6 mb-4 mb-xl-0">
                <h2>{{ $course->name }}</h2>
            </div>
            <div class="col-xl-6 order-sm-3 order-xl-2 col-12 order-2">
                <ul class="list-inline text-xl-center">
                    <li class="list-inline-item mr-4 mb-3 mb-sm-0">
                        <div class="d-flex align-items-center">
                            <i class="ti-book text-primary icon-md mr-2"></i>
                            <div class="text-left">
                                <h6 class="mb-0">COURSE</h6>
                                <p class="mb-0"><a href="#" class="text-secondary">{{ $course->category->name }}</a></p>
                            </div>
                        </div>
                    </li>
                    <li class="list-inline-item mr-4 mb-3 mb-sm-0">
                        <div class="d-flex align-items-center">
                            <i class="ti-alarm-clock text-primary icon-md mr-2"></i>
                            <div class="text-left">
                                <h6 class="mb-0">DURATION</h6>
                                <p class="mb-0">{{ $course->duration }} Days</p>
                            </div>
                        </div>
                    </li>
                    <li class="list-inline-item mr-4 mb-3 mb-sm-0">
                        <div class="d-flex align-items-center">
                            <i class="ti-wallet text-primary icon-md mr-2"></i>
                            <div class="text-left">
                                <h6 class="mb-0">FEE</h6>
                                <p class="mb-0">{{ $course->fees }} MMK</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-xl-3 text-sm-right text-left order-sm-2 order-3 order-xl-3 col-sm-6 mb-4 mb-xl-0">
                @if ($course->users->contains(Auth::user()))
                <a href="{{ url('student/enrolled/' . $course->course_code) }}" class="btn btn-primary">Enrolled</a>
                @else
                <form action="{{ route('course.enroll' , $course->course_code) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Apply now</button>
                </form>
                @endif
            </div>
            <!-- border -->
            <div class="col-12 mt-4 order-4">
                <div class="border-bottom border-primary"></div>
            </div>
        </div>
        <!-- course details -->
        <div class="row">
            <div class="col-12 mb-4">
                <h3>About Course</h3>
                <p>{{ $course->description }}</p>
                <div class="mt-3">
                    <video class="w-100" controls>
                        <source src="{{ asset('storage/courses/pub/videos/' . $course->video) }}" type="video/mp4">
                </div>
            </div>
            <!-- teacher -->
            <div class="col-12">
                <h5 class="mb-3">Teacher</h5>
                <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <div class="media mb-2 mb-sm-0">
                        <div class="media-body">
                            <h4 class="mt-0">{{ $course->teacher->name }}</h4>
                            Photographer
                        </div>
                    </div>
                    <div class="social-link">
                        <h6 class="d-none d-sm-block">Social Link</h6>
                        <ul class="list-inline">
                            <li class="list-inline-item"><a class="d-inline-block text-light p-1" href="#"><i
                                        class="ti-facebook"></i></a></li>
                            <li class="list-inline-item"><a class="d-inline-block text-light p-1" href="#"><i
                                        class="ti-twitter-alt"></i></a></li>
                            <li class="list-inline-item"><a class="d-inline-block text-light p-1" href="#"><i
                                        class="ti-linkedin"></i></a></li>
                            <li class="list-inline-item"><a class="d-inline-block text-light p-1" href="#"><i
                                        class="ti-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="border-bottom border-primary mt-4"></div>
            </div>
        </div>
    </div>
</section>
<!-- /section -->

<!-- related course -->
<section class="section pt-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="section-title">Related Course</h2>
            </div>
        </div>
    </div>
</section>
<!-- /related course -->

@endsection
