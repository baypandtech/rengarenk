@extends('admin.home')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">SEO Modülü Ekle</h1>
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
        @php
            use App\Category;
            $categories = Category::all();
        @endphp
    
        <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Kategori Seçin</label>
                <select id="categori" name="kategori" class="form-control" required>
                    <option selected disabled>Kategoriler</option>
                    @foreach ($categories as $categori)
                        <option>{{ $categori->baslik }}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>İl</label>
                @php
                  $cities = App\City::orderby('title', 'asc')->get();
                @endphp
            
                <select name="il" class="form-control" id="ilSelect" onchange="onIlSelectChange()">
                    <option selected disabled>İl Seçin</option>
                      @foreach ($cities as $city)
                        <option IlId="{{ $city->id }}" value="{{ $city->title }}">{{ $city->title }}</option>
                      @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>İlçe</label>
                    <select name="ilce" class="form-control" id="ilceSelect" onchange="onIlceSelectChange()">
                        <option selected disabled>Bölge Seçin</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Kategori Açıklaması</label>
                    <textarea id="aciklama" type="text" name="aciklama" class="form-control" id="exampleInputEmail1" placeholder="Özel Kategori Açıklamanızı Girin"></textarea>
                </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <div id="ilceswitchdiv" class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success" ilce-switch="">
                  <input name="switch" type="checkbox" class="custom-control-input" id="customSwitch3">
                  <label id="switchlabel" class="custom-control-label" for="customSwitch3">Sadece İlçeyi Kullan</label>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                  <label for="exampleInputEmail1">Seo Başlık</label>
                  <input id="seo_title" type="text" name="seo_title" class="form-control" id="exampleInputEmail1" placeholder="Özel Seo Başlığınızı Girin">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                  <label for="exampleInputEmail1">Seo Açıklama</label>
                  <textarea id="seo_description" type="text" name="seo_description" class="form-control" id="exampleInputEmail1" placeholder="Özel Seo Açıklamanızı Girin"></textarea>
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
        if (kategori.value == "" || aciklama.value == "" ) {
            alert("Kategori veya açıklama boş bırakılamaz." + customSwitch.value);
        }
        else if(il.value == "") {
          alert("Lütfen il veya ilçe seçimini tamamlayın.");
        }
        else {
            // Formu gönder
            document.getElementById("myForm").submit();
        }
    });
</script>
</section>
  @endsection