<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/css/swiper.min.css">
<style>
    @import url('https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600,700,800');
 * {
	 box-sizing: border-box;
}
 .blog-slider {
	 width: 95%;
	 position: relative;
	 max-width: 800px;
	 margin: auto;
	 background: #fff;
	 box-shadow: 0px 14px 80px rgba(34, 35, 58, 0.2);
	 padding: 25px;
	 border-radius: 25px;
	 height: 400px;
	 transition: all 0.3s;
}
 @media screen and (max-width: 992px) {
	 .blog-slider {
		 max-width: 680px;
		 height: 400px;
	}
}
 @media screen and (max-width: 768px) {
    .blog-slider__title {
    font-size: 18px;
    }
    .blog-slider__button {
    padding: 11px 16px;
    }
	 .blog-slider {
		 min-height: 500px;
		 height: auto;
		 margin: 180px auto;
	}
}
 @media screen and (max-height: 500px) and (min-width: 992px) {
	 .blog-slider {
		 height: 350px;
	}
}
 .blog-slider__item {
	 display: flex;
	 align-items: center;
}
 @media screen and (max-width: 768px) {
	 .blog-slider__item {
		 flex-direction: column;
	}
}
 .blog-slider__item.swiper-slide-active .blog-slider__img img {
	 opacity: 1;
	 transition-delay: 0.3s;
}
 .blog-slider__item.swiper-slide-active .blog-slider__content > * {
	 opacity: 1;
	 transform: none;
}
 .blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(1) {
	 transition-delay: 0.3s;
}
 .blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(2) {
	 transition-delay: 0.4s;
}
 .blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(3) {
	 transition-delay: 0.5s;
}
 .blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(4) {
	 transition-delay: 0.6s;
}
 .blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(5) {
	 transition-delay: 0.7s;
}
 .blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(6) {
	 transition-delay: 0.8s;
}
 .blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(7) {
	 transition-delay: 0.9s;
}
 .blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(8) {
	 transition-delay: 1s;
}
 .blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(9) {
	 transition-delay: 1.1s;
}
 .blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(10) {
	 transition-delay: 1.2s;
}
 .blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(11) {
	 transition-delay: 1.3s;
}
 .blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(12) {
	 transition-delay: 1.4s;
}
 .blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(13) {
	 transition-delay: 1.5s;
}
 .blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(14) {
	 transition-delay: 1.6s;
}
 .blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(15) {
	 transition-delay: 1.7s;
}
 .blog-slider__img {
	 width: 300px;
	 flex-shrink: 0;
	 height: 300px;
	 box-shadow: 4px 13px 30px 1px {{ setting('css.ucuncu_renk') }};
	 border-radius: 20px;
	 transform: translateX(-80px);
	 overflow: hidden;
}
 .blog-slider__img:after {
	 content: '';
	 position: absolute;
	 top: 0;
	 left: 0;
	 width: 100%;
	 height: 100%;
	 border-radius: 20px;
	 opacity: 0.8;
}
 .blog-slider__img img {
	 width: 100%;
	 height: 100%;
	 object-fit: cover;
	 display: block;
	 opacity: 0;
	 border-radius: 20px;
	 transition: all 0.3s;
}
 @media screen and (max-width: 768px) {
	 .blog-slider__img {
		 transform: translateY(-50%);
		 width: 90%;
	}
}
 @media screen and (max-width: 576px) {
	 .blog-slider__img {
		 width: 95%;
	}
}
 @media screen and (max-height: 500px) and (min-width: 992px) {
	 .blog-slider__img {
		 height: 270px;
	}
}
 .blog-slider__content {
	 padding-right: 25px;
}
 @media screen and (max-width: 768px) {
	 .blog-slider__content {
		 margin-top: -80px;
		 text-align: center;
		 padding: 0 30px;
	}
}
 @media screen and (max-width: 576px) {
	 .blog-slider__content {
		 padding: 0;
	}
}
 .blog-slider__content > * {
	 opacity: 0;
	 transform: translateY(25px);
	 transition: all 0.4s;
}
 .blog-slider__code {
	 color: #7b7992;
	 margin-bottom: 15px;
	 display: block;
	 font-weight: 500;
}
 .blog-slider__title {
	 font-size: 24px;
	 font-weight: 700;
	 color: #0d0925;
	 margin-bottom: 20px;
}
 .blog-slider__text {
	 color: #4e4a67;
	 margin-bottom: 30px;
	 line-height: 1.5em;
}
 .blog-slider__button {
	 display: inline-flex;
	 background-color:  {{ setting('css.ana_renk') }};
	 padding: 15px 35px;
	 border-radius: 50px;
	 color: #fff;
	 box-shadow: 0px 14px 80px {{ setting('css.ucuncu_renk') }};
	 text-decoration: none;
	 font-weight: 500;
	 justify-content: center;
	 text-align: center;
     transition: 250ms;
	 letter-spacing: 1px;
}
.blog-slider__button:hover{
    background-color: {{ setting('css.ucuncu_renk') }};
    color: #000;
}
 @media screen and (max-width: 576px) {
	 .blog-slider__button {
		 width: 100%;
	}
}
 .blog-slider .swiper-container-horizontal > .swiper-pagination-bullets, .blog-slider .swiper-pagination-custom, .blog-slider .swiper-pagination-fraction {
	 bottom: 10px;
	 left: 0;
	 width: 100%;
}
 .blog-slider__pagination {
	 position: absolute;
	 z-index: 21;
	 right: 20px;
	 width: 11px !important;
	 text-align: center;
	 left: auto !important;
	 top: 50%;
	 bottom: auto !important;
	 transform: translateY(-50%);
}
 @media screen and (max-width: 768px) {
	 .blog-slider__pagination {
		 transform: translateX(-50%);
		 left: 50% !important;
		 top: 205px;
		 width: 100% !important;
		 display: flex;
		 justify-content: center;
		 align-items: center;
	}
}
 .blog-slider__pagination.swiper-pagination-bullets .swiper-pagination-bullet {
	 margin: 8px 0;
}
 @media screen and (max-width: 768px) {
	 .blog-slider__pagination.swiper-pagination-bullets .swiper-pagination-bullet {
		 margin: 0 5px;
	}
}
 .blog-slider__pagination .swiper-pagination-bullet {
	 width: 11px;
	 height: 11px;
	 display: block;
	 border-radius: 10px;
	 background: #062744;
	 opacity: 0.2;
	 transition: all 0.3s;
}
 .blog-slider__pagination .swiper-pagination-bullet-active {
	 opacity: 1;
	 background: {{ setting('css.ana_renk') }};
	 height: 30px;
	 box-shadow: 0px 0px 20px {{ setting('css.ucuncu_renk') }};
}
 @media screen and (max-width: 768px) {
	 .blog-slider__pagination .swiper-pagination-bullet-active {
		 height: 11px;
		 width: 30px;
	}
}
 
</style>
<h2 class="text-center" style="margin-top: 60px; font-family: {!! setting('css.font2') !!};
    line-height: 1;
    letter-spacing: -.05em;
    word-break: break-word;
    font-weight: 700;
    font-size: 35px !important;">Renklendirdiğimiz Alanlar</h2>

<div class="blog-slider mb-5">

    <div class="blog-slider__wrp swiper-wrapper">
        @foreach ($fields->sortBy('sira') as $field)

        <div class="blog-slider__item swiper-slide">
            <div class="blog-slider__img">
                @if ($field->image)
                    <img src="/public/storage/{{ $field->image }}" alt="{{ setting('seo.etiketler') }}">
                @endif    
            </div>
            <div class="blog-slider__content">
            <span class="blog-slider__code">{{ \Carbon\Carbon::parse($field->created_at)->format('d.m.Y') }}</span>
            <div class="blog-slider__title">{{ $field->baslik }}</div>
            <div class="blog-slider__text">{{ $field->aciklama }} </div>
            <a href="/boya-badana-boyaci-ustasi-hizmetleri/{{ $field->seo_url }}" class="blog-slider__button">İncele</a>
            </div>
        </div>

        @endforeach
      
    </div>
    <div class="blog-slider__pagination"></div>
  </div>
  <div class="d-flex mb-5" style="justify-content: center;">
  <a href="/boya-badana-boyaci-ustasi-hizmeti-kategori" class="btn-view-all">Tümünü Gör</a>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js"></script>
  <script>
    var swiper = new Swiper('.blog-slider', {
      spaceBetween: 30,
      effect: 'fade',
      loop: true,
      mousewheel: {
        invert: false,
      },
      // autoHeight: true,
      pagination: {
        el: '.blog-slider__pagination',
        clickable: true,
      }
    });
  </script>