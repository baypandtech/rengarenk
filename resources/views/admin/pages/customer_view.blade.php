@extends('admin.home')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Müşteri Detayı</h1>
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
                @foreach ($customer as $customers)
                  <div class="post">
                    <div class="user">
                      <span class="username">
                        <h5> <strong>Müşteri Adı: </strong> {{ $customers->adsoyad }}</h5>
                      </span>
                    </div>

                    <p><strong>Telefon: </strong>{{ $customers->telefon }}</p>
                    <p><strong>Eposta: </strong>{{ $customers->eposta }}</p>
                    <p> <strong>Açıklama:</strong> {{ $customers->aciklama }}</p>
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