@if (setting('css.index') && !empty(setting('css.index')))
<style>
    {!! setting('css.index') !!}
</style>
@else
<style>
@import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap');
html {
    scroll-behavior: smooth;
}
*{
    text-decoration: none !important;
}
body {
    font-family: {!! setting('css.font1') !!};
    color: {{ setting('css.color') }};
}

::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background-color: gainsboro;
}

::-webkit-scrollbar-thumb {
    background-color: {{ setting('css.ana_renk') }};
    border-radius: 8px;
    border: 1px solid transparent;
    background-clip: content-box;
}
.navbar {
    background-color: {{ setting('css.ana_renk') }};
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    padding: 10px 0;
    font-family: 'Open Sans', sans-serif !important;
    font-weight: 700 !important;
}

.navbar-brand {
    font-weight: bold;
}

.navbar-nav .nav-link {
    color: #333;
    font-weight: bold;
    margin: 0 15px;
    padding-top: 10px;
    padding-bottom: 10px;
}

.navbar-nav .nav-link:hover {
    color: #FF0134;
}

.btn-price {
    background-color: {{ setting('css.ikinci_renk') }};
    color: {{ setting('css.color') }} !important;
    font-weight: bold;
    margin-left: 15px;
}

.dropdown-menu .dropdown-item {
    padding: 10px 20px;
}

.dropdown-menu .dropdown-item:hover {
    background-color: {{ setting('css.ucuncu_renk') }};
    color: {{ setting('css.color') }};
}

.ey-banner {
    background-color: #f8f8f8;
    padding: 40px 20px;
}

.ey-banner-text h1 {
    font-size: 2.5rem;
    margin-bottom: 20px;
    color: {{ setting('css.color') }};
}

.ey-banner-text p {
color: {{ setting('css.color') }};
margin: 15px 0;
font-size: 15px;
font-family: 'Open Sans', sans-serif;
font-weight: 400;
margin-bottom: 15px;
}

.ey-checklist {
    list-style: none;
    padding: 0;
}

.ey-checklist li {
margin-bottom: 10px;
font-size: 18px !important;
color: {{ setting('css.color') }};
position: relative;
padding-left: 25px;
}


.ey-checklist li:before {
    content: "\f00c";
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    position: absolute;
    left: 0;
    top: 0;
    color: {{ setting('css.ana_renk') }};
}

.button-container {
    display: flex;
    gap: 10px;
    margin-top: 20px;
    font-family: 'Open Sans', sans-serif;
    font-weight: 700;
}

.default-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 10px 20px;
    border-radius: 5px;
    font-weight: bold;
    text-align: center;
    cursor: pointer;
    transition: all 0.3s ease;
}

.default-button span {
    display: block;
}

.default-button.rezervasyonBaslat {
    background-color: {{ setting('css.ana_renk') }};
    color: #ffffff;
}

.default-button.bordered {
    border: 2px solid {{ setting('css.ana_renk') }};
    color: {{ setting('css.color') }};
    position: relative;
    overflow: hidden;
}

.default-button.bordered::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background-color: {{ setting('css.ana_renk') }};
    transition: all 0.3s ease;
    z-index: 1;
}

.default-button.bordered span {
    position: relative;
    z-index: 2;
}

.default-button.bordered:hover::before {
    left: 0;
}

.default-button.bordered:hover {
    color: #ffffff;
}

.count-stars-wrapper {
    margin-top: 20px;
}

.count-stars {
    background: url('../public/img/star.png');
    position: relative;
    height: 20px;
    background-size: 90px;
    background-repeat: no-repeat;
}

.count-badge-wrapper {
    margin-top: 10px;
}

.count-badge {
    background-color: #ffffff;
padding: 10px 15px;
border-radius: 24px;
box-shadow: 8px 10px rgba(0, 0, 0, 0.1);
display: inline-block;
font-size: 0.9rem;
font-family: 'Open Sans', sans-serif;
font-weight: 700;
color: {{ setting('css.color') }};
}

.ey-bnr-img {
    max-width: 100%;
    border-radius: 10px;
}
.bolgeler{
    color: {{ setting('css.ana_renk') }};
    font-family: {!! setting('css.font2') !!};
    font-weight:bold;
}
.bolgeler_a{
    font-family: {!! setting('css.font2') !!};
}
@media (min-width: 768px) {
    .ey-bnr-img {
        width: 100%;
        height: auto;
    }
}

@media (min-width: 992px) {
    .ey-banner {
        display: flex;
        align-items: center;
    }

    .ey-banner-text {
        flex: 1;
    }

    .ey-bnr-img {
        width: 500px;
        height: auto;
        flex-shrink: 0;
    }
}

@media (max-width: 768px) {
    .ey-banner {
        text-align: center;
    }

    .ey-banner-text {
        margin-bottom: 20px;
    }

    .ey-banner-text h1 {
        font-size: 2rem;
    }

    .ey-banner-text p {
        font-size: 1rem;
    }

    .default-button {
        margin-bottom: 10px;
        display: block;
        width: 100%;
    }

    .ey-checklist {
        text-align: left;
        display: inline-block;
        width: 100%;
        padding: 0 15px;
    }
}

@media (max-width: 576px) {
    .ey-banner-text h1 {
        font-size: 1.5rem;
    }

    .ey-banner-text p {
        font-size: 0.9rem;
    }

    .ey-checklist li {
        font-size: 0.9rem;
    }

    .default-button {
        padding: 8px 15px;
    }

    .default-button span {
        font-size: 0.9rem;
    }

    .count-badge {
        font-size: 0.8rem;
    }
}
@media (max-width: 576px) {
.count-badge {
font-size: 0.8rem;
margin: 23px;
}
}
.navbar-light .navbar-brand {
color: rgb(255 255 255 / 90%);
}
/* New Styles for the Price Cards */
.price-cards {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    margin-top: 40px;
}

.price-card {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 20px;
    margin: 10px;
    text-align: center;
    flex: 1;
    min-width: 200px;
    max-width: 250px;
    transition: transform 0.3s;
}

.price-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.price-card h3 {
    font-size: 1.5rem;
    margin-bottom: 10px;
    background-color: #FFEEEC;
    font-family: 'Open Sans', sans-serif;
    font-weight: 700;
    padding: 10px 0;
    color: #FF5722;
    border-radius: 10px 10px 0 0;
}

.price-card p {
    font-size: 1rem;
    margin-bottom: 5px;
    color: #666;
    font-family: 'Open Sans', sans-serif;
    font-weight: 400;
}

.price-card .price {
    font-size: 1.5rem;
    font-weight: bold;
    color: #333;
    margin-bottom: 15px;
}

.price-card .note {
    font-size: 0.9rem;
    font-family: 'Open Sans', sans-serif;
     font-weight: 700;
    color: #999;
}

.price-card .btn-get-price {
    background-color: #FF0134;
    color: #fff;
    font-weight: bold;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s;
    font-family: 'Open Sans', sans-serif;
    font-weight: 400;
}

.price-card .btn-get-price:hover {
    background-color: #ff3366;
}

.get-price-section {
    display: none;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    margin-top: 20px;
    text-align: center;
}

.get-price-section h3 {
    margin-bottom: 20px;
}

.get-price-section input,
.get-price-section textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.get-price-section button {
    background-color: #FF0134;
    color: #fff;
    font-weight: bold;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.get-price-section button:hover {
    background-color: #ff3366;
}

.page-title {
    text-align: center;
    margin: 40px 0 20px;
    font-size: 2rem;
    color: #333;
    font-family: {!! setting('css.font2') !!};
    font-weight: 700 !important;
}

/* New Styles for Reservation Section */
.reservation-section {
    text-align: center;
    background-color: #fff;
    font-family: 'Open Sans', sans-serif;
    font-weight: 300;
}

.reservation-section h2 {
    color: #FF5722;
    font-size: 1.5rem;
    font-weight: bold;
    margin-bottom: 10px;
}

.reservation-section .line {
    width: 50px;
    height: 2px;
    background-color: #FF5722;
    margin: 0 auto 20px auto;
}

.reservation-section .phone-number {
    color: {{ setting('css.color') }};
    font-size: 1.2rem;
    font-weight: bold;
    margin-bottom: 20px;
}

.reservation-section .phone-number i {
    margin-right: 5px;
}

.reservation-section p {
    color: #666;
    font-size: 1rem;
    margin: 0 auto;
    max-width: 1411px;
}

/* New Styles for Payment and Services Section */
.payment-services-section {
    text-align: center;
}

.payment-services-section .service-card {
    flex: 1;
    padding: 20px;
    text-align: center;
    margin: 10px;
    border: 1px solid #ddd;
    border-radius: 10px;
    background-color: #fff;
    transition: transform 0.3s, box-shadow 0.3s;
}

.payment-services-section .service-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.payment-services-section .service-card i {
    font-size: 2rem;
    color: {{ setting('css.ana_renk') }};
    margin-bottom: 10px;
}

.payment-services-section .service-card h3 {
    font-size: 1.2rem;
    color: #333;
    font-weight: bold;
    margin-bottom: 10px;
}

.payment-services-section .service-card p {
    font-size: 1rem;
    color: #666;
    margin-bottom: 20px;
}

.payment-services-section .service-card .btn-rezervasyon {
    background-color: #FF0134;
    color: #fff;
    font-weight: bold;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s, transform 0.3s;
}

.payment-services-section .service-card .btn-rezervasyon:hover {
    background-color: #ff3366;
    transform: scale(1.05);
}

.payment-services-cards {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    margin-top: 40px;
}

.btn-rezervasyon {
    background-color: #FF0134;
    color: #fff;
    font-weight: bold;
    border: none;
    padding: 15px 30px;
    cursor: pointer;
    border-radius: 50px;
    transition: background-color 0.3s, transform 0.3s;
    margin-top: 20px;
}

.btn-rezervasyon:hover {
    background-color: #ff3366;
    transform: scale(1.05);
}

/* New Styles for the Bottom Info Section */
.bottom-info-section {
    text-align: center;
}

.bottom-info-section h3 {
    font-size: 35px;
margin-bottom: 20px;
color: #333;
text-align: center;
letter-spacing: -.05em;
font-family: {!! setting('css.font2') !!};
font-weight: 700;
padding: 26px;
}

.bottom-info-section p {
    font-size: 1rem;
    color: #666;
    margin-bottom: 10px;
}

.bottom-info-section .btn-learn-more {
    background-color: #FF5722;
    color: #fff;
    font-weight: bold;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s, transform 0.3s;
}

.bottom-info-section .btn-learn-more:hover {
    background-color: #ff3366;
    transform: scale(1.05);
}

/* New Styles for Service Cards */


.service-card-section .card {
    transition: transform 0.3s, box-shadow 0.3s;
}

.service-card-section .card:hover {
    transform: translateY(-10px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.service-card-section .card img {
    border-radius: 10px 10px 0 0;
}

.service-card-section .card-body {
    background-color: #fff;
    padding: 20px;
    border-radius: 0 0 10px 10px;
}

.service-card-section .card-title {
    font-size: 1.2rem;
    color: #333;
    font-weight: bold;
    margin-bottom: 10px;
}

.service-card-section .btn-view-all {
    display: inline-block;
    padding: 10px 20px;
    color: {{ setting('css.color') }};
    background-color: {{ setting('css.ucuncu_renk') }};
    border-radius: 5px;
    text-align: center;
    font-weight: bold;
    margin-top: 20px;
    transition: background-color 0.3s, transform 0.3s;
}
.btn-dark {
color: {{ setting('css.color') }};
background-color: {{ setting('css.ucuncu_renk') }};
border-color: {{ setting('css.ucuncu_renk') }};
}
.btn-dark:hover {
color: {{ setting('css.color') }};
background-color: {{ setting('css.ana_renk') }};
border-color: {{ setting('css.ana_renk') }};
}
.service-card-section .btn-view-all:hover {
    background-color: {{ setting('css.ana_renk') }};
    transform: scale(1.05);
}

/* New Styles for Testimonials */
.testimonial-section {
    padding: 60px 0;
    background-color: #fff;
    text-align: center;
}

.testimonial-section h2 {
    font-size: 2rem;
    color: #333;
    margin-bottom: 20px;
    font-weight: bold;
}

.testimonial-section p {
    color: #666;
    font-size: 1rem;
    margin-bottom: 40px;
}

.testimonial-cards {
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
}

.testimonial-card {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 20px;
    margin: 10px;
    text-align: center;
    width: 300px;
    transition: transform 0.3s, box-shadow 0.3s;
}

.testimonial-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.testimonial-card .quote {
    font-size: 1rem;
    color: #666;
    margin-bottom: 15px;
}

.testimonial-card .author {
    font-size: 1.2rem;
    color: #333;
    font-weight: bold;
    margin-bottom: 5px;
}

.testimonial-card .rating i {
    color: #FF5722;
}

.testimonial-card .date {
    font-size: 0.9rem;
    color: #999;
    margin-top: 5px;
}

.testimonial-navigation {
    position: absolute;
    width: 100%;
    top: 50%;
    display: flex;
    justify-content: space-between;
    transform: translateY(-50%);
}

.testimonial-navigation .nav-btn {
    background-color: transparent;
    border: none;
    font-size: 2rem;
    color: #FF5722;
    cursor: pointer;
    transition: color 0.3s;
}

.testimonial-navigation .nav-btn:hover {
    color: #ff3366;
}

.btn-reservation {
    background-color: #FF0134;
    color: #fff;
    font-weight: bold;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 20px;
    transition: background-color 0.3s, transform 0.3s;
}

.btn-reservation:hover {
    background-color: #ff3366;
    transform: scale(1.05);
}

.faq-section {
    padding: 40px 20px;
    text-align: center;
}

.faq-section h2 {
    font-size: 2rem;
    margin-bottom: 20px;
    color: #333;
}

.faq-section p {
    font-size: 1rem;
    margin-bottom: 30px;
    color: #666;
}

.accordion .card {
    border: 1px solid #ddd;
    border-radius: 5px;
    margin-bottom: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.accordion .card-header {
    background-color: #fff;
    border: none;
    padding: 0;
}

.accordion .card-header h5 {
    font-size: 1rem;
    width: 100%;
    text-align: left;
}

.accordion .card-header h5 button {
    color: #333;
    width: 100%;
    text-align: left;
    padding: 15px;
    font-size: 1rem;
    border: none;
    background-color: transparent;
    cursor: pointer;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.accordion .card-header h5 button:hover {
    color: #7dc316;
}

.accordion .card-header h5 button:focus {
    outline: none;
}

.accordion .card-body {
    font-size: 1rem;
    padding: 15px;
    color: #666;
    border-top: 1px solid #ddd;
}

.btn-view-all {
    display: inline-block;
    padding: 10px 20px;
    background-color: {{ setting('css.ucuncu_renk') }};
    color: {{ setting('css.color') }};
    border-radius: 5px;
    text-align: center;
    font-weight: bold;
    margin-top: 20px;
    transition: background-color 0.3s, transform 0.3s;
}

.btn-view-all:hover {
    background-color: {{ setting('css.ana_renk') }};
    color: {{ setting('css.color') }};
    transform: scale(1.05);
}

@media (max-width: 768px) {
    .faq-section .row {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .faq-section .col-md-6 {
        width: 100%;
        padding: 0;
    }
}

.blog-section {
    padding: 40px 20px;
    text-align: center;
}

.blog-section h2 {
    font-size: 2rem;
    margin-bottom: 20px;
    color: #333;
}

.blog-section .blog-container {
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap;
}

.blog-card {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 20px;
    text-align: center;
    width: 100%;
    max-width: 300px;
    transition: transform 0.3s, box-shadow 0.3s;
}

.blog-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.blog-card img {
    width: 100%;
    height: auto;
    border-radius: 10px;
}

.blog-card .blog-title {
    font-size: 1.2rem;
    color: #333;
    font-weight: bold;
    margin: 15px 0;
}

.blog-card .blog-date {
    font-size: 1rem;
    color: #666;
    margin-bottom: 10px;
}

.cntnr {
    background-color: #fff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    max-width: 1200px;
    margin: 20px auto;
}

.frm-cntnr {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

.frm-sc,
.txt-sc {
    flex: 1 1 calc(50% - 20px);
    margin: 20px 0;
}

.frm-sc {
    max-width: 500px;
}

.txt-sc {
    max-width: 600px;
}



.frm-gp {
    margin-bottom: 1rem;
}

@media (max-width: 768px) {
    .frm-cntnr {
        flex-direction: column;
    }

    .frm-sc,
    .txt-sc {
        flex: 1 1 100%;
        max-width: none;
        margin: 10px 0;
    }
}

.a1 {

    margin: auto;
    padding: 20px;
}

.b2 {
    text-align: center;
    margin-bottom: 40px;
}

.c3 {
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
}

.d4 {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    margin-bottom: 40px;
    position: relative;
}

.d4 img {
    width: 100%;
    max-width: 300px;
    height: auto;
    margin-bottom: 20px;
    border-radius: 10px;
}

.e5 {
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: white;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    font-size: 1.2em;
    font-weight: bold;
    position: absolute;
    top: -20px;
    left: calc(50% - 20px);
    border: 2px solid #e0e0e0;
}

.f6 {
    max-width: 400px;
}

.g7 {
    height: 2px;
    width: 80%;
    max-width: 600px;
    background-color: #e0e0e0;
    margin: 20px auto;
}

@media (min-width: 768px) {
    .c3 {
        flex-direction: row;
        justify-content: space-between;
        align-items: flex-start;
    }

    .d4 {
        width: 30%;
        margin-bottom: 0;
    }

    .e5 {
        top: 0;
        left: 50%;
        transform: translateX(-50%);
    }

    .g7 {
        display: none;
    }
}

.h8 {
    position: absolute;
    top: 50%;
    width: 100%;
    z-index: -1;
}
footer {
    background-color: #f8f8f8;
    padding: 20px 0;
}

.footer-column {
    margin-bottom: 20px;
}

.footer-column h3 {
    color: #393939;
font-size: 22px;
margin-bottom: 20px;
font-family: 'Nunito', sans-serif;
font-weight: 800;
letter-spacing: 1.1px;

}
body > footer > div > div > div:nth-child(4) > h3 {
font-size: 15px;
font-weight: 600;
margin-bottom: 9px;
position: relative;
}

.footer-column ul {
    list-style-type: none;
    padding: 0;
}

.footer-column ul li {
    margin-bottom: 8px;
}

.footer-column ul li a {
    position: relative;
left: 0;
font-size: 17px;
color: #565656 !important;
transition: all .3s;
font-family: 'Nunito', sans-serif;
font-weight: 600;
}
.footer-column ul li a:hover {
    color: {{ setting('css.ana_renk') }} !important;
left: 5px;
}
i.fab.fa-facebook-f, i.fab.fa-whatsapp, i.fab.fa-instagram, i.fa-brands.fa-twitter, i.fa-brands.fa-linkedin{
font-size: 24px;
}

.footer-column ul li a:hover {
    text-decoration: underline;
}

.social-media a {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
    color: #333;
    text-decoration: none;
}

.social-media a:hover {
    text-decoration: underline;
}

.social-media i {
    margin-right: 8px;
}
h2 {
margin-bottom: 20px;
}

.carousel {
position: relative;
display: flex;
justify-content: center;
align-items: center;
}

.carousel-inner {
display: flex;
overflow: hidden;
width: 100%;
}

.carousel-item {
min-width: 100%;
box-sizing: border-box;
padding: 20px;
transition: transform 0.5s ease;
display: none;
}

.carousel-item.active {
display: block;
}

button {
background-color: transparent;
border: none;
cursor: pointer;
outline: none;
}

.stars {
color: orange;
}


/* Responsive Styles */
@media (max-width: 768px) {
.container {
width: 100%;
/* padding: 10px; */
}

button {
font-size: 1.5rem;
}

.carousel-item {
padding: 10px;
}
}

@media (max-width: 480px) {
.carousel-item {
padding: 5px;
}

button {
font-size: 1.2rem;
}
}
.containerr {
text-align: center;
width: 90%;
margin: 0 auto;
padding: 20px;
}
a:hover {
color: {{ setting('css.ikinci_renk') }};
text-decoration: underline;
}
.modal-dialog {
    max-width: 800px;
}
.modal-body iframe {
    height: 745px;
}
.floating-button {
position: fixed;
bottom: 20px;
right: 20px;
background-color: #03a84e;
border-radius: 50%;
width: 60px;
height: 60px;
display: flex;
justify-content: center;
align-items: center;
cursor: pointer;
z-index: 1000;
}

.floating-button img {
width: 40px;
height: 40px;
}

.tooltip {
position: absolute;
bottom: 70px;
right: 10px;
background-color: #fff;
color: {{ setting('css.color') }};
padding: 5px 10px;
border-radius: 5px;
display: none;
z-index: 1000;
}

.support-menu {
position: fixed;
bottom: 100px;
right: 20px;
background-color: #fff;
box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
border-radius: 10px;
padding: 10px;
width: 300px;
display: none;
z-index: 1000;
}

.support-menu h3 {
margin-top: 0;
margin-top: 0;
font-size: 18px;
font-family: 'Open Sans', sans-serif;
font-weight: 700;
}
div#supportMenu{
padding: 20px;
}
.support-menu p {
font-size: 11px;
margin: 10px 0 0 0;
font-weight: 300;
color: #A3A3A3;
}
i.fab.fa-facebook-f, i.fab.fa-whatsapp, i.fab.fa-instagram, i.fa-brands.fa-twitter, i.fa-brands.fa-linkedin {
border-radius: 6px;
padding: 9px;
width: 44px;
border: 2px #333333 solid;
text-align: center !important;
}
.support-menu button {
width: 100%;
padding: 10px;
margin: 5px 0;
border-radius: 23px !important;
background-color: {{ setting('css.ikinci_renk') }};
color: {{ setting('css.color') }};
border: none;
border-radius: 5px;
font-family: {!! setting('css.font2') !!};
font-weight: 700;
cursor: pointer;
font-size: 10px;
}

.support-menu button:hover {
opacity: .8;
}

#closeButton {
background-color: #ccc;
}

#closeButton:hover {
background-color: #999;
}

@media (max-width: 600px) {
.support-menu {
width: 90%;
bottom: 70px;
right: 5%;
padding: 10px;
}

.floating-button {
bottom: 15px;
right: 15px;
width: 50px;
height: 50px;
}

.floating-button img {
width: 30px;
height: 30px;
}
}
#supportMenu > button:nth-child(4) > a,#supportMenu > button:nth-child(5) > a {
color: rgb(0, 0, 0);
}
.nav-item.dropdown:hover .dropdown-menu {
display: block;
}
.navbar-light .navbar-nav .nav-link{
font-family: Quicksand, sans-serif;
border-radius: 9px;
font-weight: bold !important;
font-size: 17px !important;
color: rgb(0 0 0);
}
body > div.ey-banner > div > div > div.col-md-7 > div.ey-banner-text > h1 {
font-weight: 700 !important;
font-family: Quicksand;
font-size: 29px !important;
}
ul.ey-checklist {
font-family: 'Open Sans', sans-serif;
font-weight: 300;

}

.title {
    font-size: 35px;
    margin-bottom: 20px;
    color: #333;
    text-align: center;
    letter-spacing: -.05em;
    font-family: {!! setting('css.font2') !!};
    font-weight: 700;
    padding: 26px;
}
.cards-container {
    display: flex;
    flex-wrap: wrap;
    padding-bottom: 62px;
    justify-content: center;
    gap: 20px;
}
.card-container {
    text-decoration: none;
    width: 200px;
    box-sizing: border-box;
}
.card {
    border: 1px solid #ddd;
    text-align: center;
    overflow: hidden;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    transition: transform 0.2s;
    background-color: white;
}
.card-container .card:hover {
    transform: scale(1.05);
    box-shadow: 0 0 18px rgba(33, 33, 33, .5);
}
button.btn-get-price {
background: red;
border-radius: 5px;
padding: 5px;
color: white;
}
.card-header {
    background-color: {{ setting('css.ucuncu_renk') }};
padding: 10px 0;
font-weight: bold;
color: {{ setting('css.color') }};
margin-bottom: 10px;
font-family: 'Open Sans', sans-serif;
font-weight: 700;
}
.card-body {
    padding: 0 10px;
    font-family: 'Open Sans', sans-serif;
    font-weight: 400;
}
.price {
    color: {{ setting('css.ana_renk') }};
    font-size: 24px;
    font-weight: bold;
    font-family: {!! setting('css.font2') !!};
    font-weight: 700;
}
.price span {
    font-size: 16px;
    position: relative;
     top: -3px;
    right: -1px;
      font-size: 13px;
      color: {{ setting('css.color') }};
      letter-spacing: -.05em;
    font-family: {!! setting('css.font2') !!};
     font-weight: bold;
}
.description {
    margin: 10px 0;
    font-size: 13px;
    color: {{ setting('css.color') }};
    font-family: {!! setting('css.font2') !!};
    letter-spacing: -.05em;
    font-weight: bold;
}
body > div:nth-child(18) > div > h3{
    line-height: 1;
    letter-spacing: -.05em;
    word-break: break-word;
    font-family: 'Quicksand', sans-serif;
    font-weight: 700;
    font-size: 35px !important;
    padding: 10px;
}
.areas.text-center {
    line-height: 1;
    word-break: break-word;
    font-family: 'Quicksand', sans-serif;
    font-weight: 400;
}
.icon {
    font-size: 41px;
    margin: -36px;
    padding: 12px;
    color: {{ setting('css.color') }};
}
.footer {
    color: {{ setting('css.ana_renk') }};
    font-size: 13px;
    margin-top: 17px;
    padding-bottom: 23px;
    font-family: 'Open Sans', sans-serif;
    font-weight: 400;
}
@media (max-width: 768px) {
    .card-container {
        flex: 1 1 calc(50% - 20px); /* 2 cards per row on tablets */
    }
}
@media (max-width: 480px) {
    .card-container {
        flex: 1 1 100%; /* 1 card per row on mobile */
    }
}
a {
color: {{ setting('css.color') }};
}
body > div.a1 > div.c3 > div:nth-child(2) > h3,body > div.a1 > div.c3 > div:nth-child(4) > h3,body > div.a1 > div.c3 > div:nth-child(6) > h3
{
font-size: 27px !important;
font-weight: bold !important;
font-family: 'Quicksand', sans-serif !important;
}
body > div.a1 > div.b2 > h1{
font-weight: 400;
line-height: 1;
letter-spacing: -.05em;
word-break: break-word;
font-family: {!! setting('css.font2') !!};
font-weight: 700;
font-size: 35px !important;
}
#yorum > h2,#sorular > h2,body > div.cntnr > h1,body > div.container.blog-section > h2{
font-weight: 400;
line-height: 1;
letter-spacing: -.05em;
word-break: break-word;
font-family: {!! setting('css.font2') !!};
font-weight: 700;
font-size: 35px !important;
}
.frm-cntnr .form-control{
border-radius: 55px !important;
}
#description{
border-radius: 0px !important;
}
input#file{
border: 1px solid #ced4da;
border-radius: 5px;
}
body > footer > div {
padding: 60px 0;
}
select.form-control {
border-radius: 5px !important;
}
.custom-dropdown {
position: relative;
display: inline-block;
width: 100%;
}

.dropbtn {
background-color: #fff;
color: {{ setting('css.color') }};
padding: 12px;
font-size: 16px;
border: 1px solid #ccc;
cursor: pointer;
display: flex;
align-items: center;
width: 72%;
justify-content: space-between;
}

.dropbtn img.flag {
margin-right: 10px;
height: 20px;
width: 20px;
}

.dropdown-content {
display: none;
position: absolute;
background-color: #fff;
min-width: 100%;
box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
z-index: 1;
border: 1px solid #ccc;
}

.dropdown-content a {
color: {{ setting('css.color') }};
padding: 10px 20px;
text-decoration: none;
display: flex;
align-items: center;
}

.dropdown-content a img.flag {
margin-right: 10px;
height: 20px;
width: 20px;
}

.dropdown-content a:hover {
background-color: #f1f1f1;
}

.custom-dropdown:hover .dropdown-content {
display: block;
}
.center-container {
display: flex;
justify-content: center;
align-items: center;
}
.iframe-container {
    width: 100%;
    height: 285px;
}
@media (max-width: 768px) {
    .iframe-container {
    width: 100%;
    height: 651px;

}
}
@media (max-width: 480px) {
    .iframe-container {
    width: 100%;
    height: 651px;
    }
    
}
#priceButton {
background: unset;
}

</style>
@endif