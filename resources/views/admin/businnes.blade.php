@extends('admin.home')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">İşletme Profili</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section>

        <div class="container">
            <div class="form-container">
                @forelse ($businessprofile as $profile)
                    @include('admin.layouts.form', ['profile' => $profile])
                @empty
                    @include('admin.layouts.form', ['profile' => null])
                @endforelse
            </div>
          </div>
          
    </section>

@endsection