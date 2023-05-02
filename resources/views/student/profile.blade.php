@extends('layouts.app', ['title' => 'Profile'])

@section('content')
<style>
    .invalid-feedback{
        display: block;
    }
</style>
<div class="pagetitle">
    <h1>Profile</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Users</li>
            <li class="breadcrumb-item active">Profile</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section profile">
    <div class="row">
        <div class="col-xl-4">

            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                    <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                    <h2>{{ Auth::user()->name }}</h2>
                    <h3>{{ $profile->department->name }}</h3>
                    <h3>{{ $profile->department->faculty->name }}</h3>
                    {{-- <div class="social-links mt-2">
                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    </div> --}}
                </div>
            </div>

        </div>

        <div class="col-xl-8">

            <div class="card">
                <div class="card-body pt-3">
                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs nav-tabs-bordered">

                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab"
                                data-bs-target="#profile-overview">Overview</button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                Profile</button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab"
                                data-bs-target="#profile-change-password">Change Password</button>
                        </li>

                    </ul>
                    <div class="tab-content pt-2">

                        <div class="tab-pane fade show active profile-overview" id="profile-overview">

                            <h5 class="card-title">Profile Details</h5>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                <div class="col-lg-9 col-md-8">{{ Auth::user()->name }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Reg Number</div>
                                <div class="col-lg-9 col-md-8">{{ $profile->reg_number }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Email</div>
                                <div class="col-lg-9 col-md-8">{{ Auth::user()->email }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Phone</div>
                                <div class="col-lg-9 col-md-8">{{ $profile->phone_number }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Address</div>
                                <div class="col-lg-9 col-md-8">{{ $profile->address }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Department</div>
                                <div class="col-lg-9 col-md-8">{{ $profile->department->name }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Faculty</div>
                                <div class="col-lg-9 col-md-8">{{ $profile->department->faculty->name }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Session</div>
                                <div class="col-lg-9 col-md-8">{{ $profile->session->year }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Country</div>
                                <div class="col-lg-9 col-md-8">USA</div>
                            </div>

                        </div>

                        <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                            <div class="row">
                                @foreach ($errors->all() as $error)
                                    <div class="col-12 text-danger">{{ $error }}</div>
                                @endforeach
                            </div>
                            <!-- Profile Edit Form -->
                            <form method="POST" action="{{ route('student.profile.save', ['id' => Auth::user()->id]) }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $profile->id }}">
                                {{-- <div class="row mb-3">
                                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile
                                        Image</label>
                                    <div class="col-md-8 col-lg-9">
                                        <img src="assets/img/profile-img.jpg" alt="Profile">
                                        <div class="pt-2">
                                            <a href="#" class="btn btn-primary btn-sm"
                                                title="Upload new profile image"><i class="bi bi-upload"></i></a>
                                            <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i
                                                    class="bi bi-trash"></i></a>
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="name" type="text" class="form-control" id="name" value="{{ old('name') ?? Auth::user()->name }}">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="reg_number" class="col-md-4 col-lg-3 col-form-label">Reg Number</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="reg_number" type="text" class="form-control" id="reg_number" value="{{ old('reg_number') ?? $profile->reg_number }}">
                                        @error('reg_number')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- <div class="row mb-3">
                                    <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                                    <div class="col-md-8 col-lg-9">
                                        <textarea name="about" class="form-control" id="about"
                                            style="height: 100px">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</textarea>
                                    </div>
                                </div> --}}

                                <div class="row mb-3">
                                    <label for="department_id" class="col-md-4 col-lg-3 col-form-label">Department</label>
                                    <div class="col-md-8 col-lg-9">
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
                                </div>

                                <div class="row mb-3">
                                    <label for="session_id" class="col-md-4 col-lg-3 col-form-label">Session</label>
                                    <div class="col-md-8 col-lg-9">
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
                                </div>

                                <div class="row mb-3">
                                    <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input {{-- name="country" --}} type="text" class="form-control" readonly id="Country" value="Nigeria">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="address" type="text" class="form-control" id="address" value="{{ old('address') ?? $profile->address }}">
                                        @error('address')
                                            <div class="text-danger invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="phone_number" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="phone_number" type="text" class="form-control" id="phone_number" value="{{ old('phone_number') ?? $profile->phone_number }}">
                                        @error('phone_number')
                                            <div class="text-danger invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="email" type="email" class="form-control" id="email"value="{{ old('email') ?? Auth::user()->email }}">
                                        @error('email')
                                            <div class="text-danger invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="sex" class="col-md-4 col-lg-3 col-form-label">Sex</label>
                                    <div class="col-md-8 col-lg-9">
                                        <select class="form-select-mg bg-transparent form-control" name="sex" id="sex">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                    @error('sex')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form><!-- End Profile Edit Form -->

                        </div>

                        <div class="tab-pane fade pt-3" id="profile-change-password">
                            <!-- Change Password Form -->
                            <form>

                                <div class="row mb-3">
                                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current
                                        Password</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="password" type="password" class="form-control"
                                            id="currentPassword">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New
                                        Password</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New
                                        Password</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="renewpassword" type="password" class="form-control"
                                            id="renewPassword">
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Change Password</button>
                                </div>
                            </form><!-- End Change Password Form -->

                        </div>

                    </div><!-- End Bordered Tabs -->

                </div>
            </div>

        </div>
    </div>
</section>
@endsection
