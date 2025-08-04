@extends('front.layouts.app')
@section('content')
    <!-- Page Title -->
    <div class="page-title-area page-title-area-two title-img-one">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="page-title-text">
                    <h2>Contact Us</h2>
                    <ul>
                        <li>
                            <a href="{{ route('front.home') }}">Home</a>
                        </li>
                        <li>
                            <i class="icofont-simple-right"></i>
                        </li>
                        <li>Contact Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Contact Form -->
    <div class="contact-form contact-form-four pb-100">
        <!-- Location -->
        <div class="loaction-area">
            <div class="container">
                <div class="row location-bg">
                    <!-- Location (static) -->
                    <div class="col-sm-6 col-lg-4">
                        <div class="location-item">
                            <div class="location-icon">
                                <i class="flaticon-pin"></i>
                            </div>
                            <h3>Location</h3>
                            <ul>
                                @foreach ($numbers as $item)
                                    @if ($item->address)
                                        <li>
                                            <a href="https://www.google.com/maps/search/{{ urlencode($item->address) }}"
                                                target="_blank">
                                                {{ $item->address }}
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- Phone (dynamic) -->
                    <div class="col-sm-6 col-lg-4">
                        <div class="location-item">
                            <div class="location-icon">
                                <i class="flaticon-call"></i>
                            </div>
                            <h3>Phone</h3>
                            <ul>
                                @foreach ($numbers as $item)
                                    @if ($item->phone)
                                        <li><a href="tel:{{ $item->phone }}">{{ $item->phone }}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- Email (dynamic) -->
                    <div class="col-sm-6 col-lg-4">
                        <div class="location-item">
                            <div class="location-icon">
                                <i class="flaticon-email"></i>
                            </div>
                            <h3>Email</h3>
                            <ul>
                                @foreach ($numbers as $item)
                                    @if ($item->email)
                                        <li><a href="mailto:{{ $item->email }}">{{ $item->email }}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- End Location -->


        <div class="container-fluid">
            @if (session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif

            <form id="contactForm" method="POST" action="{{ route('store.contact.form') }}">
                @csrf
                <div class="row contact-wrap">
                    <div class="col-sm-6 col-lg-6">
                        <div class="form-group">
                            <input type="text" name="name" id="name" class="form-control" required
                                data-error="Please enter your name" placeholder="Your Full Name">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-6">
                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control" required
                                data-error="Please enter your email" placeholder="Your Email">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <!-- ✅ CHANGED name from phone_number to phone -->
                    <div class="col-sm-6 col-lg-6">
                        <div class="form-group">
                            <input type="text" name="phone" id="phone_number" required
                                data-error="Please enter your number" class="form-control" placeholder="Your Phone">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <!-- ✅ CHANGED name from msg_subject to subject -->
                    <div class="col-sm-6 col-lg-6">
                        <div class="form-group">
                            <input type="text" name="subject" id="msg_subject" class="form-control" required
                                data-error="Please enter your subject" placeholder="Subject">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <textarea name="message" class="form-control" id="message" cols="30" rows="8" required
                                data-error="Write your message" placeholder="Case Description"></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-check agree-label">
                            <input name="gridCheck" value="1" class="form-check-input" type="checkbox" id="gridCheck"
                                required>
                            <label class="form-check-label" for="gridCheck">
                                Accept <a href="https://templates.hibootstrap.com/lyzo/default/terms-condition.html">Terms &
                                    Conditions</a> And <a href="privacy-policy.html">Privacy Policy.</a>
                            </label>
                            <div class="help-block with-errors gridCheck-error"></div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-12">
                        <div class="text-center">
                            <button type="submit" class="contact-btn">Submit Case</button>
                        </div>
                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <!-- End Contact Form -->
    <br>

    <!-- Start Map Area -->
    <div class="map-area">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22528.9295167153!2d90.38169536762919!3d23.745565488734634!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8f360385db5%3A0xa115112c746430a9!2sOpus%20Technology%20Limited!5e0!3m2!1sen!2snp!4v1751345050607!5m2!1sen!2snp"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <!-- End Map Area -->
@endsection
