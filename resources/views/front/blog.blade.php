@extends('front.layouts.app')
@section('content')
    <!-- Page Title -->
    <div class="page-title-area title-img-one">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="page-title-text">
                    <h2>Our Blogs</h2>
                    <ul>
                        <li>
                            <a href="{{ route('front.home') }}">Home</a>
                        </li>
                        <li>
                            <i class="icofont-simple-right"></i>
                        </li>
                        <li>Blogs</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Blog -->
    <section class="blog-area blog-area-two pt-100">
        <div class="container">
            <div class="row justify-content-center">
                @forelse($blogs as $blog)
                    <div class="col-sm-6 col-lg-4">
                        <div class="blog-item wow fadeInUp" data-wow-delay=".{{ $loop->index + 3 }}s">
                            <a href="{{ route('front.blog.details', $blog->slug) }}">
                                <img src="{{ asset('uploads/blogs/' . $blog->feature_image) }}" alt="{{ $blog->title }}">
                            </a>
                            <div class="blog-inner">
                                <span>
                                    {{ optional($blog->categories->first())->name ?? 'Uncategorized' }}
                                </span>
                                <h3>
                                    <a href="{{ route('front.blog.details', $blog->slug) }}">
                                        {{ Str::limit($blog->title, 70) }}
                                    </a>
                                </h3>
                                <ul>
                                    <li>
                                        <i class="icofont-calendar"></i>
                                        {{ \Carbon\Carbon::parse($blog->published_at)->format('d M Y') }}
                                    </li>
                                    <li>
                                        <i class="icofont-user-alt-7"></i>
                                        <a href="#">{{ $blog->author->name ?? 'Unknown Author' }}</a>
                                    </li>
                                </ul>
                                <p>{{ Str::limit($blog->excerpt ?? strip_tags($blog->content), 100) }}</p>
                                <a class="blog-link" href="{{ route('front.blog.details', $blog->slug) }}">
                                    Read More
                                    <i class="icofont-simple-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center">No blogs available.</p>
                @endforelse
            </div>

            <div class="case-pagination">
                <ul>
                    {{-- Previous Page Link --}}
                    <li>
                        @if ($blogs->onFirstPage())
                            <span><i class="icofont-simple-left"></i></span>
                        @else
                            <a href="{{ $blogs->previousPageUrl() }}"><i class="icofont-simple-left"></i></a>
                        @endif
                    </li>

                    {{-- Pagination Elements --}}
                    @for ($i = 1; $i <= $blogs->lastPage(); $i++)
                        <li>
                            @if ($i == $blogs->currentPage())
                                <span class="active">{{ $i }}</span>
                            @else
                                <a href="{{ $blogs->url($i) }}">{{ $i }}</a>
                            @endif
                        </li>
                    @endfor

                    {{-- Next Page Link --}}
                    <li>
                        @if ($blogs->hasMorePages())
                            <a href="{{ $blogs->nextPageUrl() }}"><i class="icofont-simple-right"></i></a>
                        @else
                            <span><i class="icofont-simple-right"></i></span>
                        @endif
                    </li>
                </ul>
            </div>

        </div>
    </section>
    <!-- End Blog -->
@endsection
