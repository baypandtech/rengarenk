@if ( isset($country))

<div class="container" style="margin: 30px auto; margin-top:80px;">
    <div class="service-areas">
        <div class="areas text-center">
           
           {!! $country->aciklama !!}
        </div>
    </div>
</div>
    
@endif
<style>
.title {
    margin-bottom: -10px;
    font-family: 'Quicksand', sans-serif;
    line-height: 1;
    letter-spacing: -.05em;
    word-break: break-word;
    font-weight: 700;
    font-size: 35px !important;
}
</style>
<div class="container" style="margin: 50px auto; {{ isset($country) ? 'margin-top: 100px;' : 'margin-top: 70px;' }}">
    <div class="service-areas">
        <h3 class="title text-center">Hizmet Bölgeleri</h3>
        <div class="areas text-center">
            @foreach ($countries as $country)
            @if ($country->seo_url != 'istanbul')
            <a class="bolgeler_a" href="/{{ $country->seo_url }}-boya-badana">{{ $country->title }}</a> | 
            @endif
            @endforeach
            <br><br>
            @foreach ($countries as $country)
            @if ($country->seo_url == 'istanbul')
            <a class="bolgeler_a" href="/{{ $country->seo_url }}-boya-badana">{{ $country->title }}</a>
            @endif
            @endforeach
        </div>
    </div>
</div>