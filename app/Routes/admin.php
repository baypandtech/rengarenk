<?php
use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(function () {
    Route::get('/', 'App\Http\Controllers\AdminController@index');
    Route::get('/urunler', 'App\Http\Controllers\AdminController@urunler');
    Route::get('/hizmetler', 'App\Http\Controllers\AdminController@hizmetler');
    Route::get('/musteriler', 'App\Http\Controllers\AdminController@musteriler');
    Route::get('/genel-ayarlar/isletme-profili', 'App\Http\Controllers\AdminController@isletmeprofili');
    Route::get('/galeri', 'App\Http\Controllers\AdminController@galeri');
    Route::get('/aktivasyon', 'App\Http\Controllers\AdminController@etkinlestir');
    Route::get('/genel-ayarlar/ayarlar', 'App\Http\Controllers\AdminController@ayarlar');
    Route::get('/{slug}/ekle', 'App\Http\Controllers\AdminController@add');

    //SUPERUSER
    //PAGES
    Route::prefix('super-user')->group(function () {
        Route::get('/firmalar', 'App\Http\Controllers\AdminController@firmalar');
        Route::get('/bloglar', 'App\Http\Controllers\AdminController@bloglar');
        Route::get('/kategoriler', 'App\Http\Controllers\AdminController@kategoriler');
        Route::get('/seo-modulu', 'App\Http\Controllers\AdminController@kategoriayari');    
        Route::get('/ayarlar', 'App\Http\Controllers\AdminController@superayarlar');  
        Route::prefix('sayfalar')->group(function () {
                Route::get('/hakkimizda', 'App\Http\Controllers\AdminController@hakkimizda');
                Route::get('/iletisim', 'App\Http\Controllers\AdminController@iletisim');
                Route::get('/fiyatlar', 'App\Http\Controllers\AdminController@fiyatlar');
                Route::get('/gizlilik-politikasi', 'App\Http\Controllers\AdminController@gizlilikpolitikasi');
                Route::get('/kullanim-kosullari', 'App\Http\Controllers\AdminController@kullanimkosullari');
                Route::get('/blog', 'App\Http\Controllers\AdminController@blog');
                Route::get('/giris', 'App\Http\Controllers\AdminController@girisPage');
                Route::get('/kayit', 'App\Http\Controllers\AdminController@kayitPage');
                Route::get('/{slug}/ekle', 'App\Http\Controllers\AdminController@add');

                //POST
                Route::post('/hakkimizda', 'App\Http\Controllers\AdminController@hakkimizdaEdit');
                Route::post('/fiyatlar', 'App\Http\Controllers\AdminController@fiyatlarEdit');
                Route::post('/iletisim', 'App\Http\Controllers\AdminController@iletisimEdit');
                Route::post('/destek', 'App\Http\Controllers\AdminController@destekEdit');
                Route::post('/gizlilik-politikasi', 'App\Http\Controllers\AdminController@gizlilikpolitikasiEdit');
                Route::post('/kullanim-kosullari', 'App\Http\Controllers\AdminController@kullanimkosullariEdit');
                Route::post('/blog', 'App\Http\Controllers\AdminController@blogEdit');
                Route::post('/giris', 'App\Http\Controllers\AdminController@girisPageEdit');
                Route::post('/kayit', 'App\Http\Controllers\AdminController@kayitPageEdit');

                Route::prefix('destek')->group(function () {
                    Route::get('/', 'App\Http\Controllers\AdminController@destek');
                    Route::get('/duzenle/{slug2}', 'App\Http\Controllers\HelpPageController@duzenle');
                    //POST
                    Route::post('/', 'App\Http\Controllers\HelpPageController@destroy'); 
                    Route::post('delete-all', 'App\Http\Controllers\HelpPageController@multi_destroy'); 
                    Route::post('/ekle', 'App\Http\Controllers\HelpPageController@store');
                    Route::post('/duzenle/{slug2}', 'App\Http\Controllers\HelpPageController@update');
                });

        });
        Route::get('/{slug}/ekle', 'App\Http\Controllers\AdminController@add');
        //POST
        Route::post('/ayarlar', 'App\Http\Controllers\AdminController@superayarlarupdate');  
    });

    //POST
    Route::prefix('genel-ayarlar')->group(function () {
        Route::post('/isletme-profili', 'App\Http\Controllers\AdminController@isletmeprofili_edit');
        Route::post('/ayarlar', 'App\Http\Controllers\AdminController@ayarlar_edit');
        Route::post('/ayarlar/seo-setting', 'App\Http\Controllers\AdminController@seo_edit');
        Route::post('/ayarlar/change-pass', 'App\Http\Controllers\AuthController@changepassword');
    });

    //PRODUCT
    Route::prefix('urunler')->group(function () {
        Route::get('/detay/{slug2}', 'App\Http\Controllers\ProductController@view'); 
        Route::get('/duzenle/{slug2}', 'App\Http\Controllers\ProductController@duzenle');
        //POST
        Route::post('/', 'App\Http\Controllers\ProductController@destroy'); 
        Route::post('delete-all', 'App\Http\Controllers\ProductController@multi_destroy'); 
        Route::post('/ekle', 'App\Http\Controllers\ProductController@store');
        Route::post('/duzenle/{slug2}', 'App\Http\Controllers\ProductController@update');
    });

    //SERVİCE
    Route::prefix('hizmetler')->group(function () {
        Route::get('/detay/{slug2}', 'App\Http\Controllers\ServiceController@view'); 
        Route::get('/duzenle/{slug2}', 'App\Http\Controllers\ServiceController@duzenle');
        //POST
        Route::post('/', 'App\Http\Controllers\ServiceController@destroy'); 
        Route::post('delete-all', 'App\Http\Controllers\ServiceController@multi_destroy'); 
        Route::post('/ekle', 'App\Http\Controllers\ServiceController@store');
        Route::post('/duzenle/{slug2}', 'App\Http\Controllers\ServiceController@update');
    });

     //Gallery
     Route::prefix('galeri')->group(function () {
        Route::get('/detay/{slug2}', 'App\Http\Controllers\GalleryController@view'); 
        Route::get('/duzenle/{slug2}', 'App\Http\Controllers\GalleryController@duzenle');
        //POST
        Route::post('/', 'App\Http\Controllers\GalleryController@destroy'); 
        Route::post('delete-all', 'App\Http\Controllers\GalleryController@multi_destroy'); 
        Route::post('/ekle', 'App\Http\Controllers\GalleryController@store');
        Route::post('/duzenle/{slug2}', 'App\Http\Controllers\GalleryController@update');
    });

    //Customer
    Route::prefix('musteriler')->group(function () {
        Route::get('/detay/{slug2}', 'App\Http\Controllers\CustomerController@view'); 
        Route::get('/duzenle/{slug2}', 'App\Http\Controllers\CustomerController@duzenle');
        //POST
        Route::post('/', 'App\Http\Controllers\CustomerController@destroy'); 
        Route::post('delete-all', 'App\Http\Controllers\CustomerController@multi_destroy'); 
        Route::post('/ekle', 'App\Http\Controllers\CustomerController@store');
        Route::post('/duzenle/{slug2}', 'App\Http\Controllers\CustomerController@update');
    });

    //Blog
       Route::prefix('super-user/bloglar')->group(function () {
        Route::get('/detay/{slug2}', 'App\Http\Controllers\BlogController@view'); 
        Route::get('/duzenle/{slug2}', 'App\Http\Controllers\BlogController@duzenle');
        //POST
        Route::post('/', 'App\Http\Controllers\BlogController@destroy'); 
        Route::post('delete-all', 'App\Http\Controllers\BlogController@multi_destroy'); 
        Route::post('/ekle', 'App\Http\Controllers\BlogController@store');
        Route::post('/duzenle/{slug2}', 'App\Http\Controllers\BlogController@update');
    });

     //Category
     Route::prefix('super-user/kategoriler')->group(function () {
        Route::get('/detay/{slug2}', 'App\Http\Controllers\CategoryController@view'); 
        Route::get('/duzenle/{slug2}', 'App\Http\Controllers\CategoryController@duzenle');
        //POST
        Route::post('/', 'App\Http\Controllers\CategoryController@destroy'); 
        Route::post('delete-all', 'App\Http\Controllers\CategoryController@multi_destroy'); 
        Route::post('/ekle', 'App\Http\Controllers\CategoryController@store');
        Route::post('/duzenle/{slug2}', 'App\Http\Controllers\CategoryController@update');
    });

    //Category Setting
    Route::prefix('super-user/seo-modulu')->group(function () {
        Route::get('/detay/{slug2}', 'App\Http\Controllers\CategorySetting@view'); 
        Route::get('/duzenle/{slug2}', 'App\Http\Controllers\CategorySetting@duzenle');
        //POST
        Route::post('/', 'App\Http\Controllers\CategorySetting@destroy'); 
        Route::post('delete-all', 'App\Http\Controllers\CategorySetting@multi_destroy'); 
        Route::post('/ekle', 'App\Http\Controllers\CategorySetting@store');
        Route::post('/duzenle/{slug2}', 'App\Http\Controllers\CategorySetting@update');
    });

    //Message
    Route::prefix('aktivasyon')->group(function () {
        Route::get('/detay/{slug2}', 'App\Http\Controllers\MessageController@view'); 
        //POST
        Route::post('/', 'App\Http\Controllers\MessageController@destroy'); 
        Route::post('delete-all', 'App\Http\Controllers\MessageController@multi_destroy'); 
    });
    
    //OTHER POST
    Route::post('/businessprofile/{id}', 'App\Http\Controllers\AdminController@companyControl')->name('businessprofile.update');
    Route::post('/update-time', 'App\Http\Controllers\AdminController@updateTime')->name('update.time');
    Route::post('/aktivasyon', 'App\Http\Controllers\AdminController@verifyActivationCode')->name('active');

});

