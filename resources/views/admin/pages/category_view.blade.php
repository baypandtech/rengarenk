@extends('admin.home')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Kategori Detayı</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
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
                @foreach ($category as $categories)
                  <div class="post">
                    <div class="user">
                            
                      <span class="username">
                        <h5> <strong>Kategori Adı: </strong> {{ $categories->baslik }}</h5>
                      </span>
                      
                    </div>
                    <!-- /.user-block -->
                    <p>
                    <strong>Kategori Açıklaması</strong>    {{ $categories->aciklama }}
                    </p>
                    @if (!empty($categories->image))
                        <p class="text-center">
                            <img class="page_detail_image" src="/public/storage/{{ $categories->image }}" />
                        </p>
                    @endif
                    @if($categories->seo_title)<p> <strong>Seo Başlık:</strong>    {{ $categories->aciklama }}</p>@endif
                    @if($categories->seo_description)<p> <strong>Seo Açıklama:</strong>    {{ $categories->aciklama }}</p>@endif

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