{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- builder identity and builder editable --}}
{{-- builder identity value have to be unique under a single file --}}

@php
    $parent_categories = DB::table('categories')->where('parent_id', 0)->latest('id')->get();
    $current_route = Route::currentRouteName();
@endphp

<!-----------  Header Area Start  ------------->
<header class="header-area">
    <div class="container">
        <div class="row flex-md-nowrap">
            <div class="col-auto">
                <div class="logo-image">
                    <a href="{{ route('home') }}">
                       <h3> <img src="{{ get_image(get_frontend_settings('dark_logo')) }}" alt="system logo" class="object-fit-cover rounded header-dark-logo">  تطوير  </h3>
                        <img src="{{ get_image(get_frontend_settings('light_logo')) }}" alt="system logo" class="object-fit-cover rounded header-light-logo d-none">
                    </a>
                </div>
            </div>
            <div class="col-auto">
                <div class="header-menu d-flex justify-content-end me-lg-auto ms-lg-0 ms-auto mt-2 pt-1">
                    <div class="nav-menu w-100">
                        <ul class="primary-menu main-menu-ul d-flex align-items-center w-100">
                            <li><a href="{{ route('home') }}" class="@if ($current_route == 'home') active @endif">{{ get_phrase('Home') }}</a></li>
                            <li><a href="#" class="@if ($current_route == 'categories') active @endif">{{ get_phrase('Categories') }}</a></li>
                            <li class="have-mega-menu"><a class="menu-parent @if ($current_route == 'courses') active @endif" href="{{ route('courses') }}">{{ get_phrase('Courses') }}</a></li>
                            <li><a href="#" class="@if ($current_route == 'packages') active @endif">{{ get_phrase('Packages') }}</a></li>
                            <li><a href="#" class="@if ($current_route == 'contact_us') active @endif">{{ get_phrase('Contact with Us') }}</a></li>
                            {{-- <li class="have-mega-menu"><a class="menu-parent-a @if ($current_route == 'home') active @endif" href="{{ route('home') }}">{{ get_phrase('Home') }}</a>
                                <ul class="mega-dropdown-menu mega main-mega-menu">
                                    <div class="mega-menu-items">
                                        <ul class="mega_list">
                                            @foreach (App\Models\Builder_page::get() as $home_page)
                                                <li>
                                                    <a href="{{ route('home.switch', ['id' => $home_page->id]) }}">
                                                        <span class="me-3"></span>
                                                        <span class="me-auto">{{ $home_page->name }}</span>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </ul>
                            </li> --}}

                            {{-- <li class="pe-2 ps-5"><a href="{{ route('bootcamps') }}" class="@if ($current_route == 'bootcamps' || $current_route == 'bootcamp.details') active @endif">{{ get_phrase('Bootcamp') }}</a></li> --}}
                            {{-- <li><a href="{{ route('team.packages') }}" class="@if ($current_route == 'team.packages' || $current_route == 'team.package.details') active @endif">{{ get_phrase('Team Training') }}</a></li> --}}
                            {{-- <li><a href="{{ route('tutor_list') }}" class="@if ($current_route == 'tutor_list') active @endif">{{ get_phrase('Find A Tutor') }}</a></li> --}}
                        </ul>
                    </div>
                </div>
            </div>

            <div class="ms-lg-auto col-auto porofile_list">
                <div class="primary-end d-flex align-items-center">
                    @if (isset(auth()->user()->id))
                        <div class="Userprofile me-0 me-md-2 ms-2 ms-md-3 d-none d-lg-inline-block">
                            <button class="us-btn dropdown-toggle py-1" type="button" data-bs-toggle="dropdown" aria-expanded="true">
                                <img class="image-40" src="{{ get_image(Auth()->user()->photo) }}" alt="user-img">
                            </button>
                            <ul class="dropdown-menu dropmenu-end " data-popper-placement="bottom-start">
                                <li class="figure_user d-flex">
                                    <img src="{{ get_image(Auth()->user()->photo) }}" alt="user-img">
                                    <div class="figure_text">
                                        <h4>{{ ucfirst(Auth()->user()->name) }}</h4>
                                        <p>{{ ucfirst(Auth()->user()->role) }}</p>
                                    </div>
                                </li>

                                @if (in_array(auth()->user()->role, ['admin', 'instructor']))
                                    <li>
                                        <a class="dropdown-item" href="{{ route(auth()->user()->role . '.dashboard') }}">
                                            <svg width="8" height="8" viewBox="0 0 8 8" fill="none" id="dashboard-icon" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_975_218)">
                                                    <path
                                                        d="M3 0H1.66667C0.747667 0 0 0.747667 0 1.66667V2.33333C0 2.701 0.299 3 0.666667 3H3C3.36767 3 3.66667 2.701 3.66667 2.33333V0.666667C3.66667 0.299 3.36767 0 3 0ZM0.666667 2.33333V1.66667C0.666667 1.11533 1.11533 0.666667 1.66667 0.666667H3L3.00067 2.33333H0.666667ZM7.33333 5H5C4.63233 5 4.33333 5.299 4.33333 5.66667V7.33333C4.33333 7.701 4.63233 8 5 8H6.33333C7.25233 8 8 7.25233 8 6.33333V5.66667C8 5.299 7.701 5 7.33333 5ZM7.33333 6.33333C7.33333 6.88467 6.88467 7.33333 6.33333 7.33333H5V5.66667H7.33333V6.33333ZM6.33333 0H5C4.63233 0 4.33333 0.299 4.33333 0.666667V3.66667C4.33333 4.03433 4.63233 4.33333 5 4.33333H7.33333C7.701 4.33333 8 4.03433 8 3.66667V1.66667C8 0.747667 7.25233 0 6.33333 0ZM5 3.66667V0.666667H6.33333C6.88467 0.666667 7.33333 1.11533 7.33333 1.66667L7.334 3.66667H5ZM3 3.66667H0.666667C0.299 3.66667 0 3.96567 0 4.33333V6.33333C0 7.25233 0.747667 8 1.66667 8H3C3.36767 8 3.66667 7.701 3.66667 7.33333V4.33333C3.66667 3.96567 3.36767 3.66667 3 3.66667ZM1.66667 7.33333C1.11533 7.33333 0.666667 6.88467 0.666667 6.33333V4.33333H3L3.00067 7.33333H1.66667Z"
                                                        fill="#747579" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_975_218">
                                                        <rect width="8" height="8" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>

                                            {{ get_phrase('Dashboard') }}
                                        </a>
                                    </li>
                                @endif

                                @if (Auth()->user()->role != 'admin')
                                    <li>
                                        <a class="dropdown-item" href="{{ route('my.courses') }}">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M5.4077 21.45C4.87507 21.45 4.42396 21.2652 4.05437 20.8956C3.68479 20.526 3.5 20.0749 3.5 19.5423V4.4077C3.5 3.87507 3.68479 3.42396 4.05437 3.05438C4.42396 2.68479 4.87507 2.5 5.4077 2.5H16.5922C17.1249 2.5 17.576 2.68479 17.9456 3.05438C18.3152 3.42396 18.5 3.87507 18.5 4.4077V10.3923C18.5 10.6051 18.4198 10.7917 18.2595 10.9519C18.0993 11.1122 17.9128 11.1923 17.7 11.1923C17.4871 11.1923 17.3006 11.1122 17.1404 10.9519C16.9801 10.7917 16.9 10.6051 16.9 10.3923V4.4077C16.9 4.33077 16.8679 4.26024 16.8038 4.19613C16.7397 4.13203 16.6692 4.09998 16.5922 4.09998H11.9999V9.8134C11.9999 10.0116 11.9105 10.1589 11.7317 10.2553C11.5529 10.3517 11.3782 10.3448 11.2077 10.2346L9.72497 9.32495L8.2423 10.2346C8.07178 10.3448 7.8971 10.3517 7.71825 10.2553C7.53942 10.1589 7.45 10.0116 7.45 9.8134V4.09998H5.4077C5.33077 4.09998 5.26024 4.13203 5.19612 4.19613C5.13202 4.26024 5.09997 4.33077 5.09997 4.4077V19.5423C5.09997 19.6192 5.13202 19.6897 5.19612 19.7538C5.26024 19.8179 5.33077 19.85 5.4077 19.85H11.0058C11.2186 19.85 11.4051 19.9301 11.5654 20.0904C11.7256 20.2506 11.8057 20.4371 11.8057 20.65C11.8057 20.8628 11.7256 21.0493 11.5654 21.2096C11.4051 21.3698 11.2186 21.45 11.0058 21.45H5.4077ZM17.697 22.3461C16.4336 22.3461 15.3599 21.9031 14.476 21.0171C13.592 20.1312 13.15 19.0565 13.15 17.7931C13.15 16.5297 13.593 15.4561 14.4789 14.5721C15.3649 13.6881 16.4396 13.2462 17.703 13.2462C18.9663 13.2462 20.04 13.6891 20.924 14.5751C21.8079 15.4611 22.2499 16.5358 22.2499 17.7991C22.2499 19.0625 21.8069 20.1362 20.921 21.0201C20.035 21.9041 18.9603 22.3461 17.697 22.3461ZM17.5442 19.3134L19.1788 18.2134C19.3365 18.1198 19.4153 17.9743 19.4153 17.7769C19.4153 17.5794 19.3365 17.4339 19.1788 17.3404L17.5442 16.2404C17.3737 16.1134 17.1974 16.1014 17.0154 16.2043C16.8333 16.3072 16.7423 16.4647 16.7423 16.6769V18.8769C16.7423 19.089 16.8333 19.2466 17.0154 19.3495C17.1974 19.4523 17.3737 19.4403 17.5442 19.3134ZM11.0058 4.09998H5.09997H16.9H11.0058Z"
                                                    fill="#6B7385" />
                                            </svg>
                                            {{ get_phrase('My Courses') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('my.profile') }}">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M12.0008 11.6669C11.0049 11.6669 10.1727 11.3326 9.50391 10.6638C8.83516 9.99507 8.50078 9.16278 8.50078 8.16697C8.50078 7.17113 8.83516 6.33885 9.50391 5.67012C10.1727 5.00137 11.0049 4.66699 12.0008 4.66699C12.9966 4.66699 13.8289 5.00137 14.4976 5.67012C15.1664 6.33885 15.5007 7.17113 15.5007 8.16697C15.5007 9.16278 15.1664 9.99507 14.4976 10.6638C13.8289 11.3326 12.9966 11.6669 12.0008 11.6669ZM17.9565 19.3073H6.04498C5.5957 19.3073 5.21351 19.1497 4.89843 18.8346C4.58333 18.5196 4.42578 18.1374 4.42578 17.6881V17.0092C4.42578 16.5028 4.56296 16.0452 4.83733 15.6362C5.11168 15.2272 5.46864 14.9187 5.90821 14.7106C6.88531 14.2597 7.88924 13.9131 8.92001 13.6708C9.95077 13.4285 10.9777 13.3074 12.0008 13.3074C13.0238 13.3074 14.0549 13.4285 15.094 13.6708C16.1331 13.9131 17.1302 14.2599 18.0854 14.7112C18.5302 14.9189 18.8898 15.2272 19.1642 15.6362C19.4385 16.0452 19.5757 16.5028 19.5757 17.0092V17.6881C19.5757 18.1374 19.4182 18.5196 19.1031 18.8346C18.788 19.1497 18.4058 19.3073 17.9565 19.3073ZM6.02576 17.7073H17.9758V17.0028C17.9758 16.8045 17.9213 16.6275 17.8123 16.4717C17.7033 16.316 17.5565 16.2086 17.3719 16.1496C16.5437 15.7586 15.6652 15.4538 14.7365 15.2352C13.8077 15.0166 12.8958 14.9073 12.0008 14.9073C11.1057 14.9073 10.1938 15.0208 9.26506 15.2477C8.33629 15.4746 7.45781 15.7753 6.62961 16.1496C6.44332 16.2405 6.29611 16.3558 6.18798 16.4957C6.07983 16.6355 6.02576 16.8045 6.02576 17.0028V17.7073ZM12.0008 10.067C12.5508 10.067 13.0049 9.8878 13.3633 9.52947C13.7216 9.17113 13.9008 8.71697 13.9008 8.16697C13.9008 7.61697 13.7216 7.1628 13.3633 6.80447C13.0049 6.44613 12.5508 6.26697 12.0008 6.26697C11.4508 6.26697 10.9966 6.44613 10.6383 6.80447C10.2799 7.1628 10.1008 7.61697 10.1008 8.16697C10.1008 8.71697 10.2799 9.17113 10.6383 9.52947C10.9966 9.8878 11.4508 10.067 12.0008 10.067Z"
                                                    fill="#6B7385" />
                                            </svg>
                                            {{ get_phrase('My Profile') }}
                                        </a>
                                    </li>


                                    {{-- <li>
                                        <a class="dropdown-item" href="{{ route('my.bootcamps') }}" id="bootcamp-icon">
                                            <i class="fi-rr-video-camera text-18px"></i>
                                            {{ get_phrase('My Bootcamps') }}
                                        </a>
                                    </li> --}}
                                    {{-- <li>
                                        <a class="dropdown-item" href="{{ route('my.team.packages') }}" id="team-training-header-menu-icon">
                                            <i class="fi-rr-users-alt text-18px"></i>
                                            {{ get_phrase('My Teams') }}
                                        </a>
                                    </li> --}}


                                    {{-- <li>
                                        <a class="dropdown-item" href="{{ route('wishlist') }}">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.9904 20.9092C11.7763 20.9092 11.5612 20.8707 11.3452 20.7938C11.1291 20.7168 10.9391 20.5963 10.775 20.4322L9.33848 19.1265C7.56539 17.5098 5.98238 15.9217 4.58943 14.3621C3.19648 12.8024 2.5 11.1316 2.5 9.34959C2.5 7.93037 2.97852 6.74224 3.93558 5.78519C4.89263 4.82814 6.08076 4.34961 7.49998 4.34961C8.30638 4.34961 9.10285 4.53551 9.8894 4.90731C10.6759 5.27911 11.3795 5.88296 12 6.71886C12.6205 5.88296 13.324 5.27911 14.1105 4.90731C14.8971 4.53551 15.6936 4.34961 16.5 4.34961C17.9192 4.34961 19.1073 4.82814 20.0644 5.78519C21.0214 6.74224 21.5 7.93037 21.5 9.34959C21.5 11.1509 20.7916 12.8403 19.375 14.4178C17.9583 15.9954 16.3788 17.5701 14.6365 19.1419L13.2154 20.4322C13.0513 20.5963 12.8596 20.7168 12.6404 20.7938C12.4211 20.8707 12.2045 20.9092 11.9904 20.9092ZM11.2808 8.23806C10.7397 7.41369 10.1702 6.80953 9.5721 6.42556C8.97402 6.04158 8.28331 5.84958 7.49998 5.84958C6.49998 5.84958 5.66664 6.18292 4.99998 6.84959C4.33331 7.51625 3.99998 8.34959 3.99998 9.34959C3.99998 10.1522 4.25863 10.9913 4.77593 11.8669C5.29323 12.7425 5.94257 13.613 6.72398 14.4784C7.50539 15.3438 8.35187 16.1893 9.2634 17.0149C10.1749 17.8406 11.0198 18.6079 11.798 19.3169C11.8557 19.3682 11.923 19.3938 12 19.3938C12.0769 19.3938 12.1442 19.3682 12.2019 19.3169C12.9801 18.6079 13.825 17.8406 14.7366 17.0149C15.6481 16.1893 16.4946 15.3438 17.276 14.4784C18.0574 13.613 18.7067 12.7425 19.224 11.8669C19.7413 10.9913 20 10.1522 20 9.34959C20 8.34959 19.6666 7.51625 19 6.84959C18.3333 6.18292 17.5 5.84958 16.5 5.84958C15.7166 5.84958 15.0259 6.04158 14.4279 6.42556C13.8298 6.80953 13.2602 7.41369 12.7192 8.23806C12.6346 8.36626 12.5282 8.46242 12.4 8.52654C12.2718 8.59064 12.1384 8.62269 12 8.62269C11.8615 8.62269 11.7282 8.59064 11.6 8.52654C11.4718 8.46242 11.3654 8.36626 11.2808 8.23806Z"
                                                    fill="#6B7385" />
                                            </svg>
                                            {{ get_phrase('Wishlist') }}
                                        </a>
                                    </li> --}}
                                    <li>
                                        <a class="dropdown-item" href="{{ route('message') }}">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6.89841 14.1503H13.4984C13.6829 14.1503 13.8373 14.0886 13.9618 13.9652C14.0862 13.8418 14.1484 13.6886 14.1484 13.5056C14.1484 13.3226 14.0862 13.1677 13.9618 13.0408C13.8373 12.9138 13.6829 12.8504 13.4984 12.8504H6.89841C6.71393 12.8504 6.55948 12.9121 6.43506 13.0355C6.31065 13.1589 6.24844 13.3121 6.24844 13.4951C6.24844 13.6781 6.31065 13.833 6.43506 13.96C6.55948 14.0869 6.71393 14.1503 6.89841 14.1503ZM6.89841 10.8503H17.0984C17.2829 10.8503 17.4373 10.7886 17.5618 10.6652C17.6862 10.5418 17.7484 10.3886 17.7484 10.2056C17.7484 10.0226 17.6862 9.86768 17.5618 9.74077C17.4373 9.61385 17.2829 9.55039 17.0984 9.55039H6.89841C6.71393 9.55039 6.55948 9.61209 6.43506 9.73549C6.31065 9.85891 6.24844 10.0121 6.24844 10.1951C6.24844 10.3781 6.31065 10.533 6.43506 10.66C6.55948 10.7869 6.71393 10.8503 6.89841 10.8503ZM6.89841 7.55034H17.0984C17.2829 7.55034 17.4373 7.48864 17.5618 7.36524C17.6862 7.24182 17.7484 7.08862 17.7484 6.90564C17.7484 6.72264 17.6862 6.56768 17.5618 6.44077C17.4373 6.31385 17.2829 6.25039 17.0984 6.25039H6.89841C6.71393 6.25039 6.55948 6.31209 6.43506 6.43549C6.31065 6.55891 6.24844 6.71211 6.24844 6.89509C6.24844 7.07809 6.31065 7.23305 6.43506 7.35997C6.55948 7.48688 6.71393 7.55034 6.89841 7.55034ZM6.03689 17.5003L4.26291 19.2743C4.00968 19.5275 3.71896 19.5854 3.39076 19.4478C3.06255 19.3103 2.89844 19.0624 2.89844 18.7042V4.50809C2.89844 4.05796 3.05385 3.67747 3.36469 3.36664C3.67552 3.05581 4.056 2.90039 4.50614 2.90039H19.4907C19.9408 2.90039 20.3213 3.05581 20.6321 3.36664C20.943 3.67747 21.0984 4.05796 21.0984 4.50809V15.8926C21.0984 16.3428 20.943 16.7233 20.6321 17.0341C20.3213 17.3449 19.9408 17.5003 19.4907 17.5003H6.03689ZM4.89076 16.2004H19.4907C19.5676 16.2004 19.6381 16.1683 19.7023 16.1042C19.7664 16.0401 19.7984 15.9696 19.7984 15.8926V4.50809C19.7984 4.43116 19.7664 4.36063 19.7023 4.29652C19.6381 4.23242 19.5676 4.20037 19.4907 4.20037H4.50614C4.4292 4.20037 4.35868 4.23242 4.29456 4.29652C4.23046 4.36063 4.19841 4.43116 4.19841 4.50809V16.8927L4.89076 16.2004Z"
                                                    fill="#6B7385" />
                                            </svg>
                                            {{ get_phrase('Message') }}
                                        </a>
                                    </li>

                                @endif

                                <li>
                                    <a class="dropdown-item mb-0" href="{{ route('logout') }}">
                                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                        {{ get_phrase('Log Out') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="d-none d-lg-inline-block eBtn btn gradient mb-1">{{ get_phrase('Login') }}</a> @endif <span class="toggle-bar
                    text-dark ms-0" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"><i class="fa-sharp fa-solid fa-bars"></i></span>
                </div>
            </div>
        </div>

<!-- Off Canves Menu For Mobile Device-->
<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel"></h5>
    </div>
    <div class="offcanvas-body px-4">
        <div class="off-menu">
            <div class="logo-image d-flex align-items-center justify-content-between mb-4">
                <a href="{{ route('home') }}">
                    <img src="{{ get_image(get_frontend_settings('dark_logo')) }}" alt="system logo">
                </a>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="mt-3 flex-shrink-0">
                <ul class="list-unstyled ps-0">
                    @auth
                        <li>
                            <div class="d-flex align-items-center my-4 mt-5">
                                <img src="{{ get_image(Auth()->user()->photo) }}" alt="user-img" class="image-45">
                                <div class="ms-3 pt-2">
                                    <h3>{{ Auth()->user()->name }}</h3>
                                    <small class="text-muted">{{ Auth()->user()->email }}</small>
                                </div>
                                <a data-bs-toggle="tooltip" title="{{ get_phrase('Logout') }}" class="btn btn-light text-14px me-3 ms-auto" href="{{ route('logout') }}"> <i class="fi-rr-arrow-right-to-bracket"></i> </a>
                            </div>
                        </li>
                        @if (auth()->user() && auth()->user()->role == 'student')
                            @php
                                $numberof_wishlist_item = App\Models\Wishlist::where('user_id', auth()->user()->id)->count();
                            @endphp
                            <li><a href="{{ route('my.courses') }}" class="btn btn-toggle-list d-inline-flex align-items-center text-16px fw-500 w-100 rounded border-0 py-3"> {{ get_phrase('My Courses') }}</a></li>
                            {{-- <li><a href="{{ route('wishlist') }}" class="btn btn-toggle-list d-inline-flex align-items-center text-16px fw-500 w-100 rounded border-0 py-3"> {{ get_phrase('Wishlist') }} <span class="badge bg-pink ms-auto">{{ $numberof_wishlist_item }}</span></a></li> --}}
                            <li><a href="{{ route('my.profile') }}" class="btn btn-toggle-list d-inline-flex align-items-center text-16px fw-500 w-100 rounded border-0 py-3"> {{ get_phrase('My profile') }}</a></li>
                            <li><a href="{{ route('message') }}" class="btn btn-toggle-list d-inline-flex align-items-center text-16px fw-500 w-100 rounded border-0 py-3"> {{ get_phrase('Message') }}</a></li>
                                   @elseif (auth()->user() && auth()->user()->role == 'admin')
                            <li><a href="{{ route('admin.dashboard') }}" class="btn btn-toggle-list d-inline-flex align-items-center text-16px fw-500 w-100 rounded border-0 py-3"> {{ get_phrase('Admin Dashboard') }}</a></li>
                        @endif
                        <li>
                            <hr>
                        </li> @endauth

                    <li><a href="{{ route('home') }}"
                    class="btn btn-toggle-list d-inline-flex align-items-center text-16px fw-500 w-100 rounded border-0 py-3"> {{ get_phrase('Home') }}</a></li>
                    <li>
                        <button class="btn btn-toggle d-inline-flex align-items-center text-16px fw-500 w-100 collapsed rounded border-0 py-3" data-bs-toggle="collapse" data-bs-target="#category-collapse" aria-expanded="false">
                            {{ get_phrase('Courses') }}
                            <span class="icons float-end ms-auto"><i class="fa-solid fa-angle-down"></i></span>
                        </button>
                        <div class="collapse" id="category-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal small bg-white pb-1 pb-3 pt-0">
                                @php
                                    $parent_categories = DB::table('categories')->where('parent_id', 0)->latest('id')->get();
                                @endphp
                                @foreach ($parent_categories->take(30) as $parent_category)
                                    <li>
                                        <a class="w-100 px-3 py-2" href="{{ route('courses', $parent_category->slug) }}">{{ $parent_category->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                    {{-- <li><a href="{{ route('bootcamps') }}" class="btn btn-toggle-list d-inline-flex align-items-center text-16px fw-500 w-100 rounded border-0 py-3">{{ get_phrase('Bootcamp') }}</a></li> --}}
                    {{-- <li><a href="{{ route('team.packages') }}" class="btn btn-toggle-list d-inline-flex align-items-center text-16px fw-500 w-100 rounded border-0 py-3">{{ get_phrase('Team Training') }}</a></li> --}}
                    </ul>
                </div>
                @guest
                    <div class="btn-off">
                        <a href="{{ route('login') }}" class="eBtn btn gradient mb-3">{{ get_phrase('Login') }}</a>
                        <a href="{{ route('register.form') }}" class="eBtn btn gradient sign">{{ get_phrase('Sign Up') }}</a>
                    </div>
                @endguest
            </div>
        </div>
    </div>
    </div>
</header>
<!-----------  Header Area End   ------------->

@push('js')
    <script>
        "use strict";
        $(document).ready(function() {
            $('#lng-selector').change(function(e) {
                e.preventDefault();
                $(this).parent().trigger('submit');
            });
        });
    </script>
@endpush
