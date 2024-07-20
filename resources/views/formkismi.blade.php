<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="overflow: hidden;">
<link href="/public/css/bootstrap-5.0.0.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
    body{
        margin: 10px auto;
    }
    .modal-content {
       background: none;
       border: none;
    }
    .modal-open .modal{
        overflow: hidden;
    }
    .alert-container {
        margin: 0 0;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        }

    .alert {
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 10px 10px;
        width: 100%;
        max-width: 400px;
        font-family: {!! setting('css.font2') !!};
        position: relative;
        background-color: #fff;
    }

    .alert-icon {
        background-color: #fff;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 30px;
        height: 30px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .alert-icon i {
        font-size: 3em;
    }

    .alert-message {
        text-align: center;
    }

    .alert-success {
        border-top: 6px solid {{ setting('css.ana_renk') }};
    }

    .alert-success .alert-icon {
        border: 4px solid {{ setting('css.ana_renk') }};
        color: {{ setting('css.ana_renk') }};
    }

    .alert-danger {
        border-top: 6px solid #dc3545;
    }

    .alert-danger .alert-icon {
        border: 4px solid #dc3545;
        color: #dc3545;
    }

    .alert ul {
        list-style-type: none;
        padding-left: 0;
        margin: 0;
    }

    .animate__fadeInDown {
        animation: fadeInDown 1s;
    }

    .animate__shakeX {
        animation: shakeX 0.5s;
    }

    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translate3d(0, -100%, 0);
        }
        to {
            opacity: 1;
            transform: none;
        }
    }

    @keyframes shakeX {
        from, to {
            transform: translate3d(0, 0, 0);
        }
        10%, 30%, 50%, 70%, 90% {
            transform: translate3d(-10px, 0, 0);
        }
        20%, 40%, 60%, 80% {
            transform: translate3d(10px, 0, 0);
        }
    }

    .rounded-corners {
        border-radius: 20px;
        height: 43px;
    }
    .error-message {
        color: red;
        display: none;
    }
    .hover-transition {
        transition: background-color 0.3s, color 0.3s;
    }
    .hover-transition:hover {
        background-color: {{ setting('css.dorduncu_renk') }};
        color: {{ setting('css.color') }};
    }
    .hover-transition {
        background-color: {{ setting('css.ikinci_renk') }};
    }
    #content-request > form > div > div.col-12.col-md-3.search-btn-container > button {
        padding: 4px !important;
    }
    .tabs {
        display: flex;
        justify-content: center;
        gap: 4rem; /* Adjust this value to control the space between tabs */
    }
    .tabs .tab-link {
        position: relative;
        padding: 0.5rem 1rem;
        color: #c6c6c6;
        background-color: unset;
        transition: color 0.3s;
        text-align: left;
        display: flex;
        align-items: center;
        gap: 0.5rem; /* Adjust the gap between the image and text */
    }
    .tabs .tab-link.active {
        color: #000;
    }
    .tabs .tab-link img {
        transition: opacity 0.3s;
    }
    .tabs .tab-link.active img.secondary {
        opacity: 1;
    }
    .tabs .tab-link img.secondary {
        opacity: 0;
    }
    .indicator {
        position: absolute;
        bottom: 0;
        left: 0;
        height: 3px;
        background-color: {{ setting('css.ikinci_renk') }};
        transition: left 0.3s, width 0.3s;
        width: 176.125px !important;
        left: 440.608px;
    }

    .form-select:focus {
        border-color: {{ setting('css.ana_renk') }};
        box-shadow: 0 0 0 .2rem rgb(162 229 63);
    }
    .form-control:focus {
        color: #495057;
        background-color: #fff;
        border-color: {{ setting('css.ana_renk') }};
        outline: 0;
        box-shadow: 0 0 0 .2rem rgb(162 229 63);
    }
    .tab-container {
        text-align: center;
        position: relative;
    }
    .tab-header {
        text-align: center;
        font-size: 1.5rem;
        margin-bottom: 1rem;
    }
    .form-row {
        display: flex;
        align-items: flex-end;
    }
    .search-btn-container {
        display: flex;
        align-items: flex-end;
    }
    @media (max-width: 768px) {
        .indicator{display: none;}
        .tabs {
            flex-direction: column;
            align-items: center;
            gap: 1rem;
        }
        .form-container > div, .input-container > div {
            flex: 1 1 100%;
        }
        .input-container input, .input-container button {
            flex: 1 1 100%;
            margin-bottom: 10px;
        }
    }
    .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
        background-color: unset;
    }
    .paddingcol {
        padding: 14px;
    }
    .card.custom-card {
        border-radius: 26px;
        box-shadow: 0 16px 40px 0 rgba(112, 144, 176, 0.2) !important;
    }
    img.primary {
        height: 21px;
    }
    #discovery-image {
        display: none;
        margin-top: 20px;
        width: 100%;
    }
    img.secondary.d-none{
        height: 23px;
    }
    img.secondary{
        height: 21px;
    }
    body > div > div > div > div > div.card-header.custom-header{
        background-color: rgb(255 255 255);
    }
    body > div > div > div{
        padding: 0px !important;
        padding: 0px !important;
    }
    .custom-svg path {
    fill: #8b8b8b;
    stroke: #8b8b8b;
    stroke-width: 2;
}
</style>


<div class="container outer-container inner-container">
    <div class="row">
        <div class="col-12 paddingcol">
            <div class="card custom-card">
                <div class="card-header custom-header" style="border-radius:23px 23px 0px 0px;">
                    <div class="tab-container">
                        <ul class="nav nav-pills tabs custom-tabs" id="customTab">
                            <li class="nav-item">
                                <a class="nav-link custom-nav-link active tab-link" id="tab-request" data-bs-toggle="tab" data-bs-target="#content-request" type="button" role="tab" aria-controls="content-request" aria-selected="true">
                                    <img src="/public/storage/{{ setting('form-ayarlari.talep2') }}" class="primary">
                                    <img src="/public/storage/{{ setting('form-ayarlari.talep') }}" class="secondary">
                                    <h5 class="mt-2">Talep Oluştur</h5>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link custom-nav-link tab-link" id="tab-discovery" data-bs-toggle="tab" data-bs-target="#content-discovery" type="button" role="tab" aria-controls="content-discovery" aria-selected="false">
                                    <img src="/public/storage/{{ setting('form-ayarlari.kesif') }}" class="primary">
                                    <img src="/public/storage/{{ setting('form-ayarlari.kesif2') }}" class="secondary">
                                    <h5 class="mt-2">Keşif Başlat</h5>
                                </a>
                            </li>
                        </ul>
                        <div class="indicator" style="width: 50%;"></div>
                    </div>
                </div>
                <div class="container" style="padding: 5px;">
                    <div class="px-md-2 px-xxl-5">
                        <div class="col-12 paddingcol mt-3 tab-content" id="tab-content" style="padding: 5px;">
                            <div class="tab-pane fade active show" id="content-request" role="tabpanel" aria-labelledby="tab-request">

                               
                                <form class="row g-3 form-container" action="{{ route('form.talep') }}" method="POST" onsubmit="return disableSubmitButton(this)">
                                    @if (session('success1'))
                                    <div class="col-12 paddingcol alert-container" style="padding: 5px !important;">
                                        <div class="alert alert-success animate__animated animate__fadeInDown" role="alert">
                                            <div class="alert-icon">
                                                <i class="fas fa-check-circle"></i>
                                            </div>
                                            <div class="alert-message">
                                                <p>{!! session('success1') !!}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    @if ($errors->validationErrors->any())
                                        <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <div class="col-12 alert-container">
                                                            <div class="alert alert-danger animate__animated animate__shakeX">
                                                                <div class="alert-icon">
                                                                    <i class="fas fa-exclamation-circle"></i>
                                                                </div>
                                                                <div class="alert-message">
                                                                    <ul>
                                                                        @foreach ($errors->validationErrors->all() as $error)
                                                                            <li>{{ $error }}</li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @csrf
                                    <div class="form-row row">
                                        <div class="col-12 paddingcol col-md-3 mb-3">
                                            <label for="input-district" class="form-label"><svg class="custom-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" style="
                                                width: 18px;
                                            "><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M575.8 255.5c0 18-15 32.1-32 32.1l-32 0 .7 160.2c0 2.7-.2 5.4-.5 8.1l0 16.2c0 22.1-17.9 40-40 40l-16 0c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1L416 512l-24 0c-22.1 0-40-17.9-40-40l0-24 0-64c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32l0 64 0 24c0 22.1-17.9 40-40 40l-24 0-31.9 0c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2l-16 0c-22.1 0-40-17.9-40-40l0-112c0-.9 0-1.9 .1-2.8l0-69.7-32 0c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z" style="
                                            "></path></svg>&nbsp;İlçe</label>
                                            @php
                                                $countries = App\Country::orderby('title', 'asc')->get();
                                            @endphp
                                            <select id="input-district" class="form-select rounded-corners py-2" name="district" required>
                                                <option disabled selected hidden>Lütfen İlçe Seçiniz</option>
                                                @foreach ($countries->sortBy('title') as $country)
                                                    <option value="{{ $country->title }}">{{ $country->title }}</option>
                                                @endforeach
                                            </select>
                                            <span class="error-message">İlçe seçimi yapmadınız.</span>
                                        </div>
                                        <div class="col-12 paddingcol col-md-3 mb-3">
                                            <label for="input-rooms" class="form-label"><svg class="custom-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style=" width: 18px; "><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M271.9 4.2c-9.8-5.6-21.9-5.6-31.8 0l-224 128C6.2 137.9 0 148.5 0 160L0 480c0 17.7 14.3 32 32 32s32-14.3 32-32l0-301.4L256 68.9 448 178.6 448 480c0 17.7 14.3 32 32 32s32-14.3 32-32l0-320c0-11.5-6.2-22.1-16.1-27.8l-224-128zM256 208a40 40 0 1 0 0-80 40 40 0 1 0 0 80zm-8 280l0-88 16 0 0 88c0 13.3 10.7 24 24 24s24-10.7 24-24l0-174.5 26.9 49.9c6.3 11.7 20.8 16 32.5 9.8s16-20.8 9.8-32.5l-37.9-70.3c-15.3-28.5-45.1-46.3-77.5-46.3l-19.5 0c-32.4 0-62.1 17.8-77.5 46.3l-37.9 70.3c-6.3 11.7-1.9 26.2 9.8 32.5s26.2 1.9 32.5-9.8L200 313.5 200 488c0 13.3 10.7 24 24 24s24-10.7 24-24z"/></svg>&nbsp;Oda Sayısı</label>
                                            <select id="input-rooms" class="form-select rounded-corners py-2" name="rooms" required>
                                                <option disabled selected hidden>Lütfen Oda Sayısı Seçiniz</option>
                                                @foreach ($rooms->sortBy('sira') as $room)
                                                <option value="{{ $room->baslik }}">{{ $room->baslik }}</option>
                                                @endforeach
                                            </select>
                                            <span class="error-message">Oda sayısı seçimi yapmadınız.</span>
                                        </div>
                                        <div class="col-12 paddingcol col-md-3 mb-3">
                                            <label for="input-area" class="form-label"><svg class="custom-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style=" width: 18px;"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M0 64C0 28.7 28.7 0 64 0L352 0c35.3 0 64 28.7 64 64l0 64c0 35.3-28.7 64-64 64L64 192c-35.3 0-64-28.7-64-64L0 64zM160 352c0-17.7 14.3-32 32-32l0-16c0-44.2 35.8-80 80-80l144 0c17.7 0 32-14.3 32-32l0-32 0-90.5c37.3 13.2 64 48.7 64 90.5l0 32c0 53-43 96-96 96l-144 0c-8.8 0-16 7.2-16 16l0 16c17.7 0 32 14.3 32 32l0 128c0 17.7-14.3 32-32 32l-64 0c-17.7 0-32-14.3-32-32l0-128z"/></svg>&nbsp;Boyanacak Alan (m<sup>2</sup>)</label>
                                            <select id="input-area" class="form-select rounded-corners py-2" name="area">
                                                <option disabled selected hidden>Lütfen Boyanacak Alan Seçiniz</option>
                                                @foreach ($areas->sortBy('sira') as $area)
                                                <option value="{{ $area->baslik }}">{{ $area->baslik }}</option>
                                                @endforeach
                                            </select>
                                            <span class="error-message">Boyanacak alan seçimi yapmadınız.</span>
                                        </div>
                                        <div class="col-12 paddingcol col-md-3 search-btn-container">
                                            <button type="submit" class="btn hover-transition w-100 rounded-corners mt-auto mx-auto px-5 py-2 search-btn mb-3">Talep Oluştur</button>
                                        </div>
                                    </div>
                                    @endif
                                </form>
                            </div>
                            <div class="tab-pane fade" id="content-discovery" role="tabpanel" aria-labelledby="tab-discovery">
                           
                                <form class="row g-3" action="{{ route('form.kesif') }}" method="POST" onsubmit="return disableSubmitButton(this)">
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
                                        <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body">
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
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @csrf
                                    <div class="col-12 paddingcol col-md-5 mb-3">
                                        <label for="discovery-phone" class="form-label"><svg class="custom-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" style=" width: 15px;"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M80 0C44.7 0 16 28.7 16 64l0 384c0 35.3 28.7 64 64 64l224 0c35.3 0 64-28.7 64-64l0-384c0-35.3-28.7-64-64-64L80 0zm80 432l64 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-64 0c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg>&nbsp;Cep Telefonunuz</label>
                                        <input type="tel" name="tel" class="form-control rounded-corners py-2 phone" id="discovery-phone" placeholder="Cep Telefonunuzu Yazınız" pattern="\d{11}" maxlength="11" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
                                    </div>
                                    <div class="col-12 paddingcol col-md-5 mb-3">
                                        <label for="discovery-address" class="form-label"><svg class="custom-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" style=" width: 15px;"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>&nbsp;Adres Girin</label>
                                        <input name="adres" type="text" class="form-control rounded-corners py-2" id="discovery-address" placeholder="Adresinizi Yazınız" required>
                                    </div>
                                    <div class="col-12 paddingcol col-md-2 d-flex align-items-end mb-3">
                                        <button type="submit" class="btn hover-transition rounded-corners px-4 py-2 w-100 check-discovery">Keşif İste</button>
                                    </div>
                                    <span class="error-message">Giriş yapmadınız.</span>
                                 @endif
                                </form>
                                <!-- Hidden image to be shown on button click -->
                                <img id="discovery-image" src="../public/img/brush-yellow.png" class="d-none" alt="Discovery Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
<!-- Bootstrap JS and dependencies -->
<script src="/public/js/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="/public/js/bootstrap-5.0.0.min.js"></script>
<script src="/public/js/jquery-3.6.0.min.js"></script>


<?php
    $disableTabs = session('success1') || $errors->validationErrors->any() ? 'true' : 'false';
?>
<script>
    $(document).ready(function() {
        var disableTabs = <?php echo $disableTabs; ?>;

        function updateIndicator(target) {
            var leftPos = target.position().left;
            var width = target.width();
            $(".indicator").css({ left: leftPos, width: width });
        }

        function toggleTabImages(target) {
            if (target.attr('id') === 'tab-request') {
                $('#tab-request img.primary').hide();
                $('#tab-request img.secondary').removeClass('d-none');
                $('#tab-discovery img.primary').show();
                $('#tab-discovery img.secondary').addClass('d-none');
            } else {
                $('#tab-request img.primary').show();
                $('#tab-request img.secondary').addClass('d-none');
                $('#tab-discovery img.primary').hide();
                $('#tab-discovery img.secondary').removeClass('d-none');
            }
        }

        $('#tab-request').on('click', function() {
            $('#content-request').addClass('active show').siblings().removeClass('active show');
            $('#tab-request').css('color', '#000');
            $('#tab-discovery').css('color', '#c6c6c6');
            updateIndicator($(this));
            toggleTabImages($(this));
        });

        $('#tab-discovery').on('click', function() {
            $('#content-discovery').addClass('active show').siblings().removeClass('active show');
            $('#tab-discovery').css('color', '#000');
            $('#tab-request').css('color', '#c6c6c6');
            updateIndicator($(this));
            toggleTabImages($(this));
        });

        updateIndicator($('.tab-link.active'));
        toggleTabImages($('.tab-link.active'));

        // Show image on "Keşif Başlat" button click
        $('.check-discovery').on('click', function() {
            $('#discovery-image').removeClass('d-none');
            $('#tab-discovery').click();

            // Make the yellow brush image active
            $('#tab-discovery img.primary').hide();
            $('#tab-discovery img.secondary').css('opacity', '1');
        });
        
        if (!disableTabs) {
            $('#tab-discovery').click();
            $('#tab-discovery img.primary').hide();
            $('#tab-discovery img.secondary').css('opacity', '1');
        }
    });
</script>
<script>
    $(document).ready(function() {
        @if ($errors->validationErrors->any())
            var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
            errorModal.show();
        @endif
    });
</script>
</body>
</html>