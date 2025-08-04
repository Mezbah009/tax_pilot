@extends('front.layouts.app')
@section('content')
    <!-- Page Title -->
    <div class="page-title-area title-img-one">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="page-title-text">
                    <h2>Case Studies</h2>
                    <ul>
                        <li>
                            <a href="{{ route('front.home') }}">Home</a>
                        </li>
                        <li>
                            <i class="icofont-simple-right"></i>
                        </li>
                        <li>Case Studies</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- portfolio -->
    <section class="portfolio-area portfolio-area-two pt-100">
        <div class="container">
            <div class="section-title">
                <h2>Check Out Our Popular Case Studies.</h2>
            </div>
            <div class="row justify-content-center">
                @foreach ($caseStudy as $case)
                    <div class="col-sm-6 col-lg-4">
                        <div class="portfolio-item wow fadeInUp" data-wow-delay=".3s">
                            <img src="{{ asset('uploads/casestudies/' . $case->image) }}" loading="lazy"
                                alt="{{ $case->title }}" alt="{{ $case->title }}">
                            <div class="portfolio-inner">
                                {{-- <span>Crime</span> --}}
                                <h3>
                                    <a
                                        href="{{ route('front.showCaseStudy', ['slug' => $case->slug]) }}">{{ $case->title }}</a>
                                </h3>
                                <p>{{ $case->excerpt }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            @if ($caseStudy->lastPage() > 1)
                <div class="case-pagination">
                    <ul>
                        {{-- Previous Page Link --}}
                        <li>
                            <a href="{{ $caseStudy->previousPageUrl() ?? '#' }}"
                                class="{{ $caseStudy->onFirstPage() ? 'disabled' : '' }}">
                                <i class="icofont-simple-left"></i>
                            </a>
                        </li>

                        {{-- Page Numbers --}}
                        @for ($i = 1; $i <= $caseStudy->lastPage(); $i++)
                            <li>
                                <a href="{{ $caseStudy->url($i) }}"
                                    class="{{ $caseStudy->currentPage() == $i ? 'active' : '' }}">
                                    {{ $i }}
                                </a>
                            </li>
                        @endfor

                        {{-- Next Page Link --}}
                        <li>
                            <a href="{{ $caseStudy->nextPageUrl() ?? '#' }}"
                                class="{{ $caseStudy->currentPage() == $caseStudy->lastPage() ? 'disabled' : '' }}">
                                <i class="icofont-simple-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            @endif

        </div>
    </section>
    <!-- End portfolio -->
@endsection
