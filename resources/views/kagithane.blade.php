@extends('layout')
@section('title'){{ $field->seo_title ?: $field->baslik }} - @endsection
@section('description'){{ $field->seo_aciklama }}@endsection
@section('content')
    
    <style>
        /* Genel Stil */
        body {
            font-family: 'Quicksand', sans-serif;
            color: #333;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .custom-header {
            text-align: center;
            padding: 50px 20px;
            background: linear-gradient(135deg, #1c1c1c, #444);
            color: white;
        }
        .custom-header h1 {
            margin: 0;
            font-size: 48px;
            font-weight: 700;
        }
        .custom-header .custom-breadcrumbs {
            margin-top: 10px;
            font-size: 16px;
            color: #ccc;
        }
        .custom-carousel {
            position: relative;
            overflow: hidden;
            margin-bottom: 40px;
        }
        .custom-carousel img {
            width: 100%;
            height: auto;
        }
        .custom-carousel-thumbnails img {
            cursor: pointer;
        }
        .custom-description {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 40px;
            font-family: {!! setting('css.font2') !!};
            font-weight: 700;
        }
        .custom-description h2 {
            margin: 0 0 20px 0;
            font-size: 28px;
        }
        .custom-info-box {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            color: #333;
            transition: transform 0.3s, box-shadow 0.3s;
            margin-bottom: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .custom-info-box:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }
        .custom-info-box h3 {
            margin: 0 0 15px 0;
            font-size: 24px;
        }
        .custom-info-box p {
            margin: 0;
            font-size: 18px;
        }
        .custom-info-box a {
            display: inline-block;
            margin-top: 20px;
            background-color: #1c1c1c;
            color: white;
            text-decoration: none;
            padding: 15px 30px;
            text-align: center;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s, transform 0.3s;
        }
        .custom-info-box a:hover {
            background-color: #333;
            transform: translateY(-3px);
        }
        .custom-text-center {
            font-weight: 700;
            margin-bottom: 30px;
        }
        .custom-grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 50px;
        }
        .custom-grid-item {
            position: relative;
            background-color: #333;
            color: white;
            border-radius: 10px;
            overflow: hidden;
            text-decoration: none;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .custom-grid-item img {
            width: 100%;
            height: auto;
            transition: transform 0.3s;
        }
        .custom-grid-item .custom-label {
            position: absolute;
            bottom: 10px;
            left: 10px;
            background: rgba(0, 0, 0, 0.7);
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 16px;
        }
        .custom-grid-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }
        .custom-grid-item:hover img {
            transform: scale(1.05);
        }
    </style>

    <div class="custom-header">
        <h1>{{ $field->baslik }}</h1>
        <div class="custom-breadcrumbs">
            <a style=" color: #ccc;" href="/">Anasayfa</a> > {{ $field->baslik }}
        </div>
    </div>
    <div class="container main-content">
        <div id="carouselExampleIndicators" class="custom-carousel carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @php
                    $isFirst = true;
                @endphp
                @if (isset($images))
                
                @foreach ($images as $index => $image)
                    <li data-target="#screenshotCarousel" data-slide-to="{{ $index }}" class=" @if ($isFirst) active @endif"></li>
                    @php
                        $isFirst = false;
                    @endphp
                @endforeach
                @endif

            </ol>
            <div class="carousel-inner">
                @php
                    $isFirst = true;   
                @endphp
                @if (isset($images))
                @foreach ($images as $image)
                        <div class="carousel-item @if ($isFirst) active @endif">
                        <img src="/public/storage/{{ $image }}" class="d-block w-100" alt="Screenshot">
                    </div>
                    @php
                        $isFirst = false;
                    @endphp
                @endforeach
                @endif 
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="custom-description mt-4">
            <h2>Boyanılan Alan Açıklaması</h2>
            <p>{{ $field->aciklama }}</p>
        </div>
        <div class="row additional-info">
            <div class="col-md-4">
                <div class="custom-info-box">
                    <h5><strong>Başlangıç Tarihi</strong></h5>
                    <p>{{ \Carbon\Carbon::parse($field->created_at)->format('d.m.Y') }}</p><br>
                    <h5><strong>Boya Badana Hizmeti Adı</strong></h5>
                    <p>{{ $field->baslik }}</p>
                </div>
            </div>
            @foreach ($randomfields as $randomfield)
            <div class="col-md-4">
                <div class="custom-info-box">
                    <p>{{ \Carbon\Carbon::parse($randomfield->created_at)->locale('tr')->isoFormat('D MMMM YYYY, HH:mm') }}</p>
                    <h5>{{ $randomfield->baslik }}</h5>
                    <a style="float: right;" href="/boya-badana-boyaci-ustasi-hizmetleri/{{ $randomfield->seo_url }}">></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="container mt-5">
        <h3 class="custom-text-center">RENKLENDİRDİGİMİZ DiGER ALANLAR</h3>
        <div class="custom-grid-container">
            @foreach ($relatedFields->sortBy('sira') as $relatedField)
            <a href="/boya-badana-boyaci-ustasi-hizmetleri/{{ $relatedField->seo_url }}" class="custom-grid-item">
                @if ($relatedField->image)
                <img src="/public/storage/{{ $relatedField->image }}" alt="{{ setting('seo.etiketler') }}">
    
                @endif
                <div class="custom-label">{{ $relatedField->baslik }}</div>
            </a>
            @endforeach
        </div>
        <style>
            .pagination {
                display: flex;
                justify-content: center;
                align-items: center;
                margin-top: 20px;
            }
            .page-item.active .page-link {
            
                background-color: {{ setting('css.ana_renk') }};
                border-color: {{ setting('css.ana_renk') }};
            }
            .page-link {
                color: {{ setting('css.ana_renk') }};
            }
        </style>
        <div class="pagination">
            {{ $relatedFields->links('pagination::bootstrap-4') }}
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection
