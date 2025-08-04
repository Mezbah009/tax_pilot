@extends('front.layouts.app')
@section('content')

 <!-- Page Title -->
        <div class="page-title-area title-img-one">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="page-title-text">
                        <h2>Attorney Details</h2>
                        <ul>
                            <li>
                                <a href="{{ route('front.home') }}">Home</a>
                            </li>
                            <li>
                                <i class="icofont-simple-right"></i>
                            </li>
                            <li>Attorney Details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Attorney Details -->
        <div class="attorney-details pt-100 pb-70">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-5">
                        <div class="attor-details-item">
                            <img src="{{ asset('front-assets/assets/img/attorney-details/1.jpg') }}" alt="Details">
                            <div class="attor-details-left">
                                <div class="attor-social">
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
                                </div>
                                <div class="attor-social-details">
                                    <h3>Contact info</h3>
                                    <ul>
                                        <li>
                                            <i class="flaticon-call"></i>
                                            <a href="tel:+07554332322">
                                                Call : +07 554 332 322
                                            </a>
                                        </li>
                                        <li>
                                            <i class="flaticon-email"></i>
                                            <a href="https://templates.hibootstrap.com/cdn-cgi/l/email-protection#2f474a4343406f43565540014c4042">
                                                <span class="__cf_email__" data-cfemail="7a121f1616153a1603001554191517">[email&#160;protected]</span>
                                            </a>
                                        </li>
                                        <li>
                                            <i class="flaticon-pin"></i>
                                            4th Floor, 408 No Chamber
                                        </li>
                                    </ul>
                                </div>
                                <div class="attor-work">
                                    <h3>Working hours</h3>
                                    <div class="attor-work-left">
                                        <ul>
                                            <li>Monday</li>
                                            <li>Tuesday</li>
                                            <li>Sunday</li>
                                        </ul>
                                    </div>
                                    <div class="attor-work-right">
                                        <ul>
                                            <li>9:00 am - 8:00 pm </li>
                                            <li>9:00 am - 8:00 pm </li>
                                            <li>9:00 am - 8:00 pm </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="attor-prev">
                                <ul>
                                    <li>
                                        <a href="attorney-details.html#">Previous</a>
                                    </li>
                                    <li>
                                        <a href="attorney-details.html#">Next</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="attor-details-item">
                            <div class="attor-details-right">
                                <div class="attor-details-name">
                                    <h2>Adv. Sarah Taylor</h2>
                                    <span>Public Prosecutor</span>
                                    <p>Bachelor of Laws in LL.B. (Hons) in the United Kingdom</p>
                                </div>
                                <div class="attor-details-things">
                                    <h3>Biography</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                                    <p>Risus commodo viverra maecenas accumsan lacus vel facilisis.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                                </div>
                                <div class="attor-details-things">
                                    <h3>Education</h3>
                                    <ul>
                                        <li>PHD degree in Criminal Law at University of Lyzo Internatinal (2006)</li>
                                        <li>Master of Family Law  at University of Lyzo International  (2002)</li>
                                        <li>MBBS LLB (Hon’s) in  at University of Lyzo International (2002)</li>
                                        <li>Higher Secondary Certificate at Lyzo International collage  (1991)</li>
                                    </ul>
                                </div>
                                <div class="attor-details-things">
                                    <h3>Research</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Attorney Details -->

        <!-- Contact Form -->
        <div class="contact-form contact-form-two pb-100">
            <div class="container">
                <div class="contact-wrap">
                    <form id="contactForm" class="">
                        <h2>Get Appointment</h2>
                        <div class="row justify-content-center">
                            <div class="col-sm-6 col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="name" id="name" class="form-control" required data-error="Please enter your name" placeholder="Your Full Name">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-6">
                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control" required data-error="Please enter your email" placeholder="Your Email">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="phone_number" id="phone_number" required data-error="Please enter your number" class="form-control" placeholder="Your Phone">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="msg_subject" id="msg_subject" class="form-control" required data-error="Please enter your subject" placeholder="Subject">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-md-12 col-lg-12">
                                <div class="form-group">
                                    <textarea name="message" class="form-control" id="message" cols="30" rows="8" required data-error="Write your message" placeholder="Case Description"></textarea>
                                    <div class="help-block with-errors"></div>
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
        </div>
        <!-- End Contact Form -->

        <!-- Team -->
        <section class="team-area team-area-two">
            <div class="container">
                <div class="section-title text-left">
                    <h2>Our More Expert Attorneys</h2>
                </div>
                <div class="row justify-content-center">
                    <div class="col-sm-6 col-lg-3">
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
                    <div class="col-sm-6 col-lg-3">
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
                    <div class="col-sm-6 col-lg-3">
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
                    <div class="col-sm-6 col-lg-3">
                        <div class="team-item wow fadeInUp" data-wow-delay=".6s">
                            <img src="{{ asset('front-assets/assets/img/home-one/team/4.jpg') }}" alt="Team">
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
                                    <a href="attorney-details.html">Attor. Aikin Ward</a>
                                </h3>
                                <span>Business Consultant</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Team -->

        @endsection
