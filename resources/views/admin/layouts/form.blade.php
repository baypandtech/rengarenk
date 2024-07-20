<form action="/{!!Request::path()!!}" method="POST" enctype="multipart/form-data">
    @csrf
    <h4 class="mt-4"><i class="fas fa-building"></i> Şirket Bilgileri</h4>
    <div class="form_group">
        <div class="form-group">
            <label for="adı">İşletme Adı</label>
            <input name="name" type="text" class="form-control" id="adı" placeholder="İşletme adı giriniz" value="{{ $profile ? $profile->isletme_adi : '' }}" required>
        </div>
        <div class="form-group">
            <label for="adı">2. Ad (opsiyonel)</label>
            <input name="secondname" type="text" class="form-control" id="adı" placeholder="Sayfanızın header alanında gözükecek isim" value="{{ $profile ? $profile->second_name : '' }}">
        </div>
        
        <div class="form-group">
            <i class="mt-1 p-2 fa fa-globe"></i>
            <select name="sektorler" id="">
                <option value="" disabled {{ $profile && $profile->sektor ? '' : 'selected' }}>Sektör</option>
                @foreach ($category as $categories)
                    <option value="{{ $categories->id }}" {{ $profile && $profile->sektor ==  $categories->id ? 'selected' : '' }}>{{ $categories->baslik }}</option>
                @endforeach
            </select>
            
            <div class="input-icon"></div>
        </div>
        <div class="form-group">
            <label for="shortDescription">Kısa Açıklama</label>
            <textarea name="content" class="form-control" id="shortDescription" rows="3" placeholder="İşletme hakkında kısa bir açıklama giriniz">{{ $profile ? $profile->aciklama : '' }}</textarea>
        </div>
        <div class="form-group">
            <label for="exampleInputFile">İşletme Resmi</label>
            <div class="input-group">
              <div class="custom-file">
                <input name="image" type="file" accept="image/*" max-size="512000" class="custom-file-input" id="exampleInputFile" onchange="previewImage(event)">
                <label class="custom-file-label" for="exampleInputFile">Resim seç</label>
              </div>
            </div>
            <div class="form-group">
              <p class="text-center mt-3" id="imagePreviewContainer" style="display: none;">
                  <img id="imagePreview" src="#" alt="" class="page_detail_image">
              </p>
            </div>
            <div class="form-group">
              @if (!empty($profile->image))
                <p class="text-center mt-3"><img id="old_image" src="/public/storage/{{ $profile->image }}" alt="" srcset=""  class="page_detail_image"></p>
              @endif
            </div>
            <i style="font-size: 12px; float:right;">Max 500kb resim boyutuna izin verilmektedir.</i>
          </div>
    </div>
    <h4 class="mt-4"><i class="fas fa-image"></i> Arkaplan Resmi</h4>
    <div class="form_group">
        <div class="form-group">
            <div class="input-group">
              <div class="custom-file">
                <input name="background" type="file" accept="image/*" max-size="512000" class="custom-file-input" id="exampleInputFile2" onchange="previewImage2(event)">
                <label class="custom-file-label" for="exampleInputFile2">Arkaplanı Seç</label>
              </div>
            </div>
            <div class="form-group">
              <p class="text-center mt-3" id="imagePreviewContainer2" style="display: none;">
                  <img id="imagePreview2" src="#" alt="" class="page_detail_image">
              </p>
            </div>
            <div class="form-group">
              @if (!empty($profile->background))
                <p class="text-center mt-3"><img id="old_image2" src="/public/storage/{{ $profile->background }}" alt="" srcset=""  class="page_detail_image"></p>
              @endif
            </div>
            <i style="font-size: 12px; float:right;">Max 500kb resim boyutuna izin verilmektedir.</i>
          </div>
    </div>
    <h4 class="mt-4"><i class="fas fa-map-marker-alt"></i> Konum</h4>
    <div class="form_group">
        <div class="form-group">
            <label for="shortDescription">İşletme Adresi</label>
            <textarea name="adres" class="form-control" id="shortDescription" rows="3" placeholder="İşletmenin adresini girin">{{ $profile ? $profile->adres : '' }}</textarea>
        </div>
        <div class="center" style="justify-content:left;">
            <div class="form-group">
                <i class="mt-1 p-2 fa fa-globe"></i>
                @php
                    $cities = App\City::orderby('title', 'asc')->get();
                @endphp
                <select name="il" id="ilSelect" onchange="onIlSelectChange()">
                    @if(!empty($profile->il))
                        <option value="{{ $profile->il }}" disabled selected>{{ $profile->il }}</option>
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
                <div class="input-icon"></div>
            </div>
            <div class="form-group">
                <i class="mt-1 p-2 fa fa-map"></i>
                @php
                $district = [];
                if ($profile && $profile->il) {
                    $discrict_detail = App\City::where('title', $profile->il)->first();
                    if ($discrict_detail) {
                        $district = App\Country::where('city_id', $discrict_detail->id)->orderBy("title", "asc")->get();
                    }
                }
            @endphp
            
            <select id="ilceSelect" name="bolge">
                <option selected value="">Bölge Seçin</option>
                @foreach ($district as $districts)
                    <option value="{{ $districts->title }}" {{ $profile && $profile->ilce == $districts->title ? 'selected' : '' }}>{{ $districts->title }}</option>
                @endforeach
            </select>
                <div class="input-icon"></div>
            </div>
        </div>
        <div class="form-group">
            <label for="maps">Google Maps Konumu</label>
            <input name="maps" type="text" class="form-control" id="maps" placeholder="Google maps konumu giriniz" value="{{ $profile ? $profile->google_maps : '' }}">
        </div>
    </div>
    <h4 class="mt-4"><i class="fas fa-envelope"></i> İletişim</h4>
    <div class="form_group">
        <div class="form-group">
            <label for="productName">Telefon</label>
            <input name="telefon" type="tel" class="form-control" id="email" placeholder="Telefon numarası giriniz" value="{{ $profile ? $profile->telefon : '' }}">
        </div>
        <div class="form-group">
            <label for="productName">Whatsapp</label>
            <input name="whatsapp" type="tel" class="form-control" id="email" placeholder="Whatsapp numarası giriniz" value="{{ $profile ? $profile->whatsapp : '' }}">
        </div>
        <div class="form-group">
            <label for="productName">E-posta</label>
            <input name="mail" type="email" class="form-control" id="email" placeholder="E-posta adresini giriniz" value="{{ $profile ? $profile->eposta : '' }}">
        </div>
        <div class="form-group">
            <label for="shortDescription">Çalışma Saatleri</label>
            <textarea name="c_saatleri" class="form-control" id="shortDescription" rows="3" placeholder="Çalışma saatlerinizi girin">{{ $profile ? $profile->saatler : '' }}</textarea>
        </div>
    </div>

    <h4 class="mt-4"><i class="fas fa-share-alt"></i> Sosyal Medya Hesapları</h4>
    <div class="form_group">
        <div class="form-group">
            <label for="productName"><i class="fab fa-facebook"></i> Facebook</label>
            <input name="facebook" type="text" class="form-control" id="email" placeholder="https://www.facebook.com/" value="{{ $profile ? $profile->facebook : '' }}">
        </div>
        <div class="form-group">
            <label for="productName"><i class="fab fa-twitter"></i> Twitter</label>
            <input name="twitter" type="text" class="form-control" id="email" placeholder="https://twitter.com/" value="{{ $profile ? $profile->twitter : '' }}">
        </div>
        <div class="form-group">
            <label for="productName"><i class="fab fa-instagram"></i> Instagram</label>
            <input name="instagram" type="text" class="form-control" id="email" placeholder="https://www.instagram.com/" value="{{ $profile ? $profile->instagram : '' }}">
        </div>
        <div class="form-group">
            <label for="productName"><i class="fab fa-youtube"></i> Youtube</label>
            <input name="youtube" type="text" class="form-control" id="email" placeholder="https://youtube.com" value="{{ $profile ? $profile->youtube : '' }}">
        </div>
    </div>

    <h4 class="mt-4">Diğer</h4>
    <div class="form_group">
        <div class="form-group">
            <label for="shortDescription">Diğer Kodlar</label>
            <textarea name="codes" class="form-control" id="shortDescription" rows="3" placeholder="Kodlarınızı girin">{{ $profile ? $profile->diger_kodlar : '' }}</textarea>
        </div>
    </div>

    
    
    <div class="center mt-2">
    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Kaydet</button>
    </div>
</form>