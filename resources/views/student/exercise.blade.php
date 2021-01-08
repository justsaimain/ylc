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
            <div class="row">
                <div class="col-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                @foreach ($lesson->exercise as $exe)
                                <a class="nav-link @if ($loop->first) active @endif rounded"
                                    id="v-pills-{{ $exe->id }}-tab" data-toggle="pill" href="#v-pills-{{ $exe->id }}"
                                    role="tab" aria-controls="v-pills-{{ $exe->id }}" aria-selected="true">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span>Exercise {{ $loop->index + 1 }}</span>
                                        @if (Auth::user()->exercises->contains($exe))
                                        <i class="fas fa-check-circle"></i>
                                        @endif
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-10">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content" id="v-pills-tabContent">
                                @foreach ($lesson->exercise as $exe)
                                <div class="tab-pane fade @if ($loop->first) show active @endif"
                                    id="v-pills-{{ $exe->id }}" role="tabpanel"
                                    aria-labelledby="v-pills-{{ $exe->id }}">
                                    @if ($exe->type == 'true_false')


                                    <div>
                                        <span class="badge badge-primary px-2 py-2">
                                            True or False
                                        </span>
                                        <div class="text-center">
                                            @if ($exe->image)
                                            <img class="rounded"
                                                src="{{ asset('storage/courses/' . $course->course_code .'/lessons/images/' .  $exe->image  ) }}"
                                                alt="">
                                            @endif
                                            <h4 class="mt-3">{{ $exe->question }}</h4>
                                            <div class="d-flex justify-content-center align-items-center mt-3">
                                                <button class="btn btn-primary mr-3"><i class="fas fa-check mr-2"></i>
                                                    True</button>
                                                <button class="btn btn-primary"><i class="fas fa-times mr-2"></i>
                                                    False</button>
                                            </div>
                                        </div>
                                    </div>

                                    @elseif($exe->type == 'mcq')

                                    <div>
                                        <span class="badge badge-primary px-2 py-2">
                                            Multiple Choice Question
                                        </span>
                                        <div class="text-center">
                                            @if ($exe->image)
                                            <img class="rounded"
                                                src="{{ asset('storage/courses/' . $course->course_code .'/lessons/images/' .  $exe->image  ) }}"
                                                alt="">
                                            @endif
                                            <h4 class="mt-3">{{ $exe->question }}</h4>
                                            <div class="d-flex justify-content-center align-items-center mt-3">
                                                @foreach (explode(',',$exe->option) as $option)
                                                <button class="btn btn-primary @if(!$loop->last)mr-3 @endif"><i
                                                        class="fas fa-circle mr-2 "></i>
                                                    {{ $option }}</button>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    @elseif($exe->type == 'scramble')

                                    <div>
                                        <span class="badge badge-primary px-2 py-2">
                                            Scramble
                                        </span>
                                        <div class="text-center">
                                            @if ($exe->image)
                                            <img class="rounded"
                                                src="{{ asset('storage/courses/' . $course->course_code .'/lessons/images/' .  $exe->image  ) }}"
                                                alt="">
                                            @endif
                                            <h4 class="mt-3">
                                                {{ str_replace('__', '<h1>Replace</h1>' , $exe->question) }}</h4>
                                            <div class="d-flex justify-content-center align-items-center mt-3">
                                                @foreach (explode(',',$exe->option) as $option)
                                                <button class="btn btn-primary @if(!$loop->last)mr-3 @endif"><i
                                                        class="fas fa-circle mr-2 "></i>
                                                    {{ $option }}</button>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    @elseif($exe->type == 'matching')

                                    @else
                                    <p>nothing</p>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #/ container -->
@endsection
