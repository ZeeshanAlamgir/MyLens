@extends('app.front-end.layout.layout', ['data' => $data])
<style>
    .custom_header_container {
        position: unset;
        background: #fff;
    }

    .nav>.nav-links>a,
    .dropbtn,
    .dropdown-toggle {
        color: #000 !important;
    }

    path {
        fill: black !important;
    }

    .nav>.nav-btn>label>span {
        border-top: 2px solid #000 !important;
    }

    .custom_header_container {
        background-color: white;
        box-shadow: 0 1px 0.25rem 0 rgb(0 0 0 / 34%) !important;
        position: unset !important;
    }

    .logo_2 {
        display: block !important;
    }

    .logo {
        display: none !important;
    }

    .acc_h2 {
        display: block;
        line-height: 1.5;
        letter-spacing: .2rem;
        font-size: .875rem;
        font-weight: 500;
    }
</style>
<style>
    #sync1.owl-theme .owl-prev {
        left: 10px;
        display: none;
    }

    #sync1.owl-theme .owl-next {
        right: 10px;
        display: none;
    }

    .owl-nav {
        display: none;
    }

    .owl-next,
    .owl-prev {
        display: none !important;
    }

    .detail_use {
        font-size: .875rem;
    }

    .custom_detail_h {
        font-weight: 700;
        font-size: 1.375rem;
    }

    .custom_acc_h {
        text-transform: uppercase !important;
        font-weight: 700 !important;
        letter-spacing: .4rem !important;
    }

    .what_maks_content {
        font-size: 12px;
        font-weight: 400;
        line-height: 3;
    }

    .accordion-button::after {
        content: "\2b" !important;
        content: "";
        background: none !important;
        font-size: 42px;
        line-height: 0.3;
        font-weight: 300;
    }

    .accordion-button:not(.collapsed),
    .accordion-item:last-of-type .accordion-button.collapsed {
        color: black;
        box-shadow: unset;
        font-weight: 600;
        letter-spacing: 4px;
    }

    .acc_dec2 {
        font-size: 13px;
    }

    .h_before {
        letter-spacing: .2rem !important;
        line-height: 1.5 !important;
        font-size: .875rem !important;
        font-weight: 500 !important;
    }

    .disclamer_text {
        font-size: .875rem;
        font-weight: 500;
        line-height: 1.5;
        color: #292b2c;
        text-align: left;
        letter-spacing: 1px;
    }
</style>
@section('content')
    <section>
        <div class="container custom_product_slider_container">
            <div class="row">
                <div class="col-md-6 custom_befor_after_container">
                    <div id="sync1" class="owl-carousel owl-theme custom_slide_one">
                        <div class="item">
                            <img class="custom_product_slide_1"
                                src="{{ asset('app-assets') }}/images/products/images/{{ $data['product']['image'] }}"
                                alt="img">
                        </div>
                        @foreach ($data['product']['gallery'] as $gallery)
                            <div class="item">
                                <img class="img_slide_2"
                                    src="{{ asset('app-assets') }}/images/products/gallery/{{ $gallery['image'] }}"
                                    alt="img">
                            </div>
                        @endforeach
                    </div>

                    <div id="sync2" class="owl-carousel owl-theme custom_slide_smal_img">
                        <div class="item">
                            <img class="slide_image_small"
                                src="{{ asset('app-assets') }}/images/products/images/{{ $data['product']['image'] }}"
                                alt="img">
                        </div>
                        @foreach ($data['product']['gallery'] as $gallery)
                            <div class="item">
                                <img class="slide_image_small"
                                    src="{{ asset('app-assets') }}/images/products/gallery/{{ $gallery['image'] }}"
                                    alt="img">
                            </div>
                        @endforeach
                    </div>

                </div>
                <div class="col-md-6 custom_befor_after_container">
                    <div class="shop_by_color pb-5">
                        <h3
                            class="heading_3 custom_detail_h text-start wow fadeInUp animate__ animate__bounce animate__delay-1s p-0 mb-3">
                            {{-- JOLI CLOUDY GRAY --}}
                            {{ isset($data['product']) ? $data['product']['name'] : 'Null' }}
                        </h3>
                        {{-- <span>1-YEAR USE</span> --}}
                        <span class="detail_use">
                            {{ isset($data['product']['replacement_cycle']) ? $data['product']['replacement_cycle']['name'] : 'Null' }}
                            USE</span>
                    </div>
                    <div class="product_detail">
                        {{-- <p>Feeling royal? This sky-blue tone comes with a tinge of
                            gold lining the pupil. Be sure and keep an eye out, because
                            this shade is sure to attract more than a few loyal admirers.</p>


                        <p>This shade of Deep-sea blue coloured lenses has a tinge of
                            green and yellow around the pupil line. The shade comes in
                            a three-tone lens which gives the most natural-looking
                            result to the eyes.</p> --}}
                        <p> {{ isset($data['product']) ? $data['product']['description'] : 'Null' }} </p>
                    </div>

                    <ul class="d-flex project_btn_ul ps-0">
                        <li class="d-block w-50">
                            <a class="by_online_btn" target="_blank"
                                href="{{ $data['product'] ? $data['product']['buy_product_online_link'] : '#' }}"> BUY
                                ONLINE</a>
                        </li>
                        <li class="d-block w-50">
                            <a class="by_online_btn authorize_retailers" href="#map_container"> BUY IN STORE</a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container juli_cloudy_container">
            <div class="shop_by_color text-center pb-5">
                <h3 class="heading_3 text-center wow fadeInUp animate__ animate__bounce animate__delay-1s p-0 mb-3">
                    {{-- JOLI CLOUDY GRAY --}}
                    {{ isset($data['product']) ? $data['product']['name'] : 'Null' }}
                </h3>
                <span>{{ isset($data['product']['replacement_cycle']) ? $data['product']['replacement_cycle']['name'] : 'Null' }}
                    USE</span>
            </div>


            <div class="before_after">
                <div class="container" style="max-width: 742px">
                    <div class="row">
                        <div class="col-md-6 col-6">
                            <div class="text-center w-100 collection_color__products">
                                <a href="#" class="column col-xs-6" id="zoomIn">
                                    <figure>
                                        <img class="ext-centert pe-3" id="collection_color__products___img"
                                            src="{{ asset('app-assets') }}/images/products/before/{{ $data['product']['before_image'] }}"
                                            alt="">
                                    </figure>
                                </a>
                                <h3 class="heading_3 h_before">
                                    BEFORE
                                </h3>
                            </div>
                        </div>
                        <div class="col-md-6 col-6">
                            <div class="text-center w-100 collection_color__products">
                                <a href="#" class="column col-xs-6" id="zoomIn">
                                    <figure>
                                        <img class="text-center pe-3" id="collection_color__products___img"
                                            src="{{ asset('app-assets') }}/images/products/after/{{ $data['product']['after_image'] }}"
                                            alt="">
                                    </figure>
                                </a>
                                <h3 class="heading_3 h_before">
                                    AFTER
                                </h3>
                            </div>
                        </div>
                    </div>
                    <p style="font-size: 13px;">
                        <b class="disclamer_text">DISCLAIMER:</b>
                        {{ isset($data['product']) ? $data['product']['before_after_description'] : 'Null' }}
                    </p>
                </div>
                <div class="container">
                    <div class="main_according pt-5">

                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        PRODUCT DESCRIPTION
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="shop_by_color text-center pb-5">
                                            <h3 class="heading_3 text-center p-0 mb-5 custom_what_maks_title custom_acc_h">
                                                WHY CHOOSE JOLI?
                                            </h3>
                                            <span class="what_maks_content">EXTREMELY COMFORTABLE LENSES, WITH A
                                                LONG-LASTING DURATION OF 1 YEAR USE. AVAILABLE IN BOTH PRESCRIPTION AND
                                                NON-PRESCRIPTION.
                                                <br>
                                                JOLI PACKAGING INCLUDES 1 LENS PAIR, LENS CASE, LENS APPLICATOR, TWEEZER AND
                                                AN INSTRUCTIONS LEAFLET.
                                            </span>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <ul class="d-flex ps-0">
                                                    <li class="d-block pe-3 what_maks_li_img">
                                                        <img class=""
                                                            src="{{ asset('app-assets') }}/images/product-details/Product-Description-Icons-1.png"
                                                            alt="">
                                                    </li>
                                                    <li class="d-block what_maks_li_content">
                                                        <p class="acc_h2">PATENTED TECHNOLOGY FOR SAFER EYES</p>
                                                        <p class="acc_dec2">Sandwich Technology which makes sure the color
                                                            pigments are
                                                            encapsulated and are embedded within the lens material so the
                                                            eyes don’t come into direct contact. This patented method
                                                            ensures long and comfortable wear of Joli lenses.</p>
                                                    </li>
                                                </ul>
                                                <ul class="d-flex ps-0">
                                                    <li class="d-block pe-3 what_maks_li_img">
                                                        <img class=""
                                                            src="{{ asset('app-assets') }}/images/product-details/Product-Description-Icons-3.jpg"
                                                            alt="">
                                                    </li>
                                                    <li class="d-block what_maks_li_content">
                                                        <p class="acc_h2">ARTIST DESIGNED</p>
                                                        <p class="acc_dec2">
                                                            Each color has been carefully researched and custom designed to
                                                            cater to every customer’s need. One of the largest collections
                                                            of colored lenses, all under one brand!</p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-6">
                                                <ul class="d-flex ps-0">
                                                    <li class="d-block pe-3 what_maks_li_img">
                                                        <img class=""
                                                            src="{{ asset('app-assets') }}/images/product-details/Product-Description-Icons-2.png"
                                                            alt="">
                                                    </li>
                                                    <li class="d-block what_maks_li_content">
                                                        <p class="acc_h2">SUPER COMFORTABLE LENSES</p>
                                                        <p class="acc_dec2">
                                                            Our technology allows us to manufacture these lenses to be as
                                                            thin as possible. This results in maximum oxygen permeation for
                                                            your eyes, and adequate water circulation to avoid dryness.</p>
                                                    </li>
                                                </ul>
                                                <ul class="d-flex ps-0">
                                                    <li class="d-block pe-3 what_maks_li_img">
                                                        <img class=""
                                                            src="{{ asset('app-assets') }}/images/product-details/Product-Description-Icons-4.jpg"
                                                            alt="">
                                                    </li>
                                                    <li class="d-block what_maks_li_content">
                                                        <p class="acc_h2">PRODUCT SAFETY PROTOCOLS</p>
                                                        <p class="acc_dec2"> Joli Contact Lenses have undergone rigorous
                                                            testing to ensure
                                                            the best quality possible! They are manufactured under the
                                                            control of a qualified management system, and therefore are
                                                            European CE certified and US FDA approved
                                                        </p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        PRODUCT SPECIFICATIONS
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <table class="table custom_product_tbl">
                                            <tbody>

                                                <tr>
                                                    <td><b>LENS MATERIAL</b></td>
                                                    @if (isset($data['lens_materials']))
                                                        <?php $lens_mate = ''; ?>
                                                        @foreach ($data['lens_materials'] as $key => $lens_material)
                                                            <?php
                                                            if ($key > 0) {
                                                                $lens_mate = $lens_mate . ', ' . $lens_material;
                                                            } else {
                                                                $lens_mate = $lens_material;
                                                            }
                                                            ?>
                                                        @endforeach
                                                        <td>{{ $lens_mate }}</td>
                                                    @endif
                                                </tr>


                                                <tr>
                                                    <td><b>BASE CURVE</b></td>
                                                    <td>{{ isset($data['product']) ? $data['product']['base_curve'] : 'Null' }}
                                                    </td>
                                                </tr>


                                                <tr>
                                                    <td><b>DIAMETER</b></td>
                                                    <td>{{ isset($data['product']) ? $data['product']['diameter'] : 'Null' }}
                                                    </td>
                                                </tr>


                                                <tr>
                                                    <td><b>OXYGEN PERMEABILITY</b></td>
                                                    <td>{{ isset($data['product']) ? $data['product']['oxygen_permeability'] : 'Null' }}
                                                    </td>
                                                </tr>


                                                <tr>
                                                    <td><b>CENTER THICKNESS</b></td>
                                                    <td>{{ isset($data['product']) ? $data['product']['center_thickness'] : 'Null' }}
                                                    </td>
                                                </tr>


                                                <tr>
                                                    <td style="border-bottom: none !important"><b>POWER</b></td>
                                                    <td style="border-bottom: none !important">
                                                        {{ isset($data['product']) ? $data['product']['power'] : 'Null' }}
                                                    </td>

                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        INSTRUCTIONS TO USE
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="container custom_3_according_container">
                                            <div class="row">
                                                <div class="col-md-4 col-6 text-center">
                                                    <div class="card custom_product_card mb-4"
                                                        style="background: url({{ asset('app-assets') }}/images/product-details/Instruction-to-Use-Image-1.jpg);  background-size: cover; width: 100%; height: 322px">
                                                        <span class="custom_numbring">1</span>
                                                    </div>
                                                    <span class="custom_numbring_font">THROUGHLY WASH YOUR HANDS
                                                        USING SOAP & WATER.</span>
                                                </div>
                                                <div class="col-md-4 col-6 text-center">
                                                    <div class="card custom_product_card mb-4"
                                                        style="background: url({{ asset('app-assets') }}/images/product-details/Instruction-to-Use-Image-2.jpg);  background-size: cover; width: 100%; height: 322px">
                                                        <span class="custom_numbring">2</span>
                                                    </div>
                                                    <span class="custom_numbring_font">AFTER THE LENSES HAVE BEEN IMMERSED
                                                        IN THE SOLUTION FOR 4HRS,REMOVE THE LENS USING THE TWEEZER.</span>
                                                </div>
                                                <div class="col-md-4 col-6 text-center">
                                                    <div class="card custom_product_card mb-4"
                                                        style="background: url({{ asset('app-assets') }}/images/product-details/Instruction-to-Use-Image-3.jpg);  background-size: cover; width: 100%; height: 322px">
                                                        <span class="custom_numbring">3</span>
                                                    </div>
                                                    <span class="custom_numbring_font">CAREFULLY PLACE THE LENS ON THE TIP
                                                        OF THE APPLICATOR.</span>
                                                </div>

                                                <div class="col-md-4 col-6 text-center">
                                                    <div class="card custom_product_card mb-4"
                                                        style="background: url({{ asset('app-assets') }}/images/product-details/Instruction-to-Use-Image-4.jpg);  background-size: cover; width: 100%; height: 322px">
                                                        <span class="custom_numbring">4</span>
                                                    </div>
                                                    <span class="custom_numbring_font">HOLS YOUR EYES OPEN WITH TOUR FREE
                                                        HAND & APPLY THE LENS DIRECTLY ONTO YOUR EYE.</span>
                                                </div>
                                                <div class="col-md-4 col-6 text-center">
                                                    <div class="card custom_product_card mb-4"
                                                        style="background: url({{ asset('app-assets') }}/images/product-details/Instruction-to-Use-Image-5.jpg);  background-size: cover; width: 100%; height: 322px">
                                                        <span class="custom_numbring">5</span>
                                                    </div>
                                                    <span class="custom_numbring_font">TO HELP THE LENS SETTLE INTO
                                                        POSITION, LOOK RIGHT & LEFT THEN SLOWLY BLINK TO STABILIZE THE
                                                        LENS.</span>
                                                </div>
                                                <div class="col-md-4 col-6 text-center">
                                                    <div class="card custom_product_card mb-4"
                                                        style="background: url({{ asset('app-assets') }}/images/product-details/Instruction-to-Use-Image-6.jpg);  background-size: cover; width: 100%; height: 322px">
                                                        <span class="custom_numbring">6</span>
                                                    </div>
                                                    <span class="custom_numbring_font">REPEAT STEPS 2-5 FOR THE OTHER EYE.
                                                        NOW YU ARE READY TO LET YOUR EYES DO THE TALKING.</span>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

    </section>

    {{ view('app.front-end.home-page.map', ['stores' => $data['stores'], 'cities' => $data['cities']]) }}

@endsection

@section('custom-js')
    <script>
        $(document).ready(function() {

            var sync1 = $("#sync1");
            var sync2 = $("#sync2");
            var slidesPerPage = 3; //globaly define number of elements per page
            var syncedSecondary = true;

            sync1.owlCarousel({
                items: 1,
                slideSpeed: 2000,
                nav: true,
                autoplay: false,
                dots: false,
                loop: true,
                responsiveRefreshRate: 200,
                navText: [
                    '<svg width="100%" height="100%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>',
                    '<svg width="100%" height="100%" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'
                ],
            }).on('changed.owl.carousel', syncPosition);

            sync2
                .on('initialized.owl.carousel', function() {
                    sync2.find(".owl-item").eq(0).addClass("current");
                })
                .owlCarousel({
                    items: slidesPerPage,
                    dots: false,
                    nav: true,
                    smartSpeed: 200,
                    slideSpeed: 500,
                    slideBy: slidesPerPage,
                    responsiveRefreshRate: 100
                }).on('changed.owl.carousel', syncPosition2);

            function syncPosition(el) {
                //if you set loop to false, you have to restore this next line
                //var current = el.item.index;

                //if you disable loop you have to comment this block
                var count = el.item.count - 1;
                var current = Math.round(el.item.index - (el.item.count / 2) - .5);

                if (current < 0) {
                    current = count;
                }
                if (current > count) {
                    current = 0;
                }

                //end block

                sync2
                    .find(".owl-item")
                    .removeClass("current")
                    .eq(current)
                    .addClass("current");
                var onscreen = sync2.find('.owl-item.active').length - 1;
                var start = sync2.find('.owl-item.active').first().index();
                var end = sync2.find('.owl-item.active').last().index();

                if (current > end) {
                    sync2.data('owl.carousel').to(current, 100, true);
                }
                if (current < start) {
                    sync2.data('owl.carousel').to(current - onscreen, 100, true);
                }
            }

            function syncPosition2(el) {
                if (syncedSecondary) {
                    var number = el.item.index;
                    sync1.data('owl.carousel').to(number, 100, true);
                }
            }

            sync2.on("click", ".owl-item", function(e) {
                e.preventDefault();
                var number = $(this).index();
                sync1.data('owl.carousel').to(number, 300, true);
            });
        });
    </script>
@endsection
