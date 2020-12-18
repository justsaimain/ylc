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
                    <h4 class="card-title">Unit Name - {{ $unit->name }}</h4>
                    <p>Unit Code - {{ $unit->unit_code }}</p>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            Lessons
                        </div>
                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addLessonModal">Add New
                            Lesson</button>
                    </div>
                    @if ($unit->lesson->count() > 0)
                    <div class="list-group mt-3">
                        @foreach ($unit->lesson as $lesson)
                        <a href="{{ route('dashboard.view_lessoon' , ['unit_code' => $unit->unit_code , 'lesson_code' => $lesson->lesson_code])}}"
                            class="list-group-item list-group-item-action">{{ $lesson->name }}</a>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Unit Name - {{ $unit->name }}</h4>
                    <p>Unit Code - {{ $unit->unit_code }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- #/ container -->

<div class="modal fade" id="addLessonModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="addLessonModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addLessonModalLabel">Add Lesson Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addLessonForm" action="{{ route('dashboard.add_lesson_to_unit' , $unit->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="lesson_name">Lesson Name</label>
                        <input type="text" class="form-control" id="lesson_name" name="lesson_name">
                    </div>
                    <div class="form-group">
                        <label for="lesson_description">Lesson Description (Optional)</label>
                        <textarea class="form-control" name="lesson_description" id="lesson_description" cols="30"
                            rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="lesson_video">Lesson Video (Optional)</label>
                        <input type="file" class="d-block mt-2" id="lesson_video" name="lesson_video">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary text-white" data-dismiss="modal">Close</button>
                <button type="submit" form="addLessonForm" class="btn btn-primary">Add</button>
            </div>
        </div>
    </div>
</div>

@endsection
