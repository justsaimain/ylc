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

    @if ($type = Request::get('type'))
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Exercise</h4>
                    <form method="POST"
                        action="{{ route('dashboard.add_exercise_post' , ['unit_code' => $lesson->unit->unit_code , 'lesson_code' => $lesson->lesson_code] ) }}"
                        class="mt-5" enctype="multipart/form-data">
                        @csrf
                        {{-- check type --}}
                        @if ($type == 'true_false')
                        <input type="text" hidden name="type" value="{{ $type }}">
                        <div class="form-group">
                            <label for="question" class="">Question</label>
                            <div class="">
                                <textarea name="question" class="form-control" id="question" cols="30"
                                    rows="10"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="answer" class="">Correct Answer</label>
                            <div class="">
                                <select id="answer" name="answer" class="form-control">
                                    <option disabled selected>Select Answer</option>
                                    <option value="true">True</option>
                                    <option value="false">False</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image" class="">Image (Optional)</label>
                            <input type="file" name="image" class="d-block">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        @elseif($type== 'mcq')
                        <input type="text" hidden name="type" value="{{ $type }}">
                        <div class="form-group">
                            <label for="question" class="">Question</label>
                            <div class="">
                                <textarea name="question" class="form-control" id="question" cols="30"
                                    rows="10"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="option" class="">Options</label>
                            <div class="">
                                <input type="text" name="option" id="option" class="form-control">
                            </div>
                            <small id="questionHelp" class="form-text text-muted">Separate the option with Comma ( , )
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="answer" class="">Correct Answer</label>
                            <div class="">
                                <input type="text" id="answer" name="answer" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image" class="">Image (Optional)</label>
                            <input type="file" id="image" name="image" class="d-block">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        @elseif($type== 'scramble')
                        <input type="text" hidden name="type" value="{{ $type }}">
                        <div class="form-group">
                            <label for="question" class="">Question</label>
                            <div class="">
                                <textarea name="question" class="form-control" id="question" cols="30"
                                    rows="10"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="option" class="">Options</label>
                            <div class="">
                                <input type="text" name="option" id="option" class="form-control">
                            </div>
                            <small id="" class="form-text text-muted">Separate the option with Vertical Bar
                                ( | )
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="answer" class="">Correct Answer</label>
                            <div class="">
                                <textarea class="form-control" name="answer" id="answer" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image" class="">Image (Optional)</label>
                            <input type="file" id="image" name="image" class="d-block">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        @elseif($type== 'matching')
                        <input type="text" hidden name="type" value="{{ $type }}">
                        <div class="form-group">
                            <label for="sectionA" class="">Section A</label>
                            <div class="">
                                <textarea name="section_a" class="form-control" id="sectionA" cols="30"
                                    rows="10"></textarea>
                            </div>
                            <small id="sectionAHelp" class="form-text text-muted">Separate the option with Vertical Bar
                                ( | )
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="sectionB" class="">Section B</label>
                            <div class="">
                                <textarea name="section_b" class="form-control" id="sectionB" cols="30"
                                    rows="10"></textarea>
                            </div>
                            <small id="sectionBHelp" class="form-text text-muted">Separate the option with Vertical Bar
                                ( | )
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="answer" class="">Correct Answer</label>
                            <div class="">
                                <input type="text" name="answer" id="answer" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image" class="">Image (Optional)</label>
                            <input type="file" id="image" name="image" class="d-block">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        @elseif($type == "voice")
                        <input type="text" hidden name="type" value="{{ $type }}">
                        <div class="form-group">
                            <label for="question" class="">Question</label>
                            <div class="">
                                <textarea name="question" class="form-control" id="question" cols="30"
                                    rows="10"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image" class="">Image (Optional)</label>
                            <input type="file" name="image" class="d-block">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        @else
                        <div class="p-5 text-center border">
                            <p class="card-title mb-4">Select Exercise Type</p>
                            <a href="{{ route('dashboard.add_exercise' , ['unit_code' => $lesson->unit->unit_code , 'lesson_code' => $lesson->lesson_code])  . '?type=' . 'true_false' }}"
                                class="btn btn-primary">True /
                                False</a>
                            <a href="{{ route('dashboard.add_exercise' , ['unit_code' => $lesson->unit->unit_code , 'lesson_code' => $lesson->lesson_code])  . '?type=' . 'mcq' }}"
                                class="btn btn-primary">Multiple Choice Question</a>
                            <a href="{{ route('dashboard.add_exercise' , ['unit_code' => $lesson->unit->unit_code , 'lesson_code' => $lesson->lesson_code])  . '?type=' . 'scramble' }}"
                                class="btn btn-primary">Scramble</a>
                            <a href="{{ route('dashboard.add_exercise' , ['unit_code' => $lesson->unit->unit_code , 'lesson_code' => $lesson->lesson_code])  . '?type=' . 'matching' }}"
                                class="btn btn-primary">Matching</a>
                            <a href="{{ route('dashboard.add_exercise' , ['unit_code' => $lesson->unit->unit_code , 'lesson_code' => $lesson->lesson_code])  . '?type=' . 'voice' }}"
                                class="btn btn-primary">Voice Test</a>
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-5">Add Exercise</h4>
                    <div class="p-5 text-center border">
                        <p class="card-title mb-4">Select Exercise Type</p>
                        <a href="{{ route('dashboard.add_exercise' , ['unit_code' => $lesson->unit->unit_code , 'lesson_code' => $lesson->lesson_code])  . '?type=' . 'true_false' }}"
                            class="btn btn-primary">True /
                            False</a>
                        <a href="{{ route('dashboard.add_exercise' , ['unit_code' => $lesson->unit->unit_code , 'lesson_code' => $lesson->lesson_code])  . '?type=' . 'mcq' }}"
                            class="btn btn-primary">Multiple Choice Question</a>
                        <a href="{{ route('dashboard.add_exercise' , ['unit_code' => $lesson->unit->unit_code , 'lesson_code' => $lesson->lesson_code])  . '?type=' . 'scramble' }}"
                            class="btn btn-primary">Scramble</a>
                        <a href="{{ route('dashboard.add_exercise' , ['unit_code' => $lesson->unit->unit_code , 'lesson_code' => $lesson->lesson_code])  . '?type=' . 'matching' }}"
                            class="btn btn-primary">Matching</a>
                        <a href="{{ route('dashboard.add_exercise' , ['unit_code' => $lesson->unit->unit_code , 'lesson_code' => $lesson->lesson_code])  . '?type=' . 'voice' }}"
                            class="btn btn-primary">Voice Test</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>

    @endif


</div>

<!-- #/ container -->

@endsection
