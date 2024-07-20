<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yapım Aşamasında</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/assets/css/bd-coming-soon.css">
</head>

<body style="backdrop-filter: blur(5px);" class="min-vh-100 d-flex flex-column">
<style>
    body::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Siyah tonu buradan ayarlayabilirsiniz */
    z-index: -1; /* İçeriğin önünde, arka planın arkasında kalması için */
}
</style>
    <header>
        <div class="container">
            <nav class="navbar navbar-dark bg-transparenet">
                <a class="navbar-brand" href="#">
                    <style>
                        .navbar-brand img {
                            height: auto;
                        }
                    </style>
                    <img src="/public/storage/{{ setting('admin.icon_image') }}" alt="baypand" style="width: 100px; object-fit:cover;">
                </a>
                <span class="navbar-text d-none d-sm-inline-block">baypand@yandex.com</span>
            </nav>
        </div>
    </header>
    <main class="my-auto">
        <div class="container">
            <h1 class="page-title">Yapım Aşamasında</h1>
            <p class="page-description" style="font-size: 20px;">{{ setting('admin.description') }}
            </p>
            <p style="font-size: 17px;">Sosyal Medya Bağlantılarımız</p>
            <nav class="footer-social-links">
                <a href="https://instagram.com/baypandtech" class="social-link"><i class="mdi mdi-instagram"></i></a>
            </nav>
        </div>
    </main>
</body>

</html>