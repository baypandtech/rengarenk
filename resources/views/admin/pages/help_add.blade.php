@extends('admin.home')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Yardım Kategorisi Ekle</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<section class="p-3">
<div class="card card-primary">
    
    <!-- /.card-header -->
    <!-- form start -->
    <form action="/{!!Request::path()!!}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Kategori Adı</label>
          <input type="text" name="baslik" class="form-control" id="exampleInputEmail1" placeholder="Kategorinin Adı" required>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Açıkaması</label>
          <textarea name="aciklama" class="form-control" id="exampleInputEmail1" placeholder="Kategori Açıklaması"></textarea>
      </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Icon</label>
          <input type="text" name="icon" class="form-control" id="exampleInputEmail1" placeholder="Font Awesome Icon Kullanın örn: fab fa-youtube">
          <a target="_BLANK" href="https://fontawesome.com/v5/search?o=r&f=brands">Font Awesome Icon Ara</a>
        </div>
        @php
            $helpcategories = App\HelpCategory::orderBy('created_at', 'desc')->get();
        @endphp
        <select name="kategori">
          <option disabled selected>Kategoriye Bağla</option>
          @forelse ($helpcategories as $helpcategory)
              <option value="{{ $helpcategory->id }}">{{ $helpcategory->title }}</option>
          @empty
              <option disabled>Kategori Yok</option>
          @endforelse
      </select>
        
        
      </div>
      <!-- /.card-body -->

      <div class="card-footer center">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Kaydet</button>
      </div>
    </form>
  </div>

</section>
  @endsection