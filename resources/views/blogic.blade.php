@section('content')
@section('title'){{ $blog->seo_title ?: $blog->baslik }} - @endsection
@section('description'){{ $blog->seo_aciklama }}@endsection
@extends('layout')
    <style>
        .custom-header {
            background-image: url(https://via.placeholder.com/1200x300);
            background-size: cover;
            background-position: center;
            color: #fff;
            font-size: 35px;
            margin-bottom: 20px;
            text-align: center;
            letter-spacing: -.05em;
            font-family: {!! setting('css.font2') !!};
            font-weight: 700;
            padding: 100px 20px;
        }
        .custom-header h1 {
            margin: 0;
            font-size: 48px;
        }
        .custom-header p {
            font-size: 24px;
        }
        .custom-container {
            width: 100%;
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            /* box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); */
            border-radius: 10px;
            letter-spacing: -.05em;
            font-family: {!! setting('css.font2') !!};
            font-weight: 700;
        }
        .custom-post-meta {
            color: #888;
            font-size: 14px;
            margin-bottom: 20px;
        }
        .custom-post-image {
            width: 60%;
            height: auto;
            border-radius: 10px;
        }
        .custom-post-content {
            margin-top: 20px;
            font-size: 18px;
        }
        .custom-related-posts {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-top: 40px;
        }
        .custom-post-thumbnail {
            width: 48%;
            margin-bottom: 20px;
        }
        .custom-post-thumbnail img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }
        .custom-post-thumbnail p {
            margin-top: 10px;
            font-size: 16px;
            font-weight: bold;
        }
        .custom-pagination {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            font-size: 16px;
        }
        .custom-pagination a {
            text-decoration: none;
            color: #000000;
            background-color: {{ setting('css.ucuncu_renk') }};
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .custom-pagination a:hover {
            background-color: {{ setting('css.ana_renk') }};
            color: #000000;
        }
        .custom-social-share {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .custom-social-share i {
            font-size: 24px;
            margin: 0 10px;
            color: #333;
            cursor: pointer;
            transition: color 0.3s;
        }
        .custom-social-share i:hover {
            color: {{ setting('css.ikinci_renk') }};
        }
        @media (max-width: 768px) {
            .custom-header {
                padding: 50px 20px;
            }
            .custom-header h1 {
                font-size: 32px;
            }
            .custom-header p {
                font-size: 18px;
            }
            .custom-post-thumbnail {
                width: 100%;
                margin-bottom: 20px;
            }
        }
        @media (max-width: 480px) {
            .custom-header {
                padding: 30px 10px;
            }
            .custom-header h1 {
                font-size: 24px;
            }
            .custom-header p {
                font-size: 16px;
            }
            .custom-post-content {
                font-size: 16px;
            }
            .custom-pagination a {
                padding: 8px 16px;
            }
            .custom-social-share i {
                font-size: 20px;
                margin: 0 5px;
            }
        }
    </style>
</head>
<body>

{{-- <div class="custom-header">
    <h1>Haberler</h1>
    <p>Anasayfa &raquo; Haberler</p>
</div> --}}
<main style="margin: 60px auto;">
    <div class="custom-container">
        <h2>{{ $blog->baslik }}</h2>
        <p class="custom-post-meta">{{ \Carbon\Carbon::parse($blog->created_at)->format('d-m-Y') }}</p>
        @if ($blog->image)
        <div class="text-center">
            <img src="/public/storage/{{ $blog->image }}" alt="{{ $blog->baslik }}" class="custom-post-image" width="100">
        </div>
        @endif
        <div class="custom-post-content">
            {!! $blog->aciklama !!}
        </div>
        <div class="custom-social-share">
            <i class="fab fa-facebook-f"></i>
            <i class="fab fa-whatsapp"></i>
            <i class="fab fa-instagram"></i>
        </div>
        <div class="custom-pagination">
            @if ($previousBlog)
                <a href="{{ route('blog.show', $previousBlog->seo_url) }}">&laquo; Önceki Blog</a>
            @endif

            @if ($nextBlog)
                <a href="{{ route('blog.show', $nextBlog->seo_url) }}">Sonraki Blog &raquo;</a>
            @endif
        </div>
        <h3 class="mt-5 text-center">Benzer Gönderiler</h3>
        <div class="custom-related-posts">
            @foreach($relatedBlogs as $relatedBlog)
            <a href="/blog/{{ $relatedBlog->seo_url }}">

                <div class="custom-post-thumbnail">
                    @if ($blog->image)
                        <img src="/public/storage/{{ $relatedBlog->image }}" alt="{{ $relatedBlog->baslik }}">
                    @endif
                    <p>{{ \Carbon\Carbon::parse($relatedBlog->created_at)->format('d-m-Y') }} | {{ $relatedBlog->baslik }}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</main>
@endsection
