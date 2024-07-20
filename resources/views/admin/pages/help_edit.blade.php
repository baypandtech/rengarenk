@extends('admin.home')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Yardım Kategorisini Düzenle</h1>
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
          <input type="text" name="baslik" class="form-control" id="exampleInputEmail1" placeholder="Kategorinin Adı" value="{{ $helpcategory->title }}" required>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Açıkaması</label>
          <textarea name="aciklama" class="form-control" id="exampleInputEmail1" placeholder="Kategori Açıklaması">{{ $helpcategory->content }}</textarea>
      </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Icon</label>
          <input type="text" name="icon" class="form-control" id="exampleInputEmail1" placeholder="Font Awesome Icon Kullanın örn: fab fa-youtube" value="{{ $helpcategory->icon }}">
          <a target="_BLANK" href="https://fontawesome.com/v5/search?o=r&f=brands">Font Awesome Icon Ara</a>
        </div>
        @php
          $kategori = App\HelpCategory::where('id', $helpcategory->kategori)->first();
        @endphp
        @php
          $helpcategories = App\HelpCategory::orderBy('created_at', 'desc')->get();
        @endphp
        <select name="kategori">
          <option value="" disabled {{ $kategori ? 'selected' : '' }}>{{ $kategori ? $kategori->title : 'Kategoriye Bağla' }}</option>
          <option value="">Ana Kategori</option>
          @forelse ($helpcategories as $help)
              <option value="{{ $help->id }}">{{ $help->title }}</option>
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