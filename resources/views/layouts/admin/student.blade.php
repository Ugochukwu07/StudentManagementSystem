<div class="col-12">
    <div class="card">
        <div class="card-header with-border">
            <h3 class="card-title">Students</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="table-responsive">
                <table id="students" class="table table-bordered table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Reg Number</th>
                            <th>Department</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $key => $student)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->profile->reg_number ?? 'Error' }}</td>
                                <td>{{ $student->profile->department->name ?? 'Error' }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ date('F j, Y h:i:s A', strtotime($student->created_at)) }}</td>
                                <td>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#modal-edit-student-{{ $student->id }}" class="btn my-1 btn-sm btn-info">Edit</button>
                                    <a href="{{ route('admin.student.delete', ['id' => $student->id]) }}" class="btn my-1 btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal center-modal fade" id="modal-edit-student-{{ $student->id }}" tabindex="-1">
                                <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="row">
                                            @foreach ($errors->all() as $error)
                                                <div class="col-12 text-danger">{{ $error }}</div>
                                            @endforeach
                                        </div>
                                        <form action="{{ route('admin.student.edit.save', ['id' => $student->id]) }}" method="POST">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit a Student</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                @csrf
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-12">Department</label>
                                                    <div class="col-md-12">
                                                        <select name="department_id" class="form-select">
                                                            <option>Select Department</option>
                                                            @foreach ($departments as $department)
                                                                <option {{ (($student->department_id == $department->id) || (old('department_id') == $department->id)) ? 'selected' : '' }} value="{{ $department->id }}">{{ $department->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-12">Full Name*</label>
                                                    <div class="col-md-12">
                                                        <input class="form-control" value="{{ old('name') ?? $student->name }}" placeholder="John Doe" type="text" name="name">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-12">Reg Number*</label>
                                                    <div class="col-md-12">
                                                        <input class="form-control" value="{{ old('reg_number') ?? $student->profile->reg_number ?? 'Error' }}" placeholder="201754289" type="text" name="reg_number">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-12">Student Mail*</label>
                                                    <div class="col-md-12">
                                                        <input class="form-control" value="{{ old('email') ?? $student->email }}" placeholder="student@nau.com" type="email" name="email">
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
                            <th>Reg Number</th>
                            <th>Department</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
