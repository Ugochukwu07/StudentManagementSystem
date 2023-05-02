@extends('layouts.app', ['title' => 'Schedule'])

@section('content')
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item">Schedule</li>
            <li class="breadcrumb-item active">Class</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        @foreach ($schedules as $schedule)
            <!-- SChedule Card -->
            <div class="col-xxl-3 mx-auto col-md-4">
                <div class="card info-card sales-card">

                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="ps-3">
                                <p class="card-title pb-0">{{ $schedule->course }}</p>
                                <p class="card-title my-0 p-0">{{ $schedule->course_code }}</p>
                                <p>{{ $schedule->day_for_humans }}</p>
                                <p>{{ date('h:i A', strtotime($schedule->start_time)) . '-' . date('h:i A', strtotime($schedule->end_time)) }}</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- End SChedule Card -->
        @endforeach
    </div>
</section>
@endsection
