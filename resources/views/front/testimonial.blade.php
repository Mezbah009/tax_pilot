@extends('front.layouts.app')
@section('content')


    <!-- Page Title -->
    <div class="page-title-area title-img-one">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="page-title-text">
                    <h2>Testimonial</h2>
                    <ul>
                        <li>
                            <a href="{{ route('front.home') }}">Home</a>
                        </li>
                        <li>
                            <i class="icofont-simple-right"></i>
                        </li>
                        <li>Testimonial</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Testimonial -->
    <div class="testimonial-area pt-100">
        <div class="container">
            <div class="row justify-content-center">
                @foreach ($testimonials as $testimonial)
                    <div class="col-sm-6 col-lg-4">
                        <div class="testimonial-item">
                            <div class="testimonial-wrap">
                                <p>{{ $testimonial->description }}</p>
                                <img src="{{ asset('uploads/testimonials/' . $testimonial->logo) }}" alt="Testimonial">
                                <div class="testimonial-right">
                                    <h3>{{ $testimonial->name }}</h3>
                                    <span>{{ $testimonial->designation }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- <div class="testimonial-more">
                <a class="cmn-btn" href="{{ route('front.testimonial') }}">See More</a>
            </div> --}}
        </div>
    </div>
    <!-- End Testimonial -->
