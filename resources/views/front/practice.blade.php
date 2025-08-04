@extends('front.layouts.app')
@section('content')
    <!-- Page Title -->
    <div class="page-title-area title-img-one">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="page-title-text">
                    <h2>Practice</h2>
                    <ul>
                        <li>
                            <a href="{{ route('front.home') }}">Home</a>
                        </li>
                        <li>
                            <i class="icofont-simple-right"></i>
                        </li>
                        <li>Practice</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Practice -->
    <section class="practice-area practice-area-two pt-100 pb-70">
        <div class="container">
            <div class="section-title">
                <span>HOW CAN WE HELP YOU</span>
                <h2>Our Legal Practices Areas</h2>
            </div>
            <div class="row justify-content-center">
                @foreach ($practice as $item)
                    <div class="col-sm-6 col-lg-4">
                        <div class="practice-item">
                            <div class="practice-icon"
                                style="display: flex; align-items: center; justify-content: center; height: 50px;">
                                <img src="{{ asset($item->icon) }}" alt="Icon"
                                    style="max-width: 35px; max-height: 35px; margin-bottom: 10px;">
                            </div>
                            <br>
                            <h3>{{ $item->title }}</h3>
                            <p>{{ $item->excerpt }}</p>
                            <a href="{{ route('front.practice.details', $item->slug) }}">Read More</a>
                            <img class="practice-shape-one" src="{{ asset('front-assets/assets/img/home-one/7.png') }}"
                                alt="Shape">
                            <img class="practice-shape-two" src="{{ asset('front-assets/assets/img/home-one/8.png') }}"
                                alt="Shape">
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- End Practice -->
    <br>

@endsection
