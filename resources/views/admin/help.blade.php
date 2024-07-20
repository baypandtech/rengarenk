@extends('admin.home')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Destek Sayfası Düzenleme</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<section class="p-3">
  <style>
    .nav-pills .nav-link.active{
      background-color: white;
    }
    .card-primary:not(.card-outline)>.card-header, .card-primary:not(.card-outline)>.card-header a:hover{
      color: black;
    }
  </style>
  <div class="card card-primary">
    <div class="card-header p-2 bg-secondary">
      <ul class="nav nav-pills">
        <li class="nav-item"><a class="nav-link active" href="#edit" data-toggle="tab">Sayfa Düzenle</a></li>
        <li class="nav-item"><a class="nav-link" href="#kategori" data-toggle="tab">Destek Kategorileri</a></li>
      </ul>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
   
      <div class="card-body">
        <div class="tab-content">


          {{-- //edit page --}}
          <div class="tab-pane active" id="edit">
            <form action="/{!!Request::path()!!}" method="POST" enctype="multipart/form-data">
              @csrf
                  {{-- <style>
                    .border_l{border-right:0.5px solid gainsboro; }
                    @media (max-width: 767px) {.border_l{ border-right: none; }  }
                  </style> --}}
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="baslik"> Ana Başlık</label>
                        <input type="text" name="baslik" class="form-control" id="exampleInputEmail1" placeholder="Sayfa Başlığı Giriniz" value="{{ $page->baslik }}">
                    </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Banner Resmi</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input name="Bannerimage" type="file" accept="image/*" max-size="512000" class="custom-file-input" id="exampleInputFile2" onchange="previewImage2(event)">
                            <label class="custom-file-label" for="exampleInputFile">Resim seç</label>
                        </div>
                    </div>
                    <i style="font-size: 12px;">Max 500kb resim boyutuna izin verilmektedir.</i>
                    </div>
                    <div class="form-group">
                        <p class="text-center mt-3" id="imagePreviewContainer2" style="display: none;">
                            <img id="imagePreview2" src="#" alt="" class="page_detail_image">
                        </p>
                    </div>
                    @if ($page->banner_image)
                        <div class="form-group">
                            <p class="text-center mt-3"><img id="old_image2" src="/public/storage/{{ $page->banner_image }}" alt="" srcset="" class="page_detail_image"></p>
                        </div>
                    @endif
                </div>

                <div class="col-md-12 pl-md-4 pr-md-4">
                    <div class="p-5" style="border-radius: 5px; border:0.5px solid gainsboro;">
                      <h4 class="text-center"><i class="fas fa-chart-line"></i> Seo Alanı</h4>
                      <div class="form-group">
                        <label for="seoTitle">SEO Başlık</label>
                        <input type="text" class="form-control" name="seoTitle" value="{{ $page->seo_title }}" placeholder="SEO Başlığınızı Girin">
                      </div>
                      <div class="form-group">
                          <label for="seoDescription">SEO Açıklama</label>
                          <textarea class="form-control" name="seoDescription" rows="3" placeholder="SEO Açıklamanızı Girin">{{ $page->seo_aciklama }}</textarea>
                      </div>
                    </div>
              </div>
              <div class="card-footer text-center">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Kaydet</button>
              </div>
            
            </form>
          </div>


          {{-- //kategori --}}
          <div class="tab-pane" id="kategori" style="overflow: auto">
            <div class="btn-group-right text-right" style="float: right;">
              <a href="/{!!Request::path()!!}/ekle">
                <button type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i></button></a>
                <button onclick="multi_delete()" type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" id="SelectedBtn"><i class="fas fa-trash-alt"></i></i></button>
            </div>
            
            <table class="table table-striped projects" style="overflow: auto;">
              <thead>
                  
                <tr>
                  <th><input type="checkbox" name="all" value="" onclick="toggle(this);"></th>
                    <th>Başlık</th>
                    <th>Açıklama</th>
                    <th>İcon</th>
                    <th style="text-wrap:nowrap;">Bağlı Kategori</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($helpcategory as $helpcategories)

                  <tr>
                    <th>
                      <input type="checkbox" class="selected_customer" name="selected_customers[]" value="{{ $helpcategories->seo_url }}" baslik="{{ $helpcategories->title }}"></th>
                     
                      <td>
                        <p>{{ $helpcategories->title }}</p>
                      </td>
                    
                      <td>
                        <p>{{ $helpcategories->content }}</p>
                      </td>

                      <td>
                        <i class="{{ $helpcategories->icon }}"></i>
                      </td>

                      @php
                          $kategori = App\HelpCategory::where('id', $helpcategories->kategori)->first();
                      @endphp
                      <td>
                        @if ($kategori)
                          <p>{{ $kategori->title }}</p>
                        @endif
                      </td>
                      
                      <td class="project-actions text-right">
                        {{-- <a class="btn btn-primary btn-sm" href="/{!!Request::path()!!}/detay/{{ $helpcategories->seo_url }}">
                            <i class="fas fa-eye"></i>
                        </a> --}}
                        <a class="btn btn-info btn-sm" href="/{!!Request::path()!!}/duzenle/{{ $helpcategories->seo_url }}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            
                        </a>
                        <a data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btn-sm" href="#" onclick="destroy('{{ $helpcategories->seo_url }}')">
                            <i class="fas fa-trash">
                            </i>
                        </a>
                      </td>
                      
                  </tr>
                
                  @empty
                  <tr><td colspan="5"><h4 class="text-center">Kategori Bulunamadı</h4></td> </tr>
                  @endforelse

              </tbody>
            </table>
            
            <div class="d-flex justify-content-center">
              <div class="ml-3 mt-3" >
    
                <span class="float-right">
                  <nav class="float-right mr-3">
                      <ul class="pagination">
                          <li class="page-item {{ $helpcategory->previousPageUrl() ? '' : 'disabled' }}" aria-disabled="{{ $helpcategory->previousPageUrl() ? 'false' : 'true' }}" aria-label="« Previous">
                              @if ($helpcategory->previousPageUrl())
                                  <a class="page-link" href="{{ $helpcategory->previousPageUrl() }}" aria-hidden="true">Önceki</a>
                              @else
                                  <span class="page-link" aria-hidden="true">Önceki</span>
                              @endif
                          </li>
                          @foreach (range(1, $helpcategory->lastPage()) as $page)
                              <li class="page-item {{ $page == $helpcategory->currentPage() ? 'active' : '' }}" aria-current="{{ $page == $helpcategory->currentPage() ? 'page' : '' }}">
                                  <a class="page-link" href="{{ $helpcategory->url($page) }}">{{ $page }}</a>
                              </li>
                          @endforeach
                          <li class="page-item {{ $helpcategory->nextPageUrl() ? '' : 'disabled' }}">
                              <a class="page-link" href="{{ $helpcategory->nextPageUrl() }}" rel="next" aria-label="Next »">Sonraki</a>
                          </li>
                      </ul>
                  </nav>
                </span>
              </div>
            </div>
            
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Silme İşlemi Onayı</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Silme işlemi gerçekleştirmek istediğinize emin misiniz?
                    <div class="mt-2" id="selectedhelpcategorysDisplay"></div>
                  </div>
      
                  <form action="/{!!Request::path()!!}" method="POST" id="single_delete">
                    @csrf
                    <div class="modal-footer">
                      <input type="hidden" name="slug" id="slug" value="">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">İptal</button>
                      <button type="submit" class="btn btn-danger">Sil</button>
                    </div>
                  </form>
      
                  <form id="deleteForm" action="/{!!Request::path()!!}/delete-all" method="POST">
                    @csrf
                    <div class="modal-footer">
                        <input type="hidden" name="selected_helpcategorys" id="selectedhelpcategorys">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">İptal</button>
                        <button onclick="deleteSelected();" type="button" class="btn btn-danger">Seçilenleri Sil</button>
                    </div>
                  </form>
      
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    <!-- /.card-body -->
  </div>
  
  <script>
    function destroy(slug){
     document.getElementById("slug").value=slug;
     document.getElementById("single_delete").style.display="block";
     document.getElementById("deleteForm").style.display="none";
    }
    function multi_delete(){
     document.getElementById("single_delete").style.display="none";
     document.getElementById("deleteForm").style.display="block";
     var checkboxes = document.querySelectorAll('.selected_customer:checked');
     var selectedhelpcategorys = [];
     checkboxes.forEach(function(checkbox) {
       var baslik = checkbox.getAttribute('baslik');
       selectedhelpcategorys.push(baslik);
     });
     
     // Seçilen helpcategorylari form içinde göster
     var selectedhelpcategorysText = selectedhelpcategorys.join("<br>");
     document.getElementById('selectedhelpcategorysDisplay').innerHTML = "<p>Seçilen kategoriler:</p>" + selectedhelpcategorysText;
     
    }
   </script>

   <script>
       function toggle(source) {
         var checkboxes = document.querySelectorAll('.selected_customer');
         checkboxes.forEach(function(checkbox) {
             checkbox.checked = source.checked;
         });
       }

       function deleteSelected() {
           var checkboxes = document.querySelectorAll('.selected_customer:checked');
           
           if (checkboxes.length === 0) {
               alert("Hiçbir kategori seçilmedi.");
               return;
           }
           
           var selectedhelpcategorys = [];
           checkboxes.forEach(function(checkbox) {
               selectedhelpcategorys.push(checkbox.value);
           });
                       
           document.getElementById('selectedhelpcategorys').value = JSON.stringify(selectedhelpcategorys);
           document.getElementById('deleteForm').submit();
       }

   </script>

</section>
  @endsection