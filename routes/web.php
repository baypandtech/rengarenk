<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FreepikController;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Resmin URL'sini alarak indiren ve sonucu gösteren rotayı tanımlayalım
// Route::post('/', [FreepikController::class, 'downloadImage'])->name('convert');

// Route::get('/download', function () {
//     return redirect('/epik');
// });


Route::group(['prefix' => 'yonetici'], function () {
    Route::get('/bulk-email', [App\Http\Controllers\FormController::class, 'showBulkEmailForm'])->name('bulk-email.form');
    Route::post('/send-bulk-email', [App\Http\Controllers\FormController::class, 'sendBulkEmail'])->name('bulk-email.send');

    Route::get('/bulk-sms', [App\Http\Controllers\FormController::class, 'showBulkSmsForm'])->name('bulk-sms.form');
    Route::post('/send-bulk-sms', [App\Http\Controllers\FormController::class, 'sendBulkSms'])->name('bulk-sms.send');
    Voyager::routes();
});

Route::get('/include-form', function () {
    $helps = App\Help::orderby('sira', 'asc')->get();

    return view('layouts.forminclude', compact('helps'));
}); 

Route::get('/fiyat-teklifi', function () {
    $page = App\Page::where('seo_url', 'fiyat-teklifi')->first();
    $helps = App\Help::orderby('sira', 'asc')->get();

    return view('form', compact('helps', 'page'));
}); 

Route::get('/blog', function () {
    $helps = App\Help::orderby('sira', 'asc')->get();
    $blogs = App\Blog::where('aktif', '1')->orderby('created_at', 'desc')->paginate(8);
    $page = App\Page::where('seo_url', 'blog')->first();

    return view('blog', compact('helps', 'blogs', 'page'));
}); 

Route::get('/blog/{slug}', function ($slug) {

    $blog = App\Blog::where('aktif', '1')->where('seo_url', $slug)->first();
    if(!isset($blog)){
        abort(404);
    }
    // Önceki blogu al
    $previousBlog =  App\Blog::where('aktif', '1')->where('id', '<', $blog->id)->orderBy('id', 'desc')->first();
    // Sonraki blogu al
    $nextBlog =  App\Blog::where('aktif', '1')->where('id', '>', $blog->id)->orderBy('id')->first();

    $helps = App\Help::orderby('sira', 'asc')->get();
    $blogs = App\Blog::orderby('created_at', 'asc')->get();
    $relatedBlogs = App\Blog::where('aktif', '1')->where('seo_url', '!=', $slug)->take(2)->get();


    return view('blogic', compact('helps', 'blogs', 'relatedBlogs', 'blog', 'previousBlog', 'nextBlog'));
})->name('blog.show'); 

Route::get('/ustalik-basvurusu', function () {
    $helps = App\Help::orderby('sira', 'asc')->get();
    $ustalik_form = App\UstalikForm::first();
    $page = App\Page::where('seo_url', 'ustalik-basvurusu')->first();

    return view('ustalik', compact('helps', 'ustalik_form', 'page'));
}); 

Route::get('/boya-badana-boyaci-ustasi-hizmeti-kategori', function () {
    $helps = App\Help::orderby('sira', 'asc')->get();
    $page = App\Page::where('seo_url', 'boya-badana-boyaci-ustasi-hizmeti-kategori')->first();
    $fields = App\Field::orderby('sira', 'asc')->get();

    return view('renkendigimizalan', compact('helps', 'fields', 'page'));
}); 

Route::get('/e-katalog', function () {
    $helps = App\Help::orderby('sira', 'asc')->get();
    $page = App\Page::where('seo_url', 'e-katalog')->first();
    $katalogs = App\Pdf::orderby('sira', 'asc')->get();

    return view('katalog', compact('helps', 'katalogs', 'page'));
}); 

Route::get('/boya-badana-boyaci-ustasi-hizmetleri/{slug}', function ($slug) {
    $field = App\Field::where('seo_url', $slug)->first();
    if(!isset($field)){
        abort(404);
    }
    $relatedFields = App\Field::orderby('sira', 'asc')->where('seo_url', '!=', $slug)->paginate(6);
    $images = json_decode($field->images, true);
    $helps = App\Help::orderby('sira', 'asc')->get();
    $fields = App\Field::orderby('sira', 'asc')->get();
    $randomfields = App\Field::inRandomOrder()->take(2)->get();

    return view('kagithane', compact('helps', 'fields', 'relatedFields', 'field', 'images', 'randomfields'));
}); 

// Route::get('/neler-boyuyoruz/{slug}', function ($slug) {
//     $field = App\Paint::where('seo_url', $slug)->first();
//     if(!isset($field)){
//         abort(404);
//     }
//     $relatedFields = App\Field::orderby('sira', 'asc')->where('seo_url', '!=', $slug)->paginate(6);
//     $images = json_decode($field->images, true);
//     $helps = App\Help::orderby('sira', 'asc')->get();
//     $fields = App\Paint::orderby('sira', 'asc')->get();
//     $randomfields = App\Paint::inRandomOrder()->take(2)->get();

//     return view('boynanaalan_detay', compact('helps', 'fields', 'relatedFields', 'field', 'images', 'randomfields'));
// }); 

Route::get('/formkismi', function () {
    $areas = App\Area::orderby('sira', 'asc')->get();
    $rooms = App\Room::orderby('sira', 'asc')->get();

    return view('formkismi', compact('rooms', 'areas'));
}); 
Route::get('/', function () {
    return view('welcome');
});

// Route::get('/neler-boyuyoruz', function () {
//     $field = App\Paint::where('seo_url', $slug)->first();
//     if(!isset($field)){
//         abort(404);
//     }
//     $relatedFields = App\Field::orderby('sira', 'asc')->where('seo_url', '!=', $slug)->paginate(6);
//     $images = json_decode($field->images, true);
//     $helps = App\Help::orderby('sira', 'asc')->get();
//     $fields = App\Paint::orderby('sira', 'asc')->get();
//     $randomfields = App\Paint::inRandomOrder()->take(2)->get();

//     return view('boynanaalan_detay', compact('helps', 'fields', 'relatedFields', 'field', 'images', 'randomfields'));
// }); 

Route::get('/sitemap.xml', function () {
    $pages = App\Page::all();
    $countries = App\Country::orderby('title', 'asc')->get();
    $blogs = App\Blog::orderby('created_at', 'asc')->get();
    $fields = App\Field::orderby('sira', 'asc')->get();

    $urls = [];

    // Statik sayfalar
    $urls[] = URL::to('/');
    foreach ($pages as $page) {
        $urls[] = URL::to('/' . $page->seo_url);
    }

    // Dinamik sayfalar (Country modeli)
    foreach ($countries as $country) {
        $urls[] = URL::to('/' . $country->seo_url.'-boya-badana');
    }

    foreach ($blogs as $blog) {
        $urls[] = URL::to('/blog/' . $blog->seo_url);
    }

    foreach ($fields as $field) {
        $urls[] = URL::to('/boya-badana-boyaci-ustasi-hizmetleri/' . $field->seo_url);
    }
    return response()->view('sitemap', compact('urls'))->header('Content-Type', 'application/xml');

});

Route::get('/test', function () {
    $comments = App\Comment::orderby('sira', 'asc')->get();
    $features = App\Feature::orderby('sira', 'asc')->get();
    $processes = App\Process::orderby('sira', 'asc')->get();
    $questions = App\Question::orderby('sira', 'asc')->get();
    $paints = App\Paint::orderby('sira', 'asc')->paginate(6);
    $fields = App\Field::orderby('sira', 'asc')->paginate(3);
    $rates = App\Rate::orderby('m2', 'asc')->get();
    $rendezvou = App\Rendezvou::first();
    $consultation = App\Consultation::first();
    $banner = App\Banner::first();
    $helps = App\Help::orderby('sira', 'asc')->get();
    $countries = App\Country::orderby('title', 'asc')->get();

    return view('index', compact('banner', 'comments', 'consultation', 'features', 'processes', 'questions',
     'paints', 'rendezvou', 'fields', 'rates', 'helps', 'countries'));
})->name('index');

Route::post('/talep-form', [App\Http\Controllers\FormController::class, 'talep'])->name('form.talep');
Route::post('/kesif-form', [App\Http\Controllers\FormController::class, 'kesif'])->name('form.kesif');
Route::post('/danisma-form', [App\Http\Controllers\FormController::class, 'danisma'])->name('form.danisma');
Route::post('/masterclass-form', [App\Http\Controllers\FormController::class, 'masterclass'])->name('form.masterclass');
Route::post('/fiyat-form', [App\Http\Controllers\FormController::class, 'fiyat'])->name('form.fiyat');


Route::get('{slug}', function ($slug) {
    $page = App\Page::where('seo_url', $slug)->first();
    $helps = App\Help::orderby('sira', 'asc')->get();

    $parts = explode('-', $slug);
    // İlk alanı al
    $firstPart = $parts[0];
    // İlk alanı kullanarak veritabanından veriyi çek
    $country = App\Country::where('seo_url', $firstPart)->first();
    if(isset($page)){
        return view('page', compact('page', 'helps'));
    }
    elseif(isset($country)){
        $comments = App\Comment::orderby('sira', 'asc')->get();
        $features = App\Feature::orderby('sira', 'asc')->get();
        $processes = App\Process::orderby('sira', 'asc')->get();
        $questions = App\Question::orderby('sira', 'asc')->get();
        $paints = App\Paint::orderby('sira', 'asc')->paginate(6);
        $fields = App\Field::orderby('sira', 'asc')->paginate(3);
        $rates = App\Rate::orderby('m2', 'asc')->get();
        $rendezvou = App\Rendezvou::first();
        $consultation = App\Consultation::first();
        $banner = App\Banner::first();
        $helps = App\Help::orderby('sira', 'asc')->get();
        $countries = App\Country::orderby('title', 'asc')->get();

        return view('index', compact('banner', 'comments', 'consultation', 'features', 'processes', 'questions',
        'paints', 'rendezvou', 'fields', 'rates', 'helps', 'countries', 'country'));
    }
    abort(404);
});



// Route::get('/search', [AdminController::class, 'search'])->name('search');

// Route::get('/epik', function () {
//     return view('freepik');
// });

// Route::get('/yonetim', 'App\Http\Controllers\AdminController@index');

// Route::group(['prefix' => ''], function () {
//     require base_path('app/Routes/admin.php');
// });

//Auth
//GET
// Route::get('/giris', function () {
//     $site_title = App\RootSetting::first()->baslik;
//     $genelayarlar = App\RootSetting::first();
//     if (Auth::guard('members')->check()) {
//         return redirect('/yonetim');
//     } else {
//         return view('auth.login', compact('genelayarlar', 'site_title'));
//     }
// });

// Route::get('/kayit', function () {
//     $site_title = App\RootSetting::first()->baslik;
//     $genelayarlar = App\RootSetting::first();
//     if (Auth::guard('members')->check()) {
//         return redirect('/yonetim');
//     } else {
         
//         return view('auth.register', compact('genelayarlar', 'site_title'));
//     }
// });
// Route::get('/verify-email', function () {return view('auth.verify-email');});
// Route::get('/verify-newemail', function () {return view('auth.verify-newemail');});

// Route::get('/sifremi-unuttum', function () {
//     $site_title = App\RootSetting::first()->baslik;
//     $genelayarlar = App\RootSetting::first();
//     if (Auth::guard('members')->check()) {
//         return redirect('/yonetim');
//     } else {
//         return view('auth.forgotPassword', compact('genelayarlar', 'site_title'));
//     }
// });
// Route::get('/reset-password', 'App\Http\Controllers\AuthController@rePassword')->name('resetform');

// //POST
// Route::post('/giris', [AuthController::class, 'login'])->name('giris');
// Route::post('/kayit', [AuthController::class, 'verifyEmail']);
// Route::post('/cikis', [AuthController::class, 'logout'])->name('cikis');
// Route::post('/sifremi-unuttum', [AuthController::class, 'resetpassword'])->name('sifirla');
// Route::post('/reset-password', [AuthController::class, 'resetPasswordForm'])->name('resetP');
// Route::post('/verify-email', [AuthController::class, 'register']);
// Route::post('/verify-newemail', [App\Http\Controllers\AdminController::class, 'verifyNewEmail']);


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
