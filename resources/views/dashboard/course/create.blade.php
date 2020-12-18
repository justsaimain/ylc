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
                    <h4 class="card-title">Create New Course</h4>
                    <form action="{{ route('dashboard.create_course_post') }}" method="POST" class="mt-5"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="" name="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Category</label>
                            <div class="col-sm-10">
                                <select name="category_id" id="" class="form-control">
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Teacher</label>
                            <div class="col-sm-10">
                                <select name="teacher_id" id="" class="form-control">
                                    @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Durations (Days)</label>
                            <div class="col-sm-10">
                                <input type="number" min="1" class="form-control" id="" name="duration">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Fees (MMK)</label>
                            <div class="col-sm-10">
                                <input type="number" min="1" class="form-control" id="" name="fees">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Cover Image</label>
                            <div class="col-sm-10">
                                <input type="file" class="" id="" name="image">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Course Video</label>
                            <div class="col-sm-10">
                                <input type="file" class="" id="" name="video">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #/ container -->
@endsection
