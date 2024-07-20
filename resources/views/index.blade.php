@extends('layout')
@section('title'){{ isset($country) ? $country->title. ' Boya Badana Hizmeti - ' : setting('seo.baslik') }} @endsection
@section('description'){{ isset($country) ? $country->seo_aciklama. ' Boya Badana' : setting('seo.aciklama') }}@endsection
@section('content')
    @include('layouts.form')

    @include('layouts.banner')

    <div class="iframe-container" style="overflow: hidden;">
        <iframe src="https://rengarenk.baypand.com/formkismi" width="100%" height="100%" style="border:none;" title="talep formu"></iframe>
    </div>

    <!-- Page Title -->
    @include('layouts.boya')

    <!-- Reservation Section -->
    @include('layouts.randevumetin')

    @include('layouts.surec')

    <!-- Payment and Services Section -->
    @include('layouts.odeme')

    <!-- Bottom Info Section -->
    @include('layouts.nelerboyuyoruz')

    @include('layouts.yorumlar')

    @include('layouts.sorular')

    @include('layouts.renkdanisma')

    @include('layouts.blog')

    @include('layouts.bolgeler')

@endsection