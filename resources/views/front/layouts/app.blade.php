<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Dynamic Title -->
    <title>
        @hasSection('meta_title')
            @yield('meta_title') | {{ siteSetting()->site_title ?? 'Musa & Associates' }}
        @else
            {{ siteSetting()->site_title ?? 'Musa & Associates' }}
        @endif
    </title>

    <!-- Meta Description -->
    <meta name="description" content="@yield('meta_description', siteSetting()->meta_description ?? '')">

    <!-- Meta Keywords -->
    <meta name="keywords" content="@yield('meta_keywords', siteSetting()->meta_keywords ?? '')">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('front-assets/assets/css/bootstrap.min.css') }}">
    <!-- Meanmenu CSS -->
    <link rel="stylesheet" href="{{ asset('front-assets/assets/css/meanmenu.css') }}">
    <!-- Icofont CSS -->
    <link rel="stylesheet" href="{{ asset('front-assets/assets/css/icofont.min.css') }}">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{ asset('front-assets/assets/css/nice-select.min.css') }}">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('front-assets/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/assets/css/owl.theme.default.min.css') }}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{ asset('front-assets/assets/css/magnific-popup.min.css') }}">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('front-assets/assets/fonts/flaticon.css') }}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('front-assets/assets/css/animate.min.css') }}">
    <!-- Odometer CSS -->
    <link rel="stylesheet" href="{{ asset('front-assets/assets/css/odometer.min.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('front-assets/assets/css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('front-assets/assets/css/responsive.css') }}">
    <!-- Theme Dark CSS -->
    <link rel="stylesheet" href="{{ asset('front-assets/assets/css/theme-dark.css') }}">

    <title>
        {{ siteSetting() && siteSetting()->site_title ? siteSetting()->site_title : 'Musa & Associates - Expert Tax Law Solutions for Businesses' }}
    </title>


    <link rel="icon" type="image/png"
        href="{{ siteSetting() && siteSetting()->favicon ? asset('uploads/favicon/' . siteSetting()->favicon) : asset('front-assets/assets/img/favicon.png') }}">

</head>

<body>

    <!-- Preloader -->
    <div class="loader">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="sk-folding-cube">
                    <div class="sk-cube1 sk-cube"></div>
                    <div class="sk-cube2 sk-cube"></div>
                    <div class="sk-cube4 sk-cube"></div>
                    <div class="sk-cube3 sk-cube"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Preloader -->

    <!-- Navbar -->
    <div class="navbar-area fixed-top">
        <!-- Menu For Mobile Device -->
        <div class="mobile-nav">
            <a href="{{ route('front.home') }}" class="logo">
                <img src="{{ siteSetting() && siteSetting()->logo ? asset('uploads/logo/' . siteSetting()->logo) : asset('') }}"
                    alt="logo" class="img-fluid">
            </a>
        </div>

        <!-- Menu For Desktop Device -->
        <div class="main-nav">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" href="{{ route('front.home') }}">
                        <img src="{{ siteSetting() && siteSetting()->logo ? asset('uploads/logo/' . siteSetting()->logo) : asset('') }}"
                            alt="logo" class="img-fluid">
                    </a>
                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="{{ route('front.home') }}"
                                    class="nav-link {{ Route::is('front.home') ? 'active' : '' }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('front.about') }}"
                                    class="nav-link {{ Route::is('front.about') ? 'active' : '' }}">About</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('front.practice') }}"
                                    class="nav-link {{ Route::is('front.practice') ? 'active' : '' }}">Practice</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('front.attorneys') }}"
                                    class="nav-link {{ Route::is('front.attorneys') ? 'active' : '' }}">Attorneys</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('front.case_study') }}"
                                    class="nav-link {{ Route::is('front.case_study') ? 'active' : '' }}">Case
                                    Studies</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('front.blog') }}"
                                    class="nav-link {{ Route::is('front.blog') ? 'active' : '' }}">Blogs</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('front.contact') }}"
                                    class="nav-link {{ Route::is('front.contact') ? 'active' : '' }}">Contact</a>
                            </li>
                        </ul>

                        <div class="side-nav">
                            <a href="{{ route('front.appointment') }}">Get Appointment</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- End Navbar -->

    <main>

        @yield('content')
        @yield('scripts')


    </main>

    <!-- Footer -->
    <footer>

        <!-- Newsletter -->
        <div class="newsletter-area">
            <div class="container">
                <img src="{{ asset('front-assets/assets/img/home-one/newsletter.png') }}" alt="Shape">
                <h2>Subscribe Newsletter</h2>

                <!-- Added method, action, csrf, and fixed input name -->
                <form class="laravel-newsletter-form" id="laravel-newsletter-form" method="POST" action="{{ route('newsletter.subscribe') }}">
                    @csrf
                    <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                    <button type="submit" class="btn contact-btn">Subscribe</button>

                    @if ($errors->any())
                        <div class="alert alert-danger mt-2">{{ $errors->first('email') }}</div>
                    @endif

                    @if (session('newsletter_success'))
                        <div class="alert alert-success mt-2">{{ session('newsletter_success') }}</div>
                    @endif
                </form>

            </div>
        </div>

        <!-- End Newsletter -->

        <div class="container">
            <div class="row justify-content-center">
     @foreach (footer()['contacts'] as $contact)
            <div class="col-sm-6 col-lg-5">
                <div class="footer-item">
                    <div class="footer-logo">
                        <a href="{{ url('/') }}">
                            <img src="{{ siteSetting() && siteSetting()->logo ? asset('uploads/logo/' . siteSetting()->logo) : asset('default-logo.png') }}"
                                 alt="logo" class="img-fluid">
                        </a>
                        <p>
                            We provide expert tax law services to help businesses stay compliant, reduce liabilities,
                            and grow confidently. From tax planning to dispute resolution, our legal team is here to
                            protect your interests.
                        </p>
                        <ul>
                            @if($contact->youtube)
                                <li>
                                    <a href="{{ $contact->youtube }}" target="_blank">
                                        <i class="icofont-youtube-play"></i>
                                    </a>
                                </li>
                            @endif
                            @if($contact->facebook)
                                <li>
                                    <a href="{{ $contact->facebook }}" target="_blank">
                                        <i class="icofont-facebook"></i>
                                    </a>
                                </li>
                            @endif
                            @if($contact->linkedIn)
                                <li>
                                    <a href="{{ $contact->linkedIn }}" target="_blank">
                                        <i class="icofont-linkedin"></i>
                                    </a>
                                </li>
                            @endif
                            @if($contact->website)
                                <li>
                                    <a href="{{ $contact->website }}" target="_blank">
                                        <i class="icofont-twitter"></i>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach

                <div class="col-sm-6 col-lg-3">
                    <div class="footer-item">
                        <div class="footer-service">
                            <h3>Quick Links</h3>
                            <ul>
                                <li>
                                    <a href="{{ route('front.home') }}">
                                        <i class="icofont-simple-right"></i>
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('front.about') }}">
                                        <i class="icofont-simple-right"></i>
                                        About Us
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('front.practice') }}">
                                        <i class="icofont-simple-right"></i>
                                        Practice
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('front.attorneys') }}">
                                        <i class="icofont-simple-right"></i>
                                        Attorneys
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('front.case_study') }}">
                                        <i class="icofont-simple-right"></i>
                                        Case Studies
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="footer-item">
                        <div class="footer-find">
                            <h3>Find Us</h3>
                            <ul>
                                @foreach (numbers() as $item)
                                    @if ($item->address)
                                        <li>
                                            <i class="icofont-location-pin"></i>
                                            {{ $item->address }}
                                        </li>
                                    @endif

                                    @if ($item->phone)
                                        <li>
                                            <i class="icofont-ui-call"></i>
                                            <a href="tel:{{ $item->phone }}">{{ $item->phone }}</a>
                                        </li>
                                    @endif

                                    @if ($item->email)
                                        <li>
                                            <i class="icofont-email"></i>
                                            <a href="mailto:{{ $item->email }}">{{ $item->email }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            <div class="copyright-area">
                <div class="row justify-content-center">
                    <div class="col-sm-7 col-lg-6">
                        <div class="copyright-item">
                            <p>© Copyright {{ siteSetting()->copyright_text ?? '' }} Designed by
                                <a href="https://opus-bd.com/" target="_blank">Opus Technology Limited</a>
                            </p>

                        </div>
                    </div>
                    <div class="col-sm-5 col-lg-6">
                        <div class="copyright-item copyright-right">
                            <a href="terms-conditions.html" target="_blank">Terms & Conditions</a> <span>-</span>
                            <a href="privacy-policy.html" target="_blank">Privacy Policy</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->


    <!-- Essential JS -->
    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{ asset('front-assets/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('front-assets/assets/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Meanmenu JS -->
    <script src="{{ asset('front-assets/assets/js/jquery.meanmenu.js') }}"></script>
    <!-- Nice Select JS -->
    <script src="{{ asset('front-assets/assets/js/jquery.nice-select.min.js') }}"></script>
    <!-- Form Ajaxchimp JS -->
    <script src="{{ asset('front-assets/assets/js/jquery.ajaxchimp.min.js') }}"></script>
    <!-- Form Validator JS -->
    <script src="{{ asset('front-assets/assets/js/form-validator.min.js') }}"></script>
    <!-- Contact JS -->
    {{-- <script src="{{ asset('front-assets/assets/js/contact-form-script.js') }}"></script> --}}
    <!-- Owl Carousel JS -->
    <script src="{{ asset('front-assets/assets/js/owl.carousel.min.js') }}"></script>
    <!-- Odometer JS -->
    <script src="{{ asset('front-assets/assets/js/odometer.min.js') }}"></script>
    <script src="{{ asset('front-assets/assets/js/jquery.appear.min.js') }}"></script>
    <!-- Magnific Popup JS -->
    <script src="{{ asset('front-assets/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Wow JS -->
    <script src="{{ asset('front-assets/assets/js/wow.min.js') }}"></script>
    <!-- Custom JS -->
    <script src="{{ asset('front-assets/assets/js/custom.js') }}"></script>

</body>

</html>
