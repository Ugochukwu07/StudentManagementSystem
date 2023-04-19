@extends('layouts.app', ['title' => 'Sessions'])

@section('content')
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.overview') }}">Home</a></li>
            <li class="breadcrumb-item active">Session</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-10 mx-auto">
            <div class="row">
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

             @include('layouts.admin.session')
          </div>
        </div>
    </div>
</section>
@endsection
