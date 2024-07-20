@php
$currentUrl = request()->url();
$urlSegments = explode('/yonetim/', $currentUrl);
$lastSegment = end($urlSegments);
@endphp

@if($lastSegment == 'musteriler/ekle')
    @include('admin.pages.customer_add')
@elseif($lastSegment == 'galeri/ekle')
    @include('admin.pages.gallery_add')
@elseif($lastSegment == 'hizmetler/ekle')
    @include('admin.pages.service_add')
@elseif($lastSegment == 'urunler/ekle')
    @include('admin.pages.product_add')
@elseif($lastSegment == 'super-user/bloglar/ekle')
    @include('admin.pages.blog_add')
@elseif($lastSegment == 'super-user/kategoriler/ekle')
    @include('admin.pages.category_add')
@elseif($lastSegment == 'super-user/seo-modulu/ekle')
    @include('admin.pages.category_setting_add')
@elseif($lastSegment == 'super-user/sayfalar/destek/ekle')
    @include('admin.pages.help_add')
@endif
