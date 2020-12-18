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
                    <h4 class="card-title">{{ $course->name }} <small>by {{ $course->teacher->name }}</small></h4>
                    <p>{{ $course->description }}</p>
                    <div class="row">
                        <div class="col-6">
                            <p>Cover Image</p>
                            <img class="card-img" src="{{ asset('storage/courses/pub/images/' . $course->image) }}"
                                alt="{{ $course->image }}">
                        </div>
                        <div class="col-6">
                            <p>Intro Video</p>
                            <video class="w-100" controls>
                                <source src="{{ asset('storage/courses/pub/videos/' . $course->video) }}"
                                    type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-3">
                            <dl class="row">
                                <dt class="col-sm-3">Course ID</dt>
                                <dd class="col-sm-9">{{ $course->course_id }}</dd>
                                <dt class="col-sm-3">Duration</dt>
                                <dd class="col-sm-9">{{ $course->duration }} Days</dd>
                            </dl>
                        </div>
                        <div class="col-3">
                            <dl class="row">
                                <dt class="col-sm-3">Category</dt>
                                <dd class="col-sm-9">{{ $course->category->name }}</dd>
                                <dt class="col-sm-3">Teacher</dt>
                                <dd class="col-sm-9">{{ $course->teacher->name }}</dd>
                            </dl>
                        </div>
                        <div class="col-3">
                            <dl class="row">
                                <dt class="col-sm-3">Fees</dt>
                                <dd class="col-sm-9">{{ $course->fees }} MMK</dd>
                                <dt class="col-sm-3">Created at</dt>
                                <dd class="col-sm-9">{{ $course->created_at->diffForHumans() }}
                                    ({{ date('d-m-Y',strtotime($course->created_at)) }})</dd>
                                <dt class="col-sm-3">Updated</dt>
                                <dd class="col-sm-9">{{ $course->updated_at->diffForHumans() }}
                                    ({{ date('d-m-Y',strtotime($course->created_at)) }})</dd>
                            </dl>
                        </div>
                        <div class="col-3">
                            <div class="alert alert-success" role="alert">
                                <p>Enroll Students</p>
                                <h4 class="alert-heading">50 Students</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Units
                                <span class="badge badge-success text-white">
                                    @if($course->unit->count() > 0)
                                    {{ $course->unit->count() }}
                                    @else
                                    Empty
                                    @endif</span>
                            </h4>
                            <button class="btn btn-primary text-uppercase" data-toggle="modal"
                                data-target="#addUnitModal">Add
                                Unit</button>

                            @if ($course->unit->count() > 0)
                            <hr>
                            <div class="list-group">
                                @foreach ($course->unit as $unit)
                                <a href="{{ route('dashboard.view_unit' , ['course_code' => $course->course_code , 'unit_code' => $unit->unit_code]) }}"
                                    class="list-group-item list-group-item-action">{{ $loop->index + 1 }}.
                                    {{ $unit->name }}</a>
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- #/ container -->

<div class="modal fade" id="addUnitModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Unit Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addUnitForm" action="{{ route('dashboard.add_unit_to_course' , $course->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="unit_name">Unit Name</label>
                        <input type="text" class="form-control" id="unit_name" name="unit_name">
                    </div>
                    <div class="form-group">
                        <label for="unit_description">Unit Description (Optional)</label>
                        <textarea class="form-control" name="unit_description" id="unit_description" cols="30"
                            rows="5"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary text-white" data-dismiss="modal">Close</button>
                <button type="submit" form="addUnitForm" class="btn btn-primary">Add</button>
            </div>
        </div>
    </div>
</div>
@endsection
