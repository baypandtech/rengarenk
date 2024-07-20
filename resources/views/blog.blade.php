@extends('layout')
@section('title'){{ $page->seo_title ?: $page->baslik }} - @endsection
@section('description'){{ $page->seo_aciklama }}@endsection
@section('content')
    <style>
        .custom-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            padding-bottom: 50px;
        }
        .custom-blog-section h1 {
            text-align: center;
            margin-bottom: 20px;
            line-height: 1;
            letter-spacing: -.05em;
            word-break: break-word;
            font-family: {!! setting('css.font2') !!};
            font-weight: 700;
            font-size: 35px !important;
            color: #000000;
            animation: fadeInDown 1s ease-in-out;
        }
        .custom-blog-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            opacity: 0;
            animation: fadeIn 1s forwards;
        }
        .custom-blog-card {
            display: block;
            width: calc(25% - 20px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-decoration: none;
            color: black;
            border-radius: 9px;
            background: #ffffff;
            font-family: {!! setting('css.font2') !!};
            font-weight: 500;
            overflow: hidden;
            transform: translateY(20px);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .custom-blog-card:hover {
            transform: translateY(0);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .custom-blog-card img {
            width: 100%;
            height: auto;
            transition: transform 0.3s ease;
        }
        .custom-blog-card:hover img {
            transform: scale(1.05);
        }
        .custom-blog-title {
            font-size: 1.2em;
            margin: 10px;
            color: #34495e;
        }
        .custom-blog-date {
            font-size: 0.9em;
            margin: 0 10px;
            color: rgb(0, 0, 0);
        }
        .custom-blog-card p {
            padding: 0 10px 10px;
            color: #7f8c8d;
        }
        .custom-btn-view-all {
            display: block;
            text-align: center;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .custom-btn-view-all:hover {
            background-color: #0056b3;
        }

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
        @media (max-width: 992px) {
            .custom-blog-card {
                width: calc(50% - 20px);
            }
        }
        @media (max-width: 768px) {
            .custom-blog-card {
                width: calc(100% - 20px);
            }
        }
        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
<main style="margin: 70px auto;">
    <div class="custom-container custom-blog-section">
        <h1>Blog</h1>
        <div class="custom-blog-container">
            @foreach ($blogs as $blog)
                <a href="/blog/{{ $blog->seo_url }}" class="custom-blog-card">
                    @if ($blog->image)
                    <img src="/public/storage/{{ $blog->image }}" alt="{{ setting('seo.etiketler') }}">
                    @endif
                    <div class="custom-blog-date mt-2">{{ \Carbon\Carbon::parse($blog->created_at)->format('d.m.Y') }}</div>

                    <div class="custom-blog-title">{{ $blog->baslik }}</div>
                    <p>{{ Str::limit($blog->kisa_aciklama, 50, '...') }}</p>
                </a>
            @endforeach
        </div>
        
    </div>
    <div class="pagination">
        {{ $blogs->links('pagination::bootstrap-4') }}
    </div>
</main>

@endsection
