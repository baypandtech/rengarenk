@extends('layout')
@section('title'){{ $page->seo_title ?: $page->baslik }} - @endsection
@section('description'){{ $page->seo_aciklama }}@endsection
@section('content')

    {{-- <!-- Bottom Info Section -->
    <div class="container bottom-info-section" id="nedenboyuyoruz">
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
     
    </div> --}}




    <style>
        .custom-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
            padding: 10px;
        }
        .custom-item {
            position: relative;
            background-color: #333;
            color: white;
            border: 1px solid #444;
            border-radius: 10px;
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            text-decoration: none;
            color: white;
        }
        .custom-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .custom-item .custom-label {
            position: absolute;
            bottom: 10px;
            left: 10px;
            background: rgba(0, 0, 0, 0.5);
            padding: 5px 10px;
            border-radius: 5px;
        }
        @media (max-width: 1200px) {
            .custom-container {
                grid-template-columns: repeat(3, 1fr);
            }
        }
        @media (max-width: 768px) {
            .custom-container {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        @media (max-width: 576px) {
            .custom-container {
                grid-template-columns: 1fr;
            }
        }
        .custom-title {
                text-align: center;
                margin-bottom: 20px;
                line-height: 1;
                letter-spacing: -.05em;
                word-break: break-word;
                font-family: {!! setting('css.font2') !!};
                font-weight: 700;
                font-size: 35px !important;
            }
    </style>
    <main style="margin: 80px auto; padding: 0 40px;">
        <h2 class="ml-2 custom-title text-center">Neler Boyuyoruz?</h2>
        <div class="custom-container">
            @foreach ($paints->sortBy('sira') as $paint)
            <a href="/neler-boyuyoruz/{{ $paint->seo_url }}" class="custom-item">
                @if ($paint->image)
                <img src="/public/storage/{{ $paint->image }}" alt="{{ setting('seo.etiketler') }}">
    
                @endif
                <div class="custom-label">{{ $paint->baslik }}</div>
            </a>
            @endforeach
        </div>
    </main>
@endsection