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
        <div class="col">
            <div class="card">
                <div class="card-body">
                    @foreach ($exercises as $exercise)
                    <div class="d-block border-bottom py-3">
                        @if (Auth::user()->exercises->contains($exercise->id))
                        <div class="alert alert-success" role="alert">
                            <i class="fas fa-check-circle"></i> <span>Answered</span>
                        </div>
                        @endif
                        @if ($exercise->image)
                        <img src="{{ asset('storage/courses/' . $course->course_code . '/lessons/images/' . $exercise->image) }}"
                            alt="">
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #/ container -->
@endsection
