<!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<style>
    .categories-secions
    {
        background-color: #eee;
    }
    .ps-single-wrap {
        background: #fff;
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.08);
        transition: transform 0.3s ease;
    }
    .ps-single-wrap:hover {
        transform: translateY(-5px);
    }
    .ps-single-wrap img
    {
        height: 70px;
        width: 70px;
        margin: 0 auto;
        margin-bottom: 30px;
        padding: 4px;
        margin-bottom: 25px !important;
        border-radius: 4px;
    }
    .categories-swiper
    {
        padding-top: 35px;
    }
    .categories-swiper {
        padding-top: 35px;
        min-height: 300px;
    }
</style>
<section class="categories-secions">
    <div class="container">
        <div class="row mb-4">
            <div class="col-lg-12">
                <div class="res-control d-flex align-items-center justify-content-between">
                    <div class="section-title mb-0">
                        <h2 class="title">{{ get_phrase("categories") }}</h2>
                    </div>
                    <span class="featured-course-all-button">
                        <a href="{{ url('/courses') }}" class="eBtn gradient custom_btn">{{ get_phrase("view all categories") }}</a>
                    </span>
                </div>
            </div>
        </div>

        <!-- Swiper -->
        <div class="swiper categories-swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="ps-single-wrap text-center">
                        <img src="{{ asset('assets/frontend/default/images/icones/prayer.png') }}" alt="..." class="img-fluid mb-2">
                        <h4>{{ get_phrase("Islamic Studies") }}</h4>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="ps-single-wrap text-center">
                        <img src="{{ asset('assets/frontend/default/images/icones/arabic.png') }}" alt="..." class="img-fluid mb-2">
                        <h4>{{ get_phrase("Arabic Language") }}</h4>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="ps-single-wrap text-center">
                        <img src="{{ asset('assets/frontend/default/images/icones/society.png') }}" alt="..." class="img-fluid mb-2">
                        <h4>{{ get_phrase("Socialty") }}</h4>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="ps-single-wrap text-center">
                        <img src="{{ asset('assets/frontend/default/images/icones/quran.png') }}" alt="..." class="img-fluid mb-2">
                        <h4>{{ get_phrase("Quran Kareem") }}</h4>
                    </div>
                </div>

            </div>

            <!-- Dots Pagination -->
            <div class="swiper-pagination mt-4"></div>
        </div>

    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        new Swiper('.categories-swiper', {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 3000,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                576: { slidesPerView: 2 },
                768: { slidesPerView: 3 },
                992: { slidesPerView: 4 }
            }
        });
    });
</script>

