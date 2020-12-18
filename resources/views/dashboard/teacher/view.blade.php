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
                    <h4 class="card-title">Teachers</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teachers as $data)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->created_at->diffForHumans() }}</td>
                                    <td>{{ $data->updated_at->diffForHumans() }}</td>
                                    <th>
                                        <form action="{{ route('dashboard.teacher_delete' , $data->id) }}" method="POST"
                                            id="deleteTeacher{{ $data->id }}">
                                            @csrf
                                        </form>
                                        <button class="btn btn-sm btn-primary" data-toggle="modal"
                                            data-target="#editModal{{ $data->id }}">Edit Data</button>
                                        <button class="btn btn-sm btn-danger" type="submit"
                                            form="deleteTeacher{{ $data->id }}">Delete</button>
                                    </th>
                                </tr>



                                <div class="modal fade" id="editModal{{ $data->id }}" tabindex="-1"
                                    aria-labelledby="editModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel">Edit Teacher Account</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('dashboard.teacher_update' , $data->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <input class="form-control mb-3" type="text"
                                                        value="{{ $data->name }}" name="name" placeholder="Name">
                                                    <input class="form-control mb-3" type="text"
                                                        value="{{ $data->email }}" name="email" placeholder="Email">
                                                    <div class="text-right">
                                                        <button type="submit" class="btn btn-primary">Update
                                                            Account</button>
                                                    </div>
                                                </form>
                                                <hr>
                                                <p>Change Password</p>
                                                <form
                                                    action="{{ route('dashboard.teacher_password_update' , $data->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <input type="text" placeholder="New Password" name="new_password"
                                                        class="form-control mb-3">
                                                    <div class="text-right">
                                                        <button type="submit" class="btn btn-primary">Change
                                                            Password</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #/ container -->
@endsection
