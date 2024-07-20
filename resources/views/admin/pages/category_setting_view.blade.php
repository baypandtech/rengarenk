@extends('admin.home')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">SEO Modülü Detayı</h1>
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
                @foreach ($categoryinfo as $categoryinfos)
                  <div class="post">
                    <div class="user">
                      <span class="username">
                        @foreach ($categories as $categori)
                        @if ($categori->id == $categoryinfos->kategori)
                          <h5> <strong>Kategori: </strong> {{ $categori->baslik }}</h5>
                        @endif
                        @endforeach
                      </span>
                    </div>

                    @if($categoryinfos->il)<p><strong>İl: </strong>{{ $categoryinfos->il }}</p>@endif
                    @if($categoryinfos->ilce)<p> <strong>İlçe:</strong>    {{ $categoryinfos->ilce }}</p>@endif
                    @if($categoryinfos->aciklama)<p> <strong>Açıklama:</strong>    {{ $categoryinfos->aciklama }}</p>@endif
                    @if($categoryinfos->seo_title)<p> <strong>Seo Başlık:</strong>    {{ $categoryinfos->aciklama }}</p>@endif
                    @if($categoryinfos->seo_description)<p> <strong>Seo Açıklama:</strong>    {{ $categoryinfos->aciklama }}</p>@endif

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