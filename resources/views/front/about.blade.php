@extends('front.layouts.app')
@section('content')
    <!-- Page Title -->
    <div class="page-title-area page-title-area-three title-img-one">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="page-title-text">
                    <h2>About Us</h2>
                    <ul>
                        <li>
                            <a href="{{ route('front.home') }}">Home</a>
                        </li>
                        <li>
                            <i class="icofont-simple-right"></i>
                        </li>
                        <li>About Us</li>
                    </ul>
                    <div class="page-title-btn">
                        <a href="testimonial.html">ALL CERTIFICATES
                            <i class="icofont-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Help -->
    <div class="help-area help-area-two help-area-four pb-70">
        <div class="container-fluid">
            @foreach ($home_second_section as $key => $home_second_sections)
                @if ($key % 2 == 0)
                    <!-- Odd index: Image left, content right -->
                    <div class="row align-items-center justify-content-center">
                        <div class="col-lg-6">
                            <div class="help-item help-left">
                                <img src="{{ asset('uploads/first_section/' . $home_second_sections->image) }}"
                                    alt="Help">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="help-item">
                                <div class="help-right">
                                    <h2>{{ $home_second_sections->title }}</h2>
                                    <p>{!! $home_second_sections->description !!}</p>
                                    <div class="help-inner-left">
                                        <ul>
                                            <li><i class="flaticon-checkmark"></i> Browse Our Website</li>
                                            <li><i class="flaticon-checkmark"></i> Choose Services</li>
                                        </ul>
                                    </div>
                                    <div class="help-inner-right">
                                        <ul>
                                            <li><i class="flaticon-checkmark"></i> Quick Reply</li>
                                            <li><i class="flaticon-checkmark"></i> Best Performances</li>
                                        </ul>
                                    </div>
                                    {{-- <div class="help-signature">
                                        <img src="{{ asset('front-assets/assets/img/home-one/4.png') }}" alt="Signature">
                                    </div>
                                    <h3>Barrister Babatunde Smithi</h3>
                                    <span>Founder and CEO</span> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Even index: Content left, image right -->
                    <div class="row align-items-center help-wrap">
                        <div class="col-lg-6">
                            <div class="help-item">
                                <div class="help-right">
                                    <h2>{{ $home_second_sections->title }}</h2>
                                    <p>{!! $home_second_sections->description !!}</p>
                                    <div class="help-inner-left">
                                        <ul>
                                            <li><i class="flaticon-checkmark"></i> On Time Response</li>
                                            <li><i class="flaticon-checkmark"></i> Legal Way</li>
                                        </ul>
                                    </div>
                                    <div class="help-inner-right">
                                        <ul>
                                            <li><i class="flaticon-checkmark"></i> Legal Services</li>
                                            <li><i class="flaticon-checkmark"></i> Honest Work</li>
                                        </ul>
                                    </div>
                                    <a class="cmn-btn" href="{{ route('front.practice') }}">Learn More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="help-item help-left">
                                <img src="{{ asset('uploads/first_section/' . $home_second_sections->image) }}"
                                    alt="Help">
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
            <div class="help-shape">
                <img src="{{ asset('front-assets/assets/img/home-one/6.png') }}" alt="Shape">
            </div>
        </div>
    </div>
    <!-- End Help -->

    <!-- Expertise -->
       <section class="expertise-area expertise-area-two pt-100 pb-70">
        <div class="container">
            <div class="section-title">
                <span>OUR EXPERTISE</span>
                <h2>Committed to Protecting Your Tax Rights</h2>
            </div>
            <div class="row align-items-center justify-content-center">
                @php
                    $chunks = $home_services_section->chunk(3); // Split into columns of 3 items
                @endphp

                @foreach ($chunks as $colIndex => $chunk)
                    <div class="col-lg-6">
                        <div class="expertise-item">
                            <ul>
                                @foreach ($chunk as $key => $service)
                                    <li class="wow fadeInUp" data-wow-delay=".{{ 3 + $key }}s">

                                        <div class="expertise-icon " style="width: 60px; height: 60px;">
                                            {{-- Background image --}}
                                            <img src="{{ asset('front-assets/assets/img/home-one/11.png') }}"
                                                alt="Shape"
                                                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; transform: scale(1.7); z-index: 1;">


                                            {{-- Foreground icon --}}
                                            <img src="{{ asset('uploads/first_section/' . $service->icon) }}"
                                                alt="Icon" width="50px"
                                                style="position: relative; z-index: 2; display: block; margin: auto; top: 5px;"
                                                loading="lazy">
                                        </div>
                                        <h3>{{ $service->title }}</h3>
                                        <p>{!! $service->description !!}</p>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Expertise -->

    <!-- About -->
    {{-- <div class="about-area pt-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="about-item">
                        <div class="about-video-wrap">
                            <div class="about-video">
                                <img src="{{ asset('front-assets/assets/img/about/2.jpg') }}" alt="About">
                            </div>
                            <a href="https://youtu.be/07d2dXHYb94" class="popup-youtube">
                                <i class="icofont-ui-play"></i>
                            </a>
                        </div>
                        <div class="about-content">
                            <h2>Our skills makes us famous</h2>
                            <p>At Musa & Associates, our reputation is built on unmatched legal expertise, strategic
                                thinking, and a deep understanding of tax law. We solve complex problems with precision
                                and earn client trust through consistent, results-driven performance.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-item">
                        <div class="about-information">
                            <h2><span>21 feb 1998,</span> We started our law firm</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices </p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.
                            </p>
                        </div>
                        <div class="about-information">
                            <h2><span>10 March 2000,</span> We started our law firm</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices </p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.
                            </p>
                        </div>
                        <div class="about-information">
                            <h2><span>9 Nov 2000,</span> We started our law firm</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices </p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.
                            </p>
                        </div>
                        <div class="about-information">
                            <h2><span>25 Jan 2010,</span> We started our law firm</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices </p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- End About -->

    <br><br><br><br>
    <br><br><br><br>
@endsection
