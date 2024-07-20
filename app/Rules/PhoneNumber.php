<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PhoneNumber implements Rule
{
    public function passes($attribute, $value)
    {
        // Telefon numarası doğrulama mantığı
        return preg_match('/^([0-9\s\-\+\(\)]*)$/', $value);
    }

    public function message()
    {
        return 'Geçerli bir telefon numarası giriniz.';
    }
}
