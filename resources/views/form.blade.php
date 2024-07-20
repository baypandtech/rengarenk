@extends('layout')
@section('title'){{ $page->seo_title ?: $page->baslik }} - @endsection
@section('description'){{ $page->seo_aciklama }}@endsection
@section('content')
    @include('css.form')
    <style>
        .hidden-section, .second-section, .third-section, .fourth-section, .fifth-section, .sixth-section, .seventh-section, .eighth-section, .ninth-section, .tenth-section, .datepicker-container {
            display: none;
        }
    </style>
    @php
        $countries = App\Country::orderby('title', 'asc')->get();
    @endphp
    <form style="margin: 30px auto; margin-bottom:80px;" action="{{ route('form.fiyat') }}" method="POST" onsubmit="return disableSubmitButton(this)">
        @csrf
        <div class="container form-div">
            @if (!session('success'))

            <div class="absolute-top-left w-100">
                <div class="row align-items-center" style="height: 63px;">
                    <div class="col-6 px-3">
                        <i class="js-register-back fa fa-chevron-left gigbi-font-20 p-4 d-none"></i>
                    </div>
                    <div class="col-6 px-3 text-right">
                        <i class="js-register-close gigbi-font-20 p-4 collapsed close-btn" data-toggle="collapse" data-target=".js-section-home" data-parent=".gigbi-page" aria-expanded="false"></i>
                    </div>
                </div>
                <div class="progress w-100">
                    <div class="progress-bar gigbi-bg-blue js-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                </div>
            </div>

            <div class="header">
                <img src="https://s3.amazonaws.com/tawk-to-pi/avatar/bot-01" alt="gigbi-customer" class="header-img">
            </div>
            <div class="header-divider"></div>
            @endif

            @if (session('success'))
                <div class="col-12 alert-container">
                    <div class="alert alert-success animate__animated animate__fadeInDown" role="alert">
                        <div class="alert-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="alert-message">
                            <p>{!! session('success') !!}
                            </p>
                        </div>
                    </div>
                </div>
            @else
            @if ($errors->any())
            <div class="col-12 alert-container">
                <div class="alert alert-danger animate__animated animate__shakeX">
                    <div class="alert-icon">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                    <div class="alert-message">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endif
            @if (session('fail'))
            <div class="col-12 alert-container">
                <div class="alert alert-danger animate__animated animate__shakeX">
                    <div class="alert-icon">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                    <div class="alert-message">
                        <p>{{ session('success') }}
                        </p>
                    </div>
                </div>
            </div>
            @endif
            <div id="form-content" class="form-section card first-section">
                <h2>Boya işi için beklentiniz nelerdir?</h2>
                <div class="card gigbi-card rounded-lg radio-options text-left">
                    <div class="form-group form-check gigbi-font-16 gigbi-semi-bold js-item mt-3 mx-3">
                        <div class="row col-12 px-0">
                            <div class="col-12 p-0">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input js-checkbox" name="beklenti" value="Aynı renk temizlik boyası" id="questions-1572-answer-0">
                                    <label class="d-block custom-control-label gigbi-checkbox" for="questions-1572-answer-0">
                                        <span class="ml-1 js-name">Aynı renk temizlik boyası</span>
                                        <div class="mt-1 ml-1 gigbi-font-14 gigbi-color-grey d-none "></div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="form-group form-check gigbi-font-16 gigbi-semi-bold js-item mt-3 mx-3">
                        <div class="row col-12 px-0">
                            <div class="col-12 p-0">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input js-checkbox" name="beklenti2" value="Renk değişikliği" id="questions-1572-answer-1">
                                    <label class="d-block custom-control-label gigbi-checkbox" for="questions-1572-answer-1">
                                        <span class="ml-1 js-name">Renk değişikliği</span>
                                        <div class="mt-1 ml-1 gigbi-font-14 gigbi-color-grey d-none "></div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="form-group form-check gigbi-font-16 gigbi-semi-bold js-item mt-3 mx-3">
                        <div class="row col-12 px-0">
                            <div class="col-12 p-0">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input js-checkbox" name="beklenti3" name="Hasar onarımı" id="questions-1572-answer-2">
                                    <label class="d-block custom-control-label gigbi-checkbox" for="questions-1572-answer-2">
                                        <span class="ml-1 js-name">Hasar onarımı</span>
                                        <div class="mt-1 ml-1 gigbi-font-14 gigbi-color-grey d-none "></div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="form-group form-check gigbi-font-16 gigbi-semi-bold js-item mt-3 mx-3">
                        <div class="row col-12 px-0">
                            <div class="col-12 p-0">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input js-checkbox" name="beklenti4" value="Nem ve küf izlerini yok etme" id="questions-1572-answer-3">
                                    <label class="d-block custom-control-label gigbi-checkbox" for="questions-1572-answer-3">
                                        <span class="ml-1 js-name">Nem ve küf izlerini yok etme</span>
                                        <div class="mt-1 ml-1 gigbi-font-14 gigbi-color-grey d-none "></div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="form-group form-check gigbi-font-16 gigbi-semi-bold js-item mt-3 mx-3">
                        <div class="row col-12 px-0">
                            <div class="col-12 p-0">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input js-checkbox"  name="beklenti5" value="Diğer" id="questions-1572-answer-4">
                                    <label class="d-block custom-control-label gigbi-checkbox" for="questions-1572-answer-4">
                                        <span class="ml-1 js-name">Diğer</span>
                                        <div class="mt-1 ml-1 gigbi-font-14 gigbi-color-grey d-none "></div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="info-box">
                    <img src="https://s3.amazonaws.com/tawk-to-pi/avatar/bot-01" alt="gigbi-customer">
                    <span>Beklentin, işin kapsamını ve detaylarını belirler.</span>
                </div>
                <div class="footer">
                    <button type="button" class="btn-continue inactive js-next-btn">Devam</button>
                </div>
            </div>

            <div class="form-section card second-section">
                <div class="footer d-flex">
                    <button type="button" class="btn-back inactive js-back-btn"><</button>
                </div>
                <h2>Boyanacak alanın türü nedir?</h2>

                <div class="card gigbi-card rounded-lg radio-options text-left">
                    <div class="form-group form-check gigbi-font-16 gigbi-semi-bold js-item mt-3 mx-3">
                        <div class="row col-12 px-0">
                            <div class="col-12 p-0">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input js-radio" name="area_type" id="area-type-0" value="Ev">
                                    <label class="d-block custom-control-label gigbi-radio" for="area-type-0">
                                        <span class="ml-1 js-name">Ev</span>
                                        <div class="mt-1 ml-1 gigbi-font-14 gigbi-color-grey d-none "></div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="form-group form-check gigbi-font-16 gigbi-semi-bold js-item mt-3 mx-3">
                        <div class="row col-12 px-0">
                            <div class="col-12 p-0">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input js-radio" name="area_type" id="area-type-1" value="Ofis">
                                    <label class="d-block custom-control-label gigbi-radio" for="area-type-1">
                                        <span class="ml-1 js-name">Ofis</span>
                                        <div class="mt-1 ml-1 gigbi-font-14 gigbi-color-grey d-none "></div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="form-group form-check gigbi-font-16 gigbi-semi-bold js-item mt-3 mx-3">
                        <div class="row col-12 px-0">
                            <div class="col-12 p-0">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input js-radio" name="area_type" id="area-type-2" value="Dükkan">
                                    <label class="d-block custom-control-label gigbi-radio" for="area-type-2">
                                        <span class="ml-1 js-name">Dükkan</span>
                                        <div class="mt-1 ml-1 gigbi-font-14 gigbi-color-grey d-none "></div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="form-group form-check gigbi-font-16 gigbi-semi-bold js-item mt-3 mx-3">
                        <div class="row col-12 px-0">
                            <div class="col-12 p-0">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input js-radio" name="area_type" id="area-type-3" value="Depo">
                                    <label class="d-block custom-control-label gigbi-radio" for="area-type-3">
                                        <span class="ml-1 js-name">Depo</span>
                                        <div class="mt-1 ml-1 gigbi-font-14 gigbi-color-grey d-none "></div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="form-group form-check gigbi-font-16 gigbi-semi-bold js-item mt-3 mx-3">
                        <div class="row col-12 px-0">
                            <div class="col-12 p-0">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input js-radio" name="area_type" id="area-type-4" value="Diğer">
                                    <label class="d-block custom-control-label gigbi-radio" for="area-type-4">
                                        <span class="ml-1 js-name">Diğer</span>
                                        <div class="mt-1 ml-1 gigbi-font-14 gigbi-color-grey d-none "></div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="info-box">
                    <img src="https://s3.amazonaws.com/tawk-to-pi/avatar/bot-01" alt="gigbi-customer">
                    <span>Alanının türü, kullanılacak boya çeşitlerini ve uygulama yöntemlerini etkileyebilir.</span>
                </div>
                <div class="hidden-section js-hidden-section">
                    <h2>Ev tipini seçiniz</h2>
                    <div class="d-flex justify-content-center align-items-center">
                        <button type="button" class="btn-change js-decrease">-</button>
                        <input name="ev_area" style="border: none; width: 100px; text-align: center;" type="text" class="area-size js-area-size" value="1+1">
                        <button type="button" class="btn-change js-increase">+</button>
                    </div>
                </div>
                <div class="footer">
                    <button type="button" class="btn-continue inactive js-next-btn-2">Devam</button>
                </div>
            </div>

            <div class="form-section card third-section">
                <div class="footer d-flex">
                    <button type="button" class="btn-back inactive js-back-btn"><</button>
                </div>
                <h2>Boyanacak alan yaklaşık kaç metrekare?</h2>
                <div class="d-flex justify-content-center align-items-center">
                    <button type="button" class="btn-change js-decrease">-</button>
                    <input name="area_m2" style="border: none; width: 150px; text-align: center;" type="text" class="area-size js-area-size" value="100" readonly>
                    <button type="button" class="btn-change js-increase">+</button>
                </div>
                <div class="card gigbi-card rounded-lg radio-options text-left">
                <div class="form-group form-check gigbi-font-16 gigbi-semi-bold js-item mt-3 mx-3">
                    <div class="row col-12 px-0">
                        <div class="col-12 p-0">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input js-radio" name="area_condition" id="area-condition-0" value="Eşyalı">
                                <label class="d-block custom-control-label gigbi-radio" for="area-condition-0">
                                    <span class="ml-1 js-name">Eşyalı</span>
                                    <div class="mt-1 ml-1 gigbi-font-14 gigbi-color-grey d-none "></div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="divider"></div>
                <div class="form-group form-check gigbi-font-16 gigbi-semi-bold js-item mt-3 mx-3">
                    <div class="row col-12 px-0">
                        <div class="col-12 p-0">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input js-radio" name="area_condition" id="area-condition-1" value="Eşyasız">
                                <label class="d-block custom-control-label gigbi-radio" for="area-condition-1">
                                    <span class="ml-1 js-name">Eşyasız</span>
                                    <div class="mt-1 ml-1 gigbi-font-14 gigbi-color-grey d-none "></div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="info-box">
                    <img src="https://s3.amazonaws.com/tawk-to-pi/avatar/bot-01" alt="gigbi-customer">
                    <span>Alanının büyüklüğü, işin süresi ve gerekli boya miktarını etkiler. Yaklaşık bir rakam girebilirsiniz.Boya yapılacak alanın doluluk durumu fiyat teklifini doğrudan etkilemektedir.</span>
                </div>
                <div class="footer">
                    <button type="button" class="btn-continue active js-next-btn-3">Devam</button>
                </div>
            </div>

            <div class="form-section card fourth-section">
                <div class="footer d-flex">
                    <button type="button" class="btn-back inactive js-back-btn"><</button>
                </div>
                <h2>Malzemeler kim tarafından temin edilecek?</h2>
                <div class="card gigbi-card rounded-lg radio-options text-left">
                    <div class="form-group form-check gigbi-font-16 gigbi-semi-bold js-item mt-3 mx-3">
                        <div class="row col-12 px-0">
                            <div class="col-12 p-0">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input js-radio" name="material_source" id="material-source-0" value="Rengarenk Boya tarafından">
                                    <label class="d-block custom-control-label gigbi-radio" for="material-source-0">
                                        <span class="ml-1 js-name">Rengarenk Boya tarafından</span>
                                        <div class="mt-1 ml-1 gigbi-font-14 gigbi-color-grey d-none "></div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="form-group form-check gigbi-font-16 gigbi-semi-bold js-item mt-3 mx-3">
                        <div class="row col-12 px-0">
                            <div class="col-12 p-0">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input js-radio" name="material_source" id="material-source-1" value="Ben temin edeceğim">
                                    <label class="d-block custom-control-label gigbi-radio" for="material-source-1">
                                        <span class="ml-1 js-name">Ben temin edeceğim</span>
                                        <div class="mt-1 ml-1 gigbi-font-14 gigbi-color-grey d-none "></div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="form-group form-check gigbi-font-16 gigbi-semi-bold js-item mt-3 mx-3">
                        <div class="row col-12 px-0">
                            <div class="col-12 p-0">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input js-radio" name="material_source" id="material-source-2" value="Karşılıklı görüşülerek">
                                    <label class="d-block custom-control-label gigbi-radio" for="material-source-2">
                                        <span class="ml-1 js-name">Karşılıklı görüşülerek</span>
                                        <div class="mt-1 ml-1 gigbi-font-14 gigbi-color-grey d-none "></div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="info-box">
                    <img src="https://s3.amazonaws.com/tawk-to-pi/avatar/bot-01" alt="gigbi-customer">
                    <span>Malzemelerin kim tarafından sağlanacağı, projenin maliyetini ve organizasyonunu etkiler.</span>
                </div>
                <div class="footer">
                    <button type="button" class="btn-continue inactive js-next-btn-4">Devam</button>
                </div>
            </div>

            <div class="form-section card fifth-section">
                <div class="footer d-flex">
                    <button type="button" class="btn-back inactive js-back-btn"><</button>
                </div>
                <h2>Boya Badana işi için bir zaman planınız var mı?</h2>
                <div class="card gigbi-card rounded-lg text-left">
                    <div class="form-group form-check gigbi-font-16 gigbi-semi-bold js-item mt-3 mx-3">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input js-date-radio" name="time_plan" id="specific-date" value="Belirli bir tarihte">
                            <label class="d-block custom-control-label gigbi-radio" for="specific-date">
                                <span class="ml-1 js-name">Belirli bir tarihte</span>
                            </label>
                        </div>
                    </div>
                    <div class="datepicker-container pl-4" id="datepicker-container">
                        <input name="date_time" style="width:100px;" type="date" id="datepicker" class="form-control date_time" placeholder="Tarih seçin">
                    </div>
                    <div class="divider"></div>
                    <div class="form-group form-check gigbi-font-16 gigbi-semi-bold js-item mt-3 mx-3">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input js-date-radio" name="time_plan" id="two-weeks" value="2 hafta içinde">
                            <label class="d-block custom-control-label gigbi-radio" for="two-weeks">
                                <span class="ml-1 js-name">2 hafta içinde</span>
                            </label>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="form-group form-check gigbi-font-16 gigbi-semi-bold js-item mt-3 mx-3">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input js-date-radio" name="time_plan" id="two-months" value="2 ay içinde">
                            <label class="d-block custom-control-label gigbi-radio" for="two-months">
                                <span class="ml-1 js-name">2 ay içinde</span>
                            </label>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="form-group form-check gigbi-font-16 gigbi-semi-bold js-item mt-3 mx-3">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input js-date-radio" name="time_plan" id="six-months" value="6 ay içinde">
                            <label class="d-block custom-control-label gigbi-radio" for="six-months">
                                <span class="ml-1 js-name">6 ay içinde</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="info-box">
                    <img src="https://s3.amazonaws.com/tawk-to-pi/avatar/bot-01" alt="gigbi-customer">
                    <span>Belirlediğiniz bir tarih yok ise teklif verirken fikir edinmemiz için seçeneklerden tahmini bir tarihi seçiniz.</span>
                </div>
                <div class="footer">
                    <button type="button" class="btn-continue inactive js-next-btn-5">Devam</button>
                </div>
            </div>

            <div class="form-section card sixth-section">
                <div class="footer d-flex">
                    <button type="button" class="btn-back inactive js-back-btn"><</button>
                </div>
                <h2>Hizmet nerede gerçekleşecek belirtirmisiniz?</h2>
                <input type="text" class="form-control mb-3" value="İstanbul" readonly>
                <select name="bolge" id="district" class="form-control mb-3">
                    <option value="" disabled selected>İlçe seçiniz</option>
                    @foreach ($countries->sortBy('title') as $country)
                    <option value="{{ $country->title }}">{{ $country->title }}</option>

                    @endforeach
                
                </select>
                <textarea name="optionel_area" class="form-control" rows="3" placeholder="Belirlediğiniz özel bir yer varsa bu alanda belirtebilir misiniz? (Opsiyonel)"></textarea>
                <div class="footer">
                    <button type="button" class="btn-continue active js-next-btn-6">Devam</button>
                </div>
            </div>

            <div class="form-section card seventh-section">
                <div class="footer d-flex">
                    <button type="button" class="btn-back inactive js-back-btn"><</button>
                </div>
                <h2>E-posta adresinizi girebilir misiniz?</h2>
                <input name="email" type="email" class="form-control mb-3" placeholder="E-posta">
                <div class="info-box">
                    <img src="https://s3.amazonaws.com/tawk-to-pi/avatar/bot-01" alt="gigbi-customer">
                    <span>Talebinizi oluşturmak için kullanacağız. E-posta adresinizi kimse ile paylaşmıyoruz.</span>
                </div>
                <div class="footer">
                    <button type="button" class="btn-continue inactive js-next-btn-7">Devam</button>
                </div>
            </div>

            <div class="form-section card eighth-section">
                <div class="footer d-flex">
                    <button type="button" class="btn-back inactive js-back-btn"><</button>
                </div>
                <h2>Size nasıl hitap edelim?</h2>
                <input name="name" type="text" class="form-control mb-3" placeholder="Ad">
                <input name="last_name" type="text" class="form-control mb-3" placeholder="Soyad">
                <div class="info-box">
                    <img src="https://s3.amazonaws.com/tawk-to-pi/avatar/bot-01" alt="gigbi-customer">
                    <span>Geri dönüşlerde size hitap edilmemiz için adınız ve soyadınızı giriniz.</span>
                </div>
                <div class="footer">
                    <button type="button" class="btn-continue inactive js-next-btn-8">Devam</button>
                </div>
            </div>

            <div class="form-section card ninth-section">
                <div class="footer d-flex">
                    <button type="button" class="btn-back inactive js-back-btn"><</button>
                </div>
                <h2>İletişim bilgilerinizi girebilir misiniz?</h2>
                <input name="tel" type="tel" class="form-control mb-3" placeholder="(501) 123-4567" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                <div class="info-box">
                    <img src="https://s3.amazonaws.com/tawk-to-pi/avatar/bot-01" alt="gigbi-customer">
                    <span>Telefon numaranız sadece size teklif veren Rengarenk Boya tarafından görünür. Ekstra kişiler ile paylaşılmaz.</span>
                </div>
                <div class="footer">
                    <button type="button" class="btn-continue inactive js-next-btn-9">Devam</button>
                </div>
            </div>

            <div class="form-section card tenth-section">
                <div class="footer d-flex">
                    <button type="button" class="btn-back inactive js-back-btn"><</button>
                </div>
                <h2>Rengarenk Boya teklif verirken başka nelere dikkat etmeli?</h2>
                <textarea name="optionel_message" class="form-control mb-3" rows="5" placeholder="Boya yapılacak alanın tavanıda boyanacak mı ? İstediğiniz  ek tadilat hizmetleri var mı? İstediğiniz bir renk var mı? vb. diğer tüm detaylardan bahsedebilirsiniz."></textarea>
                <div class="info-box">
                    <img src="https://s3.amazonaws.com/tawk-to-pi/avatar/bot-01" alt="gigbi-customer">
                    <span>Sizlere daha doğru fiyat teklifi iletebilmemiz için ihtiyacınızın detaylarını açıklamanız gerekiyor.</span>
                </div>
                <div class="footer">
                    <button type="submit" class="btn-continue active js-submit-btn">Fiyat Teklifi Oluştur</button>
                </div>
            </div>
            @endif
        </div>
    </form>

    <script>
        // Email validation function
        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(String(email).toLowerCase());
        }

        // Handle the close button
        document.querySelector('.close-btn').addEventListener('click', function () {
            alert('Close button clicked');
        });

        // Handle checkbox selection
        const checkboxes = document.querySelectorAll('.js-checkbox');
        const continueButton = document.querySelector('.first-section .btn-continue');

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                const isChecked = Array.from(checkboxes).some(cb => cb.checked);
                if (isChecked) {
                    continueButton.classList.remove('inactive');
                    continueButton.classList.add('active');
                } else {
                    continueButton.classList.remove('active');
                    continueButton.classList.add('inactive');
                }
            });
        });

        // Handle progress bar and next button click
        const progressBar = document.querySelector('.progress-bar');
        let progress = 0;

        document.querySelector('.first-section .js-next-btn').addEventListener('click', function () {
            if (this.classList.contains('inactive')) return;

            progress = Math.min(progress + 10, 100);
            progressBar.style.width = progress + '%';
            document.querySelector('.first-section').style.display = 'none';
            document.querySelector('.second-section').style.display = 'block';
        });

        const radios = document.querySelectorAll('.second-section .js-radio');
        const nextButton = document.querySelector('.second-section .js-next-btn-2');
        const hiddenSection = document.querySelector('.second-section .js-hidden-section');

        radios.forEach(radio => {
            radio.addEventListener('change', function () {
                const isSelected = Array.from(radios).some(rb => rb.checked);
                if (isSelected) {
                    nextButton.classList.remove('inactive');
                    nextButton.classList.add('active');

                    if (radio.id === 'area-type-0') {
                        hiddenSection.style.display = 'block';
                    } else {
                        hiddenSection.style.display = 'none';
                    }
                } else {
                    nextButton.classList.remove('active');
                    nextButton.classList.add('inactive');
                    hiddenSection.style.display = 'none';
                }
            });
        });

        document.querySelector('.second-section .js-next-btn-2').addEventListener('click', function () {
            if (this.classList.contains('inactive')) return;

            progress = Math.min(progress + 10, 100);
            progressBar.style.width = progress + '%';
            document.querySelector('.second-section').style.display = 'none';
            document.querySelector('.third-section').style.display = 'block';
        });

        // Handle the room size increment/decrement
        let roomSize = 1;
        let roomSizeElement = document.querySelector('.second-section .js-area-size');

        document.querySelector('.second-section .js-increase').addEventListener('click', function () {
            if (roomSize < 99) {
                roomSize += 1;
                roomSizeElement.value = `${roomSize}+1`;
            }
        });

        document.querySelector('.second-section .js-decrease').addEventListener('click', function () {
            if (roomSize > 1) {
                roomSize -= 1;
                roomSizeElement.value = `${roomSize}+1`;
            }
        });

        let widthSize = 100;
        let widthSizeElement = document.querySelector('.third-section .js-area-size');

        document.querySelector('.third-section .js-increase').addEventListener('click', function () {
            widthSize += 10;
            widthSizeElement.value = `${widthSize}`;
        });

        document.querySelector('.third-section .js-decrease').addEventListener('click', function () {
            if (widthSize > 10) {
                widthSize -= 10;
                widthSizeElement.value = `${widthSize}`;
            }
        });

        document.querySelector('.third-section .js-next-btn-3').addEventListener('click', function () {
            progress = Math.min(progress + 10, 100);
            progressBar.style.width = progress + '%';
            document.querySelector('.third-section').style.display = 'none';
            document.querySelector('.fourth-section').style.display = 'block';
        });

        const materialRadios = document.querySelectorAll('.fourth-section .js-radio');
        const materialNextButton = document.querySelector('.fourth-section .js-next-btn-4');

        materialRadios.forEach(radio => {
            radio.addEventListener('change', function () {
                const isSelected = Array.from(materialRadios).some(rb => rb.checked);
                if (isSelected) {
                    materialNextButton.classList.remove('inactive');
                    materialNextButton.classList.add('active');
                } else {
                    materialNextButton.classList.remove('active');
                    materialNextButton.classList.add('inactive');
                }
            });
        });

        materialNextButton.addEventListener('click', function () {
            if (this.classList.contains('inactive')) return;

            progress = Math.min(progress + 10, 100);
            progressBar.style.width = progress + '%';
            document.querySelector('.fourth-section').style.display = 'none';
            document.querySelector('.fifth-section').style.display = 'block';
        });

        const dateRadios = document.querySelectorAll('.fifth-section .js-date-radio');
        const dateNextButton = document.querySelector('.fifth-section .js-next-btn-5');
        const dateTime = document.querySelector('.fifth-section .date_time');
        const datepickerContainer = document.getElementById('datepicker-container');
        const datepicker = document.getElementById('datepicker');

        function updateNextButtonState() {
            const isRadioSelected = Array.from(dateRadios).some(rb => rb.checked);
            const isSpecificDateSelected = document.getElementById('specific-date').checked;
            const isDateTimeFilled = dateTime.value.trim() !== '';

            if (isRadioSelected && (!isSpecificDateSelected || (isSpecificDateSelected && isDateTimeFilled))) {
                dateNextButton.classList.remove('inactive');
                dateNextButton.classList.add('active');
            } else {
                dateNextButton.classList.remove('active');
                dateNextButton.classList.add('inactive');
            }
        }

        dateRadios.forEach(radio => {
            radio.addEventListener('change', function () {
                updateNextButtonState();

                if (radio.id === 'specific-date') {
                    datepickerContainer.style.display = 'block';
                } else {
                    datepickerContainer.style.display = 'none';
                }
            });
        });

        dateTime.addEventListener('input', updateNextButtonState);

        // $(function () {
        //     $("#datepicker").datepicker({
        //         dateFormat: "dd/mm/yy",
        //         showAnim: "slideDown",
        //         monthNames: ["Ocak", "Şubat", "Mart", "Nisan", "Mayıs", "Haziran", "Temmuz", "Ağustos", "Eylül", "Ekim", "Kasım", "Aralık"],
        //         dayNamesMin: ["Pt", "Sl", "Çr", "Pr", "Cu", "Ct", "Pz"]
        //     });
        // });

        dateNextButton.addEventListener('click', function () {
            if (this.classList.contains('inactive')) return;

            progress = Math.min(progress + 10, 100);
            progressBar.style.width = progress + '%';
            document.querySelector('.fifth-section').style.display = 'none';
            document.querySelector('.sixth-section').style.display = 'block';
        });

        document.querySelector('.sixth-section .js-next-btn-6').addEventListener('click', function () {
            progress = Math.min(progress + 10, 100);
            progressBar.style.width = progress + '%';
            document.querySelector('.sixth-section').style.display = 'none';
            document.querySelector('.seventh-section').style.display = 'block';
        });

        const emailInput = document.querySelector('.seventh-section input[type="email"]');
        const emailNextButton = document.querySelector('.seventh-section .js-next-btn-7');

        emailInput.addEventListener('input', function () {
            if (validateEmail(emailInput.value)) {
                emailNextButton.classList.remove('inactive');
                emailNextButton.classList.add('active');
            } else {
                emailNextButton.classList.remove('active');
                emailNextButton.classList.add('inactive');
            }
        });

        emailNextButton.addEventListener('click', function () {
            if (this.classList.contains('inactive')) return;

            progress = Math.min(progress + 10, 100);
            progressBar.style.width = progress + '%';
            document.querySelector('.seventh-section').style.display = 'none';
            document.querySelector('.eighth-section').style.display = 'block';
        });

        const nameInputs = document.querySelectorAll('.eighth-section input[type="text"]');
        const nameNextButton = document.querySelector('.eighth-section .js-next-btn-8');

        nameInputs.forEach(input => {
            input.addEventListener('input', function () {
                const allFilled = Array.from(nameInputs).every(inp => inp.value !== '');
                if (allFilled) {
                    nameNextButton.classList.remove('inactive');
                    nameNextButton.classList.add('active');
                } else {
                    nameNextButton.classList.remove('active');
                    nameNextButton.classList.add('inactive');
                }
            });
        });

        nameNextButton.addEventListener('click', function () {
            if (this.classList.contains('inactive')) return;

            progress = Math.min(progress + 10, 100);
            progressBar.style.width = progress + '%';
            document.querySelector('.eighth-section').style.display = 'none';
            document.querySelector('.ninth-section').style.display = 'block';
        });

        const contactInput = document.querySelector('.ninth-section input[type="tel"]');
        const contactNextButton = document.querySelector('.ninth-section .js-next-btn-9');

        contactInput.addEventListener('input', function () {
            if (contactInput.value.length === 10) {
                contactNextButton.classList.remove('inactive');
                contactNextButton.classList.add('active');
            } else {
                contactNextButton.classList.remove('active');
                contactNextButton.classList.add('inactive');
            }
        });

        contactNextButton.addEventListener('click', function () {
            if (this.classList.contains('inactive')) return;

            progress = Math.min(progress + 20, 100);
            progressBar.style.width = progress + '%';
            document.querySelector('.ninth-section').style.display = 'none';
            document.querySelector('.tenth-section').style.display = 'block';
        });

        // document.querySelector('.tenth-section .js-submit-btn').addEventListener('click', function () {
        //     alert('Öncelikle bizimle iletişime geçtiğiniz için teşekkür ederiz. Talebiniz üzerine, ihtiyaçlarınıza en uygun boya badana hizmeti için bir fiyat teklifi hazırlayacağız.Teklifimizi inceledikten sonra, herhangi bir sorunuz olması durumunda ya da ek bilgi talebinizde bizim ile iletişime geçmekten çekinmeyin. Size en iyi hizmeti sunmak için buradayız ve memnuniyetiniz bizim önceliğimizdir.İlettiğiniz telefon ve mail üzerinden dönüş yapılacaktır. Teklifimizin sizin için uygun olacağını umar, işbirliğimizin devamını temenni ederiz.');
        // });
    </script>
<script>
    const sections = [
        '.first-section',
        '.second-section',
        '.third-section',
        '.fourth-section',
        '.fifth-section',
        '.sixth-section',
        '.seventh-section',
        '.eighth-section',
        '.ninth-section',
        '.tenth-section'
    ];

    const backButtons = document.querySelectorAll('.js-back-btn');

    backButtons.forEach((backButton, index) => {
        backButton.addEventListener('click', function() {
            // İlk section'da buton olmadığından, index 0'dan itibaren çalışacak
            document.querySelector(sections[index + 1]).style.display = 'none';
            document.querySelector(sections[index]).style.display = 'block';
            progress = Math.max(progress - 10, 0);
            progressBar.style.width = progress + '%';
        });
    });
</script>

    <script>
        function disableSubmitButton(form) {
            const submitButton = form.querySelector('button[type="submit"]');
            if (submitButton.disabled) {
                return false;
            }
            submitButton.disabled = true;
            submitButton.innerText = 'Gönderiliyor...';
            return true;
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    @endsection
