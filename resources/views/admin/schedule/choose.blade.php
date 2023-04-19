@extends('layouts.app', ['title' => 'Students'])

@section('content')

<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Schedule</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row" style="min-height: 70vh;">
        <div class="col-md-8 mx-auto my-auto">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">Choose Class</h5>
                    <form action="{{ route('admin.schedule.choose.save') }}" class="g-3" method="POST">
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
                            <label class="col-form-label col-md-12">Session</label>
                            <div class="col-md-12">
                                <select name="session_id" class="form-select">
                                    <option>Select session</option>
                                    @foreach ($sessions as $session)
                                    <option {{ (old('session_id') == $session->id) ? 'selected' : '' }} value="{{ $session->id }}">{{ $session->year }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="text-center my-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
