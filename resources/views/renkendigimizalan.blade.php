@extends('layout')
@section('title'){{ $page->seo_title ?: $page->baslik }} - @endsection
@section('description'){{ $page->seo_aciklama }}@endsection
@section('content')
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
    <h2 class="ml-2 custom-title text-center">Renklendirilen Diğer Alanlar</h2>
    <div class="custom-container">
        @foreach ($fields->sortBy('sira') as $field)
        <a href="/boya-badana-boyaci-ustasi-hizmetleri/{{ $field->seo_url }}" class="custom-item">
            @if ($field->image)
            <img src="/public/storage/{{ $field->image }}" alt="{{ setting('seo.etiketler') }}">

            @endif
            <div class="custom-label">{{ $field->baslik }}</div>
        </a>
        @endforeach
    </div>
</main>
@endsection
