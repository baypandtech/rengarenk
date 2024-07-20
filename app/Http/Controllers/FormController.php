<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\URL;
use App\Models\Member;
use App\TempMember;
use App\RootSetting;
use App\TalepForm;
use App\Kesifform;
use App\Masterclass;
use App\DanismaForm;
use App\FiyatForm;
use App\Rules\PhoneNumber;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Mail;

use PHPMailer\PHPMailer\PHPMailer;

class FormController extends Controller
{
    use ImageUpload;

        public function talep(Request $request)
        {
            // Validation kurallarını ve özel hata mesajlarını ekliyoruz
            $validator = Validator::make($request->all(), [
                'district' => 'required|string|max:255',
                'rooms' => 'required|string|max:255',
                'area' => 'required|string|max:255',
            ], [
                'district.required' => 'İlçe Seçimi Yapmadınız.',
                'district.max' => '255 karakterden fazla veri girişine izin verilmemektedir.',

                'rooms.required' => 'Oda Seçimi Yapmadınız.',
                'rooms.max' => '255 karakterden fazla veri girişine izin verilmemektedir.',

                'area.required' => 'Alan Seçimi Yapmadınız.',
                'area.max' => '255 karakterden fazla veri girişine izin verilmemektedir.',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator, 'validationErrors')->withInput();
            }

            // Validation başarılı olursa, veritabanına kaydediyoruz
            TalepForm::create([
                'ilce' => $request->district,
                'oda' => $request->rooms,
                'alan' => $request->area,
            ]);
        
                // E-posta gönder
                require 'src/Exception.php';
                require 'src/PHPMailer.php';
                require 'src/SMTP.php';
    
                $content = '
                <p>Tarafınıza yeni bir talep formu geldi.</p>
                <p>Formu incelemek için yönetim panelini ziyaret edin</p>
                <a href="'.url('/yonetici/kesifforms').'" target="_BLANK"">Yönetim Paneli Bağlantısı</a><br>
                <p>İyi Günler Dileriz</p>
                <div style="text-align: center; margin-top:30px;">';
    
    
                    $mail = new PHPMailer(true);
                    try {
                        //Server settings
                        $mail->CharSet = 'UTF-8';
    
                        $mail->isSMTP();
                        $mail->Host = setting('email-ayarlari.host'); // SMTP sunucusu örnek : mail.alanadi.com
                        $mail->SMTPAuth = true; // SMTP Doğrulama
                        $mail->Username = setting('email-ayarlari.email'); // Mail kullanıcı adı
                        $mail->Password = setting('email-ayarlari.password'); // Mail şifresi
                        $mail->SMTPSecure = setting('email-ayarlari.protokol'); // Şifreleme
                        $mail->Port =  setting('email-ayarlari.port'); // SMTP Port
                        $mail->SMTPOptions = array(
                            'ssl' => array(
                                'verify_peer' => false,
                                'verify_peer_name' => false,
                                'allow_self_signed' => true
                            )
                        );
    
                        //Alıcılar
                        $mail->setfrom(setting('email-ayarlari.email'), setting('site.title'));
                        $mail->addAddress(setting('email-ayarlari.email'));
                        $mail->addReplyTo(setting('email-ayarlari.email'));
                        //İçerik
                        $mail->isHTML(true);
                        $mail->Subject = 'Yeni Telep Formu Hk. - '.setting('site.title');
                        $mail->Body = view('auth.emailTamplate', compact('content'))->render();
                        $mail->send();
    
                    } catch (Exception $e) {
                        return redirect()->back()->with("fail", "Form Gönderilemedi, daha sonra tekrar deneyiniz.");
                    }

            return redirect()->back()->with("success1", "Talebiniz alınmıştır.");
        }

        
        public function kesif(Request $request)
        {
            // Validation kurallarını ve özel hata mesajlarını ekliyoruz
            $request->validate([
                'adres' => 'required|string|max:255',
                'tel' => ['required', new PhoneNumber],
            ], [
                'adres.required' => 'Adres boş bırakılamaz.',
                'adres.max' => '255 karakterden fazla veri girişine izin verilmemektedir.',

                'tel.required' => 'Telefon numarası boş bırakılamaz.',
                'tel.max' => '25 karakterden fazla veri girişine izin verilmemektedir.',
            ]);

            // Validation başarılı olursa, veritabanına kaydediyoruz
            Kesifform::create([
                'address' => $request->adres,
                'telephone' => $request->tel,
            ]);
        

              // E-posta gönder
              require 'src/Exception.php';
              require 'src/PHPMailer.php';
              require 'src/SMTP.php';
  
              $content = '
              <p>Tarafınıza yeni bir keşif formu geldi.</p>
              <p>Formu incelemek için yönetim panelini ziyaret edin</p>
              <a href="'.url('/yonetici/kesifforms').'" target="_BLANK"">Yönetim Paneli Bağlantısı</a><br>
              <p>İyi Günler Dileriz</p>
              <div style="text-align: center; margin-top:30px;">';
  
  
                  $mail = new PHPMailer(true);
                  try {
                      //Server settings
                      $mail->CharSet = 'UTF-8';
  
                      $mail->isSMTP();
                      $mail->Host = setting('email-ayarlari.host'); // SMTP sunucusu örnek : mail.alanadi.com
                      $mail->SMTPAuth = true; // SMTP Doğrulama
                      $mail->Username = setting('email-ayarlari.email'); // Mail kullanıcı adı
                      $mail->Password = setting('email-ayarlari.password'); // Mail şifresi
                      $mail->SMTPSecure = setting('email-ayarlari.protokol'); // Şifreleme
                      $mail->Port =  setting('email-ayarlari.port'); // SMTP Port
                      $mail->SMTPOptions = array(
                          'ssl' => array(
                              'verify_peer' => false,
                              'verify_peer_name' => false,
                              'allow_self_signed' => true
                          )
                      );
  
                      //Alıcılar
                      $mail->setfrom(setting('email-ayarlari.email'), setting('site.title'));
                      $mail->addAddress(setting('email-ayarlari.email'));
                      $mail->addReplyTo(setting('email-ayarlari.email'));
                      //İçerik
                      $mail->isHTML(true);
                      $mail->Subject = 'Yeni Keşif Formu Hk. - '.setting('site.title');
                      $mail->Body = view('auth.emailTamplate', compact('content'))->render();
                      $mail->send();
  
                  } catch (Exception $e) {
                      return redirect()->back()->with("fail", "Form Gönderilemedi, daha sonra tekrar deneyiniz.");
                  }
  

            return redirect()->back()->with("success", "Talebiniz alınmıştır, en kısa sürede telefon numaranız üzerinden iletişime geçilecektir");
        }

        public function danisma(Request $request)
        {
            // Validation kurallarını ve özel hata mesajlarını ekliyoruz
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|max:255',
                'surname' => 'required|max:255',
                'name' => 'required|max:255',

                // 'gsm' => ['required', new PhoneNumber],
            ], [
                'email.email' => 'Eposta adresiniz geçersiz.',
                'email.required' => 'Telefon numarası boş bırakılamaz.',
                'email.max' => '255 karakterden fazla veri girişine izin verilmemektedir.',

                'name.required' => 'Ad alanı bırakılamaz.',
                'name.max' => '255 karakterden fazla veri girişine izin verilmemektedir.',

                'surname.required' => 'Soyad alanı boş bırakılamaz.',
                'surname.max' => '255 karakterden fazla veri girişine izin verilmemektedir.',
            ]);

            if ($validator->fails()) {
                return redirect()->to(route('index') . '#errors')
                                 ->withErrors($validator)
                                 ->withInput();
            }

            
            if ( $request->hasFile('file') ) {
                $filePath = $this->uploadImage($request, 'file', 'danismaform'); // Resmi yükle

                if($filePath == 'imagesizeerror'){
                    return redirect()->back()->with('fail', 'Dosya çok büyük. Maksimum boyut: ' . $this->maxSizeInKB . 'KB');
                }
                else if($filePath == 'imagetypeerror'){
                    return redirect()->back()->with('fail', 'Yalnızca jpg, png, jpeg ve webp resim türleri yüklenebilir.');
                }
                else if($filePath == 'error'){
                    return redirect()->back()->with('fail', 'Dosya yükleme sırasında bir hata oluştu');
                }
            }else{
                $filePath = '';
            }

            $danisma = new DanismaForm;

            if ($filePath) {
                $danisma->file = $filePath;
            }
            

            $danisma->name =  $request->name;
            $danisma->last_name =  $request->surname;
            $danisma->telephone =  $request->gsm;
            $danisma->email =  $request->email;
            $danisma->aciklama =  $request->description;
			$danisma->save();


            // E-posta gönder
            require 'src/Exception.php';
            require 'src/PHPMailer.php';
            require 'src/SMTP.php';
            $name = $request->name. ' '. $request->last_name;


            $content = setting('email-ayarlari.content');
     
             $mail = new PHPMailer(true);
                 try {
                     //Server settings
                     $mail->CharSet = 'UTF-8';
         
                     $mail->isSMTP();
                     $mail->Host = setting('email-ayarlari.host'); // SMTP sunucusu örnek : mail.alanadi.com
                     $mail->SMTPAuth = true; // SMTP Doğrulama
                     $mail->Username = setting('email-ayarlari.email'); // Mail kullanıcı adı
                     $mail->Password = setting('email-ayarlari.password'); // Mail şifresi
                     $mail->SMTPSecure = setting('email-ayarlari.protokol'); // Şifreleme
                     $mail->Port =  setting('email-ayarlari.port'); // SMTP Port
                     $mail->SMTPOptions = array(
                         'ssl' => array(
                             'verify_peer' => false,
                             'verify_peer_name' => false,
                             'allow_self_signed' => true
                         )
                     );
         
                     //Alıcılar
                     $mail->setfrom(setting('email-ayarlari.email'), setting('site.title'));
                     $mail->addAddress($request->email);
                     $mail->addReplyTo(setting('email-ayarlari.email'));
                     //İçerik
                     $mail->isHTML(true);
                     $mail->Subject = setting('email-ayarlari.baslik').' - '.setting('site.title');
                     $mail->Body = view('auth.emailTamplate', compact('name', 'content'))->render();
                     $mail->send(); 
                 } catch (Exception $e) {
                    return redirect()->back()->with("fail", "Form Gönderilemedi, daha sonra tekrar deneyiniz.");
                }


            $content = '
            <p>Tarafınıza '.$request->name.' isimli kullanıcıdan yeni bir renk danışma formu geldi.</p>
            <p>Formu incelemek için yönetim panelini ziyaret edin</p>
            <a href="'.url('/yonetici/danisma-forms').'" target="_BLANK"">Yönetim Paneli Bağlantısı</a><br>
            <p>İyi Günler Dileriz</p>
            <div style="text-align: center; margin-top:30px;">';


                $mail = new PHPMailer(true);
                try {
                    //Server settings
                    $mail->CharSet = 'UTF-8';

                    $mail->isSMTP();
                    $mail->Host = setting('email-ayarlari.host'); // SMTP sunucusu örnek : mail.alanadi.com
                    $mail->SMTPAuth = true; // SMTP Doğrulama
                    $mail->Username = setting('email-ayarlari.email'); // Mail kullanıcı adı
                    $mail->Password = setting('email-ayarlari.password'); // Mail şifresi
                    $mail->SMTPSecure = setting('email-ayarlari.protokol'); // Şifreleme
                    $mail->Port =  setting('email-ayarlari.port'); // SMTP Port
                    $mail->SMTPOptions = array(
                        'ssl' => array(
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true
                        )
                    );

                    //Alıcılar
                    $mail->setfrom(setting('email-ayarlari.email'), setting('site.title'));
                    $mail->addAddress(setting('email-ayarlari.email'));
                    $mail->addReplyTo(setting('email-ayarlari.email'));
                    //İçerik
                    $mail->isHTML(true);
                    $mail->Subject = 'Yeni Renk Danışma Formu Hk. - '.setting('site.title');
                    $mail->Body = view('auth.emailTamplate', compact('name', 'content'))->render();
                    $mail->send();

                } catch (Exception $e) {
                    return redirect()->back()->with("fail", "Form Gönderilemedi, daha sonra tekrar deneyiniz.");
                }



            return redirect()->to(route('index') . '#renkdanisma')->with('success', 'Talebiniz alınmıştır, en kısa sürede sizinle iletişime geçilecektir.');

        }


        public function masterclass(Request $request)
        {
            // Validation kurallarını ve özel hata mesajlarını ekliyoruz
            // Validation kurallarını ve özel hata mesajlarını ekliyoruz
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|max:255',
                'name' => 'required|max:255',
                'idnumber' => 'required|numeric|max:99999999999',
                'cv' => 'required',
                'phone' => ['required', new PhoneNumber],
            ], [
                'email.email' => 'Eposta adresiniz geçersiz.',
                'email.required' => 'Eposta adresi boş bırakılamaz.',
                'email.max' => '255 karakterden fazla veri girişine izin verilmemektedir.',
            
                'name.required' => 'Ad alanı boş bırakılamaz.',
                'name.max' => '255 karakterden fazla veri girişine izin verilmemektedir.',
            
                'idnumber.required' => 'TC kimlik numarası alanı boş bırakılamaz.',
                'idnumber.numeric' => 'TC kimlik numarası sadece rakamlardan oluşmalıdır.',
                'idnumber.max' => '11 karakterden fazla TC numarası olamaz.',
            
                'cv.required' => 'CV alanı boş bırakılamaz.',
            
                'phone.required' => 'Telefon numarası boş bırakılamaz.',
            ]);

            // Validation başarılı olursa, veritabanına kaydediyoruz
            $ustalik = new Masterclass;
            $ustalik->tc =  $request->idnumber;
            $ustalik->name =  $request->name;
            $ustalik->email =  $request->email;
            $ustalik->message =  $request->message;

            if ( $request->hasFile('cv') ) {

				// xxx.jpeg
				$yuklenenDosyaTamAdi = $request->file('cv')->getClientOriginalName();
			
				// xxx
				$yuklenenDosyaninUzantisiAdi= Str::slug(pathinfo($yuklenenDosyaTamAdi, PATHINFO_FILENAME));
			
				// jpeg
				$yuklenenDosyaUzantisi= $request->file('cv')->getClientOriginalExtension();
			
			
				// Basit bir kontrol yapabiliriz
				$allowedExtensions = ['pdf', 'doc', 'docx'];
                if (!in_array($yuklenenDosyaUzantisi, $allowedExtensions)) {
                    return redirect()->back()->with('fail', 'Yalnızca PDF, DOC ve DOCX dosya türleri yüklenebilir.');
                }

				$zamanTemelliSayi = time() . '_' . random_int(1000, 9999);
			   // yeniden isimlendirelim.
			   $yeniDosyaAdi = $zamanTemelliSayi . "_" . date("Y-m-d") . "." . $yuklenenDosyaUzantisi;
			
			   // gelen istek
			   $dosya = $request->file('cv');
			
			   // yuklenecek olan yol
			   $filePath = "CV/".$yeniDosyaAdi;
			
			   // Asıl is burada. Buraya dikkat.
			   Storage::disk('public')->put($filePath, \Illuminate\Support\Facades\File::get($dosya));
			   $ustalik->cv= '[{"download_link":"'.$filePath.'","original_name":"'.$yeniDosyaAdi.'"}]';
			}
			else{
				$ustalik->cv= '[{"download_link":"#","original_name":"Yok"}]';
			}


			$ustalik->save();
  
        
            
            // E-posta gönder
            require 'src/Exception.php';
            require 'src/PHPMailer.php';
            require 'src/SMTP.php';
            $name = $request->name;


            $content = setting('email-ayarlari.content');
     
             $mail = new PHPMailer(true);
                 try {
                     //Server settings
                     $mail->CharSet = 'UTF-8';
         
                     $mail->isSMTP();
                     $mail->Host = setting('email-ayarlari.host'); // SMTP sunucusu örnek : mail.alanadi.com
                     $mail->SMTPAuth = true; // SMTP Doğrulama
                     $mail->Username = setting('email-ayarlari.email'); // Mail kullanıcı adı
                     $mail->Password = setting('email-ayarlari.password'); // Mail şifresi
                     $mail->SMTPSecure = setting('email-ayarlari.protokol'); // Şifreleme
                     $mail->Port =  setting('email-ayarlari.port'); // SMTP Port
                     $mail->SMTPOptions = array(
                         'ssl' => array(
                             'verify_peer' => false,
                             'verify_peer_name' => false,
                             'allow_self_signed' => true
                         )
                     );
         
                     //Alıcılar
                     $mail->setfrom(setting('email-ayarlari.email'), setting('site.title'));
                     $mail->addAddress($request->email);
                     $mail->addReplyTo(setting('email-ayarlari.email'));
                     //İçerik
                     $mail->isHTML(true);
                     $mail->Subject = setting('email-ayarlari.baslik').' - '.setting('site.title');
                     $mail->Body = view('auth.emailTamplate', compact('name', 'content'))->render();
                     $mail->send(); 
                 } catch (Exception $e) {
                    return redirect()->back()->with("fail", "Form Gönderilemedi, daha sonra tekrar deneyiniz.");
                }


            $content = '
            <p>Tarafınıza '.$request->name.' isimli kullanıcıdan yeni bir ustalık başvurusu formu geldi.</p>
            <p>Formu incelemek için yönetim panelini ziyaret edin</p>
            <a href="'.url('/yonetici/masterclasses').'" target="_BLANK"">Yönetim Paneli Bağlantısı</a><br>
            <p>İyi Günler Dileriz</p>
            <div style="text-align: center; margin-top:30px;">';


                $mail = new PHPMailer(true);
                try {
                    //Server settings
                    $mail->CharSet = 'UTF-8';

                    $mail->isSMTP();
                    $mail->Host = setting('email-ayarlari.host'); // SMTP sunucusu örnek : mail.alanadi.com
                    $mail->SMTPAuth = true; // SMTP Doğrulama
                    $mail->Username = setting('email-ayarlari.email'); // Mail kullanıcı adı
                    $mail->Password = setting('email-ayarlari.password'); // Mail şifresi
                    $mail->SMTPSecure = setting('email-ayarlari.protokol'); // Şifreleme
                    $mail->Port =  setting('email-ayarlari.port'); // SMTP Port
                    $mail->SMTPOptions = array(
                        'ssl' => array(
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true
                        )
                    );

                    //Alıcılar
                    $mail->setfrom(setting('email-ayarlari.email'), setting('site.title'));
                    $mail->addAddress(setting('email-ayarlari.email'));
                    $mail->addReplyTo(setting('email-ayarlari.email'));
                    //İçerik
                    $mail->isHTML(true);
                    $mail->Subject = 'Yeni Ustalık Başvurusu Formu Hk. - '.setting('site.title');
                    $mail->Body = view('auth.emailTamplate', compact('name', 'content'))->render();
                    $mail->send();

                } catch (Exception $e) {
                    return redirect()->back()->with("fail", "Form Gönderilemedi, daha sonra tekrar deneyiniz.");
                }



            return redirect()->back()->with("success", "Talebiniz alınmıştır, en kısa sürede telefon numaranız üzerinden iletişime geçilecektir");
        }

        public function fiyat(Request $request)
        {

            // E-posta gönder
            require 'src/Exception.php';
            require 'src/PHPMailer.php';
            require 'src/SMTP.php';

            // Validation kurallarını ve özel hata mesajlarını ekliyoruz
            $request->validate([
                'area_type' => 'required|max:255',
                'ev_area' => 'required|max:255',
                'area_m2' => 'required|max:255',
                'material_source' => 'required|max:255',
                'time_plan' => 'required|max:255',
                'date_time' => 'required_if:time_plan,specific_date|max:255',
                'email' => 'required|email|max:255',
                'name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'optionel_area' => 'max:255',
                'optionel_message' => 'max:255',
                'tel' => ['required', new PhoneNumber],
            ], [
                'area_type.required' => 'Alan tipi boş bırakılamaz.',
                'ev_area.required' => 'Ev alanı boş bırakılamaz.',
                'area_m2.required' => 'Alan boyutu boş bırakılamaz.',
                'material_source.required' => 'Malzeme alanı boş bırakılamaz.',
                'time_plan.required' => 'Zaman planı boş bırakılamaz.',
                'date_time.required_if' => 'Belirli bir tarihte seçildiğinde tarih alanı boş bırakılamaz.',
                'email.required' => 'Email boş bırakılamaz.',
                'email.email' => 'Geçerli bir email adresi giriniz.',
                'name.required' => 'İsim boş bırakılamaz.',
                'last_name.required' => 'Soyisim boş bırakılamaz.',
                'tel.required' => 'Telefon numarası boş bırakılamaz.',

                'area_type.max' => '255 karakterden fazla veri girişine izin verilmemektedir.',
                'ev_area.max' => '255 karakterden fazla veri girişine izin verilmemektedir.',
                'area_m2.max' => '255 karakterden fazla veri girişine izin verilmemektedir.',
                'area_condition.max' => '255 karakterden fazla veri girişine izin verilmemektedir.',
                'material_source.max' => '255 karakterden fazla veri girişine izin verilmemektedir.',
                'time_plan.max' => '255 karakterden fazla veri girişine izin verilmemektedir.',
                'date_time.max' => '255 karakterden fazla veri girişine izin verilmemektedir.',
                'bolge.max' => '255 karakterden fazla veri girişine izin verilmemektedir.',
                'optionel_area.max' => '255 karakterden fazla veri girişine izin verilmemektedir.',
                'email.max' => '255 karakterden fazla veri girişine izin verilmemektedir.',
                'name.max' => '255 karakterden fazla veri girişine izin verilmemektedir.',
                'last_name.max' => '255 karakterden fazla veri girişine izin verilmemektedir.',
                'tel.max' => '11 karakterden fazla veri girişine izin verilmemektedir.',
                'optionel_message.max' => '255 karakterden fazla veri girişine izin verilmemektedir.',
            ]);

            $fiyat = new FiyatForm;
            $fiyat->beklenti = $request->beklenti .', '. $request->beklenti2.', '. $request->beklenti3.', '. $request->beklenti4.', '. $request->beklenti5;
            $fiyat->area_type = $request->area_type;
            $fiyat->ev_area = $request->ev_area;
            $fiyat->area_m2 = $request->area_m2;
            $fiyat->area_condition = $request->area_condition;
            $fiyat->material_source = $request->material_source;
            $fiyat->time_plan = $request->time_plan;
            $fiyat->date_time = $request->date_time;
            $fiyat->email = $request->email;
            $fiyat->name = $request->name;
            $fiyat->last_name = $request->last_name;
            $fiyat->tel = $request->tel;
            $fiyat->optionel_area = $request->optionel_area;
            $fiyat->optionel_message = $request->optionel_message;
            $fiyat->bolge =  $request->bolge;

            // Validation başarılı olursa, veritabanına kaydediyoruz
            $fiyat->save();


            $name = $request->name. ' '. $request->last_name;
            $content = setting('email-ayarlari.content');
     
             $mail = new PHPMailer(true);
                 try {
                     //Server settings
                     $mail->CharSet = 'UTF-8';
         
                     $mail->isSMTP();
                     $mail->Host = setting('email-ayarlari.host'); // SMTP sunucusu örnek : mail.alanadi.com
                     $mail->SMTPAuth = true; // SMTP Doğrulama
                     $mail->Username = setting('email-ayarlari.email'); // Mail kullanıcı adı
                     $mail->Password = setting('email-ayarlari.password'); // Mail şifresi
                     $mail->SMTPSecure = setting('email-ayarlari.protokol'); // Şifreleme
                     $mail->Port =  setting('email-ayarlari.port'); // SMTP Port
                     $mail->SMTPOptions = array(
                         'ssl' => array(
                             'verify_peer' => false,
                             'verify_peer_name' => false,
                             'allow_self_signed' => true
                         )
                     );
         
                     //Alıcılar
                     $mail->setfrom(setting('email-ayarlari.email'), setting('site.title'));
                     $mail->addAddress($request->email);
                     $mail->addReplyTo(setting('email-ayarlari.email'));
                     //İçerik
                     $mail->isHTML(true);
                     $mail->Subject = setting('email-ayarlari.baslik').' - '.setting('site.title');
                     $mail->Body = view('auth.emailTamplate', compact('name', 'content'))->render();
                     $mail->send(); 
                 } catch (Exception $e) {
                    return redirect()->back()->with("fail", "Form Gönderilemedi, daha sonra tekrar deneyiniz.");
                }

                
                // /tarafıma gelen

                $content = '
                      <p>Tarafınıza '.$name.' isimli kullanıcıdan yeni bir teklif formu geldi.</p>
                      <p>Formu incelemek için yönetim panelini ziyaret edin</p>
                      <a href="'.url('/yonetici/fiyat-forms').'" target="_BLANK"">Yönetim Paneli Bağlantısı</a><br>
                      <p>İyi Günler Dileriz</p>
                      <div style="text-align: center; margin-top:30px;">';


                $mail = new PHPMailer(true);
                try {
                    //Server settings
                    $mail->CharSet = 'UTF-8';
        
                    $mail->isSMTP();
                    $mail->Host = setting('email-ayarlari.host'); // SMTP sunucusu örnek : mail.alanadi.com
                    $mail->SMTPAuth = true; // SMTP Doğrulama
                    $mail->Username = setting('email-ayarlari.email'); // Mail kullanıcı adı
                    $mail->Password = setting('email-ayarlari.password'); // Mail şifresi
                    $mail->SMTPSecure = setting('email-ayarlari.protokol'); // Şifreleme
                    $mail->Port =  setting('email-ayarlari.port'); // SMTP Port
                    $mail->SMTPOptions = array(
                        'ssl' => array(
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true
                        )
                    );
        
                    //Alıcılar
                    $mail->setfrom(setting('email-ayarlari.email'), setting('site.title'));
                    $mail->addAddress(setting('email-ayarlari.email'));
                    $mail->addReplyTo(setting('email-ayarlari.email'));
                    //İçerik
                    $mail->isHTML(true);
                    $mail->Subject = 'Yeni Fiyat Teklifi Formu Hk. - '.setting('site.title');
                    $mail->Body = view('auth.emailTamplate', compact('name', 'content'))->render();
                    $mail->send();

                } catch (Exception $e) {
                   return redirect()->back()->with("fail", "Form Gönderilemedi, daha sonra tekrar deneyiniz.");
               }

                 // SMS Gönderme
                $client = new Client();
                try {
                    $smsResponse = $client->post(setting('sms-ayarlari.api'), [
                        'form_params' => [
                            'username' => setting('sms-ayarlari.username'),
                            'password' => setting('sms-ayarlari.password'),
                            'header'   => setting('sms-ayarlari.header'),
                            'message'  => setting('sms-ayarlari.content'),
                            'gsm'      => '9'.$request->tel,
                            'encoding' => 'TR'
                        ]
                    ]);
                } catch (\Exception $e) {
                    return redirect()->back()->with("fail", "Form Gönderildi, ancak SMS gönderilemedi. Lütfen daha sonra tekrar deneyiniz.");
                }

                return redirect()->back()->with("success", "Öncelikle bizimle iletişime geçtiğiniz için teşekkür ederiz.<br> Talebiniz üzerine, ihtiyaçlarınıza en uygun boya badana hizmeti için bir fiyat teklifi hazırlayacağız.<br>Teklifimizi inceledikten sonra, herhangi bir sorunuz olması durumunda ya da ek bilgi talebinizde bizim ile iletişime geçmekten çekinmeyin.<br> Size en iyi hizmeti sunmak için buradayız ve memnuniyetiniz bizim önceliğimizdir. <br>İlettiğiniz telefon ve mail üzerinden dönüş yapılacaktır. <br>Teklifimizin sizin için uygun olacağını umar, işbirliğimizin devamını temenni ederiz.");
    
        }



        public function showBulkEmailForm()
    {
        $members = Member::all();
        return view('vendor.voyager.bulk-email-form', compact('members'));
    }

        public function sendBulkEmail(Request $request)
    {
         // E-posta gönder
         require 'src/Exception.php';
         require 'src/PHPMailer.php';
         require 'src/SMTP.php';

        $request->validate([
            'subject' => 'required|max:255',
            'message' => 'required',
            'email_list' => 'nullable|string',
            'selected_members' => 'nullable|array'
        ]);

        $emails = [];

        if ($request->email_list) {
            $manualEmails = array_map('trim', explode(',', $request->email_list));
            $emails = array_merge($emails, $manualEmails);
        }

        if ($request->selected_members) {
            $memberEmails = Member::whereIn('id', $request->selected_members)->pluck('email')->toArray();
            $emails = array_merge($emails, $memberEmails);
        }

        $emails = array_unique($emails); // Tekrarlanan e-posta adreslerini kaldır

        foreach ($emails as $email) {
            $mail = new PHPMailer(true);
            try {
                // Server settings
                $mail->CharSet = 'UTF-8';
                $mail->isSMTP();
                $mail->Host = setting('email-ayarlari.host'); // SMTP sunucusu
                $mail->SMTPAuth = true; // SMTP Doğrulama
                $mail->Username = setting('email-ayarlari.email'); // Mail kullanıcı adı
                $mail->Password = setting('email-ayarlari.password'); // Mail şifresi
                $mail->SMTPSecure = setting('email-ayarlari.protokol'); // Şifreleme
                $mail->Port = setting('email-ayarlari.port'); // SMTP Port
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );

                // Recipients
                $mail->setFrom(setting('email-ayarlari.email'), setting('site.title'));
                $mail->addAddress($email);

                // Content
                $mail->isHTML(true);
                $mail->Subject = $request->subject;
                $mail->Body = $request->message;

                $mail->send();
            } catch (Exception $e) {
                // Hata mesajını session'a ekleyerek geri dönelim
                return redirect()->route('bulk-email.form')->with('fail', 'E-postalar gönderilemedi. Hata: ' . $mail->ErrorInfo);
            }
        }

        return redirect()->route('bulk-email.form')->with('success', 'E-postalar başarıyla gönderildi.');
    }


    public function showBulkSmsForm()
    {
        $members = Member::all();
        return view('vendor.voyager.bulk-sms-form', compact('members'));
    }

    public function sendBulkSms(Request $request)
    {
        $request->validate([
            'message' => 'required',
            'phone_list' => 'nullable|string',
            'selected_members' => 'nullable|array'
        ]);

        $phones = [];

        if ($request->phone_list) {
            $manualPhones = array_map('trim', explode(',', $request->phone_list));
            $phones = array_merge($phones, $manualPhones);
        }

        if ($request->selected_members) {
            $memberPhones = Member::whereIn('id', $request->selected_members)->pluck('phone')->toArray();
            $phones = array_merge($phones, $memberPhones);
        }

        $phones = array_unique($phones); // Tekrarlanan telefon numaralarını kaldır

        $client = new Client();

        foreach ($phones as $phone) {
            try {
                $response = $client->post(setting('sms-ayarlari.api'), [
                    'form_params' => [
                        'username' => setting('sms-ayarlari.username'),
                        'password' => setting('sms-ayarlari.password'),
                        'header'   => setting('sms-ayarlari.header'),
                        'message'  => $request->message,
                        'gsm'      => $phone,
                        'encoding' => 'TR'
                    ]
                ]);

                if ($response->getStatusCode() !== 200) {
                    return redirect()->route('bulk-sms.form')->with('fail', 'SMS gönderimi başarısız oldu: ' . $response->getBody()->getContents());
                }
            } catch (\Exception $e) {
                return redirect()->route('bulk-sms.form')->with('fail', 'SMS gönderimi başarısız oldu: ' . $e->getMessage());
            }
        }

        return redirect()->route('bulk-sms.form')->with('success', 'SMS\'ler başarıyla gönderildi.');
    }
        
}
