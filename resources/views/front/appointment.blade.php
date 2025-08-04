@extends('front.layouts.app')
@section('content')
    <!-- Page Title -->
    <div class="page-title-area title-img-one">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="page-title-text">
                    <h2>Appointment</h2>
                    <ul>
                        <li>
                            <a href="{{ route('front.home') }}">Home</a>
                        </li>
                        <li>
                            <i class="icofont-simple-right"></i>
                        </li>
                        <li>Appointment</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Team -->
    {{-- <section class="team-area team-area-three pt-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-6 col-lg-4">
                        <div class="team-item wow fadeInUp" data-wow-delay=".3s">
                            <img src="{{ asset('front-assets/assets/img/home-one/team/1.jpg') }}" alt="Team">
                            <div class="team-inner">
                                <ul>
                                    <li>
                                        <a href="https://www.facebook.com/" target="_blank">
                                            <i class="icofont-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.instagram.com/" target="_blank">
                                            <i class="icofont-instagram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.twitter.com/" target="_blank">
                                            <i class="icofont-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.linkedin.com/" target="_blank">
                                            <i class="icofont-linkedin"></i>
                                        </a>
                                    </li>
                                </ul>
                                <h3>
                                    <a href="attorney-details.html">Attor. Jerry Hudson</a>
                                </h3>
                                <span>Family Consultant</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="team-item wow fadeInUp" data-wow-delay=".4s">
                            <img src="{{ asset('front-assets/assets/img/home-one/team/2.jpg') }}" alt="Team">
                            <div class="team-inner">
                                <ul>
                                    <li>
                                        <a href="https://www.facebook.com/" target="_blank">
                                            <i class="icofont-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.instagram.com/" target="_blank">
                                            <i class="icofont-instagram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.twitter.com/" target="_blank">
                                            <i class="icofont-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.linkedin.com/" target="_blank">
                                            <i class="icofont-linkedin"></i>
                                        </a>
                                    </li>
                                </ul>
                                <h3>
                                    <a href="attorney-details.html">Attor. Juho Hudson</a>
                                </h3>
                                <span>Criminal Consultant</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6   col-lg-4">
                        <div class="team-item wow fadeInUp" data-wow-delay=".5s">
                            <img src="{{ asset('front-assets/assets/img/home-one/team/3.jpg') }}" alt="Team">
                            <div class="team-inner">
                                <ul>
                                    <li>
                                        <a href="https://www.facebook.com/" target="_blank">
                                            <i class="icofont-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.instagram.com/" target="_blank">
                                            <i class="icofont-instagram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.twitter.com/" target="_blank">
                                            <i class="icofont-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.linkedin.com/" target="_blank">
                                            <i class="icofont-linkedin"></i>
                                        </a>
                                    </li>
                                </ul>
                                <h3>
                                    <a href="attorney-details.html">Attor. Sarah Se</a>
                                </h3>
                                <span>Divorce Consultant</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
    <!-- End Team -->

    <br><br>

    <!-- Contact Form -->
<div class="contact-form contact-form-two contact-form-three">
    <div class="container">
        <div class="contact-wrap">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form id="contactForm" method="POST" action="{{ route('store.contact.form') }}">
                @csrf
                <h2>Get An Appointment</h2>
                <div class="row justify-content-center">

                    {{-- Name --}}
                    <div class="col-sm-6 col-lg-6">
                        <div class="form-group">
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}"
                                placeholder="Your Full Name" required>
                            @error('name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="col-sm-6 col-lg-6">
                        <div class="form-group">
                            <input type="email" name="email" id="email"
                                class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}"
                                placeholder="Your Email" required>
                            @error('email')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Phone --}}
                    <div class="col-sm-6 col-lg-6">
                        <div class="form-group">
                            <input type="text" name="phone" id="phone"
                                class="form-control @error('phone') is-invalid @enderror"
                                value="{{ old('phone') }}"
                                placeholder="Your Phone" required>
                            @error('phone')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Subject --}}
                    <div class="col-sm-6 col-lg-6">
                        <div class="form-group">
                            <input type="text" name="subject" id="subject"
                                class="form-control @error('subject') is-invalid @enderror"
                                value="{{ old('subject') }}"
                                placeholder="Subject" required>
                            @error('subject')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Message --}}
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <textarea name="message" id="message"
                                class="form-control @error('message') is-invalid @enderror"
                                rows="8" placeholder="Description" required>{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Terms & Conditions Checkbox --}}
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="form-check agree-label">
                                <input type="checkbox"
                                    name="gridCheck"
                                    id="gridCheck"
                                    value="1"
                                    class="form-check-input @error('gridCheck') is-invalid @enderror"
                                    required>
                                <label class="form-check-label" for="gridCheck">
                                    Accept <a href="#">Terms & Conditions</a> and <a href="privacy-policy.html">Privacy Policy</a>.
                                </label>
                                @error('gridCheck')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Submit --}}
                    <div class="col-md-12">
                        <div class="text-center">
                            <button type="submit" class="contact-btn">Submit Appointment</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

    <!-- End Contact Form -->
@endsection

<script>
    $("#contactForm").submit(function (e) {
        e.preventDefault();

        $.ajax({
            url: "{{ route('store.contact.form') }}", // ✅ Laravel route
            method: "POST",
            data: $(this).serialize(),
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function (response) {
                alert("Your message has been sent. Thank you!");
                $('#contactForm')[0].reset();
            },
            error: function (xhr) {
                alert("Something went wrong. Please check your input.");
            }
        });
    });
</script>

