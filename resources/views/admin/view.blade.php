@php

// Verilen URL
$currentUrl = request()->url();

// URL'yi parçala
$parts = parse_url($currentUrl);

// Yol kısmını al ve "/" ile böl
$path = explode('/', trim($parts['path'], '/'));

// Yonetim dışındaki kısımları çıkar
$filtered_path = array_diff($path, ['yonetim']);

// Son kısmı çıkar
array_pop($filtered_path);

// Ortadaki alanı elde et
$middle_part = implode('/', $filtered_path);

@endphp

@if($middle_part == 'musteriler/detay')
    @include('admin.pages.customer_view')
@elseif($middle_part == 'galeri/detay')
    @include('admin.pages.gallery_view')
@elseif($middle_part == 'hizmetler/detay')
    @include('admin.pages.service_view')
@elseif($middle_part == 'urunler/detay')
    @include('admin.pages.product_view')
@elseif($middle_part == 'mesajlar/detay')
    @include('admin.pages.message_view')
@elseif($middle_part == 'super-user/bloglar/detay')
    @include('admin.pages.blog_view')
@elseif($middle_part == 'super-user/kategoriler/detay')
    @include('admin.pages.category_view')
@elseif($middle_part == 'super-user/seo-modulu/detay')
    @include('admin.pages.category_setting_view')
@endif

