{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- builder identity and builder editable --}}
{{-- builder identity value have to be unique under a single file --}}

@if (get_frontend_settings('recaptcha_status'))
    @push('js')
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    @endpush
@endif

<footer class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">

                <div class="footer-content">

                    <div class="logo-image">
                        <a href="{{ route('home') }}">
                            <h3> <img src="{{ get_image(get_frontend_settings('dark_logo')) }}" alt="system logo" class="object-fit-cover rounded header-dark-logo">  تطوير  </h3>
                            <img src="{{ get_image(get_frontend_settings('light_logo')) }}" alt="system logo" class="object-fit-cover rounded header-light-logo d-none">
                        </a>
                    </div>
                    <p class="description builder-editable" builder-identity="1">{{ get_phrase("It is a long established fact that a reader will be the distract by the read content of a page layout.") }}</p>

                    <ul class="f-socials d-flex">
                        <li><a href="{{ get_frontend_settings('twitter') }}"><i class="fa-brands fa-twitter"></i></a>
                        </li>
                        <li><a href="{{ get_frontend_settings('facebook') }}"><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a href="{{ get_frontend_settings('linkedin') }}"><i class="fa-brands fa-linkedin-in"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-8 col-md-8">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h4>{{ get_phrase('Useful links') }}</h4>
                            <ul>
                                <li><a href="#">{{ get_phrase('Course') }}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="footer-widget">
                            <h4>{{ get_phrase('Company') }}</h4>
                            <ul>
                                <li>
                                    <a href="#">
                                        {{ get_phrase('Phone : ') }}
                                        {{ get_settings('phone') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        {{ get_phrase('Email : ') }}
                                        {{ get_settings('system_email') }}
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
                    <div class="copyright-text text-center" style="display: block !important;">
                        <p class="builder-editable" builder-identity="4">{{ get_phrase("© 2024 All Rights Reserved") }}</p>
                    </div>
        </div>
    </div>

</footer>


@push('js')

    <script>
        "use strict";

        function onNewslaterSubmit(token) {
            document.getElementById("newslater-form").submit();
        }

    </script>
@endpush
