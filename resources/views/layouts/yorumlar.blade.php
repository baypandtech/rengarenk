<div class="containerr mt-5" id="yorum">
    <h2>Sizden Gelen Yorumlar</h2>
    <h6>Boya badana hizmeti sonunda iletilen memnuniyet mail ve mesaj değerlendirmelerini bizimle paylaşan gerçek müşteri yorumları
    </h6>
    <div class="carousel">
        <button class="previous" onclick="previousSlide()">&#10094;</button>
        <div class="carousel-inner">
            @foreach ($comments->sortBy('sira') as $comment)
            <div class="carousel-item active">
                <p>"{{ $comment->comment }}"</p>
                <h4>{{ strtoupper($comment->name) }}</h4>
                <div class="stars">★★★★★</div>
                <span>{{ \Carbon\Carbon::parse($comment->created_at)->format('d.m.Y') }}</span>
            </div>
            @endforeach
           
            
        </div>
        <button class="next" onclick="nextSlide()">&#10095;</button>
    </div>
</div>