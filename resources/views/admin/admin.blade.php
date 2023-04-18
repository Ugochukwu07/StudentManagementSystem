@extends('layouts.app', ['title' => Auth::user()->name . '\'s Dashboard'])

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
      <!-- Main content -->
      <section class="content">
          <div class="row">
            <x-Admin.Admin.Overview-Component />

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
      </section>
      <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
