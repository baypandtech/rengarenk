@extends('layout')
@section('title'){{ $field->seo_title ?: $field->baslik }} - @endsection
@section('description'){{ $field->seo_aciklama }}@endsection
@section('content')
    
    <main style="margin: 80px auto;">
        {!! $field->richtext !!}
    </main>

@endsection
