<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ Auth::user()->admin ? route('admin.main.overview') : route('student.overview') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      @if(Auth::user()->admin)
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
