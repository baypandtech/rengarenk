@extends('admin.home')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
         
          <div class="row mb-2" style="display: flex; flex-wrap: nowrap; justify-content: space-between;">
              <div class="col-sm-6">
                  <h1 class="m-0">Görseller</h1>
              </div><!-- /.col -->
              <div class="col-sm-4">
                <div class="btn-group-right text-right">
                  <a href="/{!!Request::path()!!}/ekle">
                    <button type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i></button></a>
                    <button onclick="multi_delete()" type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" id="SelectedBtn"><i class="fas fa-trash-alt"></i></i></button>
                </div>
              </div>
          </div><!-- /.row -->
      </div><!-- /.container-fluid -->
  </div>
    <!-- /.content-header -->

    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">

          <div class="card-tools">
              {{-- <div class="input-group input-group-sm" style="width:250px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Ara"> 
                  <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                          <i class="fas fa-search"></i>
                      </button>
                  </div>

              </div> --}}
          </div>
      </div>
        <div class="card-body p-0" style="overflow: auto">
          <table class="table table-striped projects">
              <thead>
                    
                  <tr>
                    <th><input type="checkbox" name="all" value="" onclick="toggle(this);"></th>
                      <th >
                          Görsel Adı
                      </th>
                      <th>
                          Fotoğraf
                      </th>
                  </tr>
              </thead>
              <tbody>
                @forelse ($gallery as $gallerys)

                  <tr>
                    <th>
                      <input type="checkbox" class="selected_customer" name="selected_customers[]" value="{{ $gallerys->seo_url }}" baslik="{{ $gallerys->baslik }}"></th>
                      <td>
                        <p>{{ $gallerys->baslik }}</p>
                      </td>
                      
                      <td>
                        @if(!empty($gallerys->image))
                          <img alt="Avatar" class="page_image" src="/public/storage/{{ $gallerys->image }}">
                        @endif
                      </td>
                      <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm" href="/{!!Request::path()!!}/detay/{{ $gallerys->seo_url }}">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a class="btn btn-info btn-sm" href="/{!!Request::path()!!}/duzenle/{{ $gallerys->seo_url }}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            
                        </a>
                        <a data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btn-sm" href="#" onclick="destroy('{{ $gallerys->seo_url }}')">
                            <i class="fas fa-trash">
                            </i>
                        </a>
                    </td>
                  </tr>
                 
                  @empty
                  <tr><td colspan="4"><h4 class="text-center">Görsel Bulunamadı</h4></td> </tr>
                  @endforelse

              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        <div class="d-flex justify-content-center">
        <div class="ml-3 mt-3" >

          <span class="float-right">
            <nav class="float-right mr-3">
                <ul class="pagination">
                    <li class="page-item {{ $gallery->previousPageUrl() ? '' : 'disabled' }}" aria-disabled="{{ $gallery->previousPageUrl() ? 'false' : 'true' }}" aria-label="« Previous">
                        @if ($gallery->previousPageUrl())
                            <a class="page-link" href="{{ $gallery->previousPageUrl() }}" aria-hidden="true">Önceki</a>
                        @else
                            <span class="page-link" aria-hidden="true">Önceki</span>
                        @endif
                    </li>
                    @foreach (range(1, $gallery->lastPage()) as $page)
                        <li class="page-item {{ $page == $gallery->currentPage() ? 'active' : '' }}" aria-current="{{ $page == $gallery->currentPage() ? 'page' : '' }}">
                            <a class="page-link" href="{{ $gallery->url($page) }}">{{ $page }}</a>
                        </li>
                    @endforeach
                    <li class="page-item {{ $gallery->nextPageUrl() ? '' : 'disabled' }}">
                        <a class="page-link" href="{{ $gallery->nextPageUrl() }}" rel="next" aria-label="Next »">Sonraki</a>
                    </li>
                </ul>
            </nav>
        </span>
        
      </div>
        </div>
      </div>
      <!-- /.card -->

       <!-- Silme Modalı -->
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
              <div class="mt-2" id="selectedgallerysDisplay"></div>
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
                  <input type="hidden" name="selected_gallerys" id="selectedgallerys">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">İptal</button>
                  <button onclick="deleteSelected();" type="button" class="btn btn-danger">Seçilenleri Sil</button>
              </div>
            </form>

          </div>
        </div>
      </div>
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
      var selectedgallerys = [];
      checkboxes.forEach(function(checkbox) {
        var baslik = checkbox.getAttribute('baslik');
        selectedgallerys.push(baslik);
      });
      
      // Seçilen Görselleri form içinde göster
      var selectedgallerysText = selectedgallerys.join("<br>");
      document.getElementById('selectedgallerysDisplay').innerHTML = "<p>Seçilen Görseller:</p>" + selectedgallerysText;
      
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
                alert("Hiçbir Görsel seçilmedi.");
                return;
            }
            
            var selectedgallerys = [];
            checkboxes.forEach(function(checkbox) {
                selectedgallerys.push(checkbox.value);
            });
            
        
            document.getElementById('selectedgallerys').value = JSON.stringify(selectedgallerys);
            document.getElementById('deleteForm').submit();
        }

    </script>
    </section>
  
  
@endsection