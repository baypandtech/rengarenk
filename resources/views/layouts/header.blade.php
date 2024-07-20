<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container pl-3 pr-3">
        <a href="/test" title="Logo"> <img src="{{ asset('/public/storage/' . setting('site.logo')) }}" alt="{{ setting('seo.etiketler') }}" width="100"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Yorum/Fırsat
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ Request::is('/') ? '#yorum' : url('/test') . '#yorum' }}">Sizden Gelenler</a>
                        {{-- <a class="dropdown-item" href="{{ Request::is('/') ? '#firsatlar' : url('/test') . '#firsatlar' }}">Fırsatlar</a> --}}
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ Request::is('/') ? '#nedenboyuyoruz' : url('/test') . '#nedenboyuyoruz' }}">Neler Boyuyoruz?</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ Request::is('/') ? '#sorular' : url('/test') . '#sorular' }}">SSS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ Request::is('/') ? '#renklendirdigimizalanlar' : url('/test') . '#renklendirdigimizalanlar' }}">Renklendirdiğimiz Alanlar</a>
                </li>
                <li class="nav-item">
                    <a style="padding:4px;" class="nav-link btn btn-price" id="priceButton" href="#" data-toggle="modal" data-target="#formModal">
                        Fiyat Al &nbsp;<img src="{{ asset('/public/img/cuzdan.png') }}" style="width: 36px;" alt="{{ setting('seo.etiketler') }}">
                    </a>
                                         
                </li>
                @php
                     $cities = App\Country::pluck('title')->toArray(); // Replace 'city_name' with the actual column name
                @endphp
                
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const cities = @json($cities);
                        const priceButton = document.getElementById('priceButton');
                        
                        priceButton.addEventListener('click', function(event) {
                            event.preventDefault(); // Prevent the default behavior
                            const currentURL = window.location.pathname;
                            
                            let shouldRedirect = true;
                            for (let city of cities) {
                                if (currentURL.includes(city.toLowerCase())) {
                                    shouldRedirect = false;
                                    break;
                                }
                            }
                
                            if (currentURL === '/test') {
                                // Open modal if the current page is the test page
                                $('#formModal').modal('show');
                            } else if (shouldRedirect) {
                                // Redirect to the URL if the current page does not contain a city name and is not the test page
                                window.location.href = "{{ url('/fiyat-teklifi') }}";
                            }
                        });
                    });
                </script>
            </ul>
        </div>
    </div>
</nav>
