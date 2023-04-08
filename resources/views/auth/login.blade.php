@extends('layouts.auth.app', ['title' => 'Login to your account'])

@section('content')
<div class="pt-4 pb-2">
    <h5 class="card-title text-center pb-0 fs-4">Login</h5>
    <p class="text-center small">Welcome back to {{ config('app.name') }}</p>
  </div>

  <form class="row g-3" method="POST" action="{{ route('login.save') }}">
    @csrf
    <div class="col-12">
      <label for="email_reg" class="form-label">Your Email or Reg Number</label>
      <input type="email" name="email_reg" placeholder="example@nau.com.edu || 20162728" value="{{ old('email_reg') }}" class="form-control" id="email_reg">
      @error('email_reg')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="col-12">
      <label for="password" class="form-label">Password</label>
      <input type="password" placeholder="Type Password" name="password" class="form-control" id="password">
      @error('password')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="col-12">
      <button class="btn btn-primary w-100" type="submit">Create Account</button>
    </div>
    <div class="col-12 text-center">
      <p class="small mb-0">Don't have an account? <a href="{{ route('register') }}">Register</a></p>
    </div>
  </form>
@endsection
