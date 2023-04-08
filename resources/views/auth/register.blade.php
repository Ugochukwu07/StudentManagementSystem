@extends('layouts.auth.app', ['title' => 'Register for an account'])

@section('content')
<div class="pt-4 pb-2">
    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
    <p class="text-center small">Enter your personal details to create account</p>
  </div>

  <form class="row g-3" method="POST" action="{{ route('register.save') }}">
    <div class="col-12 col-md-6">
      <label for="name" class="form-label">Your Full Name*</label>
      <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="John Doe" id="name">
      @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="col-12 col-md-6">
      <label for="email" class="form-label">Your Email</label>
      <input type="email" name="email" placeholder="example@nau.com.edu" value="{{ old('email') }}" class="form-control" id="email">
      @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="col-12 col-md-6">
      <label for="reg_number" class="form-label">Reg Number*</label>
      <input type="text" name="reg_number" class="form-control" value="{{ old('reg_number') }}" placeholder="2018674256" id="reg_number">
      @error('reg_number')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="col-12 col-md-6">
      <label for="phone_number" class="form-label">Phone Number</label>
      <input type="text" name="phone_number" placeholder="08192564316" value="{{ old('phone_number') }}" class="form-control" id="phone_number">
      @error('phone_number')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <div class="col-6 col-md-6">
      <label for="session_id" class="form-label">Session*</label>
      <select class="form-select-mg bg-transparent form-control" name="session_id" id="session_id">
        <option>Select Session</option>
        @foreach ($sessions as $session)
            <option {{ ($session->id == old('session_id')) ? 'selected' : '' }} value="{{ $session->id }}">{{ $session->year }}</option>
        @endforeach
      </select>
      @error('session_id')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <div class="col-6 col-md-6">
      <label for="department_id" class="form-label">Department*</label>
      <select class="form-select-mg bg-transparent form-control" name="department_id" id="department_id">
        <option>Select Department</option>
        @foreach ($departments as $department)
            <option {{ ($department->id == old('department_id')) ? 'selected' : '' }} value="{{ $department->id }}">{{ $department->name }}</option>
        @endforeach
      </select>
      @error('department_id')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="col-12 col-md-6">
      <label for="password" class="form-label">Password</label>
      <input type="password" placeholder="Type Password" name="password" class="form-control" id="password">
      @error('password')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <div class="col-12 col-md-6">
      <label for="password_confirmation" class="form-label">Password</label>
      <input type="password" placeholder="Type Password Confirmation" name="password_confirmation" class="form-control" id="password_confirmation">
      @error('password_confirmation')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    @csrf
    <div class="col-12">
        <div class="form-check">
            <input class="form-check-input" name="terms" type="checkbox" value="" id="terms">
            <label class="form-check-label" for="terms">I agree and accept the <a href="#">terms and conditions</a></label>
            @error('terms')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12">
      <button class="btn btn-primary w-100" type="submit">Create Account</button>
    </div>
    <div class="col-12 text-center">
      <p class="small mb-0">Already have an account? <a href="{{ route('login') }}">Log in</a></p>
    </div>
  </form>
@endsection
