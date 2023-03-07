<div class="main_footer">

    <div class="container main_footer_container">
        <div class="row">
            <div class="col-12 pt-4">
                <div class="footer_logo_2">
                    <a href="/"><img src="{{asset('app-assets')}}/front-end/Asset 5.png"
                            class="img-fluid footer_logo" alt=""></a>
                </div>
            </div>
        </div>
        <div class="row pb-4">
            <div class="col-md-4">
                <h3>ABOUT JOLI</h3>
                <ul class="ps-0 pb-4">
                    {{-- <li class="d-block"><a href="">About JOLI</a></li> --}}
                    <li class="d-block"><a href="{{route('our-story')}}" class="remove_underline">OUR STORY</a></li>
                    <li class="d-block"> <a href="{{route('distributors')}}" class="remove_underline">INTERNATIONAL NETWORK</a></li>
                    {{-- <li class="d-block"><a href="{{ route('certificates') }}" class="remove_underline">CERTIFICATIONS</a></li> --}}
                    <li class="d-block"><a href="{{ route('contact-us') }}" class="remove_underline">CONTACT US</a></li>
                </ul>
                <h3>FOLLOW US</h3>
                <ul class="d-flex ps-0 footer_n_ul_11 mb-1">
                    <li class="d-block">
                        <a href="https://www.facebook.com/jolicontactlenses">
                            <i class="fa-brands fa-square-facebook"></i>
                            </a>
                    </li>
                    <li class="d-block">
                        <a href="https://www.instagram.com/jolicontactlenses/">
                            <i class="fa-brands fa-instagram"></i>
                            </a>
                    </li>
                    <li class="d-block">
                        <a href="https://api.whatsapp.com/send?phone=3045654000&amp;text=" target="_blank">
                            <i class="fa-brands fa-whatsapp"></i>
                            </a>
                    </li>

                    <li class="d-block">
                        <a href="mailto:support@jolilenses.com">
                            <i class="fa-regular fa-envelope"></i>
                            </a>
                    </li>

                </ul>

            </div>
            <div class="col-md-4">
                <h3>HELP CENTER</h3>
                <ul class="ps-0">
                    <li class="d-block"><a href="{{ route('faqs') }}" class="remove_underline">FAQS</a></li>
                    <li class="d-block authorize_retailers"><a href="#map_container" class="remove_underline">AUTHORIZED RETAILERS</a></li>
                    <li class="d-block"> <a href="{{ route('merchandising') }}" class="remove_underline">BECOME A RESELLER</a></li>
                    <li class="d-block"><a href="{{route('terms-and-conditions')}}" class="remove_underline">TERMS AND CONDITION</a></li>
                    <li class="d-block"><a href="{{ route('privacy-policy') }}" class="remove_underline">PRIVACY POLICY</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h3>QUALITY CONTROL</h3>
                <span>ALL OF OUR PRODUCTS HAVE UNDERGONE
                    RIGOROUS TESTING TO ENSURE THE BEST
                    QUALITY POSSIBLE!</span>
                <br><br>
                <span>JOLI LENSES ARE MANUFACTURED UNDER THE
                    CONTROL OF A QUALIFIED MANAGEMENT
                    SYSTEM, AND THEREFORE ARE EUROPEAN CE
                    CERTIFIED AND US FDA APPROVED.</span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 footer_app_min wow fadeInUp animate__animated animate__bounce animate__delay-2s">

                <ul class="d-flex ps-0 footer_n_ul_11" style="justify-content: center">
                    <li class="d-block pe-0"><a href="/"><img
                                src="{{ asset('app-assets') }}/front-end/Android-App-.png" class="me-1 img-fluid app_download"
                                alt=""> </a></li>
                    <li class="d-block ps-0"><a href="/"><img
                                src="{{ asset('app-assets') }}/front-end/Apple-App.png" class="ms-1 img-fluid app_download"
                                alt=""></a> </li>

                </ul>
                <ul class="d-flex ps-0 text-center footer_n_ul_11 me-3">
                    <li class="d-grid">
                        <div class="copy_right pt-2">
                            <span class="footer_copyright">ALL RIGHTS RESERVED | DESIGNED IN USA  <img
                                    src="{{ asset('app-assets') }}/front-end/Asset 4.png" class="ms-1" width="20" height="12"
                                    alt=""></span>
                        </div>
                    </li>
                </ul>

            </div>
        </div>
    </div>




    <div class="footer_mobile">
        <div class="container">
            <div class="col-12 pt-4">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingOne11">
                        <button class="accordion-button footer_accourding" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne11" aria-expanded="true" aria-controls="collapseOne11">
                            ABOUT JOLI
                        </button>
                      </h2>
                      <div id="collapseOne11" class="accordion-collapse collapse show" aria-labelledby="headingOne11" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <ul class="ps-0 juctify-content-center text-center" style="line-height: 34px;">
                                {{-- <li class="d-block"><a href="">About JOLI</a></li> --}}
                                <li class="d-block"><a href="{{ route('our-story') }}"  class="remove_underline">OUR STORY</a></li>
                                <li class="d-block"> <a href="{{ route('distributors') }}" class="remove_underline">INTERNATIONAL NETWORK</a></li>
                                {{-- <li class="d-block"><a href="{{ route('certificates') }}" class="remove_underline">CERTIFICATIONS</a></li> --}}
                                <li class="d-block"><a href="{{ route('contact-us') }}" class="remove_underline">CONTACT US</a></li>
                            </ul>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingTwo22">
                        <button class="accordion-button collapsed footer_accourding" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo22" aria-expanded="false" aria-controls="collapseTwo22">
                            HELP CENTER
                        </button>
                      </h2>
                      <div id="collapseTwo22" class="accordion-collapse collapse" aria-labelledby="headingTwo22" data-bs-parent="#accordionExample">
                        <div class="accordion-body">

                            <ul class="ps-0 juctify-content-center text-center" style="line-height: 34px;">
                                <li class="d-block"><a href="{{ route('faqs') }}" class="remove_underline">FAQS</a></li>
                                <li class="d-block authorize_retailers"><a href="#map_container" class="remove_underline">AUTHORIZED RETAILERS</a></li>
                                <li class="d-block"> <a href="{{ route('merchandising') }}" class="remove_underline">BECOME A RESELLER</a></li>
                                <li class="d-block"><a href="{{ route('terms-and-conditions') }}" class="remove_underline">TERMS AND CONDITION</a></li>
                                <li class="d-block"><a href="{{ route('privacy-policy') }}" class="remove_underline">PRIVACY POLICY</a></li>
                            </ul>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item" style="border-bottom: 1px solid black !important">
                      <h2 class="accordion-header" id="headingThree33">
                        <button class="accordion-button collapsed footer_accourding" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree33" aria-expanded="false" aria-controls="collapseThree33">
                            QUALITY CONTROL
                        </button>
                      </h2>
                      <div id="collapseThree33" class="accordion-collapse collapse" aria-labelledby="headingThree33" data-bs-parent="#accordionExample">
                        <div class="accordion-body text-center">
                            <span class="text-center" style="font-size: 13px;">ALL OF OUR PRODUCTS HAVE UNDERGONE
                                RIGOROUS TESTING TO ENSURE THE BEST
                                QUALITY POSSIBLE!</span>
                            <br><br>
                            <span class="text-center" style="font-size: 13px">JOLI LENSES ARE MANUFACTURED UNDER THE
                                CONTROL OF A QUALIFIED MANAGEMENT
                                SYSTEM, AND THEREFORE ARE EUROPEAN CE
                                CERTIFIED AND US FDA APPROVED.</span>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>

            <div class="row pt-5 pb-1">
                <div class="col-md-12 footer_app_min wow fadeInUp animate__animated animate__bounce animate__delay-2s">
                    <ul class="d-flex ps-0 footer_n_ul_11">
                        <li class="d-block">
                            <a href="https://www.facebook.com/jolicontactlenses">
                                <i class="fa-brands fa-square-facebook"></i>
                                </a>
                        </li>
                        <li class="d-block">
                            <a href="https://www.instagram.com/jolicontactlenses/">
                                <i class="fa-brands fa-instagram"></i>
                                </a>
                        </li>
                        <li class="d-block">
                            <a href="https://api.whatsapp.com/send?phone=3045654000&amp;text=" target="_blank">
                                <i class="fa-brands fa-whatsapp"></i>
                                </a>
                        </li>
                        <li class="d-block">
                            <a href="mailto:support@jolilenses.com">
                                <i class="fa-regular fa-envelope"></i>
                                </a>
                        </li>
                    </ul>

                    <ul class="d-flex ps-0 footer_n_ul_11" style="justify-content: center">
                        <li class="d-block"><a href="/"><img
                                    src="{{ asset('app-assets') }}/front-end/Android-App-.png" class="img-fluid app_download me-1"
                                    alt=""> </a></li>
                        <li class="d-block"><a href="/"><img
                                    src="{{ asset('app-assets') }}/front-end/Apple-App.png" class="img-fluid app_download ms-1"
                                    alt=""></a> </li>

                    </ul>
                    <ul class="d-flex ps-0 text-center footer_n_ul_11">
                        <li class="d-grid">
                            <div class="copy_right pt-2">
                                <span class="footer_copyright">ALL RIGHTS RESERVED | DESIGNED IN USA &nbsp; <img
                                        src="{{ asset('app-assets') }}/front-end/Asset 4.png" class="" width="20" height="12"
                                        alt=""></span>
                            </div>
                        </li>
                    </ul>

                </div>
            </div>
        </div>

    </div>


</div>
