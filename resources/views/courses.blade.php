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
                    <li class="list-inline-item text-white h3 font-secondary "></li>
                </ul>
                <p class="text-lighten">Our courses offer a good compromise between the continuous assessment favoured
                    by some universities and the emphasis placed on final exams by others.</p>
            </div>
        </div>
    </div>
</section>
<!-- /page title -->

<!-- courses -->
<section class="section">
    <div class="container">
        <!-- course list -->
        <div class="row justify-content-center">
            @foreach ($courses as $course)
            <!-- course item -->
            <div class="col-lg-4 col-sm-6 mb-5">
                <div class="card p-0 border-primary rounded-0 hover-shadow h-100">
                    <img class="card-img-top rounded-0"
                        src="{{ asset('storage/courses/pub/images/' . $course->image) }}" alt="course thumb">
                    <div class="card-body">
                        <ul class="list-inline mb-2">
                            <li class="list-inline-item">
                                <i class="ti-timer mr-1 text-color"></i>{{ $course->duration }} days</li>
                            <li class="list-inline-item"><a class="text-color"
                                    href="#">{{ $course->category->name }}</a></li>
                        </ul>
                        <a href="{{ url('/course/' . $course->course_code . '/' . $course->name) }}">
                            <h4 class="card-title">{{ $course->name }}</h4>
                        </a>
                        <p class="card-text mb-4"> {{ Str::limit($course->description, 50) }}</p>
                        @if ($course->users->contains(Auth::user()))
                        <a href="{{ url('/course/' . $course->course_code . '/' . $course->name) }}"
                            class="btn btn-primary btn-sm">Enrolled</a>
                        @else
                        <a href="{{ url('/course/' . $course->course_code . '/' . $course->name) }}"
                            class="btn btn-primary btn-sm">Apply now</a>
                        @endif
                    </div>
                </div>
            </div>

            @endforeach
        </div>
        <!-- /course list -->
    </div>
</section>
<!-- /courses -->


@endsection
