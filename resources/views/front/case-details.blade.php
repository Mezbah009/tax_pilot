@extends('front.layouts.app')
@section('content')
    <!-- Page Title -->
    <div class="page-title-area title-img-one">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="page-title-text">
                    <h2>Case Studies Details</h2>
                    <ul>
                        <li>
                            <a href="{{ route('front.home') }}">Home</a>
                        </li>
                        <li>
                            <i class="icofont-simple-right"></i>
                        </li>
                        <li>Money Loundering</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Case Details Img -->
    <div class="case-details-img pt-100 pb-70">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-12">
                    <div class="case-details-item">
                        <img src="{{ asset('uploads/casestudies/' . $caseStudyPost->image) }}"
                            alt="{{ $caseStudyPost->title }}" loading="lazy"
                            style="width: 100%; height: auto; max-height: 400px; object-fit: cover; border-radius: 8px;">

                    </div>
                    <div class="case-details-item">
                        <h3>{{ $caseStudyPost->title }}</h3>
                        <p>{!! $caseStudyPost->description !!}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Case Details Img -->
    <br>
    <br>

    <!-- Case Details Tab -->
    {{-- <div class="case-details-tab">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-6">
                        <div class="case-details-tab-item">
                            <h2>Our study process for this case</h2>
                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" href="case-study-details.html#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Challenge</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" href="case-study-details.html#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Solution</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" href="case-study-details.html#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Result</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane active fade show" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <h3>One problem of criminal activities is accounting for the
                                        proceeds without raising the suspicion of law
                                        enforcement agencies</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <h3>Now a days criminality is at the top amongst college and university going students.</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                </div>
                                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                    <h3>A criminal case, in common law jurisdictions, begins when a person suspected of a crime.</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="case-details-tab-item">
                            <div class="case-details-tab-img">
                                <img src="assets/img/home-one/10.png" alt="Case">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    <!-- End Case Details Tab -->
@endsection
