<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

<style>
    /* التصميم العام للسلايدر */
    .hero-slider {
        position: relative;
        overflow: hidden;
        padding: 60px 0;
    }

    .heroSwiper {
        width: 100%;
        height: 100%;
    }

    .swiper-slide {
        padding: 20px 0;
    }

    /* تصميم المحتوى */
    .slide-content {
        padding: 20px;
    }

    .slide-content h5 {
        font-size: 18px;
        color: #fff;
        margin-bottom: 15px;
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.6s ease;
    }

    .slide-content h1 {
        font-size: 33px;
        font-weight: 700;
        margin-bottom: 20px;
        line-height: 1.2;
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.6s ease 0.2s;
        line-height: 53px;
    }

    .gradient-text {
        background: linear-gradient(90deg, #da9d30 0%, #da9d30 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        display: inline-block;
    }

    .slide-content p {
        font-size: 17px;
        margin-bottom: 30px;
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.6s ease 0.4s;
        line-height: 35px;
    }

    .slide-btns {
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.6s ease 0.6s;
    }

    .main-btn {
        display: inline-block;
        padding: 12px 30px;
        background: linear-gradient(90deg, #da9d30 0%, #da9d30 100%);
        color: white;
        border-radius: 30px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .main-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }

    /* تصميم الصورة */
    .slide-image {
        text-align: center;
        opacity: 0;
        transform: scale(0.9);
        transition: all 0.8s ease 0.4s;
    }

    .slide-image img {
        max-width: 100%;
        border-radius: 10px;
    }

    /* تصميم الفيديو */
    .video-wrapper {
        position: relative;
        border-radius: 10px;
        overflow: hidden;
        cursor: pointer;
        opacity: 0;
        transform: scale(0.9);
        transition: all 0.8s ease 0.4s;
    }
    .swiper-button-next, .swiper-rtl .swiper-button-prev
    {
        background-color: rgba(0, 0, 0, 0.3);
        border-radius: 0;
        padding: 26px;
    }
    .video-thumb {
        width: 100%;
        display: block;
    }

    .play-btn {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 80px;
        height: 80px;
        background: rgba(255,255,255,0.9);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .play-btn i {

        color: #da9d30;
        font-size: 30px;
        margin-left: 5px;
    }

    .play-btn:hover {
        transform: translate(-50%, -50%) scale(1.1);
    }

    .embed-video {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: none;
    }

    /* أسهم التنقل المخصصة */
    .swiper-nav {
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        transform: translateY(-50%);
        z-index: 10;
        pointer-events: none;
    }

    .hero-prev, .hero-next {
        position: absolute;
        width: 60px;
        height: 60px;
        color: #da9d30;
        cursor: pointer;
        pointer-events: auto;
        transition: all 0.3s ease;
    }

    .hero-prev {
        left: 20px;
    }

    .hero-next {
        right: 20px;
    }

    .hero-prev:hover, .hero-next:hover {
        color: #da9d30;
        transform: scale(1.2);
    }

    /* نقاط التصفّح */
    .swiper-pagination {
        position: relative;
        margin-top: 30px;
    }

    .swiper-pagination-bullet {
        width: 12px;
        height: 12px;
        background: rgb(216, 156, 48);
        opacity: 1;
    }

    .swiper-pagination-bullet-active {
        background: linear-gradient(90deg, #da9d30 0%, #da9d30 100%);
    }

    /* تأثيرات الظهور عند التحميل */
    .swiper-slide-active .animate-stage-1,
    .swiper-slide-active .animate-stage-2,
    .swiper-slide-active .animate-stage-3,
    .swiper-slide-active .animate-stage-4,
    .swiper-slide-active .animate-stage-5 {
        opacity: 1;
        transform: none;
    }
    .swiper-button-next, .swiper-button-prev
    {
        color:  #db9e30 !important;
        border: 0 ;
    }
    .swiper-button-prev:hover, .swiper-button-next:hover
    {
        background-color: transparent;
    }
    .swiper-pagination-bullet-active {
        background: #db9e30 !important;
    }
    .background-overlay
    {
        background-image: url({{asset('assets/frontend/default/image/tq-feat-bg.jpg')}});
    }
    /* التجاوب مع الشاشات الصغيرة */
    @media (max-width: 992px) {
        .slide-content h1 {
            font-size: 36px;
        }

        .slide-content p {
            font-size: 16px;
        }

        .hero-prev {
            left: 10px;
        }

        .hero-next {
            right: 10px;
        }
    }

    @media (max-width: 768px) {
        .slide-content {
            text-align: center;
            padding-top: 30px;
        }

        .slide-content h1 {
            font-size: 28px;
        }

        .hero-prev, .hero-next {
            width: 40px;
            height: 40px;
        }

        .hero-prev svg, .hero-next svg {
            width: 24px;
            height: 24px;
        }
    }
</style>
<!-- أضف هذه المكتبات في head -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

<section class="hero-slider banner-wraper mt-0 pt-5 pb-5 background-overlay">
    <div class="swiper heroSwiper">
        <div class="swiper-wrapper">
            <!-- Slide 1 -->
            <div class="swiper-slide">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 order-lg-1 order-2">
                            <div class="slide-content">
                                <h5 class="animate-stage-1 gradient-text mb-4">{{ get_phrase("slide 1  top") }}</h5>
                                <h1 class="animate-stage-2">
                                    {{ get_phrase("slide 1 title") }}
                                </h1>
                                <p class="animate-stage-3">{{ get_phrase("slide 1 description") }}</p>
                                <div class="slide-btns animate-stage-4">
                                    <a href="{{ route('courses') }}" class="eBtn gradient custom_btn">{{ get_phrase("Get Started") }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 order-lg-2 order-1">
                            <div class="slide-image animate-stage-5">
                                <img src="{{ asset('assets/frontend/default/image/about-group.png') }}" alt="Learning">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2 (مع فيديو) -->
            <div class="swiper-slide">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 order-lg-1 order-2">
                            <div class="slide-content">
                                <h5 class="animate-stage-1 gradient-text mb-4">{{ get_phrase("slide 2  top") }}</h5>
                                <h1 class="animate-stage-2">
                                    {{ get_phrase("Slide 2 top title") }}
                                </h1>
                                <p class="animate-stage-3">{{ get_phrase("Slide 2 description") }}</p>
                                <div class="slide-btns animate-stage-4">
                                    <a href="{{ route('courses') }}" class="eBtn gradient custom_btn">{{ get_phrase("Get Started") }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 order-lg-2 order-1">
                            <div class="video-wrapper animate-stage-5">
                                <div class="play-btn" onclick="playVideo(this)">
                                    <i class="fas fa-play"></i>
                                </div>
                                <img class="video-thumb" src="{{ asset('assets/frontend/default/image/video.png') }}" alt="Video">
                                <iframe class="embed-video" src="about:blank" data-src="https://www.youtube.com/embed/YOUR_VIDEO_ID?autoplay=1" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- أسهم التنقل المخصصة -->
        <div class="swiper-nav">
            <div class="swiper-button-prev hero-prev">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="36" height="36">
                    <path fill="currentColor" d="M15.41 16.59L10.83 12l4.58-4.59L14 6l-6 6 6 6 1.41-1.41z"/>
                </svg>
            </div>
            <div class="swiper-button-next hero-next">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="36" height="36">
                    <path fill="currentColor" d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6-1.41-1.41z"/>
                </svg>
            </div>
        </div>

        <div class="swiper-pagination"></div>
    </div>
</section>


<!-- Vertically centered modal -->
<div class="modal fade-in-effect" id="promoVideo" tabindex="-1" aria-labelledby="promoVideoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-body bg-dark">
            </div>
        </div>
    </div>
</div>

<script>
    (function() {
        var xhr = new XMLHttpRequest();
        var url = "{{ route('view', ['path' => 'components.home_ajax_loaded_templates.promo_video']) }}";

        xhr.open("GET", url, true);
        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 400) {
                $('#promoVideo .modal-body').html(xhr.responseText);
            }
        };

        xhr.send();
    })();

    function scrollToSmoothly(pos, time) {
        if (isNaN(pos)) {
            throw "Position must be a number";
        }
        if (pos < 0) {
            throw "Position can not be negative";
        }
        var currentPos = window.scrollY || window.screenTop;
        if (currentPos < pos) {
            var t = 10;
            for (let i = currentPos; i <= pos; i += 10) {
                t += 10;
                setTimeout(function() {
                    window.scrollTo(0, i);
                }, t / 2);
            }
        } else {
            time = time || 2;
            var i = currentPos;
            var x;
            x = setInterval(function() {
                window.scrollTo(0, i);
                i -= 10;
                if (i <= pos) {
                    clearInterval(x);
                }
            }, time);
        }
    }
</script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const heroSwiper = new Swiper('.heroSwiper', {
            // إعدادات أساسية
            loop: true,
            speed: 1000,
            autoplay: {
                delay: 7000,
                disableOnInteraction: false,
            },

            // تأثير الانتقال
            effect: 'creative',
            creativeEffect: {
                prev: {
                    translate: ['-100%', 0, 0],
                    opacity: 0
                },
                next: {
                    translate: ['100%', 0, 0],
                    opacity: 0
                }
            },

            // نقاط التصفّح
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },

            // أسهم التنقل
            navigation: {
                nextEl: '.hero-next',
                prevEl: '.hero-prev',
            },

            // إعدادات للشاشات الصغيرة
            breakpoints: {
                768: {
                    creativeEffect: {
                        prev: {
                            translate: ['-120%', 0, -400],
                            opacity: 0
                        },
                        next: {
                            translate: ['120%', 0, -400],
                            opacity: 0
                        }
                    }
                }
            }
        });

        // تشغيل الفيديو عند النقر
        function playVideo(btn) {
            const wrapper = btn.closest('.video-wrapper');
            const thumb = wrapper.querySelector('.video-thumb');
            const iframe = wrapper.querySelector('.embed-video');

            if(iframe.src.includes('about:blank')) {
                iframe.src = iframe.dataset.src;
            }

            thumb.style.display = 'none';
            btn.style.display = 'none';
            iframe.style.display = 'block';
        }

        // إعادة تعيين تأثيرات الحركة عند تغيير الشريحة
        heroSwiper.on('slideChange', function() {
            const slides = document.querySelectorAll('.swiper-slide');
            slides.forEach(slide => {
                const elements = slide.querySelectorAll('[class*="animate-stage"]');
                elements.forEach(el => {
                    el.style.opacity = '0';

                    if(el.classList.contains('animate-stage-1')) {
                        el.style.transform = 'translateY(20px)';
                    } else if(el.classList.contains('animate-stage-2')) {
                        el.style.transform = 'translateY(20px)';
                    } else if(el.classList.contains('animate-stage-3')) {
                        el.style.transform = 'translateY(20px)';
                    } else if(el.classList.contains('animate-stage-4')) {
                        el.style.transform = 'translateY(20px)';
                    } else if(el.classList.contains('animate-stage-5')) {
                        el.style.transform = 'scale(0.9)';
                    }
                });
            });

            const activeSlide = slides[heroSwiper.activeIndex];
            const elements = activeSlide.querySelectorAll('[class*="animate-stage"]');

            elements.forEach(el => {
                setTimeout(() => {
                    el.style.opacity = '1';
                    el.style.transform = 'none';
                }, 100);
            });
        });
    });
</script>
