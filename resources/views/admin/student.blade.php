@extends('layouts.app', ['title' => Auth::user()->name . '\'s Dashboard'])

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
      <!-- Main content -->
      <section class="content">
          <div class="row">
            <x-Admin.Student.Overview-Component />

             @include('layouts.admin.student')
          </div>
      </section>
      <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
