@extends('front.layouts.app')
@section('content')
    <!-- Page Title -->
    <div class="page-title-area title-img-one">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="page-title-text">
                    <h2>Our Attorneys</h2>
                    <ul>
                        <li>
                            <a href="{{ route('front.home') }}">Home</a>
                        </li>
                        <li>
                            <i class="icofont-simple-right"></i>
                        </li>
                        <li>Attorneys</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Team -->
    <section class="team-area team-area-two pt-100">
        <div class="container">
            <div class="row justify-content-center">
                @foreach ($teamMembers as $member)
                    <div class="col-sm-6 col-lg-3">
                        <div class="team-item wow fadeInUp" data-wow-delay=".3s">
                            <img src="{{ asset('uploads/users/' . $member->image) }}" alt="T{{ $member->name }}">
                            <div class="team-inner">
                                <ul>
                                    <li>
                                        <a href="{{ $member->facebook }}" target="_blank">
                                            <i class="icofont-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ $member->instagram }}" target="_blank">
                                            <i class="icofont-instagram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ $member->twitter }}" target="_blank">
                                            <i class="icofont-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ $member->linkedin }}" target="_blank">
                                            <i class="icofont-linkedin"></i>
                                        </a>
                                    </li>
                                </ul>
                                <h3>
                                    <a href="#">{{ $member->name }}</a>
                                </h3>
                                <span>{{ $member->designation }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Team -->
@endsection
