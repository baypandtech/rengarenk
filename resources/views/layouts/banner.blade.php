<div class="ey-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="ey-banner-text">
                    <h1>{{ isset($country) ? $country->seo_baslik : $banner->baslik  }}</h1>
                    <p>{{ $banner->alt_aciklama }}</p>
                    <ul class="ey-checklist">
                        <li>{{ $banner->title1 }}</li>
                        <li>{{ $banner->title2 }}</li>
                        <li>{{ $banner->title3 }}</li>
                        <li>{{ $banner->title4 }}</li>    
                    </ul>
                </div>
                <div class="button-container">
                    <a href="/fiyat-teklifi"><div class="default-button rezervasyonBaslat"><span>{{ $banner->buton1 }}</span></div></a>
                    <div class="default-button bordered"><span>{{ $banner->buton2 }}</span></div>
                </div>
                <div class="d-flex flex-column fw-bold" style="color:#ff5722;">
                    <div class="count-stars-wrapper mt-2">
                        <div class="count-stars"></div>
                    </div>
                    <div class="count-badge-wrapper">
                        <div class="count-badge">
                            {{ $banner->slogan }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 m-auto">
                @if ($banner->image)
                <img class="ey-bnr-img" src="/public/storage/{{ $banner->image }}" alt="{{ setting('seo.etiketler') }}">
                @endif
            </div>
        </div>
    </div>
</div>