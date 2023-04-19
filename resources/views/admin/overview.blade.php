@extends('layouts.app', ['title' => 'Admin Dashboard'])

@section('content')

<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
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
        <div class="col-lg-8">
            <div class="row">

                <!-- Faculties Card -->
                <div class="col-xxl-4 mx-auto col-md-6">
                    <div class="card info-card sales-card">

                        <div class="filter me-3">
                            <a class="btn btn-sm btn-outline-danger" href="{{ route('admin.faculty.index') }}">View</a>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">Faculties</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-shield-check"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ count($faculties) }}</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Faculties Card -->

                <!-- Departments Card -->
                <div class="col-xxl-4 mx-auto col-md-6">
                    <div class="card info-card sales-card">

                        <div class="filter me-3">
                            <a class="btn btn-sm btn-outline-danger" href="{{ route('admin.department.index') }}">View</a>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">Departments</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-shield-check"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ count($departments) }}</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Departments Card -->

                <!-- Sessions Card -->
                <div class="col-xxl-4 mx-auto col-md-6">
                    <div class="card info-card sales-card">

                        <div class="filter me-3">
                            <a class="btn btn-sm btn-outline-danger" href="{{ route('admin.session.all') }}">View</a>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">Sessions</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-shield-check"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ count($sessions) }}</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sessions Card -->

                <!-- Students Card -->
                <div class="col-xxl-4 mx-auto col-md-6">
                    <div class="card info-card sales-card">

                        <div class="filter me-3">
                            <a class="btn btn-sm btn-outline-danger" href="{{ route('admin.student.all') }}">View</a>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">Students</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ count($students) }}</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End students Card -->

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


                @include('layouts.admin.student')
                @include('layouts.admin.department')
                @include('layouts.admin.session')
                @include('layouts.admin.faculty')

            </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

            <!-- Recent Activity -->
            <div class="card">
                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                            <h6>Filter</h6>
                        </li>

                        <li><a class="dropdown-item" href="#">Today</a></li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                </div>

                <div class="card-body">
                    <h5 class="card-title">Recent Activity</h5>

                    <div class="activity">

                        @foreach ($feeds as $feed)
                        <div class="activity-item d-flex">
                            <div class="activite-label">{{ $feed->format_time }}</div>
                            <i
                                class='bi bi-circle-fill activity-badge text-{{ $feed->feed_type }} align-self-start'></i>
                            <div class="activity-content">
                                <small>{{ $feed->title }}</small><br />
                                {{ $feed->message }}
                            </div>
                        </div><!-- End activity item-->
                        @endforeach

                    </div>

                </div>
            </div><!-- End Recent Activity -->

        </div><!-- End Right side columns -->
    </div>
</section>
@endsection
