<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title'){{ setting('site.title') }}</title>
    <meta name="description" content="@yield('description')">

    @yield('head')
    <link rel="shortcut icon" href="/public/storage/{{ setting('site.favicon') }}" type="image/x-icon">
    <meta name="keywords" content="{{ setting('seo.etiketler') }}">
    <meta property="og:image" content="{{ url('/public/storage/'.setting('site.favicon')) }}">

    <meta name="twitter:image" content="{{ url('/public/storage/'.setting('site.favicon')) }}">
    <link rel="icon" href="/public/storage/{{ setting('site.favicon') }}" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="/public/css/bootstrap-4.0.0.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="preload" href="/public/fonts/FONTSPRINGDEMO-TorusProSemiBoldRegular.woff2" as="font" type="font/woff2" crossorigin>

    {{-- google --}}
    {!! setting('seo.google_analytics') !!}

    <!--CSS -->
    @include('css.index')
    <!--CSS END -->
</head>

<body>
    @include('layouts.header')

    @yield('content')
    
    @include('layouts.footer')

    @include('layouts.acilirmenu')


    <script src="/public/js/jquery-3.6.0.min.js"></script>
    <script src="/public/js/bootstrap-4.0.0.min.js"></script>
    <script>
        $('#accordion .btn-link').click(function () {
            var icon = $(this).find('i');
            icon.toggleClass('fa-chevron-down fa-chevron-up');
        });
    </script>
    <script>
        document.querySelectorAll('.dropdown-content a').forEach(item => {
            item.addEventListener('click', event => {
                    event.preventDefault();
                    const value = item.getAttribute('data-value');
                    const imgSrc = item.querySelector('img').src;
                    const text = item.textContent.trim();
                    
                    const dropbtn = document.querySelector('.dropbtn');
                    dropbtn.querySelector('img.flag').src = imgSrc;
                    dropbtn.querySelector('img.flag').alt = text;
                    dropbtn.querySelector('.lang-text').textContent = text;
                    
                    // Additional logic to handle language selection can be added here
                });
            });

        </script>
        <script>document.addEventListener('DOMContentLoaded', () => {
            let currentIndex = 0;
            const items = document.querySelectorAll('.carousel-item');
            const totalItems = items.length;

            function showSlide(index) {
                items.forEach((item, i) => {
                    item.classList.remove('active');
                    if (i === index) {
                        item.classList.add('active');
                    }
                });
            }

            function nextSlide() {
                currentIndex = (currentIndex + 1) % totalItems;
                showSlide(currentIndex);
            }

            function previousSlide() {
                currentIndex = (currentIndex - 1 + totalItems) % totalItems;
                showSlide(currentIndex);
            }

            document.querySelector('.next').addEventListener('click', nextSlide);
                document.querySelector('.previous').addEventListener('click', previousSlide);

                showSlide(currentIndex);
            });
        </script>    
        {{-- <script>
            document.querySelector('.btn-get-price').addEventListener('click', function(event) {
                event.preventDefault();
                $('#formModal').modal('show');
            });
        </script> --}}
        <script>
            // script.js
            document.getElementById('floatingButton').addEventListener('click', function() {
                document.getElementById('supportMenu').style.display = 'block';
            });

            document.getElementById('closeButton').addEventListener('click', function() {
                document.getElementById('supportMenu').style.display = 'none';
            });

            document.getElementById('floatingButton').addEventListener('mouseover', function() {
                document.querySelector('.tooltip').style.display = 'block';
            });

            document.getElementById('floatingButton').addEventListener('mouseout', function() {
                document.querySelector('.tooltip').style.display = 'none';
            });
        </script>
        <div id="sagbuttez" class="fiyatal" style="background-color: #8b8b8b; color: rgb(255, 255, 255); font-weight: bold; position: fixed; bottom: 50px; left: 0px; z-index: 60; padding: 9px 29px;">
            <a href="#" data-toggle="modal" data-target="#formModal" style="color: white"> Fiyat Al</a>
        </div>
        <div id="sagbut" class="whatsapp" style=" cursor: pointer; background-color: #a2e53f; color: rgb(255, 255, 255); font-weight: bold; position: fixed; bottom: 0px; left: 0px; z-index: 60; padding: 9px 29px;" onclick="openWhatsApp()">
            Whatsapp
        </div>
        <style>
           div#sagbut, div#sagbuttez {
            font-family: 'Open Sans', sans-serif;
            font-size: 18px;
            font-weight: 300;
            line-height: 30px;
            background-color: #fff;
            display: none; /* Initially hidden */
        }
            </style>
        <script>
        function openWhatsApp() {
            const phoneNumber = "+9{{setting('site.telefon')}}"; // Buraya WhatsApp numaranızı ekleyin, uluslararası formatta, ör: +905xxxxxxxxx
            const message = "{{setting('site.whatsapp_mesaj')}}"; // İsteğe bağlı bir mesaj ekleyebilirsiniz
            const url = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(message)}`;
            window.open(url, '_blank');
        }
        window.addEventListener('scroll', function() {
            const sagbuttez = document.getElementById('sagbuttez');
            const sagbut = document.getElementById('sagbut');
            if (window.scrollY > 100) {
                sagbuttez.style.display = 'block';
                sagbut.style.display = 'block';
            } else {
                sagbuttez.style.display = 'none';
                sagbut.style.display = 'none';
            }
        });
        </script>
</body>

</html>
