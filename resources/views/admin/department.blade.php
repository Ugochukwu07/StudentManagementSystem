@extends('layouts.app', ['title' => Auth::user()->name . '\'s Dashboard'])

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
      <!-- Main content -->
      <section class="content">
          <div class="row">
              <div class="col-xl-4 mx-auto col-12">
                  <div class="box box-body bg-primary">
                    <h4>
                      <span>Departments</span>
                      <span class="float-end"><a class="btn btn-xs btn-danger" href="{{ route('admin.department.index') }}">View</a></span>
                    </h4>
                    <br>
                    <p class="fs-30">{{ count($departments) }}</p>
                    {{-- <div class="fs-16"><i class="ion-arrow-graph-down-right text-white me-1"></i> %18 decrease from last month</div> --}}
                  </div>
              </div>

             @include('layouts.admin.department')
          </div>
      </section>
      <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
