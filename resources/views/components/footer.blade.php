<!-- resources/views/components/footer.blade.php -->

<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="row" style="text-align: center">
                    @if (isset(footer()['contacts']) && footer()['contacts']->isNotEmpty())
                        @foreach (footer()['contacts'] as $contact)
                            <div class="col-lg-4 d-flex" data-aos="fade-up">
                                <div class="info-box">
                                    <img src="{{ asset('uploads/first_section/' . $contact->image) }}"
                                        alt="Contact Image" width="150px" loading="lazy">
                                    {{-- <h3>{{ $contact->country_name }}</h3> --}}
                                    {{-- <h5>{{ $contact->company_name }}</h5> --}}
                                    <h3>{{ $contact->office_name }}</h3>
                                    <p>{{ $contact->address }}</p>

                                    <p><i class="bx bx-phone"></i> {{ $contact->mobile }}</p>
                                    <div class="social-links mt-3">
                                        <a href="{{ $contact->website }}" class="website"><i
                                                class="bx bxl-internet-explorer"></i></a>
                                        <a href="{{ $contact->facebook }}" class="facebook"><i
                                                class="bx bxl-facebook"></i></a>
                                        <a href="{{ $contact->youtube }}" class="youtube"><i
                                                class="bx bxl-youtube"></i></a>
                                        <a href="{{ $contact->linkedIn }}" class="linkedin"><i
                                                class="bx bxl-linkedin"></i></a>
                                    </div>

                                </div>

                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <br>
            <br>
            {{-- <div style="text-align: center">
                @if (isset(footer()['numbers']) && footer()['numbers']->isNotEmpty())
                @foreach (footer()['numbers'] as $number)
                <p>{{ $number->phone }}</p>

                <p>{{ $number->email }}</p>

                @endforeach
                @endif


            </div> --}}
        </div>
    </div>
</footer><!-- End Footer -->

{{-- 2nd footer --}}

<footer class="bg-dark text-white pt-4" id="footer">
    <div class="container" style="padding-top: 30px">
        <div class="row">
            <div class="col-md-6 d-flex">

                <div class="col-12">
                    <div class="row" style="padding: 0% 10% 0% 0%">
                        <div class="d-flex" style="margin-bottom: 20px;">

                            <img src="{{ asset('front-assets/img/9001.png') }}" alt="ISO 9001:2015 Certified"
                                loading="lazy" class="img-fluid"
                                style="width: 150px;height: 150px; margin-right: 10px;">

                            <div style="text-align: justify">

                                <p style="margin-top: 15px;"> Make a deal with an ISO 9001:2015 Certified Company
                                    .ISO 9001 : 2015 is the international standard that specifies requirements for
                                    Quality
                                    Management System (QMS). Opus Technology Limited is an ISO 9001 : 2015 certified
                                    company,
                                    ensuring high quality and standards in our services.</p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <img src="{{ asset('front-assets/img/27001.png') }}" alt="ISO 9001:2015 Certified"
                                loading="lazy" class="img-fluid"
                                style="width: 150px;height: 150px; margin-right: 10px;">
                            <div style="text-align: justify">

                                <p style="margin-top: 15px;">Make a deal with an ISO 27001:2022 Certified Company
                                    .Being Certified indicates that an organization has implemented an information
                                    security
                                    management system (ISMS) in accordance with the requirements specified in the
                                    2022
                                    version
                                    of the ISO 27001 standard.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <h1 style="font-size: 20px;">Importace Link</h1>
                <ul class="list-unstyled">
                    <li><a href="{{ route('front.home') }}" class="text-white">Home</a></li>
                    <li><a href="{{ route('front.about') }}" class="text-white">About</a></li>
                    <li><a href="{{ route('front.products') }}" class="text-white">Product</a></li>
                    <li><a href="{{ route('front.fintech') }}" class="text-white">Fintech</a></li>
                    <li><a href="{{ route('front.clients') }}" class="text-white">Clients</a></li>
                    <li><a href="{{ route('front.clients') }}" class="text-white">Clients</a></li>
                    <li><a href="{{ route('front.services') }}" class="text-white">Services</a></li>
                    <li><a href="{{ route('front.blog') }}" class="text-white">Blogs</a></li>
                    <li><a href="{{ route('front.jobs') }}" class="text-white">Jobs</a></li>
                    <li><a href="{{ route('front.contact') }}" class="text-white">Contact</a></li>

                </ul>
            </div>
            <div class="col-md-3">
                <h1 style="font-size: 20px;">Our Services</h1>
                <ul class="list-unstyled">
                    <li><a href="{{ route('front.services') }}" class="text-white">Custom Software
                            Development</a></li>
                    <li><a href="{{ route('front.services') }}" class="text-white">Mobile Application
                            Development</a></li>
                    <li><a href="{{ route('front.services') }}" class="text-white">Web Application
                            Development</a></li>
                    <li><a href="{{ route('front.services') }}" class="text-white">Business Intelligence</a></li>
                    <li><a href="{{ route('front.services') }}" class="text-white">Artificial Intelligence
                            (AI)</a></li>
                    <li><a href="{{ route('front.services') }}" class="text-white">Blockchain</a></li>
                    <li><a href="{{ route('front.services') }}" class="text-white">Re-engineering & Migration</a>
                    </li>
                    <li><a href="{{ route('front.services') }}" class="text-white">Digital Marketing</a></li>
                </ul>
            </div>

            <div class="social-links" style="text-align: center; padding:10px; font-size: 30px; color:#ffffff">
                {{-- <a href="{{ $contact->website }}" class="website"><i class="bx bxl-internet-explorer"></i></a>
                --}}
                <a href="{{ $contact->facebook }}" class="facebook" target="_blank" rel="noopener noreferrer">
                    <i class="bx bxl-facebook"></i>
                </a>
                <a href="{{ $contact->youtube }}" class="youtube" target="_blank" rel="noopener noreferrer">
                    <i class="bx bxl-youtube"></i>
                </a>
                <a href="{{ $contact->linkedIn }}" class="linkedin" target="_blank" rel="noopener noreferrer">
                    <i class="bx bxl-linkedin"></i>
                </a>

            </div>



        </div>
    </div>


    <div class="container">
        <div class="copyright">
            &copy; Copyright
            <strong><span>{{ siteSetting() && siteSetting()->site_title ? siteSetting()->site_title : 'Opus' }}</span></strong>.
            All Rights Reserved
            Designed by <a href="https://opus-bd.com/">Opus Technology Limited</a>
        </div>
    </div>

    </div>

</footer>
