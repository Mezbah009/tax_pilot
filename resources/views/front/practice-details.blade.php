@extends('front.layouts.app')
@section('content')
    <!-- Page Title -->
    <div class="page-title-area title-img-one">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="page-title-text">
                    <h2>Practice Details</h2>
                    <ul>
                        <li>
                            <a href="{{ route('front.home') }}">Home</a>
                        </li>
                        <li>
                            <i class="icofont-simple-right"></i>
                        </li>
                        <li>Practice Details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Practice Details -->
    <div class="practice-details-area pt-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="practice-details-item">
                        <div class="practice-details-content">
                            <img src="{{ asset($practice->feature_image) }}" alt="{{ $practice->title }}"
                                style="width: 100%; max-height: 400px; object-fit: cover;">
                            <div class="section-title text-left mt-4">
                                <h2>{{ $practice->title }}</h2>
                            </div>
                            <div>
                                {!! $practice->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="help-shape">
            <img src="assets/img/home-one/6.png" alt="Shape">
        </div>
    </div>
    <!-- End Practice Details -->
@endsection
