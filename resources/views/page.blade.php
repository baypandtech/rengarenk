@extends('layout')
@section('title'){{ $page->seo_title ?: $page->baslik }} - @endsection
@section('description'){{ $page->seo_aciklama }}@endsection
@section('head')
    <style>
        .category-title {
        font-size: 2em;
        margin: 20px 0;
        text-align: center;
    }
    </style>
@endsection
@section('content')
    <div class="container p-4" style="margin-top: 30px;">
        <h2 class="category-title">{{ $page->baslik }}</h2>
        <div class="row">
            
            @if ($page->aciklama)
            <div class="pb-5">
                {!! $page->aciklama !!}
            </div>
            @endif

        </div>
    </div>
@endsection