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
                    <h4 class="card-title">New Registrations</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Region</th>
                                    <th>Township</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($registrations as $data)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->phone }}</td>
                                    <td>{{ $data->region }}</td>
                                    <td>{{ $data->township }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary" data-toggle="modal"
                                            data-target="#viewReg{{ $data->id }}">View</button>
                                    </td>
                                </tr>

                                <div class="modal fade" id="viewReg{{ $data->id }}" tabindex="-1"
                                    aria-labelledby="viewReg{{ $data->id }}Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">New Registration</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <dl class="row">
                                                    <dt class="col-sm-3">Name</dt>
                                                    <dd class="col-sm-9">{{ $data->name }}</dd>
                                                    <dt class="col-sm-3">Email</dt>
                                                    <dd class="col-sm-9">{{ $data->email }}</dd>
                                                    <dt class="col-sm-3">Phone</dt>
                                                    <dd class="col-sm-9">{{ $data->phone }}</dd>
                                                    <dt class="col-sm-3">Region</dt>
                                                    <dd class="col-sm-9">{{ $data->region }}</dd>
                                                    <dt class="col-sm-3">Township</dt>
                                                    <dd class="col-sm-9">{{ $data->township }}</dd>
                                                    <dt class="col-sm-3">Date</dt>
                                                    <dd class="col-sm-9">
                                                        {{ $data->created_at->diffForHumans() }}
                                                        ( {{date('d-m-Y',strtotime($data->created_at))  }} )
                                                    </dd>
                                                </dl>
                                                <form action="{{ route('dashboard.approve_student' , $data->id) }}"
                                                    id="approveStudent{{ $data->id }}" method="POST">
                                                    @csrf
                                                </form>
                                                <form action="{{ route('dashboard.delete_student' , $data->id) }}"
                                                    id="deleteStudent{{ $data->id }}" method="POST">
                                                    @csrf
                                                </form>
                                                <div class="d-flex justify-content-between">
                                                    <button type="submit" form="deleteStudent{{ $data->id }}"
                                                        class="btn btn-danger">Delete</button>
                                                    <button type="submit" form="approveStudent{{ $data->id }}"
                                                        class="btn btn-primary">Approve</button>
                                                </div>
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
