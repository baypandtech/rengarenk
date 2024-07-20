@extends('admin.home')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">SEO Modülü Düzenle</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<section class="p-3">
<div class="card card-primary">
    
    <!-- /.card-header -->
    <!-- form start -->
    <form id="myForm" action="/{!!Request::path()!!}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="card-body">
    
        <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Kategori Seçin</label>
                <select id="categori" name="kategori" class="form-control" required>
                    @foreach ($categories as $categori)
                    @if(!empty($categoryinfo->kategori))
                      @if ($categoryinfo->kategori == $categori->id)
                        <option disabled selected>{{ $categori->baslik }}</option>
                      @endif
                      <option>{{ $categori->baslik }}</option>
                    @else
                        <option disabled selected>Kategoriler</option>
                        <option>{{ $categori->baslik }}</option>
                    @endif
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>İl</label>
                @php
                  $cities = App\City::orderby('title', 'asc')->get();
                @endphp
            
                <select name="il" class="form-control" id="ilSelect" onchange="onIlSelectChange()">
                  @if(!empty($categoryinfo->il))
                      <option value="{{ $categoryinfo->il }}" disabled selected>{{ $categoryinfo->il }}</option>
                      @foreach ($cities as $city)
                        <option IlId="{{ $city->id }}" value="{{ $city->title }}">{{ $city->title }}</option>
                      @endforeach
                  @else
                      <option value="" disabled selected>İl Seçin</option>
                      @foreach ($cities as $city)
                        <option IlId="{{ $city->id }}" value="{{ $city->title }}">{{ $city->title }}</option>
                      @endforeach
                  @endif
                </select>
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>İlçe</label>
                    <select name="ilce" class="form-control" id="ilceSelect" onchange="onIlceSelectChange()">
                      @if(!empty($categoryinfo->ilce))
                      <option value="{{ $categoryinfo->ilce }}" disabled selected>{{ $categoryinfo->ilce }}</option>
                  @else
                      <option value="" disabled selected>Bölge Seçilmemiş</option>
                  @endif
                </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Kategori Açıklaması</label>
                    <textarea id="aciklama" type="text" name="aciklama" class="form-control" id="exampleInputEmail1" placeholder="Özel Kategori Açıklamanızı Girin">{{ $categoryinfo->aciklama }}</textarea>
                </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <div id="ilceswitchdiv" class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success" ilce-switch="">
                  <input name="switch" type="checkbox" class="custom-control-input" id="customSwitch3" {{ !empty($categoryinfo->ilce) && empty($categoryinfo->il) ? 'checked' : '' }}>
                  <label id="switchlabel" class="custom-control-label" for="customSwitch3">Sadece İlçeyi Kullan</label>
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                  <label for="exampleInputEmail1">Seo Başlık</label>
                  <input id="seo_title" type="text" name="seo_title" class="form-control" id="exampleInputEmail1" placeholder="Özel Seo Başlığınızı Girin" value="{{ $categoryinfo->seo_title }}" required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                  <label for="exampleInputEmail1">Seo Açıklama</label>
                  <textarea id="seo_descripton" type="text" name="seo_description" class="form-control" id="exampleInputEmail1" placeholder="Özel Seo Açıklamanızı Girin" required>{{ $categoryinfo->seo_description }}</textarea>
              </div>
            </div>
        
      
        </div>
    </div>
    <!-- /.card-body -->
    
    <div class="card-footer center">
        <button id="submitBtn" type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Kaydet</button>
    </div>
    
    </form>
  </div>
  
  <script>
    document.getElementById("submitBtn").addEventListener("click", function(event) {
        event.preventDefault(); // Formun otomatik olarak gönderilmesini engelle

        // Gerekli alanları kontrol et
        var kategori = document.getElementById("categori");
        var aciklama = document.getElementById("aciklama");
        var il = document.getElementById("ilSelect");
        var ilce = document.getElementById("ilceSelect");
        var customSwitch = document.getElementById("customSwitch3");
        if(customSwitch.checked){
          customSwitch.value = "on";
        }
        else{
          customSwitch.value = "";
        }
            // Formu gönder
            document.getElementById("myForm").submit();
        
    });
</script>
</section>
  @endsection