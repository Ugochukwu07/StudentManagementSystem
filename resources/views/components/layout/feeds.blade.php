<li class="nav-item dropdown">

    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
      <i class="bi bi-bell"></i>
      <span class="badge bg-primary badge-number">{{ $datai()['count'] }}</span>
    </a><!-- End Notification Icon -->

    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
      <li class="dropdown-header">
        You have {{ $datai()['count'] }} new notifications
        <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
      </li>
      <li>
        <hr class="dropdown-divider">
      </li>
      @foreach ($datai()['feeds'] as $feed)
        <li class="notification-item">
            <i class="bi bi-exclamation-circle text-{{ $feed->feed_type }}"></i>
            <div>
                <h4>{{ $feed->title }}</h4>
                <p>{{ $feed->message }}</p>
                <p>{{ $feed->format_time }}</p>
            </div>
        </li>
        <li>
            <hr class="dropdown-divider">
        </li>
      @endforeach

      <li>
        <hr class="dropdown-divider">
      </li>
      <li class="dropdown-footer">
        <a href="{{ route('student.feeds') }}">Show all notifications</a>
      </li>

    </ul><!-- End Notification Dropdown Items -->

  </li><!-- End Notification Nav -->
