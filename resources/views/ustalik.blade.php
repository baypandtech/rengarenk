@extends('layout')
@section('title'){{ $page->seo_title ?: $page->baslik }} - @endsection
@section('description'){{ $page->seo_aciklama }}@endsection
@section('content')

<style>
    .form-wrapper {
        max-width: 800px;
        margin: 80px auto;
        padding: 40px;
        background: #ffffff;
        border-radius: 15px;
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        animation: appear 1s ease-in-out;
    }

    @keyframes appear {
        from {
            opacity: 0;
            transform: scale(0.95);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    .form-title {
        text-align: center;
        font-size: 2.2em;
        color: #333;
        margin-bottom: 20px;
        letter-spacing: 2px;
        animation: slideDown 1.5s ease-out;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-50%);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .application-form {
        display: grid;
        grid-template-columns: 1fr;
        gap: 15px;
        animation: formAppear 1.5s ease-in;
    }

    @keyframes formAppear {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .form-label {
        margin-top: 10px;
        color: #333;
    }

    .form-input,
    .form-textarea {
        padding: 12px;
        border-radius: 8px;
        border: 1px solid #ccc;
        background-color: #f9f9f9;
        color: #333;
        transition: all 0.3s ease;
    }

    .form-input:focus, 
    .form-textarea:focus {
        border-color: {{ setting('css.ana_renk') }};
        background-color: #fff;
        outline: none;
        box-shadow: 0 0 8px rgba(0, 123, 255, 0.3);
    }

    .form-file-input {
        padding: 8px;
        border-radius: 8px;
        border: 1px solid #ccc;
        background-color: #f9f9f9;
        color: #333;
        transition: all 0.3s ease;
    }

    .form-file-input:focus {
        border-color: {{ setting('css.ana_renk') }};
        background-color: #fff;
        outline: none;
        box-shadow: 0 0 8px rgba(0, 123, 255, 0.3);
    }

    .submit-btn {
        margin-top: 20px;
        padding: 12px;
        background-color: {{ setting('css.ana_renk') }};
        border: none;
        border-radius: 8px;
        color: #fff;
        font-size: 1em;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .submit-btn:hover {
        background-color: {{ setting('css.ikinci_renk') }};
    }

    .info-box {
        margin-top: 20px;
        background-color: #fff;
        padding: 15px;
        border-radius: 10px;
        color: #333;
    }

    .info-link {
        color: #000000;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .info-link:hover {
        color: #1b1b1b;
    }

    @media (min-width: 768px) {
        .application-form {
            grid-template-columns: 1fr 1fr;
        }

        .form-label {
            grid-column: span 2;
        }

        .form-input, .form-textarea, .form-file-input, .submit-btn {
            grid-column: span 2;
        }

        .info-box {
            grid-column: span 2;
        }
    }
</style>
</head>
<body>
    @if (session('success'))
    <div class="col-12">
        <div class="alert alert-success" role="alert">
             <p class="text-center"> {{session('success')}}</p>
          </div>
    </div>
    @endif
    @if ($errors->any())
    <div class="col-12">
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif
    <div class="form-wrapper">
        <h1 class="form-title">USTALIK BAŞVURUSU FORMU</h1>
        <form action="{{ route('form.masterclass') }}" class="application-form"  method="POST" onsubmit="return disableSubmitButton(this)" enctype="multipart/form-data">
            @csrf
            <label class="form-label" for="name">Adınız / Soyadınız</label>
            <input class="form-input" type="text" id="name" name="name" required>

            <label class="form-label" for="email">E-posta adresiniz</label>
            <input class="form-input" type="email" id="email" name="email" required>

            <label class="form-label" for="phone">Telefon numaranız</label>
            <input class="form-input" type="tel" id="phone" name="phone" required>

            <label class="form-label" for="idnumber" >T.C. Kimlik Numaranız</label>
            <input class="form-input" type="tel" id="idnumber" name="idnumber" pattern="\d{11}" maxlength="11" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>

            <label class="form-label" for="cv">CV Dosyası Seçiniz</label>
            <input class="form-file-input" type="file" id="cv" name="cv" accept=".pdf,.doc,.docx" required>

            <label class="form-label" for="message">Varsa Mesajınız</label>
            <textarea class="form-textarea" id="message" name="message" rows="4"></textarea>

            <button class="submit-btn" type="submit">GÖNDER</button>
        </form>
        <div class="info-box">
            <p>{!! $ustalik_form->aciklama !!}</p>
        </div>
    </div>
    <script>
        function disableSubmitButton(form) {
            const submitButton = form.querySelector('button[type="submit"]');
            if (submitButton.disabled) {
                return false;
            }
            submitButton.disabled = true;
            submitButton.innerText = 'Gönderiliyor...';
            return true;
        }
    </script>
@endsection
