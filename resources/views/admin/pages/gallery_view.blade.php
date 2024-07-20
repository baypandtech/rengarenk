@extends('admin.home')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Görsel Detayı</h1>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

<section class="content">

    <!-- Default box -->
    <div class="card">
      
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-md-12 col-lg-12 order-2 order-md-1">
            
            <div class="row">
              <div class="col-12">
                {{-- <h4>Recent Activity</h4> --}}
                @foreach ($gallery as $gallerys)
                  <div class="post">
                    <div class="user">
                            
                      <span class="username">
                        <h5> <strong>Görsel Adı: </strong> {{ $gallerys->baslik }}</h5>
                      </span>
                      
                    </div>
                    <!-- /.user-block -->
                  
                    @if (!empty($gallerys->image))
                        <p class="text-center">
                            <img class="page_detail_image" src="/public/storage/{{ $gallerys->image }}" />
                        </p>
                    @endif
                  </div>
                  @endforeach

              </div>
            </div>
          </div>
          
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>

  @endsection