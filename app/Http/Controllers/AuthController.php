<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\URL;
use App\Models\Member;
use App\TempMember;
use App\RootSetting;
use PHPMailer\PHPMailer\PHPMailer;

class AuthController extends Controller
{
            public function login(Request $request)
        {
            // Formdan gelen verileri al
            $credentials = $request->only('email', 'password');

            // Kullanıcıyı oturum açmaya yetkilendir
            if (Auth::guard('members')->attempt($credentials)) {
                // Oturum açma başarılı
                return redirect('/')->with('success', 'Giriş Başarılı!');
            } else {
                // Oturum açma başarısız
                $member = Member::where('email', $request->email)->first();
                if(!$member) {
                    return redirect()->back()->with('fail', "Böyle bir hesap bulunamadı");
                }
                return redirect()->back()->with('fail', 'E-posta veya Şifre Hatalı');
            }
        }

        public function verifyEmail(Request $request)
        {
            

        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'password' => 'required|string|min:4|confirmed',
            ]);
            $tempdomainsUrls = [
                'https://github.com/GeroldSetz/emailondeck.com-domains/raw/master/emailondeck.com_domains_from_bdea.cc.txt',
                'https://www.stopforumspam.com/downloads/toxic_domains_whole.txt',
                'https://github.com/zaosoula/email-spam-domains/raw/master/src/custom.txt',
                'https://raw.githubusercontent.com/FGRibreau/mailchecker/master/list.txt',
                'https://raw.githubusercontent.com/disposable/disposable/master/blacklist.txt'
            ];
            
            // Her URL'den domainleri alıp ana listeye ekle
            foreach ($tempdomainsUrls as $tempdomainsUrl) {
                $tempdomainsContent = file_get_contents($tempdomainsUrl);
                $tempdomainsLines = explode("\n", $tempdomainsContent);
                foreach ($tempdomainsLines as &$domain) {
                    $domain = trim($domain);
                    if (!empty($domain)) {
                        $tempdomains[] = $domain;
                    }
                }
            }
            
            // Tekrar eden domainleri kaldır
            $tempdomains = array_unique($tempdomains);

            $emailParts = explode('@', $request->email);
            $emailDomain = end($emailParts); // E-posta adresinden domaini al
            
            if (in_array($emailDomain, $tempdomains)) {
                return redirect()->back()->with('fail', 'Bu e-posta geçersizdir.');
            }
            // Eğer satırlar arasında boşluklar varsa, bunları temizle
            $tempdomains = array_map('trim', $tempdomains);

            $member = Member::where('email', $request->email)->first();

            if($member) {
                return redirect()->back()->with('fail', "Bu eposta adresi zaten kayıtlı.");
            }

            // Şifre sıfırlama token'i oluştur
            $token = Str::random(64);

            // Token'i veritabanına kaydet, belirli bir süre için geçerli olacak şekilde
            $user = TempMember::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'verify_token' => $token,
                'verify_token_expiry' => now()->addMinutes(15)
            ]);

            $url = URL::to('/verify-email') . '?token=' . urlencode($token);
            $site_title = RootSetting::first()->baslik;
            $button_text = "E-postamı Doğrula";
            $content = "Kayıt işlemlerine son bir adım kaldı, <b>".$request->email."</b> adresini doğrula.";
    
            // E-posta gönder
            require 'src/Exception.php';
            require 'src/PHPMailer.php';
            require 'src/SMTP.php';
    
    
            $mail = new PHPMailer(true);
                try {
                    //Server settings
                    $mail->CharSet = 'UTF-8';
        
                    $mail->isSMTP();
                    $mail->Host = 'smtp-mail.outlook.com'; // SMTP sunucusu örnek : mail.alanadi.com
                    $mail->SMTPAuth = true; // SMTP Doğrulama
                    $mail->Username = 'baypand_tr@outlook.com'; // Mail kullanıcı adı
                    $mail->Password = 'm8hGkca2Zakbe3O'; // Mail şifresi
                    $mail->SMTPSecure = 'tls'; // Şifreleme
                    $mail->Port =  587; // SMTP Port
                    $mail->SMTPOptions = array(
                        'ssl' => array(
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true
                        )
                    );
        
                    //Alıcılar
                    $mail->setfrom('baypand_tr@outlook.com', $site_title);
                    $mail->addAddress($request->email);
                    $mail->addReplyTo("baypand_tr@outlook.com");
                    //İçerik
                    $mail->isHTML(true);
                    $mail->Subject = 'E-posta Doğrulama - '.$site_title;
                    $mail->Body = view('auth.emailTamplate', compact('url', 'site_title', 'button_text', 'content'))->render();
                    $mail->send();
                    return redirect('/kayit')->with('token', $request->email);

                } catch (Exception $e) {
                    return redirect('/kayit')->with('fail', 'E-posta Doğrulama Bağlantısı Gönderilemedi');
                }
            } catch (ValidationException $e) {
                $errors = $e->validator->getMessageBag()->getMessages();
                $errorMessage = '';
                foreach ($errors as $field => $errorMessages) {
                    $errorMessage .= $errorMessages[0];
                }
                return redirect()->back()->with('fail', $errorMessage)->withInput();
            } catch (\Exception $e) {
                // Eğer özel bir hata mesajı varsa, Türkçe karşılığını al
                $errorMessage = 'Bir hata oluştu, lütfen tekrar deneyin.'.  $e;

                return redirect()->back()->with('fail', $errorMessage)->withInput();
            }
        }

        public function register(Request $request)
        {
            $site_title = RootSetting::first()->baslik;
            $genelayarlar = RootSetting::first();

            // Token'i al
            $token = $request->token;
        
            // Token'i kullanarak kullanıcıyı bul
            $user = TempMember::where('verify_token', $token)
                             ->where('verify_token_expiry', '>=', now())
                             ->first();
        
            // Kullanıcıyı bulamazsak veya token süresi geçmişse, hata mesajını ekranda göster
            if (!$user) {
                return view('auth.pageExpired', compact('site_title', 'genelayarlar'))->with('error', 'Geçersiz veya süresi dolmuş token.');
            }
        
            try {
                $expiryDate = date('Y-m-d H:i:s', strtotime('+1 year'));

                $member = Member::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => $user->password,
                    'time_to_expiry' => $expiryDate,
                    'root' => 0,
                ]);
        
                // TempMember modelini kullanarak ilgili e-posta adresine sahip kayıtları bul
                $membersToDelete = TempMember::where('email', $user->email)->get();
        
                // Eğer kayıt bulunduysa, her birini sil
                if ($membersToDelete->isNotEmpty()) {
                    foreach ($membersToDelete as $tempmember) {
                        $tempmember->delete();
                    }
                }
        
                // Başarılı kayıt olduktan sonra istenilen işlemler burada yapılabilir
                // Auth::guard('members')->login($member);
                return redirect('/giris')->with('success', 'E-postanız Doğrulandı, Giriş Yapabilirsiniz!');
            } catch (\Exception $e) {
                // Kayıt sırasında bir hata oluştuysa, hata mesajını ekranda göster
                return back()->with('fail', 'Kayıt sırasında bir hata oluştu. Lütfen daha sonra tekrar deneyin.');
            }
        }
        

    public function logout(Request $request)
    {    
        Auth::guard('members')->logout();
    
        // Oturumdan çıkış yapıldıktan sonra istenilen yönlendirme yapılabilir
        return redirect('/giris');
    }
    

     // Kullanıcının şifresini değiştirmek için kullanılan fonksiyon
     public function changepassword(Request $request)
     {
         // Mevcut kullanıcının kimliğini al
         $userId = Auth::guard('members')->id();

         // Giriş yapılan kullanıcının şifresini doğrula
         if (!(Hash::check($request->oldpassword, Auth::guard('members')->user()->password))) {
             // Eğer mevcut şifre yanlışsa hata döndür
             return redirect()->back()->with("fail", "Mevcut şifre yanlış. Lütfen tekrar deneyin.");
         }

         // Yeni şifre ve yeni şifrenin tekrarını kontrol et
         if ($request->newpassword !== $request->renewpassword) {
             // Yeni şifreler uyuşmuyorsa hata döndür
             return redirect()->back()->with("fail", "Yeni şifreler birbiriyle eşleşmiyor. Lütfen tekrar deneyin.");
         }

         // Yeni şifreyi veritabanına güncelle
         $user = Auth::guard('members')->user();
         $user->password = Hash::make($request->newpassword);
         $user->save();

         // Başarılı bir şekilde şifre değiştirildiğini bildir
         return redirect()->back()->with("success", "Şifreniz başarıyla değiştirildi.");
     }


     public function resetPassword(Request $request)
    {
        $site_title = RootSetting::first()->baslik;
        $button_text = "Şifremi Sıfırla";
        $content = "Şifrenizi Sıfırlama Talebinizi Aldık. Sıfırlamak için Aşağıdaki Butona Tıklayınız.";
        // E-posta adresini al
        $email = $request->input('email');

        // Kullanıcıyı bul
        $user = Member::where('email', $email)->first();

        if (!$user) {
            return redirect()->back()->with('fail', 'Bu e-posta adresi ile ilişkili bir kullanıcı bulunamadı.');
        }

        // Şifre sıfırlama token'i oluştur
        $token = Str::random(64);

        // Token'i veritabanına kaydet, belirli bir süre için geçerli olacak şekilde
        $user->update([
            'password_reset_token' => $token,
            'password_reset_token_expiry' => now()->addMinutes(15)
        ]);
        $url = URL::to('/reset-password') . '?token=' . urlencode($token);

        // E-posta gönder
        require 'src/Exception.php';
        require 'src/PHPMailer.php';
        require 'src/SMTP.php';


        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->CharSet = 'UTF-8';

            $mail->isSMTP();
            $mail->Host = ''; // SMTP sunucusu örnek : mail.alanadi.com
            $mail->SMTPAuth = true; // SMTP Doğrulama
            $mail->Username = 'baypand_tr@outlook.com'; // Mail kullanıcı adı
            $mail->Password = 'm8hGkca2Zakbe3O'; // Mail şifresi
            $mail->SMTPSecure = 'tls'; // Şifreleme
            $mail->Port =  587; // SMTP Port
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            //Alıcılar
            $mail->setfrom('baypand_tr@outlook.com', $site_title);
            $mail->addAddress($email);
            $mail->addReplyTo("baypand_tr@outlook.com");
            //İçerik
            $mail->isHTML(true);
            $mail->Subject = 'Şifre Sıfırlama - '.$site_title;
            $mail->Body = view('auth.emailTamplate', compact('url', 'site_title', 'button_text', 'content'))->render();
            $mail->send();
        } catch (Exception $e) {
            return redirect('/sifremi-unuttum')->with('fail', 'Sıfırlama Bağlantısı Gönderilemedi');
        }

        return redirect('/sifremi-unuttum')->with('token', $email);
    }

    public function rePassword(Request $request)
    {
        $site_title = RootSetting::first()->baslik;
        $genelayarlar = RootSetting::first();

        // Token'i al
        $token = $request->query('token');

        // Token'i kullanarak kullanıcıyı bul
        $user = Member::where('password_reset_token', $token)
                    ->where('password_reset_token_expiry', '>=', now())
                    ->first();

        // Kullanıcıyı bulamazsak veya token süresi geçmişse, hata sayfasına yönlendir
        if (!$user) {
            return view('auth.pageExpired', compact('site_title','genelayarlar'));
        }

        // Şifre sıfırlama formunu göster
        return view('auth.resetpassword', compact('site_title', 'genelayarlar'))->with('token', $token);
    }
    
            public function resetPasswordForm(Request $request)
        {
            $genelayarlar = RootSetting::first();
            $site_title = RootSetting::first()->baslik;
            // Eğer şifreler eşleşmiyorsa hata döndür
            if ($request->new_password !== $request->password_confirmation) {
                return redirect()->back()->with('fail', 'Şifreler eşleşmiyor. Lütfen doğru şifreyi girin.');
            }

            // Token'i al
            $token = $request->token;

            // Token'i kullanarak kullanıcıyı bul
            $user = Member::where('password_reset_token', $token)
                        ->where('password_reset_token_expiry', '>=', now())
                        ->first();

            // Kullanıcıyı bulamazsak veya token süresi geçmişse, hata döndür
            if (!$user) {
                return view('auth.pageExpired', compact('site_title', 'genelayarlar'));
            }

            // Kullanıcıyı bulduktan sonra şifresini güncelle
            $user->password = Hash::make($request->new_password); // 'new_password' kullanıcı tarafından girilen yeni şifreyi temsil ediyor
            $user->password_reset_token = null;
            $user->password_reset_token_expiry = null;
            $user->save();

            // Kullanıcının oturumunu aç
            // Auth::guard('members')->login($user);

            // Şifre başarıyla güncellendi mesajı ile ana sayfaya yönlendir
            // return redirect('/')->with('success', 'Şifreniz başarıyla güncellendi ve oturum açıldı.');
            return redirect('/giris')->with('success', 'Şifreniz başarıyla güncellendi. Yeni şifrenizle giriş yapabilirsiniz.');

        }

        


}
