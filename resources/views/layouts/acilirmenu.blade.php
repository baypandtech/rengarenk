<div class="floating-button" id="floatingButton">
    <img src="https://s3.amazonaws.com/tawk-to-pi/avatar/bot-01" alt="badana">
</div>
<style>
    .helps:hover{
        color: black;
    }
</style>
<div class="support-menu" id="supportMenu">
    <h3><i class="fa-solid fa-headphones-simple"></i>&nbspRengarenk Boya Badana</h3>
    <p>Lütfen size yardım edebilmemiz için bir konu seçin.</p>
    @foreach ($helps->sortBy('sira') as $help)
    @php
        $url = $help->url;
        // Eğer URL telefon, e-posta veya WhatsApp adresi ise URL'yi olduğu gibi bırak.
        if (preg_match('/^(tel:|mailto:|https:\/\/wa\.me\/)/', $url)) {
            $fullUrl = $url;
        } else {
            $fullUrl = Request::is('/') ? $url : url('/') . '/' . ltrim($url, '/');
        }
    @endphp
    <button><a class="helps" href="{{ $fullUrl }}" rel="nofollow" target="_blank">{{ $help->baslik }}</a></button>
@endforeach
    <button id="closeButton">Pencereyi Kapat</button>
</div>  