<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ Auth::user()->admin ? route('admin.overview') : route('student.overview') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      @if(Auth::user()->admin)
        <li class="nav-heading">Schools</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-shield-check"></i><span>Faculty</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="#!" data-bs-toggle="modal" data-bs-target="#modal-add-faculty">
                    <i class="bi bi-circle"></i><span>New Faculty</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.faculty.index') }}">
                    <i class="bi bi-circle"></i><span>All Faculties</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav-department" data-bs-toggle="collapse" href="#">
                <i class="bi bi-shield-fill-x"></i><span>Departments</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav-department" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="#!" data-bs-toggle="modal" data-bs-target="#modal-add-department">
                    <i class="bi bi-circle"></i><span>New Department</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.department.index') }}">
                    <i class="bi bi-circle"></i><span>All Departments</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav-session" data-bs-toggle="collapse" href="#">
                <i class="bi bi-shield-check"></i><span>Sessions</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav-session" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="#!" data-bs-toggle="modal" data-bs-target="#modal-add-session">
                    <i class="bi bi-circle"></i><span>New Session</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.session.all') }}">
                    <i class="bi bi-circle"></i><span>All Sessions</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav-class" data-bs-toggle="collapse" href="#">
                <i class="bi bi-house"></i><span>Classes</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav-class" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="#!" data-bs-toggle="modal" data-bs-target="#modal-add-class">
                    <i class="bi bi-circle"></i><span>New Class</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.class.all') }}">
                    <i class="bi bi-circle"></i><span>All Classs</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-heading">Students</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav-student" data-bs-toggle="collapse" href="#">
                <i class="bi bi-people"></i><span>Students</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav-student" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="#!" data-bs-toggle="modal" data-bs-target="#modal-add-student">
                    <i class="bi bi-circle"></i><span>New student</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.student.all') }}">
                    <i class="bi bi-circle"></i><span>All Students</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav-schedule" data-bs-toggle="collapse" href="#">
                <i class="bi bi-calendar-date"></i><span>Schedules</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav-schedule" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="">
                    <i class="bi bi-circle"></i><span>New Schedule</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.schedule.all') }}">
                    <i class="bi bi-circle"></i><span>All Schedules</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-heading">Admins</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav-admin" data-bs-toggle="collapse" href="#">
                <i class="bi bi-person-badge"></i><span>Admins</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav-admin" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="#!" data-bs-toggle="modal" data-bs-target="#modal-add-admin">
                    <i class="bi bi-circle"></i><span>New Admin</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.admin.all') }}">
                    <i class="bi bi-circle"></i><span>All Admins</span>
                    </a>
                </li>
            </ul>
        </li>
        @else

            <li class="nav-heading">Accounts</li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-person"></i><span>Profile</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('student.profile', ['type' => 1]) }}">
                    <i class="bi bi-circle"></i><span>Profile</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('student.profile', ['type' => 2]) }}">
                    <i class="bi bi-circle"></i><span>Authentication</span>
                    </a>
                </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('student.schedule.view') }}">
                <i class="bi bi-menu-button-wide"></i>
                <span>Notifications</span>
                </a>
            </li>

            <li class="nav-heading">Schedule</li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('student.schedule.view') }}">
                <i class="bi bi-menu-button-wide"></i>
                <span>TimeTable</span>
                </a>
            </li>

            <li class="nav-heading">Gradings</li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('student.schedule.view') }}">
                <i class="bi bi-menu-button-wide"></i>
                <span>Results</span>
                </a>
            </li>
        @endif

        <li class="nav-heading">Others</li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="{{ route('logout') }}">
            <i class="bi bi-box-arrow-in-left"></i>
            <span>Logout</span>
          </a>
        </li>
    </ul>

  </aside>
  <!-- End Sidebar-->

  @if(Auth::user()->admin)
    <!-- Modal -->
    <div class="modal center-modal fade" id="modal-add-faculty" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="row">
                    @foreach ($errors->all() as $error)
                        <div class="col-12 text-danger">{{ $error }}</div>
                    @endforeach
                </div>
                <form action="{{ route('admin.faculty.add.save') }}" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Faculty</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="form-group row">
                            <label class="col-form-label col-md-12">Faculty Name</label>
                            <div class="col-md-12">
                                <input class="form-control" value="{{ old('name') }}" type="text" name="name">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="width: 100%;">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary float-end">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal center-modal fade" id="modal-add-session" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="row">
                    @foreach ($errors->all() as $error)
                        <div class="col-12 text-danger">{{ $error }}</div>
                    @endforeach
                </div>
                <form action="{{ route('admin.session.add.save') }}" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Session</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="form-group row">
                            <label class="col-form-label col-md-12">Session Year</label>
                            <div class="col-md-12">
                                <input class="form-control" value="{{ old('year') }}" type="text" name="year" placeholder="2020/2021">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="width: 100%;">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary float-end">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal center-modal fade" id="modal-add-department" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="row">
                    @foreach ($errors->all() as $error)
                        <div class="col-12 text-danger">{{ $error }}</div>
                    @endforeach
                </div>
                <form action="{{ route('admin.department.add.save') }}" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Faculty</h5>
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
                                        <option {{ (old('faculty_id') == $faculty->id) ? 'selected' : '' }} value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-12">Department Name</label>
                            <div class="col-md-12">
                                <input class="form-control" value="{{ old('name') }}" type="text" name="name">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="width: 100%;">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary float-end">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal center-modal fade" data-backdrop="static" data-keyboard="false"  aria-labelledby="staticBackdropLabel" aria-hidden="true" id="modal-add-class" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content" style="overflow-y: scroll">
                <div class="row">
                    @foreach ($errors->all() as $error)
                        <div class="col-12 text-danger">{{ $error }}</div>
                    @endforeach
                </div>
                <div class="modal-header">
                    <h5 class="modal-title">Add a Class</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.class.add.save') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group row">
                            <label class="col-form-label col-md-12">Class Name</label>
                            <div class="col-md-12">
                                <input class="form-control" value="{{ old('name') }}" type="text" name="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-12">Department</label>
                            <div class="col-md-12">
                                <select name="department_id" class="form-select">
                                    <option>Select Department</option>
                                    @foreach ($departments() as $department)
                                        <option {{ (old('department_id') == $department->id) ? 'selected' : '' }} value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-12">Session</label>
                            <div class="col-md-12">
                                <select name="session_id" class="form-select">
                                    <option>Select session</option>
                                    @foreach ($sessions() as $session)
                                        <option {{ (old('session_id') == $session->id) ? 'selected' : '' }} value="{{ $session->id }}">{{ $session->year }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer modal-footer-uniform" style="width: 100%;">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary float-end">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal center-modal fade" data-backdrop="static" data-keyboard="false"  aria-labelledby="staticBackdropLabel" aria-hidden="true" id="modal-add-student" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content" style="overflow-y: scroll">
                <div class="row">
                    @foreach ($errors->all() as $error)
                        <div class="col-12 text-danger">{{ $error }}</div>
                    @endforeach
                </div>
                <div class="modal-header">
                    <h5 class="modal-title">Add a Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.student.add.save') }}" method="POST">
                    <div class="modal-body">
                        @csrf

                        {{-- <div class="form-group row">
                            <label class="col-form-label col-md-12">Classes</label>
                            <div class="col-md-12">
                                <select name="class_id" class="form-select">
                                    <option>Select Class</option>
                                    @foreach ($classes() as $class)
                                        <option {{ (old('class_id') == $class->id) ? 'selected' : '' }} value="{{ $class->id }}">{{ $class->name . '-' . $class->session->year }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}
                        <div class="form-group row">
                            <label class="col-form-label col-md-12">Department</label>
                            <div class="col-md-12">
                                <select name="department_id" class="form-select">
                                    <option>Select Department</option>
                                    @foreach ($departments() as $department)
                                        <option {{ (old('department_id') == $department->id) ? 'selected' : '' }} value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-12">Session</label>
                            <div class="col-md-12">
                                <select name="session_id" class="form-select">
                                    <option>Select session</option>
                                    @foreach ($sessions() as $session)
                                        <option {{ (old('session_id') == $session->id) ? 'selected' : '' }} value="{{ $session->id }}">{{ $session->year }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-12">Full Name*</label>
                            <div class="col-md-12">
                                <input class="form-control" value="{{ old('name') }}" placeholder="John Doe" type="text" name="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-12">Reg Number*</label>
                            <div class="col-md-12">
                                <input class="form-control" value="{{ old('reg_number') }}" placeholder="201754289" type="text" name="reg_number">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-12">Student Mail*</label>
                            <div class="col-md-12">
                                <input class="form-control" value="{{ old('email') }}" placeholder="student@nau.com" type="email" name="email">
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
                    <div class="modal-footer modal-footer-uniform" style="width: 100%;">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary float-end">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal center-modal fade" data-backdrop="static" data-keyboard="false"  aria-labelledby="staticBackdropLabel" aria-hidden="true" id="modal-add-admin" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content" style="overflow-y: scroll">
                <div class="row">
                    @foreach ($errors->all() as $error)
                        <div class="col-12 text-danger">{{ $error }}</div>
                    @endforeach
                </div>
                <div class="modal-header">
                    <h5 class="modal-title">Add an Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.admin.add.save') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group row">
                            <label class="col-form-label col-md-12">Full Name*</label>
                            <div class="col-md-12">
                                <input class="form-control" value="{{ old('name') }}" placeholder="John Doe" type="text" name="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-12">Email*</label>
                            <div class="col-md-12">
                                <input class="form-control" value="{{ old('email') }}" placeholder="admin@nau.com" type="email" name="email">
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
                    <div class="modal-footer modal-footer-uniform" style="width: 100%;">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary float-end">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- <!-- Modal -->
    <div class="modal center-modal fade" id="modal-add-offices" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="row">
                    @foreach ($errors->all() as $error)
                        <div class="col-12 text-danger">{{ $error }}</div>
                    @endforeach
                </div>
                <form action="{{ route('admin.office.add.save') }}" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Office</h5>
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
                                        <option {{ (old('department_id') == $department->id) ? 'selected' : '' }} value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-12">Offices Name</label>
                            <div class="col-md-12">
                                <input class="form-control" value="{{ old('name') }}" type="text" name="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-12">Address</label>
                            <div class="col-md-12">
                                <input class="form-control" value="{{ old('address') }}" type="text" name="address">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="width: 100%;">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary float-end">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
@endif
