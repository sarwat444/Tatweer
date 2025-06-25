@extends('layouts.' . get_frontend_settings('theme'))
@push('title', get_phrase('Sign Up'))
@push('meta')@endpush
@push('css')
    <style>
        .form-icons .right {
            right: 20px;
            cursor: pointer !important;
        }
        .login-img img
        {
            height: auto;
        }
    </style>
@endpush
@section('content')
@php
    $categories  = App\Models\Category::ALL();
@endphp
    <section class="login-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-5">
                    <div class="login-img">
                        <img src="{{ asset('assets/frontend/' . get_frontend_settings('theme') . '/image/signup.gif') }}" alt="register-banner">
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">
                    <form action="{{ route('register') }}" class="global-form login-form mt-25" id="login-form" method="post" enctype="multipart/form-data">
                        @csrf
                        <h4 class="g-title">{{ get_phrase('Sign Up') }}</h4>
                        <p class="description">{{ get_phrase('See your growth and get consulting support! ') }}</p>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="" class="form-label">{{ get_phrase('Name') }}</label>
                                <input type="text" name="name" class="form-control" placeholder="{{ get_phrase('Name') }}">
                                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="phone" class="form-label">{{ get_phrase('Phone Number') }}</label>
                                <input type="text" name="phone" id="phone" class="form-control" placeholder="{{ get_phrase('Phone Number') }}">
                                @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="address" class="form-label">{{ get_phrase('Address') }}</label>
                                <input type="text" name="address" id="address" class="form-control" placeholder="{{ get_phrase('Address') }}">
                                @error('address') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="photo" class="form-label">{{ get_phrase('User image') }}</label>
                                <input type="file" name="photo" class="form-control ol-form-control" id="photo">
                                @error('photo') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="email" class="form-label">{{ get_phrase('Email') }}</label>
                                <input type="email" name="email" class="form-control" placeholder="{{ get_phrase('Email') }}">
                                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="password" class="form-label">{{ get_phrase('Password') }}</label>
                                <input type="password" name="password" class="form-control" placeholder="*********">
                                @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label">{{ get_phrase('User Type') }}</label>
                                <select name="user_type" id="user_type" class="form-control">
                                    <option value="">{{ get_phrase('User Type') }}</option>
                                    <option value="student">{{ get_phrase('Student') }}</option>
                                    <option value="instructor">{{ get_phrase('instructor') }}</option>
                                    <option value="institution">{{ get_phrase('Educational Institution') }}</option>
                                </select>
                            </div>

                            {{-- Student - Educational Stage --}}
                            <div class="col-md-6 mb-4 d-none" id="student_stage">
                                <label class="form-label">{{ get_phrase('Educational Stage') }}</label>
                                <select name="educational_stage" class="form-control">
                                    <option value="">{{ get_phrase('Select Stage') }}</option>
                                    <option value="primary">{{ get_phrase('Primary') }}</option>
                                    <option value="preparatory">{{ get_phrase('Preparatory') }}</option>
                                    <option value="secondary">{{ get_phrase('Secondary') }}</option>
                                </select>
                            </div>

                            {{-- instructor Type --}}
                            <div class="col-md-6 mb-4 d-none" id="instructor_type_wrap">
                                <label class="form-label">{{ get_phrase('instructor Type') }}</label>
                                <select name="instructor_type" id="instructor_type" class="form-control">
                                    <option value="">{{ get_phrase('Select Type') }}</option>
                                    <option value="general">{{ get_phrase('General Educational') }}</option>
                                    <option value="academic">{{ get_phrase('Academic') }}</option>
                                    <option value="advanced">{{ get_phrase('Advanced') }}</option>
                                </select>
                            </div>

                            {{-- instructor Subject --}}
                            <div class="col-md-6 mb-4 d-none" id="instructor_subject_wrap">
                                <label class="form-label">{{ get_phrase('Subject Specialization') }}</label>
                                <input type="text" name="subject_specialization" class="form-control" placeholder="{{ get_phrase('Enter Subject') }}">
                            </div>

                            {{-- Institution Info --}}
                            <div class="col-md-6 mb-4 d-none" id="institution_name_wrap">
                                <label class="form-label">{{ get_phrase('Institution Name') }}</label>
                                <input type="text" name="institution_name" class="form-control" placeholder="{{ get_phrase('Enter Institution Name') }}">
                            </div>

                            <div class="col-md-6 mb-4 d-none" id="institution_type_wrap">
                                <label class="form-label">{{ get_phrase('Institution Type') }}</label>
                                <select name="institution_type" class="form-control">
                                    <option value="">{{ get_phrase('Select Type') }}</option>
                                    <option value="school">{{ get_phrase('School') }}</option>
                                    <option value="institute">{{ get_phrase('Institute') }}</option>
                                </select>
                            </div>
                        </div>
                        @if(get_frontend_settings('recaptcha_status'))
                            <button class="eBtn gradient w-100 g-recaptcha" data-sitekey="{{ get_frontend_settings('recaptcha_sitekey') }}" data-callback='onLoginSubmit' data-action='submit'>{{ get_phrase('Sign Up') }}</button>
                        @else
                            <button type="submit" class="eBtn gradient w-100">{{ get_phrase('Sign Up') }}</button>
                        @endif

                        <p class="mt-20">{{ get_phrase('Already have account.') }} <a href="{{ route('login') }}">{{ get_phrase('Sign in') }}</a></p>
                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script>
        "use strict";

        $(document).ready(function() {
            $('#showpassword').on('click', function(e) {
                e.preventDefault();
                const type = $('#password').attr('type');

                if (type == 'password') {
                    $('#password').attr('type', 'text');
                } else {
                    $('#password').attr('type', 'password');
                }
            });
        });

        $(document).ready(function() {
            $('#showcpassword').on('click', function(e) {
                e.preventDefault();
                const type = $('#cpassword').attr('type');

                if (type == 'password') {
                    $('#cpassword').attr('type', 'text');
                } else {
                    $('#cpassword').attr('type', 'password');
                }
            });
        });

        function onLoginSubmit(token) {
            document.getElementById("login-form").submit();
        }

    </script>
    <script>
        $(document).ready(function() {
            $('#user_type').on('change', function() {
                let type = $(this).val();

                // Hide and reset all optional fields
                $('#student_stage').addClass('d-none').find('select').val('');
                $('#instructor_type_wrap').addClass('d-none').find('select').val('');
                $('#instructor_subject_wrap').addClass('d-none').find('input').val('');
                $('#institution_name_wrap').addClass('d-none').find('input').val('');
                $('#institution_type_wrap').addClass('d-none').find('select').val('');

                if (type === 'student') {
                    $('#student_stage').removeClass('d-none');
                }

                if (type === 'instructor') {
                    $('#instructor_type_wrap').removeClass('d-none');
                }

                if (type === 'institution') {
                    $('#institution_name_wrap, #institution_type_wrap').removeClass('d-none');
                }
            });

            $('#instructor_type').on('change', function() {
                let instructorType = $(this).val();

                if (instructorType === 'general' || instructorType === 'academic' || instructorType === 'advanced') {
                    $('#instructor_subject_wrap').removeClass('d-none');
                } else {
                    $('#instructor_subject_wrap').addClass('d-none').find('input').val('');
                }
            });
        });
    </script>
@endpush
