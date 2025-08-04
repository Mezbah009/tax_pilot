@extends('front.layouts.app')
@section('content')
    <!-- Page Title -->
    <div class="page-title-area title-img-one">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="page-title-text">
                    <h2>Blog Details</h2>
                    <ul>
                        <li>
                            <a href="{{ route('front.home') }}">Home</a>
                        </li>
                        <li>
                            <i class="icofont-simple-right"></i>
                        </li>
                        <li>Blog Details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Blog Details -->
    <div class="blog-details-area pt-100 pb-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="blog-details-item">
                        <div class="blog-details-img">
                            <img src="{{ asset('uploads/blogs/' . $blog->feature_image) }}" alt="{{ $blog->title }}">
                            <h2>{{ $blog->title }}</h2>
                            <ul>
                                <li>
                                    <i class="icofont-calendar"></i>
                                    <a href="javascript:void(0);">
                                        <time
                                            datetime="{{ $blog->published_at }}">{{ \Carbon\Carbon::parse($blog->published_at)->format('M d, Y') }}</time>
                                    </a>
                                </li>
                                <li>
                                    <i class="icofont-user-alt-7"></i>
                                    <a href="javascript:void(0);">{{ $blog->author->name ?? 'Unknown Author' }}</a>
                                </li>
                                <li>
                                    <i class="icofont-comment"></i>
                                    <a href="javascript:void(0);">{{ $blog->comments->count() }} Comments</a>
                                    {{-- Replace with dynamic comment count if available --}}
                                </li>
                            </ul>
                            <p>{!! $blog->content !!}</p>
                        </div>

                        @php
                            $shareUrl = urlencode(request()->fullUrl());
                            $shareTitle = urlencode($blog->title);
                        @endphp
                        <div class="blog-details-social">
                            <ul>
                                <li>
                                    <span>Share on:</span>
                                </li>
                                <li>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}"
                                        target="_blank">
                                        <i class="icofont-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/intent/tweet?url={{ $shareUrl }}&text={{ $shareTitle }}"
                                        target="_blank">
                                        <i class="icofont-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ $shareUrl }}"
                                        target="_blank">
                                        <i class="icofont-linkedin"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="blog-details-nav">
                            <div class="nav-prev">
                                @if ($previous)
                                    <a href="{{ route('front.blog.details', $previous->slug) }}">
                                        ← Previous: {{ \Illuminate\Support\Str::limit($previous->title, 40) }}
                                    </a>
                                @endif
                            </div>
                            <div class="nav-next">
                                @if ($next)
                                    <a href="{{ route('front.blog.details', $next->slug) }}">
                                        Next: {{ \Illuminate\Support\Str::limit($next->title, 40) }} →
                                    </a>
                                @endif
                            </div>
                        </div>


                        <!-- Blog Comments Section -->
                        <section id="blog-comments" class="blog-details-contact">
                            <div class="container">
                                <h4 class="comments-count" style="color: #000000;">{{ $blog->comments->count() }} Comments
                                </h4>

                                <div style="color: #444444;"> {{-- ✅ Apply text color to included comments --}}
                                    @foreach ($comments as $comment)
                                        @include('partials.comment', ['comment' => $comment])
                                    @endforeach
                                </div>
                            </div>
                        </section>

                        <!-- /Blog Comments Section -->

                        <div class="blog-details-contact">
                            <h2>Drop Your Comment</h2>
                            <div class="contact-form">
                                <!-- Flash Messages -->
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form action="{{ route('blog.comment.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                    <input type="hidden" name="parent_id" id="parent_id" value="">

                                    <h4>Post Comment</h4>
                                    <p>Your email address will not be published. Required fields are marked *</p>
                                    <div class="contact-wrap">
                                        <div class="form-group">
                                            <input type="text" name="name" id="name" class="form-control"
                                                required placeholder="Your Full Name">
                                        </div>

                                        <div class="form-group">
                                            <input type="email" name="email" id="email" class="form-control"
                                                placeholder="Your Email">
                                        </div>

                                        <div class="form-group">
                                            <input name="website" type="text" class="form-control"
                                                placeholder="Your Website">
                                        </div>

                                        <div class="form-group">
                                            <textarea name="comment" class="form-control" id="comment" cols="30" rows="8" required
                                                placeholder="Case Description"></textarea>
                                        </div>

                                        <div class="text-left">
                                            <button type="submit" class="contact-btn">Post A Comment</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="blog-details-item">
                        <div class="blog-details-category">
                            <h3>Category</h3>
                            <ul>
                                @foreach ($categories as $cat)
                                    <li>
                                        <a href="{{ route('front.blog.category', $cat->id) }}">
                                            {{ $cat->name }} <span>({{ $cat->blogs_count }})</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="blog-details-search">
                            <div class="search-area">
                                <form action="{{ route('front.blog.search') }}" method="GET" class="search-area">
                                    <input type="text" name="q" class="form-control" placeholder="Search"
                                        value="{{ request('q') }}">
                                    <button type="submit" class="btn blog-details-btn">
                                        <i class="icofont-search-2"></i>
                                    </button>
                                </form>

                            </div>
                            <h3>Recent Blogs</h3>
                            <ul>
                                @foreach ($recentPosts as $recent)
                                    <li>
                                        <img src="{{ asset('uploads/blogs/' . $recent->feature_image) }}"
                                            alt="{{ $recent->title }}"
                                            style="width: 80px; height: 80px; object-fit: cover; border-radius: 5px;">
                                        <div class="blog-details-recent">
                                            <h4>
                                                <a href="{{ route('front.blog.details', $recent->slug) }}">
                                                    {{ \Illuminate\Support\Str::limit($recent->title, 60) }}
                                                </a>
                                            </h4>
                                            <ul>
                                                <li>
                                                    <i class="icofont-user-alt-7"></i>
                                                    <a
                                                        href="javascript:void(0);">{{ $recent->author->name ?? 'Unknown' }}</a>
                                                </li>
                                                <li>
                                                    <i class="icofont-calendar"></i>
                                                    {{ \Carbon\Carbon::parse($recent->published_at)->format('M d, Y') }}
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>

                        </div>
                        <div class="blog-details-tags">
                            <h3>Tags</h3>
                            <ul>
                                @foreach ($tags as $tag)
                                    <li>
                                        <a href="{{ route('front.blog.tag', $tag->id) }}">{{ $tag->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog Details -->

    <br>
@endsection


@section('scripts')
    <script>
        function setReply(commentId) {
            document.getElementById('parent_id').value = commentId;
            document.getElementById('replying-to').style.display = 'block';
            window.scrollTo({
                top: document.getElementById('comment-form').offsetTop,
                behavior: 'smooth'
            });
        }

        function cancelReply() {
            document.getElementById('parent_id').value = '';
            document.getElementById('replying-to').style.display = 'none';
        }
    </script>
@endsection
