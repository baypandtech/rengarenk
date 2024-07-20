{!! $rootuser !!}
<footer>
    <div class="container">
        <div class="row" style="    margin-right: -10px;">
            <div class="col-md-3 col-6 footer-column">
                <h3>Rengarenk Boya</h3>
                <ul>
                    <li><a href="/hakkimizda">Hakkımızda</a></li>
                    <li><a href="{{ Request::is('/test') ? '#sorular' : url('/test') . '#sorular' }} ">SSS</a></li>
                    <li><a href="{{ Request::is('/test') ? '#renklendirdigimizalanlar' : url('/test') . '#renklendirdigimizalanlar' }}">Renklendirdiğimiz Alanlar</a></li>
                    <li><a href="{{ Request::is('/test') ? '#renkdanisma' : url('/test') . '#renkdanisma' }}">Renk Danışmanı</a></li>
                    <li><a href="{{ Request::is('/test') ? '#nedenboyuyoruz' : url('/test') . '#nedenboyuyoruz' }}">Neler Boyuyoruz?</a></li>
                    <li><a href="/blog">Blog</a></li>
                    <li><a href="/e-katalog">E-katalog</a></li>
                    <li><a href="/ustalik-basvurusu">Ustalık Başvuru</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-6 footer-column">
                <h3>Gizlilik</h3>
                <ul>
                    <li><a href="/kullanici-sozlesmesi">Kullanıcı Sözleşmesi</a></li>
                    <li><a href="/kisisel-verilerin-korunmasi">Kişisel Verilerin Korunması</a></li>
                    <li><a href="/iptal-ve-kosullar">İptal ve Değişiklik Koşulları</a></li>
                    <li><a href="/riza-metni">Açık Rıza Metni</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-6 footer-column">
                <h3>Sosyal Medya</h3>
                <ul class="social-media">
                    <li><a target="_BLANK" href="{{ setting('sosyal-medya.facebook') ?: '#' }}"><i class="fab fa-facebook-f"></i>Facebook</a></li>
                    <li><a target="_BLANK" href="{{ setting('sosyal-medya.facebook') ?: '#' }}"><i class="fa-brands fa-twitter"></i>Twitter</a></li>
                    <li><a target="_BLANK" href="{{ setting('sosyal-medya.facebook') ?: '#' }}"><i class="fa-brands fa-linkedin"></i>Linkedin</a></li>
                    <li><a target="_BLANK" href="{{ setting('sosyal-medya.facebook') ?: '#' }}"><i class="fab fa-instagram"></i>Instagram</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-6 footer-column">
                <h3>Dil Seçimi</h3>
                <div class="custom-dropdown">
                    <button class="dropbtn"> 
                        <img src="../public/img/tr.png" alt="Bayrak" class="flag"> Türkçe <i class="fa-solid fa-caret-down"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</footer>
