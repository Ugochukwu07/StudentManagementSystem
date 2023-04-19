<div class="col-12">
    <div class="card">
        <div class="card-header with-border">
            <h3 class="card-title">Departments</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="table-responsive">
                <table id="departments" class="table table-borderless datatable table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Faculty</th>
                            <th>Added By</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($departments as $key => $department)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $department->name }}</td>
                                <td>{{ $department->faculty->name }}</td>
                                <td>{{ $department->addedBy->name }}</td>
                                <td>{{ $department->active ? 'Active' : 'Inactive' }}</td>
                                <td>{{ date('F j, Y h:i:s A', strtotime($department->created_at)) }}</td>
                                <td>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#modal-edit-department-{{ $department->id }}" class="btn my-1 btn-sm btn-info">Edit</button>
                                    <a href="{{ route('admin.department.delete', ['id' => $department->id, 'soft' => 1]) }}" class="btn my-1 btn-sm btn-warning">Toggle Active</a>
                                    <a href="{{ route('admin.department.delete', ['id' => $department->id, 'soft' => 0]) }}" class="btn my-1 btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal center-modal fade" id="modal-edit-department-{{ $department->id }}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="row">
                                            @foreach ($errors->all() as $error)
                                                <div class="col-12 text-danger">{{ $error }}</div>
                                            @endforeach
                                        </div>
                                        <form action="{{ route('admin.department.edit.save', ['id' => $department->id]) }}" method="POST">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Update department</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                @csrf

                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-12">Faculty</label>
                                                    <div class="col-md-12">
                                                        <select name="faculty_id" class="form-select">
                                                            <option>Select Faculty</option>
                                                            @foreach ($faculties as $faculty)
                                                                <option {{ (($department->faculty_id == $faculty->id) || (old('faculty_id') == $faculty->id)) ? 'selected' : '' }} value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-12">Department Name</label>
                                                    <div class="col-md-12">
                                                        <input class="form-control" value="{{ old('name') ?? $department->name }}" type="text" name="name">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <input type="checkcard" name="active" id="active" class="filled-in" checked />
                                                        <label for="active">Active</label>
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
                            <th>Faculty</th>
                            <th>Added By</th>
                            <th>Status</th>
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
