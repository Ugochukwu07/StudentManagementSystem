<div class="col-12">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Offices</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table id="offices" class="table table-bordered table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Faculty</th>
                            <th>Added By</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($offices as $key => $office)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $office->name }}</td>
                                <td>{{ $office->department->name }}</td>
                                <td>{{ $office->faculty->name }}</td>
                                <td>{{ $office->addedBy->name }}</td>
                                <td>{{ $office->active ? 'Active' : 'Inactive' }}</td>
                                <td>{{ date('F j, Y h:i:s A', strtotime($office->created_at)) }}</td>
                                <td>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#modal-edit-office-{{ $office->id }}" class="btn my-1 btn-sm btn-info">Edit</button>
                                    <a href="{{ route('admin.office.delete', ['id' => $office->id, 'soft' => 1]) }}" class="btn my-1 btn-sm btn-warning">Toggle Active</a>
                                    <a href="{{ route('admin.office.delete', ['id' => $office->id, 'soft' => 0]) }}" class="btn my-1 btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal center-modal fade" id="modal-edit-office-{{ $office->id }}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="row">
                                            @foreach ($errors->all() as $error)
                                                <div class="col-12 text-danger">{{ $error }}</div>
                                            @endforeach
                                        </div>
                                        <form action="{{ route('admin.office.edit.save', ['id' => $office->id]) }}" method="POST">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Update Office</h5>
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
                                                                <option {{ (($office->department_id == $department->id) || (old('department_id') == $department->id)) ? 'selected' : '' }} value="{{ $department->id }}">{{ $department->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-12">Office Name</label>
                                                    <div class="col-md-12">
                                                        <input class="form-control" value="{{ old('name') ?? $office->name }}" type="text" name="name">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-12">Address</label>
                                                    <div class="col-md-12">
                                                        <input class="form-control" value="{{ old('address') ?? $office->address }}" type="text" name="address">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <input type="checkbox" name="active" id="active" class="filled-in" checked />
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
                            <th>Department</th>
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
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
