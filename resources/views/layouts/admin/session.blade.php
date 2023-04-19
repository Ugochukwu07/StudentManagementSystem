<div class="col-12">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Sessions</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table id="session" class="table table-bordered datatable table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Year</th>
                            <th>Added By</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sessions as $key => $session)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $session->year }}</td>
                                <td>{{ $session->addedBy->name }}</td>
                                <td>{{ date('F j, Y h:i:s A', strtotime($session->created_at)) }}</td>
                                <td>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#modal-edit-session-{{ $session->id }}" class="btn my-1 btn-sm btn-info">Edit</button>
                                    <a href="{{ route('admin.session.delete', ['id' => $session->id]) }}" class="btn my-1 btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal center-modal fade" id="modal-edit-session-{{ $session->id }}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="row">
                                            @foreach ($errors->all() as $error)
                                                <div class="col-12 text-danger">{{ $error }}</div>
                                            @endforeach
                                        </div>
                                        <form action="{{ route('admin.session.edit.save', ['id' => $session->id]) }}" method="POST">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Update Session</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                @csrf
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-12">Session Year</label>
                                                    <div class="col-md-12">
                                                        <input class="form-control" value="{{ old('year') ?? $session->year }}" type="text" name="year" placeholder="2020/2021">
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
                            <th>Year</th>
                            <th>Added By</th>
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
