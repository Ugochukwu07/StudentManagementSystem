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
                            <label class="col-form-label col-md-12">Student</label>
                            <div class="col-md-12">
                                {{-- @foreach ($students as $per_student)
                                @dd($per_student->profile->reg_number)
                                @endforeach --}}
                                <select name="student_id" class="form-select">
                                    <option>Select Student</option>
                                    @foreach ($students as $per_student)
                                    {{-- @dd($per_student) --}}
                                        <option {{ ((old('student_id') == $per_student->id) || ($student->id == $per_student->id)) ? 'selected' : '' }} value="{{ $per_student->id }}">{{ $per_student->name . ' - ' . $per_student->profile->reg_number }}</option>
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
                        <div class="form-group row">
                            <label class="col-form-label col-md-12">Semesters</label>
                            <div class="col-md-12">
                                <select name="semester" class="form-select">
                                    <option value="1">First Semester</option>
                                    <option value="2">Second Semester</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="course_code" class="col-form-label">Course Code*</label>
                                <input class="form-control" value="{{ old('course_code') }}" type="text" placeholder="CSC 101" name="course_code">
                            </div>
                            <div class="col-md-6">
                                <label for="course" class="col-form-label">Course*</label>
                                <input class="form-control" value="{{ old('course') }}" type="text" placeholder="Introduction to Programming" name="course">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label class="col-form-label">Score*</label>
                                <input type="text" name="score" value="{{ old('score') }}" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label">Grade*</label>
                                <input type="text" name="grade" value="{{ old('grade') }}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4 py-3 mx-auto">
                                <button type="submit" style="width: 100%" class="btn btn-block btn-primary">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
