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

@if($middle_part == 'musteriler/duzenle')
    @include('admin.pages.customer_edit')
@elseif($middle_part == 'galeri/duzenle')
    @include('admin.pages.gallery_edit')
@elseif($middle_part == 'hizmetler/duzenle')
    @include('admin.pages.service_edit')
@elseif($middle_part == 'urunler/duzenle')
    @include('admin.pages.product_edit')
@elseif($middle_part == 'super-user/bloglar/duzenle')
    @include('admin.pages.blog_edit')
@elseif($middle_part == 'super-user/kategoriler/duzenle')
    @include('admin.pages.category_edit')
@elseif($middle_part == 'super-user/seo-modulu/duzenle')
    @include('admin.pages.category_setting_edit')
@elseif($middle_part == 'super-user/sayfalar/destek/duzenle')
    @include('admin.pages.help_edit')
@endif
