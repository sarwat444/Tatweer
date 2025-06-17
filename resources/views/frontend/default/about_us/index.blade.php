@extends('layouts.default')
@push('title', get_phrase('About Us'))
@push('meta')@endpush
@push('css')@endpush
@section('content')
    <!-- Start Breadcrumb -->
    <section class="py-56" data-background="{{ asset('assets/frontend/images/breadcrumb.png') }}">
        <div class="container">
            <ul class="ul-ol d-flex align-items-center cg-17 pb-20">
                <li class="d-flex align-items-center cg-12">
                    <div class="d-flex">
                        <img src="{{ asset('assets/frontend/images/icon/home.svg') }}" alt="" />
                    </div>
                    <p class="fz-16 fw-500 lh-30 text-white">{{ get_phrase('Home') }}</p>
                </li>
                <li class="d-flex align-items-center cg-12">
                    <div class="d-flex">
                        <img src="{{ asset('assets/frontend/images/icon/arrow-right-white.svg') }}" alt="" />
                    </div>
                    <p class="fz-16 fw-500 lh-30 text-white">{{ get_phrase('About Us') }}</p>
                </li>
            </ul>
            <h4 class="fz-56 fw-600 lh-64 text-white">{{ get_phrase('About Us') }} </h4>
        </div>
    </section>
    <!-- End Breadcrumb -->

    <!-- Start About Us -->
    <section class="course-details-wraper pb-120 pt-30">
        <div class="container description-style">
                <div>
                    نحن منصة قرآنية تعليمية رائدة تهدف إلى تعليم القرآن الكريم للطلاب من مختلف الأعمار والمراحل الدراسية، بدءًا من الصفوف الأولى وحتى المراحل المتقدمة، في بيئة تفاعلية آمنة ومشوقة.
                </div>
                <div><br></div>
                <div>
                    نقدم برامج متكاملة تشمل التلاوة، الحفظ، التجويد، التفسير المبسط، والمتابعة الشخصية، بإشراف نخبة من المعلمين والمعلمات المؤهلين في تعليم كتاب الله الكريم للأطفال والناشئة.
                </div>
                <div><br></div><div><br></div><div><br></div>
                <div>
                    نؤمن بأن تعليم القرآن هو رسالة سامية، وأن غرسه في القلوب يجب أن يبدأ مبكرًا ويستمر بأسلوب تربوي متطور يناسب كل فئة عمرية.
                </div>

                <div><br></div>
        </div>
    </section>
    <!-- End About Us -->
@endsection
@push('js')@endpush
