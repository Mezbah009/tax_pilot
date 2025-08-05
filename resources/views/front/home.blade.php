@extends('front.layouts.app')
@section('content')
    <!-- hero area -->

    @foreach ($home_first_section as $key => $home_first_sections)
    <div class="hero-section hs-3">
        <div class="hero-single">
            <div class="hero-shape-1">
                <img src="{{ asset('uploads/first_section/' . $home_first_sections->logo) }}" alt="">
            </div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-12 col-lg-6">
                        <div class="hero-content">
                            <h6 class="hero-sub-title wow fadeInDown" data-wow-delay=".25s">Award Winning Tax Advisor</h6>
                            <h1 class="hero-title wow fadeInRight" data-wow-delay=".50s">
                                {{ $home_first_sections->title }}
                            </h1>
                            <p class="wow fadeInLeft" data-wow-delay=".75s">
                                {!! $home_first_sections->description !!}
                            </p>
                            <div class="hero-btn wow fadeInUp" data-wow-delay="1s">
                                <a href="about.html" class="theme-btn">About More<i class="fas fa-arrow-right"></i></a>
                                <a href="contact.html" class="theme-btn theme-btn2">Learn More<i
                                        class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="hero-social pa-1 mt-50 wow fadeInUp" data-wow-delay="1.25s">
                            <h6>Follow Us On</h6>
                            <div class="social">
                                <a href="index-3.html#"><i class="fab fa-facebook"></i> Facebook</a>
                                <a href="index-3.html#"><i class="fab fa-x-twitter"></i> Twitter</a>
                                <a href="index-3.html#"><i class="fab fa-instagram"></i> Instagram</a>
                                <a href="index-3.html#"><i class="fab fa-whatsapp"></i> Whatsapp</a>
                                <a href="index-3.html#"><i class="fab fa-linkedin"></i> Linkedin</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <div class="hero-img-wrap wow fadeInRight" data-wow-delay=".25s">
                            <div class="hero-img">
                                <img src="{{ asset('uploads/first_section/' . $home_first_sections->image) }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

     @endforeach
    <!-- hero area end -->


    <!-- feature area -->
    <div class="feature-area pt-80">
        <div class="container">
            <div class="feature-wrap mt-40">
                <div class="row g-4">
                    <div class="col-md-6 col-lg-3">
                        <div class="feature-item wow fadeInUp" data-wow-delay=".25s">
                            <span class="count">01</span>
                            <div class="feature-icon">
                                <img src="{{ asset('front-assets/assets/img/icon/tax-service.svg') }}" alt="">
                            </div>
                            <div class="feature-content">
                                <h4>Best Taxation Service</h4>
                                <p>It is a long established fact that a reader will be distracted by the readable
                                    content of the page looking layout point.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="feature-item wow fadeInDown" data-wow-delay=".25s">
                            <span class="count">02</span>
                            <div class="feature-icon">
                                <img src="{{ asset('front-assets/assets/img/icon/secure-pay.svg') }}" alt="">
                            </div>
                            <div class="feature-content">
                                <h4>Ensure Security</h4>
                                <p>It is a long established fact that a reader will be distracted by the readable
                                    content of the page looking layout point.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="feature-item wow fadeInUp" data-wow-delay=".25s">
                            <span class="count">03</span>
                            <div class="feature-icon">
                                <img src="{{ asset('front-assets/assets/img/icon/team-2.svg') }}" alt="">
                            </div>
                            <div class="feature-content">
                                <h4>Experts Team</h4>
                                <p>It is a long established fact that a reader will be distracted by the readable
                                    content of the page looking layout point.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="feature-item wow fadeInDown" data-wow-delay=".25s">
                            <span class="count">04</span>
                            <div class="feature-icon">
                                <img src="{{ asset('front-assets/assets/img/icon/support.svg') }}" alt="">
                            </div>
                            <div class="feature-content">
                                <h4>24/7 Support</h4>
                                <p>It is a long established fact that a reader will be distracted by the readable
                                    content of the page looking layout point.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- feature area end -->


    <!-- about area -->
    <div class="about-area py-120">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-left wow fadeInLeft" data-wow-delay=".25s">
                        <div class="about-img">
                            <img class="img-1" src="{{ asset('front-assets/assets/img/about/01.jpg') }}" alt="">
                            <img class="img-2" src="{{ asset('front-assets/assets/img/about/02.jpg') }}" alt="">
                            <div class="about-img-shape">
                                <img src="{{ asset('front-assets/assets/img/shape/06.png') }}" alt="">
                            </div>
                        </div>
                        <div class="about-experience">
                            <span>30</span>
                            <h5>Years Of <br> Experience</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-right wow fadeInUp" data-wow-delay=".25s">
                        <div class="site-heading mb-3">
                            <span class="site-title-tagline"><i class="fas fa-percent"></i> About Us</span>
                            <h2 class="site-title">
                                Maximize your tax and savings with us
                            </h2>
                        </div>
                        <p class="about-text">There are many variations of passages available but
                            the majority have suffered alteration in some form, by injected humour, or randomised
                            words which don't look even slightly believable.</p>
                        <div class="about-list-wrap">
                            <ul class="about-list">
                                <li>
                                    <div class="icon">
                                        <img src="{{ asset('front-assets/assets/img/icon/rating-2.svg') }}"
                                            alt="">
                                    </div>
                                    <div class="content">
                                        <h4>Clients Satisfaction</h4>
                                        <p>Take a look at our round up of the best shows.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <img src="{{ asset('front-assets/assets/img/icon/team.svg') }}" alt="">
                                    </div>
                                    <div class="content">
                                        <h4>Professional Team</h4>
                                        <p>It has survived words which not only five centuries.</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <a href="about.html" class="theme-btn">Discover More<i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about area end -->


    <!-- counter area -->
    <div class="counter-area pt-40 pb-40">
        <div class="counter-shape">
            <img class="img-1" src="{{ asset('front-assets/assets/img/shape/04.png') }}" alt="">
            <img class="img-2" src="{{ asset('front-assets/assets/img/shape/05.png') }}" alt="">
        </div>
        <div class="container">
            <div class="row g-4 justify-content-center">
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="counter-box wow fadeInUp" data-wow-delay=".25s">
                        <div class="icon">
                            <img src="{{ asset('front-assets/assets/img/icon/tax.svg') }}" alt="">
                        </div>
                        <div class="content">
                            <div class="info">
                                <span class="counter" data-count="+" data-to="150" data-speed="3000">150</span>
                                <span class="unit">k</span>
                            </div>
                            <h6 class="title">Projects Done</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="counter-box wow fadeInDown" data-wow-delay=".25s">
                        <div class="icon">
                            <img src="{{ asset('front-assets/assets/img/icon/rating.svg') }}" alt="">
                        </div>
                        <div class="content">
                            <div class="info">
                                <span class="counter" data-count="+" data-to="25" data-speed="3000">25</span>
                                <span class="unit">K</span>
                            </div>
                            <h6 class="title">Happy Clients</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="counter-box wow fadeInUp" data-wow-delay=".25s">
                        <div class="icon">
                            <img src="{{ asset('front-assets/assets/img/icon/staff.svg') }}" alt="">
                        </div>
                        <div class="content">
                            <div class="info">
                                <span class="counter" data-count="+" data-to="120" data-speed="3000">120</span>
                                <span class="unit">+</span>
                            </div>
                            <h6 class="title">Experts Staff</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="counter-box wow fadeInDown" data-wow-delay=".25s">
                        <div class="icon">
                            <img src="{{ asset('front-assets/assets/img/icon/award.svg') }}" alt="">
                        </div>
                        <div class="content">
                            <div class="info">
                                <span class="counter" data-count="+" data-to="50" data-speed="3000">50</span>
                                <span class="unit">+</span>
                            </div>
                            <h6 class="title">Win Awards</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- counter area end -->


    <!-- service-area -->
    <div class="service-area bg py-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="site-heading text-center wow fadeInDown" data-wow-delay=".25s">
                        <span class="site-title-tagline light"><i class="fas fa-percent"></i> Our Services</span>
                        <h2 class="site-title">What We Offers To Our <span>Customers</span></h2>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="service-item wow fadeInUp" data-wow-delay=".25s">
                        <div class="service-icon">
                            <img src="{{ asset('front-assets/assets/img/icon/tax-planning.svg') }}" alt="">
                        </div>
                        <div class="service-content">
                            <h3 class="service-title">
                                <a href="service-single.html">Tax Planning</a>
                            </h3>
                            <p class="service-text">
                                There are many variations of the passages available majority have
                                suffered alteration in some.
                            </p>
                            <div class="service-arrow">
                                <a href="service-single.html" class="theme-btn">Read More<i
                                        class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="service-item wow fadeInDown" data-wow-delay=".25s">
                        <div class="service-icon">
                            <img src="{{ asset('front-assets/assets/img/icon/tax-2.svg') }}" alt="">
                        </div>
                        <div class="service-content">
                            <h3 class="service-title">
                                <a href="service-single.html">Personal Tax</a>
                            </h3>
                            <p class="service-text">
                                There are many variations of the passages available majority have
                                suffered alteration in some.
                            </p>
                            <div class="service-arrow">
                                <a href="service-single.html" class="theme-btn">Read More<i
                                        class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="service-item wow fadeInUp" data-wow-delay=".25s">
                        <div class="service-icon">
                            <img src="{{ asset('front-assets/assets/img/icon/tax-3.svg') }}" alt="">
                        </div>
                        <div class="service-content">
                            <h3 class="service-title">
                                <a href="service-single.html">Insurance Tax</a>
                            </h3>
                            <p class="service-text">
                                There are many variations of the passages available majority have
                                suffered alteration in some.
                            </p>
                            <div class="service-arrow">
                                <a href="service-single.html" class="theme-btn">Read More<i
                                        class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="service-item wow fadeInDown" data-wow-delay=".25s">
                        <div class="service-icon">
                            <img src="{{ asset('front-assets/assets/img/icon/tax-4.svg') }}" alt="">
                        </div>
                        <div class="service-content">
                            <h3 class="service-title">
                                <a href="service-single.html">Corporate Tax</a>
                            </h3>
                            <p class="service-text">
                                There are many variations of the passages available majority have
                                suffered alteration in some.
                            </p>
                            <div class="service-arrow">
                                <a href="service-single.html" class="theme-btn">Read More<i
                                        class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service-area -->


    <!-- case study -->
    <div class="case-study py-100">
        <div class="container">
            <div class="row align-items-center wow fadeInDown" data-wow-delay=".25s">
                <div class="col-lg-6">
                    <div class="site-heading">
                        <span class="site-title-tagline"><i class="fas fa-percent"></i> Case Study</span>
                        <h2 class="site-title">Our recent case study</h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="filter-control">
                        <ul class="filter-btn">
                            <li class="active" data-filter="*">All</li>
                            <li data-filter=".cat1">Corporate</li>
                            <li data-filter=".cat2">Personal</li>
                            <li data-filter=".cat3">Advisory</li>
                            <li data-filter=".cat4">Consult</li>
                            <li data-filter=".cat5">Insurance</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row g-4 filter-box popup-gallery wow fadeInUp" data-wow-delay=".25s">
                <div class="col-md-6 col-lg-4 filter-item cat1 cat2">
                    <div class="case-item">
                        <div class="case-img">
                            <a class="popup-img case-link" href="{{ asset('front-assets/assets/img/case/01.jpg') }}"> <i
                                    class="fal fa-plus"></i></a>
                            <img class="img-fluid" src="{{ asset('front-assets/assets/img/case/01.jpg') }}"
                                alt="">
                            <div class="case-btn">
                                <a href="case-study-single.html"><i class="far fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="case-content">
                            <small>Tax Advice</small>
                            <h4><a href="case-study-single.html">Corporate Tax Planning</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 filter-item cat6 cat3">
                    <div class="case-item">
                        <div class="case-img">
                            <a class="popup-img case-link" href="{{ asset('front-assets/assets/img/case/02.jpg') }}"> <i
                                    class="fal fa-plus"></i></a>
                            <img class="img-fluid" src="{{ asset('front-assets/assets/img/case/02.jpg') }}"
                                alt="">
                            <div class="case-btn">
                                <a href="case-study-single.html"><i class="far fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="case-content">
                            <small>Tax Planning</small>
                            <h4><a href="case-study-single.html">Corporate Tax Planning</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 filter-item cat3 cat2">
                    <div class="case-item">
                        <div class="case-img">
                            <a class="popup-img case-link" href="{{ asset('front-assets/assets/img/case/03.jpg') }}"> <i
                                    class="fal fa-plus"></i></a>
                            <img class="img-fluid" src="{{ asset('front-assets/assets/img/case/03.jpg') }}"
                                alt="">
                            <div class="case-btn">
                                <a href="case-study-single.html"><i class="far fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="case-content">
                            <small>Personal Tax</small>
                            <h4><a href="case-study-single.html">Corporate Tax Planning</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 filter-item cat2 cat5">
                    <div class="case-item">
                        <div class="case-img">
                            <a class="popup-img case-link" href="{{ asset('front-assets/assets/img/case/04.jpg') }}"> <i
                                    class="fal fa-plus"></i></a>
                            <img class="img-fluid" src="{{ asset('front-assets/assets/img/case/04.jpg') }}"
                                alt="">
                            <div class="case-btn">
                                <a href="case-study-single.html"><i class="far fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="case-content">
                            <small>Insurance Tax</small>
                            <h4><a href="case-study-single.html">Corporate Tax Planning</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 filter-item cat1 cat4 cat5">
                    <div class="case-item">
                        <div class="case-img">
                            <a class="popup-img case-link" href="{{ asset('front-assets/assets/img/case/05.jpg') }}"> <i
                                    class="fal fa-plus"></i></a>
                            <img class="img-fluid" src="{{ asset('front-assets/assets/img/case/05.jpg') }}"
                                alt="">
                            <div class="case-btn">
                                <a href="case-study-single.html"><i class="far fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="case-content">
                            <small>Corporate Tax</small>
                            <h4><a href="case-study-single.html">Corporate Tax Planning</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 filter-item cat4 cat3">
                    <div class="case-item">
                        <div class="case-img">
                            <a class="popup-img case-link" href="{{ asset('front-assets/assets/img/case/06.jpg') }}"> <i
                                    class="fal fa-plus"></i></a>
                            <img class="img-fluid" src="{{ asset('front-assets/assets/img/case/06.jpg') }}"
                                alt="">
                            <div class="case-btn">
                                <a href="case-study-single.html"><i class="far fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="case-content">
                            <small>Tax Audit</small>
                            <h4><a href="case-study-single.html">Corporate Tax Planning</a></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- case study end -->


    <!-- video area -->
    <div class="video-area">
        <div class="container-fluid px-0">
            <div class="video-content">
                <a class="play-btn popup-youtube" href="https://www.youtube.com/watch?v=ckHzmP1evNU">
                    <i class="fas fa-play"></i>
                </a>
                <div class="video-img"
                    style="background-image: url('{{ asset('front-assets/assets/img/video/01.jpg') }}');">
                    <div class="col-lg-6 mx-auto wow fadeInUp" data-wow-delay=".25s">
                        <div class="video-info">
                            <h1>We deliver expertise and help your business to grow up</h1>
                            <p>There are many variations of passages available but the majority have suffered alteration in
                                some form by injected humour words which don't look even slightly believable.</p>
                            <a href="contact.html" class="theme-btn">Contact Us<i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- video area end -->


    <!-- pricing area -->
    <div class="pricing-area py-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="site-heading text-center wow fadeInDown" data-wow-delay=".25s">
                        <span class="site-title-tagline"><i class="fas fa-percent"></i> Pricing Plan</span>
                        <h2 class="site-title">Let's Check Our <span>Pricing</span> Plan For You</h2>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-md-6 col-lg-4">
                    <div class="pricing-item wow fadeInUp" data-wow-delay=".25s">
                        <div class="pricing-shape">
                            <img src="{{ asset('front-assets/assets/img/shape/08.png') }}" alt="">
                        </div>
                        <div class="pricing-header">
                            <h5>Basic</h5>
                        </div>
                        <div class="pricing-amount">
                            <strong>$359</strong><span class="pricing-amount-type">/Monthly</span>
                        </div>
                        <div class="pricing-btn">
                            <a href="pricing.html" class="theme-btn">Purchase Now <i class="fas fa-arrow-right"></i></a>
                        </div>
                        <div class="pricing-feature">
                            <ul>
                                <li><i class="fas fa-check-circle"></i>IRS Tax Problems</li>
                                <li><i class="fas fa-check-circle"></i>Business Tax Consulting</li>
                                <li><i class="fas fa-check-circle"></i>Tax Preparation and Planning</li>
                                <li><i class="fas fa-check-circle"></i>Tax Payroll Services</li>
                                <li><i class="fas fa-times-circle not-include"></i>Bookkeeping and Virtual CFO</li>
                                <li><i class="fas fa-times-circle not-include"></i>Accounting Virtual Controller</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="pricing-item active wow fadeInDown" data-wow-delay=".25s">
                        <div class="pricing-shape">
                            <img src="{{ asset('front-assets/assets/img/shape/08.png') }}" alt="">
                        </div>
                        <div class="pricing-header">
                            <h5>Standard</h5>
                        </div>
                        <div class="pricing-amount">
                            <strong>$559</strong><span class="pricing-amount-type">/Monthly</span>
                        </div>
                        <div class="pricing-btn">
                            <a href="pricing.html" class="theme-btn">Purchase Now <i class="fas fa-arrow-right"></i></a>
                        </div>
                        <div class="pricing-feature">
                            <ul>
                                <li><i class="fas fa-check-circle"></i>IRS Tax Problems</li>
                                <li><i class="fas fa-check-circle"></i>Business Tax Consulting</li>
                                <li><i class="fas fa-check-circle"></i>Tax Preparation and Planning</li>
                                <li><i class="fas fa-check-circle"></i>Tax Payroll Services</li>
                                <li><i class="fas fa-check-circle"></i>Bookkeeping and Virtual CFO</li>
                                <li><i class="fas fa-times-circle not-include"></i>Accounting Virtual Controller</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="pricing-item wow fadeInUp" data-wow-delay=".25s">
                        <div class="pricing-shape">
                            <img src="{{ asset('front-assets/assets/img/shape/08.png') }}" alt="">
                        </div>
                        <div class="pricing-header">
                            <h5>Premium</h5>
                        </div>
                        <div class="pricing-amount">
                            <strong>$959</strong><span class="pricing-amount-type">/Monthly</span>
                        </div>
                        <div class="pricing-btn">
                            <a href="pricing.html" class="theme-btn">Purchase Now <i class="fas fa-arrow-right"></i></a>
                        </div>
                        <div class="pricing-feature">
                            <ul>
                                <li><i class="fas fa-check-circle"></i>IRS Tax Problems</li>
                                <li><i class="fas fa-check-circle"></i>Business Tax Consulting</li>
                                <li><i class="fas fa-check-circle"></i>Tax Preparation and Planning</li>
                                <li><i class="fas fa-check-circle"></i>Tax Payroll Services</li>
                                <li><i class="fas fa-check-circle"></i>Bookkeeping and Virtual CFO</li>
                                <li><i class="fas fa-check-circle"></i>Accounting Virtual Controller</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- pricing area end -->


    <!-- process area -->
    <div class="process-area">
        <div class="container">
            <div class="process-wrap pt-50 pb-50">
                <div class="process-shape">
                    <img src="{{ asset('front-assets/assets/img/shape/09.png') }}" alt="">
                </div>
                <div class="row">
                    <div class="col-lg-6 mx-auto">
                        <div class="site-heading text-center wow fadeInDown" data-wow-delay=".25s">
                            <span class="site-title-tagline light"><i class="fas fa-percent"></i> Working Process</span>
                            <h2 class="site-title">How Our taxPilot Works</h2>
                        </div>
                    </div>
                </div>
                <div class="row g-4 justify-content-between wow fadeInUp" data-wow-delay=".25s">
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="process-item">
                            <div class="icon">
                                <span>01</span>
                                <img src="{{ asset('front-assets/assets/img/process/01.jpg') }}" alt="">
                            </div>
                            <h4>Choose Your Service</h4>
                            <p>It is a long established fact that readero will be distracted.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="process-item">
                            <div class="icon">
                                <span>02</span>
                                <img src="{{ asset('front-assets/assets/img/process/02.jpg') }}" alt="">
                            </div>
                            <h4>Consult Expert Staff</h4>
                            <p>It is a long established fact that readero will be distracted.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="process-item">
                            <div class="icon">
                                <span>03</span>
                                <img src="{{ asset('front-assets/assets/img/process/03.jpg') }}" alt="">
                            </div>
                            <h4>Strategic Work Planning</h4>
                            <p>It is a long established fact that readero will be distracted.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="process-item">
                            <div class="icon">
                                <span>04</span>
                                <img src="{{ asset('front-assets/assets/img/process/04.jpg') }}" alt="">
                            </div>
                            <h4>Completed Work</h4>
                            <p>It is a long established fact that readero will be distracted.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- process area end -->


    <!-- team-area -->
    <div class="team-area py-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="site-heading text-center wow fadeInDown" data-wow-delay=".25s">
                        <span class="site-title-tagline"><i class="fas fa-percent"></i> Our Team</span>
                        <h2 class="site-title">Meet With Our <span>Experts</span></h2>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="team-item wow fadeInUp" data-wow-delay=".25s">
                        <div class="team-img">
                            <img src="{{ asset('front-assets/assets/img/team/01.jpg') }}" alt="thumb">
                            <div class="team-social-wrap">
                                <div class="team-social-btn">
                                    <button type="button"><i class="far fa-share-alt"></i></button>
                                </div>
                                <div class="team-social">
                                    <a href="index-3.html#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="index-3.html#"><i class="fab fa-x-twitter"></i></a>
                                    <a href="index-3.html#"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="index-3.html#"><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-content">
                            <h4><a href="team.html">Rodrigues Christy</a></h4>
                            <span>Project Manager</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="team-item wow fadeInDown" data-wow-delay=".25s">
                        <div class="team-img">
                            <img src="{{ asset('front-assets/assets/img/team/02.jpg') }}" alt="thumb">
                            <div class="team-social-wrap">
                                <div class="team-social-btn">
                                    <button type="button"><i class="far fa-share-alt"></i></button>
                                </div>
                                <div class="team-social">
                                    <a href="index-3.html#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="index-3.html#"><i class="fab fa-x-twitter"></i></a>
                                    <a href="index-3.html#"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="index-3.html#"><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-content">
                            <h4><a href="team.html">Matthew Hong</a></h4>
                            <span>CEO And Founder</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="team-item wow fadeInUp" data-wow-delay=".25s">
                        <div class="team-img">
                            <img src="{{ asset('front-assets/assets/img/team/03.jpg') }}" alt="thumb">
                            <div class="team-social-wrap">
                                <div class="team-social-btn">
                                    <button type="button"><i class="far fa-share-alt"></i></button>
                                </div>
                                <div class="team-social">
                                    <a href="index-3.html#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="index-3.html#"><i class="fab fa-x-twitter"></i></a>
                                    <a href="index-3.html#"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="index-3.html#"><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-content">
                            <h4><a href="team.html">Beverly Dyer</a></h4>
                            <span>Tax Advisor</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="team-item wow fadeInDown" data-wow-delay=".25s">
                        <div class="team-img">
                            <img src="{{ asset('front-assets/assets/img/team/04.jpg') }}" alt="thumb">
                            <div class="team-social-wrap">
                                <div class="team-social-btn">
                                    <button type="button"><i class="far fa-share-alt"></i></button>
                                </div>
                                <div class="team-social">
                                    <a href="index-3.html#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="index-3.html#"><i class="fab fa-x-twitter"></i></a>
                                    <a href="index-3.html#"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="index-3.html#"><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-content">
                            <h4><a href="team.html">Anita Bentley</a></h4>
                            <span>Tax Advisor</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- team-area end -->


    <!-- quote-area -->
    <div class="quote-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 ms-auto">
                    <div class="quote-content">
                        <div class="quote-head">
                            <h3>Get Your Quote</h3>
                            <p>It is a long established fact that a reader will be distracted by the
                                readable content of majority have suffered alteration page when looking at its layout.</p>
                        </div>
                        <div class="quote-form">
                            <form action="index-3.html#">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="far fa-user-tie"></i></span>
                                            <input type="text" class="form-control" placeholder="Your Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="far fa-envelope"></i></span>
                                            <input type="email" class="form-control" placeholder="Your Email">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="far fa-phone"></i></span>
                                            <input type="text" class="form-control" placeholder="Your Phone">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="far fa-box"></i></span>
                                            <select class="select form-select form-control">
                                                <option value="">Choose Service</option>
                                                <option value="1">Tax Planning</option>
                                                <option value="2">Personal Tax</option>
                                                <option value="3">Insurance Tax</option>
                                                <option value="4">Corporate Tax</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="input-group textarea">
                                            <span class="input-group-text"><i class="far fa-comment-lines"></i></span>
                                            <textarea class="form-control" cols="30" rows="4" placeholder="Your Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <button type="submit" class="theme-btn">Submit Now<i
                                                class="fas fa-arrow-right"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- quote-area end -->


    <!-- choose area -->
    <div class="choose-area py-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="choose-content wow fadeInUp" data-wow-delay=".25s">
                        <div class="site-heading mb-0">
                            <span class="site-title-tagline"><i class="fas fa-percent"></i> Why Choose Us</span>
                            <h2 class="site-title">We deliver expertise you can trust our <span>service</span></h2>
                            <p>
                                It is a long established fact that a reader will be distracted by the readable
                                content of a page when looking at its layout.
                            </p>
                        </div>
                        <div class="choose-content-wrap">
                            <div class="choose-item">
                                <div class="choose-item-icon">
                                    <img src="{{ asset('front-assets/assets/img/icon/money.svg') }}" alt="">
                                </div>
                                <div class="choose-item-info">
                                    <h4>Affordable Cost</h4>
                                    <p>There are many variations of passages available the majority have suffered alteration
                                        in some by injected humour.</p>
                                </div>
                            </div>
                            <div class="choose-item">
                                <div class="choose-item-icon">
                                    <img src="{{ asset('front-assets/assets/img/icon/investment.svg') }}" alt="">
                                </div>
                                <div class="choose-item-info">
                                    <h4>Client Investment</h4>
                                    <p>There are many variations of passages available the majority have suffered alteration
                                        in some by injected humour.</p>
                                </div>
                            </div>
                            <div class="choose-item">
                                <div class="choose-item-icon">
                                    <img src="{{ asset('front-assets/assets/img/icon/money-2.svg') }}" alt="">
                                </div>
                                <div class="choose-item-info">
                                    <h4>Save Your Money</h4>
                                    <p>There are many variations of passages available the majority have suffered alteration
                                        in some by injected humour.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="choose-img wow fadeInRight" data-wow-delay=".25s">
                        <img class="img-1" src="{{ asset('front-assets/assets/img/choose/01.jpg') }}" alt="">
                        <img class="img-2" src="{{ asset('front-assets/assets/img/choose/02.jpg') }}" alt="">
                        <img class="img-shape" src="{{ asset('front-assets/assets/img/shape/10.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- choose area end -->


    <!-- cta area -->
    <div class="cta-area" style="background-image: url({{ asset('front-assets/assets/img/cta/01.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="cta-content wow fadeInUp" data-wow-delay=".25s">
                        <h1>Maximize your potential with expert consultation</h1>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page
                            when looking at its layout.</p>
                        <a href="contact.html" class="theme-btn">Contact Now<i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- cta area end -->


    <!-- testimonial-area -->
    <div class="testimonial-area bg py-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="site-heading wow fadeInDown" data-wow-delay=".25s">
                        <span class="site-title-tagline light"><i class="fas fa-percent"></i> Testimonials</span>
                        <h2 class="site-title">What Our Client <span>Say's</span> about us</h2>
                        <p>
                            It is a long established fact that a reader will be distracted by the readable content
                            of a page when looking at its layout. All the generators on the Internet tend to repeat
                            predefined chunks.
                        </p>
                        <a href="contact.html" class="theme-btn mt-30">Know More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="testimonial-slider owl-carousel owl-theme wow fadeInUp" data-wow-delay=".25s">
                        <div class="testimonial-item">
                            <div class="testimonial-quote">
                                <span class="testimonial-quote-icon"><i class="fal fa-quote-right"></i></span>
                                <p>
                                    There are many variations of passages of Lorem Ipsum available, but the majority have
                                    suffered alteration in some form, by injected humour.
                                </p>
                            </div>
                            <div class="testimonial-content">
                                <div class="testimonial-author-img">
                                    <img src="{{ asset('front-assets/assets/img/testimonial/01.jpg') }}" alt="">
                                </div>
                                <div class="testimonial-author-info">
                                    <h4>Niesha Phips</h4>
                                    <p>Customer</p>
                                    <div class="testimonial-rate">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-item">
                            <div class="testimonial-quote">
                                <span class="testimonial-quote-icon"><i class="fal fa-quote-right"></i></span>
                                <p>
                                    There are many variations of passages of Lorem Ipsum available, but the majority have
                                    suffered alteration in some form, by injected humour.
                                </p>
                            </div>
                            <div class="testimonial-content">
                                <div class="testimonial-author-img">
                                    <img src="{{ asset('front-assets/assets/img/testimonial/02.jpg') }}" alt="">
                                </div>
                                <div class="testimonial-author-info">
                                    <h4>Daniel Porter</h4>
                                    <p>Customer</p>
                                    <div class="testimonial-rate">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-item">
                            <div class="testimonial-quote">
                                <span class="testimonial-quote-icon"><i class="fal fa-quote-right"></i></span>
                                <p>
                                    There are many variations of passages of Lorem Ipsum available, but the majority have
                                    suffered alteration in some form, by injected humour.
                                </p>
                            </div>
                            <div class="testimonial-content">
                                <div class="testimonial-author-img">
                                    <img src="{{ asset('front-assets/assets/img/testimonial/03.jpg') }}" alt="">
                                </div>
                                <div class="testimonial-author-info">
                                    <h4>Ebony Swihart</h4>
                                    <p>Customer</p>
                                    <div class="testimonial-rate">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-item">
                            <div class="testimonial-quote">
                                <span class="testimonial-quote-icon"><i class="fal fa-quote-right"></i></span>
                                <p>
                                    There are many variations of passages of Lorem Ipsum available, but the majority have
                                    suffered alteration in some form, by injected humour.
                                </p>
                            </div>
                            <div class="testimonial-content">
                                <div class="testimonial-author-img">
                                    <img src="{{ asset('front-assets/assets/img/testimonial/04.jpg') }}" alt="">
                                </div>
                                <div class="testimonial-author-info">
                                    <h4>Loreta Jones</h4>
                                    <p>Customer</p>
                                    <div class="testimonial-rate">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- testimonial-area end -->


    <!-- blog-area -->
    <div class="blog-area py-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="site-heading text-center wow fadeInDown" data-wow-delay=".25s">
                        <span class="site-title-tagline"><i class="fas fa-percent"></i> Our Blog</span>
                        <h2 class="site-title">Our Latest News & <span>Blog</span></h2>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="blog-item wow fadeInUp" data-wow-delay=".25s">
                        <div class="blog-item-img">
                            <img src="{{ asset('front-assets/assets/img/blog/01.jpg') }}" alt="Thumb">
                            <div class="blog-date">
                                <strong>20</strong>
                                <span>May</span>
                            </div>
                        </div>
                        <div class="blog-item-info">
                            <div class="blog-item-meta">
                                <ul>
                                    <li><a href="index-3.html#"><i class="far fa-user-circle"></i> By Alicia Davis</a>
                                    </li>
                                    <li><a href="index-3.html#"><i class="far fa-comments"></i> 2.5k Comments</a></li>
                                </ul>
                            </div>
                            <h4 class="blog-title">
                                <a href="blog-single.html">There are many variations of passages orem available.</a>
                            </h4>
                            <p>
                                It is a long established fact that a reader will be distracted by the readable.
                            </p>
                            <a class="theme-btn" href="blog-single.html">Read More<i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="blog-item wow fadeInDown" data-wow-delay=".25s">
                        <div class="blog-item-img">
                            <img src="{{ asset('front-assets/assets/img/blog/02.jpg') }}" alt="Thumb">
                            <div class="blog-date">
                                <strong>25</strong>
                                <span>May</span>
                            </div>
                        </div>
                        <div class="blog-item-info">
                            <div class="blog-item-meta">
                                <ul>
                                    <li><a href="index-3.html#"><i class="far fa-user-circle"></i> By Alicia Davis</a>
                                    </li>
                                    <li><a href="index-3.html#"><i class="far fa-comments"></i> 1.2k Comments</a></li>
                                </ul>
                            </div>
                            <h4 class="blog-title">
                                <a href="blog-single.html">Generators internet tend word chunk repeat necessary.</a>
                            </h4>
                            <p>
                                It is a long established fact that a reader will be distracted by the readable.
                            </p>
                            <a class="theme-btn" href="blog-single.html">Read More<i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="blog-item wow fadeInUp" data-wow-delay=".25s">
                        <div class="blog-item-img">
                            <img src="{{ asset('front-assets/assets/img/blog/03.jpg') }}" alt="Thumb">
                            <div class="blog-date">
                                <strong>28</strong>
                                <span>May</span>
                            </div>
                        </div>
                        <div class="blog-item-info">
                            <div class="blog-item-meta">
                                <ul>
                                    <li><a href="index-3.html#"><i class="far fa-user-circle"></i> By Alicia Davis</a>
                                    </li>
                                    <li><a href="index-3.html#"><i class="far fa-comments"></i> 2.8k Comments</a></li>
                                </ul>
                            </div>
                            <h4 class="blog-title">
                                <a href="blog-single.html">Survived only five centuries but also the leap into.</a>
                            </h4>
                            <p>
                                It is a long established fact that a reader will be distracted by the readable.
                            </p>
                            <a class="theme-btn" href="blog-single.html">Read More<i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- blog-area end -->


    <!-- partner area -->
    <div class="partner-area bg pt-60 pb-60">
        <div class="container">
            <div class="partner-wrapper partner-slider owl-carousel owl-theme">
                <img src="{{ asset('front-assets/assets/img/partner/01.png') }}" alt="thumb">
                <img src="{{ asset('front-assets/assets/img/partner/02.png') }}" alt="thumb">
                <img src="{{ asset('front-assets/assets/img/partner/03.png') }}" alt="thumb">
                <img src="{{ asset('front-assets/assets/img/partner/04.png') }}" alt="thumb">
                <img src="{{ asset('front-assets/assets/img/partner/05.png') }}" alt="thumb">
                <img src="{{ asset('front-assets/assets/img/partner/06.png') }}" alt="thumb">
                <img src="{{ asset('front-assets/assets/img/partner/03.png') }}" alt="thumb">
            </div>
        </div>
    </div>
    <!-- partner area end -->
@endsection
