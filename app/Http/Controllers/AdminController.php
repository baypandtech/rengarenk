<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Facades\Validator;

use App\Models\Member;
use App\RootSetting;
use App\Contact;
use App\Game;

class AdminController extends Controller
    {
        use ImageUpload;

        public function contact(Request $request)
            {
                // Validation kurallarını ve özel hata mesajlarını ekliyoruz
                $request->validate([
                    'name' => 'required|string|max:255',
                    'email' => 'required|email|max:255',
                ], [
                    'name.required' => 'The name field is required.',
                    'name.string' => 'The name must be a string.',
                    'name.max' => 'The name may not be greater than 255 characters.',
                    'email.required' => 'The email field is required.',
                    'email.email' => 'The email must be a valid email address.',
                    'email.max' => 'The email may not be greater than 255 characters.',
                ]);

                // Validation başarılı olursa, veritabanına kaydediyoruz
                Contact::create([
                    'name' => $request->name,
                    'email' => $request->email,
                ]);

                return redirect()->back()->with("success", "We will get back to you via email within 24 hours.");
            }

            public function search(Request $request)
            {
                $query = $request->get('query');
                if(!empty($query)){
                $results = Game::where('baslik', 'LIKE', "%{$query}%")->get(); // Arama yapmak istediğiniz alan ve modeli belirtin
                }
                return response()->json($results);
            }

    
    }
