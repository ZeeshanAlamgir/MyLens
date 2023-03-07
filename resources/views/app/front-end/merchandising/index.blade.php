@extends('app.front-end.layout.layout', ['data' => $data])

@section('content')
<section>
    {{-- Banner same as home page --}}
    <div class="contact_banner">
        <img class="img-fluid" src="{{ asset('app-assets') }}/images/merchandising/banner.png" alt="">
    </div>
    {{-- <section>
        <div class="main-banner">
          <div class="home-demo">
            <div class="owl-carousel owl-theme">
              @foreach ($data['banners'] as $banner)
              <div class="item">
                <img src="{{asset('app-assets')}}/images/banner/{{$banner['image']}}" class="img-fluid" alt="">
              </div>
              @endforeach
            </div>
          </div>
        </div>--}}
    </section>

    <div class="container">
        <div class="shop_by_color">
            <h3 class="heading_3 text-center">MERCHANDISING</h3>
        </div>
    </div>

    <div class="container custom_mrch_container pt-5 pb-5">
        <div class="row revers_1">
            <div class="col-md-6">
                <img src="{{ asset('app-assets/static_site_images/1-Box-Stand.jpg') }}" alt="">
            </div>
            <div class="col-md-6 justify-content-end d-flex align-items-center">
                <span>
                 JOLI ACRYLIC BOX DISPLAY STAND SHOWCASING THE 3 DIFFERENT COLLECTIONS: EXOTIC, NATURAL AND 1DAY
                </span>
            </div>
        </div>
        <div class="row revers_2">
            <div class="col-md-6 d-flex align-items-center">
                <span>
                   LENS TRY-ON TRAY WITH A MIRROR. TRAY INCLUDES BEST-SELLERS FROM THE 3 COLLECTIONS
                </span>
            </div>
            <div class="col-md-6 text-end">
                <img src="{{ asset('app-assets/static_site_images/2-Mirror-Stand.jpg') }}" alt="">
            </div>
        </div>
        <div class="row revers_3">
            <div class="col-md-6">
                <img src="{{ asset('app-assets/static_site_images/3-Presentation-Box.jpg') }}" alt="">
            </div>
            <div class="col-md-6 justify-content-end d-flex align-items-center">
                <span>
                  A PROFESSIONAL, HIGH-QUALITY BOX WITH SAMPLES OF THE DIFFERENT COLLECTIONS AVAILABLE.
                </span>
            </div>
        </div>

        <div class="row revers_4">
            <div class="col-md-6 d-flex align-items-center">
                <span>
                    AN EXTENSIVE AND THOROUGH CATALOGUE THAT WILL ASSIST CUSTOMERS IN CHOOSING THE PERFECT SHADE FOR THEM
                </span>
            </div>
            <div class="col-md-6 text-end">
                <img src="{{ asset('app-assets/static_site_images/4-Catalogue.jpg') }}" alt="">
            </div>
        </div>

        <div class="row revers_3">
            <div class="col-md-6">
                <img src="{{ asset('app-assets/static_site_images/5-Shipping-Bag.jpg') }}" alt="">
            </div>
            <div class="col-md-6 justify-content-end d-flex align-items-center">
                <span>
                    HIGH-QUALITY SHOPPING BAGS SPECIFICALLY DESIGNED TO CATER TO JOLI RETAIL CUSTOMERS
                </span>
            </div>
        </div>

        <div class="row revers_4">
            <div class="col-md-6 d-flex align-items-center">
                <span>
                    BROCHURES ALONG WITH BROCHURE STAND THAT SUMMARIZE THE PRODUCTS AVAILABLE FOR QUICK SELECTION
                </span>
            </div>
            <div class="col-md-6 text-end">
                <img src="{{ asset('app-assets/static_site_images/6-Brochure-Stand.jpg') }}" alt="">
            </div>
        </div>


        <div class="row revers_3">
            <div class="col-md-6">
                <img src="{{ asset('app-assets/static_site_images/7-Standiee-Front.jpg') }}" alt="">
            </div>
            <div class="col-md-6 justify-content-end d-flex align-items-center">
                <span>
                    A LARGE 5 x 2 FEET WOODEN STANDEE TO INCREASE BRAND’S VISIBILITY
                </span>
            </div>
        </div>

        <div class="row d-flex justify-content-center">
            <div class="col-md-3 col-12" style="width: auto;">
                <ul class="d-flex project_btn_ul ps-0">

                        <a class="by_online_btn" href="{{ route('contact-us')}}"> BECOME A RESELLER</a>

                </ul>
            </div>
        </div>
    </div>
</section>

{{ view('app.front-end.home-page.map', ['stores' => $data['stores'], 'cities'=>$data['cities']]) }}
@endsection
