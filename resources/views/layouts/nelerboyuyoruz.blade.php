<div class="container bottom-info-section mt-5" id="nedenboyuyoruz">
    <h3>Neler Boyuyoruz ?</h3>    
</div>
<div class="container service-card-section">
    <div class="row">

        @foreach ($paints as $paint)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <i class="{{ $paint->icon }}" style="color: #a2e53f;"></i>
                        <h5 class="card-title">{{ $paint->baslik }}</h5>
                        <p class="card-text">{{ $paint->aciklama }}</p>
                    </div>
                </div>
            </div>
        @endforeach
        
        
    </div>
    <div class="center-container">
        <a href="/neler-boyuyoruz" class="btn-view-all">Tümünü İncele</a>
    </div>
</div>