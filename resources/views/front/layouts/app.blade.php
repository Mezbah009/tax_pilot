<!DOCTYPE html>
<html lang="en">

<head>
    <!-- meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- title -->
    <title>Taxrio - Tax Advisor & Consulting HTML5 Template</title>

    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/logo/favicon.png">

    <!-- css -->
    <link rel="stylesheet" href="{{ asset('front-assets/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/assets/css/all-fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/assets/css/magnific-popup.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/assets/css/nice-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/assets/css/style.css') }}">

</head>

<body class="home-3">

    <!-- preloader -->
    <div class="preloader">
        <div class="loader-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- preloader end -->


    <!-- header area -->
    <header class="header">
        <!-- navbar -->
        <div class="main-navigation">
            <nav class="navbar navbar-expand-lg">
                <div class="container position-relative">
                    <a class="navbar-brand" href="index.html">
                        <img src="{{ asset('front-assets/assets/img/logo/logo-light.png') }}" class="logo-display" alt="logo">
                        <img src="{{ asset('front-assets/assets/img/logo/logo.png') }}" class="logo-scrolled" alt="logo">
                    </a>
                    <div class="mobile-menu-right">
                        <div class="search-btn">
                            <button type="button" class="nav-right-link search-box-outer"><i class="far fa-search"></i></button>
                        </div>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#main_nav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-mobile-icon"><i class="far fa-bars"></i></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="main_nav">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle active" href="index-3.html#" data-bs-toggle="dropdown">Home</a>
                                {{-- <ul class="dropdown-menu fade-down">
                                    <li><a class="dropdown-item" href="index.html">Home Page 01</a></li>
                                    <li><a class="dropdown-item" href="index-2.html">Home Page 02</a></li>
                                    <li><a class="dropdown-item" href="index-3.html">Home Page 03</a></li>
                                    <li><a class="dropdown-item" href="index-4.html">Home Page 04</a></li>
                                    <li><a class="dropdown-item" href="index-5.html">Home Page 05</a></li>
                                </ul>
                            </li> --}}
                            <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="index-3.html#">Services</a>
                                <ul class="dropdown-menu fade-down">
                                    <li><a class="dropdown-item" href="service.html">Services One</a></li>
                                    <li><a class="dropdown-item" href="service-2.html">Services Two</a></li>
                                    <li><a class="dropdown-item" href="service-single.html">Service Single</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="index-3.html#" data-bs-toggle="dropdown">Pages</a>
                                <ul class="dropdown-menu fade-down">
                                    <li><a class="dropdown-item" href="about.html">About Us</a></li>
                                    <li><a class="dropdown-item" href="team.html">Our Team</a></li>
                                    <li class="dropdown-submenu">
                                        <a class="dropdown-item dropdown-toggle" href="index-3.html#">Authentication</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="login.html">Login</a></li>
                                            <li><a class="dropdown-item" href="register.html">Register</a></li>
                                            <li><a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a class="dropdown-item dropdown-toggle" href="index-3.html#">Extra Pages</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="404.html">404 Error</a></li>
                                            <li><a class="dropdown-item" href="coming-soon.html">Coming Soon</a></li>
                                            <li><a class="dropdown-item" href="terms.html">Terms Of Service</a></li>
                                            <li><a class="dropdown-item" href="privacy.html">Privacy Policy</a></li>
                                        </ul>
                                    </li>
                                    <li><a class="dropdown-item" href="contact.html">Contact Us</a></li>
                                    <li><a class="dropdown-item" href="gallery.html">Gallery</a></li>
                                    <li><a class="dropdown-item" href="pricing.html">Pricing Plan</a></li>
                                    <li><a class="dropdown-item" href="faq.html">Faq's</a></li>
                                    <li><a class="dropdown-item" href="testimonial.html">Testimonials</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="index-3.html#" data-bs-toggle="dropdown">Case Study</a>
                                <ul class="dropdown-menu fade-down">
                                    <li><a class="dropdown-item" href="case-study.html">Case Study</a></li>
                                    <li><a class="dropdown-item" href="case-study-single.html">Case Study Single</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="index-3.html#" data-bs-toggle="dropdown">Blog</a>
                                <ul class="dropdown-menu fade-down">
                                    <li><a class="dropdown-item" href="blog.html">Blog</a></li>
                                    <li><a class="dropdown-item" href="blog-single.html">Blog Single</a></li>
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                        </ul>
                        <div class="nav-right">
                            <div class="search-btn">
                                <button type="button" class="nav-right-link search-box-outer"><i class="far fa-search"></i></button>
                            </div>
                            <div class="nav-right-btn">
                                <a href="https://taxpilot.opuserp.com/tax/register-personal" class="theme-btn">Get Started<i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- navbar end -->
    </header>
    <!-- header area end -->


    <!-- popup search -->
    <div class="search-popup">
        <button class="close-search"><span class="far fa-times"></span></button>
        <form action="index-3.html#">
            <div class="form-group">
                <input type="search" name="search-field" class="form-control" placeholder="Search Here..." required>
                <button type="submit"><i class="far fa-search"></i></button>
            </div>
        </form>
    </div>
    <!-- popup search end -->

    <main>

        @yield('content')
        @yield('scripts')


    </main>

       <!-- footer area -->
    <footer class="footer-area footer-bg">
        <div class="footer-widget">
            <div class="container">
                <div class="footer-widget-wrap pt-100 pb-70">
                    <div class="row g-5">
                        <div class="col-md-6 col-lg-5">
                            <div class="footer-widget-box about-us">
                                <a href="index-3.html#" class="footer-logo">
                                    <img src="{{ asset('front-assets/assets/img/logo/logo-light.png') }}" alt="">
                                </a>
                                <p class="mb-4">
                                    We are many variations of passages available but the majority have suffered alteration
                                    in some form by injected humour words believable.
                                </p>
                                <div class="footer-newsletter">
                                    <h6>Subscribe Our Newsletter</h6>
                                    <div class="subscribe-form">
                                        <form action="index-3.html#">
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="Your Email">
                                                <button class="theme-btn" type="submit">
                                                    Subscribe <i class="far fa-paper-plane"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-2">
                            <div class="footer-widget-box list">
                                <h4 class="footer-widget-title">Company</h4>
                                <ul class="footer-list">
                                    <li><a href="about.html"><i class="far fa-arrow-right"></i>About Us</a></li>
                                    <li><a href="blog.html"><i class="far fa-arrow-right"></i>Update News</a></li>
                                    <li><a href="contact.html"><i class="far fa-arrow-right"></i>Contact Us</a></li>
                                    <li><a href="testimonial.html"><i class="far fa-arrow-right"></i>Testimonials</a></li>
                                    <li><a href="terms.html"><i class="far fa-arrow-right"></i>Terms Of Service</a></li>
                                    <li><a href="privacy.html"><i class="far fa-arrow-right"></i>Privacy policy</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-2">
                            <div class="footer-widget-box list">
                                <h4 class="footer-widget-title">Services</h4>
                                <ul class="footer-list">
                                    <li><a href="service.html"><i class="far fa-arrow-right"></i>Tax Planning</a></li>
                                    <li><a href="service.html"><i class="far fa-arrow-right"></i>Personal Tax</a></li>
                                    <li><a href="service.html"><i class="far fa-arrow-right"></i>Insurance Tax</a></li>
                                    <li><a href="service.html"><i class="far fa-arrow-right"></i>Tax Audit Support</a></li>
                                    <li><a href="service.html"><i class="far fa-arrow-right"></i>Corporate Tax</a></li>
                                    <li><a href="service.html"><i class="far fa-arrow-right"></i>Tax Advisory</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="footer-widget-box">
                                <h4 class="footer-widget-title">Get In Touch</h4>
                                <ul class="footer-contact">
                                    <li>
                                        <div class="icon">
                                            <i class="far fa-location-dot"></i>
                                        </div>
                                        <div class="content">
                                            <h6>Our Address</h6>
                                            <p>25/B Milford Road, New York, USA</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <i class="far fa-phone"></i>
                                        </div>
                                        <div class="content">
                                            <h6>Call Us</h6>
                                            <a href="tel:+21236547898">+2 123 654 7898</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <i class="far fa-envelope"></i>
                                        </div>
                                        <div class="content">
                                            <h6>Mail Us</h6>
                                            <a href="https://live.themewild.com/cdn-cgi/l/email-protection#4b22252d240b2e332a263b272e65282426"><span class="__cf_email__" data-cfemail="b6dfd8d0d9f6d3ced7dbc6dad398d5d9db">[email&#160;protected]</span></a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 align-self-center">
                        <p class="copyright-text">
                            &copy; Copyright <span id="date"></span> <a href="index-3.html#"> Taxrio </a> All Rights Reserved.
                        </p>
                    </div>
                    <div class="col-md-6 align-self-center">
                        <ul class="footer-social">
                            <li><a href="index-3.html#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="index-3.html#"><i class="fab fa-x-twitter"></i></a></li>
                            <li><a href="index-3.html#"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="index-3.html#"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer area end -->


    <!-- scroll-top -->
    <a href="index-3.html#" id="scroll-top"><i class="far fa-arrow-up"></i></a>
    <!-- scroll-top end -->


    <!-- js -->
    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="{{ asset('front-assets/assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('front-assets/assets/js/modernizr.min.js') }}"></script>
    <script src="{{ asset('front-assets/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('front-assets/assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('front-assets/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('front-assets/assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('front-assets/assets/js/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('front-assets/assets/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('front-assets/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('front-assets/assets/js/counter-up.js') }}"></script>
    <script src="{{ asset('front-assets/assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('front-assets/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('front-assets/assets/js/main.js') }}"></script>

</body>

</html>
