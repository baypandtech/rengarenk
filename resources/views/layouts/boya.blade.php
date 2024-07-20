<div class="title">{{ isset($country) ? $country->title : '' }}&nbsp;Boya Badana Fiyatları</div>
    <div class="cards-container">
        @foreach ($rates->sortBy('m2') as $rate)
            <a target="_BLANK" href="#" data-toggle="modal" data-target="#formModal" class="card-container">
                <div class="card">
                    <div class="card-header">{{ $rate->baslik }}</div>
                    <div class="card-body">
                        <div>{{ $rate->m2 }}m²</div>
                        <div class="price">₺{{ $rate->fiyat }}<span>'den</span></div>
                        <div class="description">Başlayan fiyatlar</div>
                        <div class="icon">○</div>
                    </div>
                    <div class="footer">Fiyat Teklifi Al</div>
                </div>
            </a>
        @endforeach
       
    </div>