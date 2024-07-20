<div class="container payment-services-section">
    <div class="payment-services-cards">

        @foreach ($features->sortBy('sira') as $feature)
            <div class="service-card">
                <i class="{{ $feature->icon }}"></i>
                <h3>{{ $feature->baslik }}</h3>
                <p>{{ $feature->aciklama }}</p>
            </div>
        @endforeach
        
    </div>
</div>