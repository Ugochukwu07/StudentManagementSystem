@extends('layouts.app', ['title' => 'Students'])

@section('content')

<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Students</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">

        @foreach ($errors->all() as $error)
            <div class="col-md-6 my-1 text-danger bg-danger-light p-2">*{{ $error }}</div>
            {{-- <hr> --}}
        @endforeach
        <!-- Left side columns -->
        <div class="col-lg-10 mx-auto">
            <div class="row">
                <!-- Admins Card -->
                <div class="col-xxl-4 mx-auto col-md-6">
                    <div class="card info-card sales-card">

                        <div class="filter me-3">
                            <a class="btn btn-sm btn-outline-danger" href="{{ route('admin.admin.all') }}">View</a>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">Admins</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-person"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ count($admins) }}</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Admin Card -->

                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">admins</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="students" class="table table-bordered table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($admins as $key => $admin)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $admin->name }}</td>
                                                <td>{{ $admin->email }}</td>
                                                <td>{{ date('F j, Y h:i:s A', strtotime($admin->created_at)) }}</td>
                                                <td>
                                                    <button type="button" data-bs-toggle="modal" data-bs-target="#modal-edit-admin-{{ $admin->id }}" class="btn my-1 btn-sm btn-info">Edit</button>
                                                    <a href="{{ route('admin.admin.delete', ['id' => $admin->id]) }}" class="btn my-1 btn-sm btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                            <!-- Modal -->
                                            <div class="modal center-modal fade" id="modal-edit-admin-{{ $admin->id }}" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="row">
                                                            @foreach ($errors->all() as $error)
                                                                <div class="col-12 text-danger">{{ $error }}</div>
                                                            @endforeach
                                                        </div>
                                                        <form action="{{ route('admin.admin.edit.save', ['id' => $admin->id]) }}" method="POST">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit an admin</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                @csrf
                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-md-12">Full Name*</label>
                                                                    <div class="col-md-12">
                                                                        <input class="form-control" value="{{ old('name') ?? $admin->name }}" placeholder="John Doe" type="text" name="name">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-md-12">Admin Mail*</label>
                                                                    <div class="col-md-12">
                                                                        <input class="form-control" value="{{ old('email') ?? $admin->email }}" placeholder="admin@nau.com" type="email" name="email">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-md-12">Passsword*</label>
                                                                    <div class="col-md-12">
                                                                        <input class="form-control" value="{{ old('password') }}" type="password" placeholder="201754289" name="password">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-form-label col-md-12">Password Confirmation</label>
                                                                    <div class="col-md-12">
                                                                        <input class="form-control" value="{{ old('password_confirmation') }}" placeholder="201754289" type="password" name="password_confirmation">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer" style="width: 100%;">
                                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary float-end">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
