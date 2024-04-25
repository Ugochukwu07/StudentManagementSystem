@extends('layouts.app', ['title' => 'Schedule'])

@section('content')
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item">Results</li>
            <li class="breadcrumb-item active">New</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h2>Add Result for Student</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.result.add.save') }}" method="POST">
                        @csrf
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
                        <button type="submit" class="btn btn-primary float-end">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
