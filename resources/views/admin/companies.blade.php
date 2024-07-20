@extends('admin.home')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
         
          <div class="row mb-2" style="display: flex; flex-wrap: nowrap;">
              <div class="col-sm-8">
                  <h1 class="m-0">Kayıtlı Firmalar</h1>
              </div><!-- /.col -->
              <div class="col-sm-4">
                {{-- <div class="btn-group-right text-right">
                  <a href="/{!!Request::path()!!}/ekle">
                    <button type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i></button></a>
                    <button onclick="multi_delete()" type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" id="SelectedBtn"><i class="fas fa-trash-alt"></i></i></button>
                </div> --}}
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
                          Adı Soyadı
                      </th>
                      <th >
                          İşletme Adı
                      </th>
                      <th>
                          Telefon
                      </th>
                      <th>
                        Eposta
                    </th>
                    <th>Kayıt Tarihi</th>
                    <th>Bitiş Tarihi</th>
                    <th>
                        Durum
                    </th>
                  </tr>
              </thead>
              <tbody>
                @forelse ($companies as $company)
                @php
                    $businnes = App\Businessprofile::where('user_id', $company->id)->first();
                    $currentDateTime = now();
                    if(!isset($businnes)){
                        $businnes = new App\Businessprofile();
                        $businnes->isletme_adi = "Profili Yok";
                        $businnes->status = "";
                    }
                @endphp

              
            
                  <tr>
                    <th>
                      <input type="checkbox" class="selected_customer" name="selected_company[]" value="{{ $company->seo_url }}" baslik="{{ $company->adsoyad }}"></th>
                      <td>
                        <p>{{ $company->name }}</p>
                      </td>
                      <td>
                        <p>{{ $businnes->isletme_adi }}</p>
                      </td>
                      <td>
                        <p>{{ $company->telefon }}</p>
                      </td>
                      <td>
                        <p>{{ $company->email }}</p>
                      </td>
                      <td>
                        <p>{{ substr($company->created_at, 0, 10) }}</p>
                      </td>
                      <td>
                        <p id="endTimeSpan{{ $company->time }}">{{ substr($company->time_to_expiry, 0, 10) }}</p>
                      </td>
                    <td class="project-actions text-left">
                        {{-- 
                        <a data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btn-sm" href="#" onclick="destroy('{{ $company->seo_url }}')">
                            <i class="fas fa-trash">
                            </i>
                        </a> --}}
                        @if ($businnes->isletme_adi != "Profili Yok")
                        <div id="status{{$company->id}}" class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input name="status" type="checkbox" class="custom-control-input" id="customSwitch{{$businnes->id}}" {{$businnes->status && ($company && $currentDateTime < $company->time_to_expiry) ? 'checked' : ''}} {{$company && $currentDateTime > $company->time_to_expiry ? 'disabled' : ''}}>
                            <label id="switchlabel{{$businnes->id}}" class="custom-control-label" for="customSwitch{{$businnes->id}}">
                                @if($businnes->status && ($currentDateTime < $company->time_to_expiry))
                                    Aktif
                                @else
                                    Pasif
                                @endif
                                @if($currentDateTime > $company->time_to_expiry)
                                <strong style="color: red;">Süre Dolmuş</strong>
                                @endif
                            </label>
                            <input type="hidden" name="csrf-token" content="{{ csrf_token() }}">
                        </div>
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#timeEditModal{{$company->id}}">
                            <i class="fas fa-user-clock"></i>
                        </a>
                        <div class="modal fade" id="timeEditModal{{$company->id}}" tabindex="-1" role="dialog" aria-labelledby="timeEditModalLabel{{$company->id}}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="timeEditModalLabel{{$company->id}}">Zaman Düzenleme</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="timeEditForm{{$company->id}}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="expiryTime{{$company->id}}">Yeni Bitiş Zamanı:</label>
                                                <input type="datetime-local" class="form-control" id="expiryTime{{$company->id}}" value="{{ $company->time_to_expiry }}" name="expiryTime">
                                            </div>
                                            <input type="hidden" name="companyId" value="{{$company->id}}">
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                                        <button type="button" class="btn btn-primary" onclick="editTime({{$company->id}})">Kaydet</button>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </td>
                    <td>
                        @if ($businnes->isletme_adi != "Profili Yok")
                        <a class="btn btn-primary btn-sm" target="_BLANK" href="/profil/{{ $businnes->seo_url }}">
                            <i class="fas fa-eye"></i>
                        </a>
                        @endif
                    </td>
                  </tr>
                 
                  @empty
                  <tr><td colspan="8"><h4 class="text-center">Firma Bulunamadı</h4></td> </tr>
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
                    <li class="page-item {{ $companies->previousPageUrl() ? '' : 'disabled' }}" aria-disabled="{{ $companies->previousPageUrl() ? 'false' : 'true' }}" aria-label="« Previous">
                        @if ($companies->previousPageUrl())
                            <a class="page-link" href="{{ $companies->previousPageUrl() }}" aria-hidden="true">Önceki</a>
                        @else
                            <span class="page-link" aria-hidden="true">Önceki</span>
                        @endif
                    </li>
                    @foreach (range(1, $companies->lastPage()) as $page)
                        <li class="page-item {{ $page == $companies->currentPage() ? 'active' : '' }}" aria-current="{{ $page == $companies->currentPage() ? 'page' : '' }}">
                            <a class="page-link" href="{{ $companies->url($page) }}">{{ $page }}</a>
                        </li>
                    @endforeach
                    <li class="page-item {{ $companies->nextPageUrl() ? '' : 'disabled' }}">
                        <a class="page-link" href="{{ $companies->nextPageUrl() }}" rel="next" aria-label="Next »">Sonraki</a>
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
                    <div class="mt-2" id="selectedcompanyDisplay"></div>
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
                        <input type="hidden" name="selected_company" id="selectedcompany">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">İptal</button>
                        <button onclick="deleteSelected();" type="button" class="btn btn-danger">Seçilenleri Sil</button>
                    </div>
                </form>

            </div>
        </div>
      </div>
    </div>

    {{-- <script>
     function destroy(slug){
      document.getElementById("slug").value=slug;
      document.getElementById("single_delete").style.display="block";
      document.getElementById("deleteForm").style.display="none";
     }
     function multi_delete(){
      document.getElementById("single_delete").style.display="none";
      document.getElementById("deleteForm").style.display="block";
      var checkboxes = document.querySelectorAll('.selected_customer:checked');
      var selectedcompany = [];
      checkboxes.forEach(function(checkbox) {
        var baslik = checkbox.getAttribute('baslik');
        selectedcompany.push(baslik);
      });
      
      // Seçilen Müşterileri form içinde göster
      var selectedcompanyText = selectedcompany.join("<br>");
      document.getElementById('selectedcompanyDisplay').innerHTML = "<p>Seçilen Müşteriler:</p>" + selectedcompanyText;
      
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
                alert("Hiçbir Hizmet seçilmedi.");
                return;
            }
            
            var selectedcompany = [];
            checkboxes.forEach(function(checkbox) {
                selectedcompany.push(checkbox.value);
            });
            
        
            document.getElementById('selectedcompany').value = JSON.stringify(selectedcompany);
            document.getElementById('deleteForm').submit();
        }

    </script> --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var switches = document.querySelectorAll('input[name="status"]');
            
            switches.forEach(function(switchElem) {
                switchElem.addEventListener('change', function() {
                    var status = this.checked ? 1 : 0;
                    var companyId = this.getAttribute('id').replace('customSwitch', '');
                    var token = document.querySelector('input[name="csrf-token"]').getAttribute('content');
                    
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', "{{ route('businessprofile.update', '') }}/" + companyId, true);
                    xhr.setRequestHeader('Content-Type', 'application/json');
                    xhr.setRequestHeader('X-CSRF-Token', token);
                    xhr.onload = function() {
                        if (xhr.status === 200) {
                            // Başarılı işlemler burada işlenebilir
                        }
                    };
                    xhr.send(JSON.stringify({ status: status }));
                });
            });
        });


        document.addEventListener("DOMContentLoaded", function() {
            // Tüm custom switchlerin durumunu kontrol et
            var switches = document.querySelectorAll('input[name="status"]');
            switches.forEach(function(switchElement) {
                // Her bir switchin durumunu kontrol et
                switchElement.addEventListener('change', function() {
                    // Switch'in durumuna göre labelı güncelle
                    var switchId = switchElement.getAttribute('id').replace('customSwitch', '');
                    var label = document.querySelector('#switchlabel' + switchId);
                    if (switchElement.checked) {
                        label.textContent = 'Aktif';
                    } else {
                        label.textContent = 'Pasif';
                    }
                });
            });
        });
    </script>

    <script>
        function editTime(companyId) {
            var expiryTime = document.getElementById('expiryTime' + companyId).value;
            var token = document.querySelector('input[name="csrf-token"]').getAttribute('content');

            var formData = new FormData();
            formData.append('expiryTime', expiryTime);
            formData.append('companyId', companyId);
            formData.append('_token', token);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', '{{ route('update.time') }}');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        // Başarılı işlem
                        $('#timeEditModal' + companyId).modal('hide');
                    } else {
                        // Hata durumu
                        console.error('Hata oluştu!');
                    }
                }
            };
            xhr.send(formData);
        }
    </script>

    
    </section>
  
  
@endsection