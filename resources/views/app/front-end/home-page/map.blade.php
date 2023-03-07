<section>
    <div class="container" id="map_container">
        <div class="shop_by_color">
            <h3 class="heading_3 text-center wow fadeInUp animate__animated animate__bounce animate__delay-1s">where to
                buy</h3>
        </div>

        <ul class="d-flex justify-content-center align-items-center pb-5 ps-0">
            <li class="d-block"><span style="text-transform: uppercase;">Online</span></li>
            <li class="d-block ms-5 me-5 custom_switch_li">
                <div class="form-check form-switch">
                    <input class="form-check-input switch_btn" type="checkbox" id="flexSwit">
                        {{-- <input class="form-check-input switch_btn" type="checkbox" id="flexSwit"
                        onclick="$('.log_arrea').toggleClass('d-none');$('.google_map').toggleClass('d-none');"> BY QA's --}}
                </div>

            </li>
            <li class="d-block"><span style="text-transform: uppercase;">In Store</span></li>

        </ul>

        <div class="log_arrea mb-5 text-center d-block">

            <div class="col-md-12 p-0 wow fadeInRightBig animate__animated animate__bounce animate__delay-1s">
                <div class="map_slider owl-theme mapslider text-center" id="mapslider1">
                    <div class="item">
                        <div class="slider-div">
                            <a href="https://www.lenslo.com/" target="_blank">
                                <img src="{{ asset('app-assets') }}/front-end/lenses_eye.PNG" class="img-fluid" alt="">
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="google_map d-none mb-5">
            <div class="offline">
                <div class="row d-flex justify-content-end">
                <div class="col-12 col-md-4">
                    <div class="dropdown w-100">
                        {{-- <button class="btn btn-light dropdown-toggle w-100 custom_drop_down_button" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                          Cities
                        </button>
                        <ul class="dropdown-menu dropdown-menu-light w-100" id="cities_dd" aria-labelledby="dropdownMenuButton2">
                            @isset($cities)
                                @foreach ($cities as $city)
                                    <li data-id = {{$city['id']}}><a class="dropdown-item" href="#" data-id = {{$city['id']}}>{{$city['name']}}</a></li>
                                @endforeach
                            @endisset
                        </ul> --}}
                        <select name="city_id" class="form-control" id="city_id">
                            <option disabled selected>--Select City--</option>
                            @isset($cities)
                                @foreach ($cities as $city)
                                    <option data-id = {{$city['id']}} value="{{$city['id']}}" >{{ $city['name'] }}</option>
                                @endforeach
                            @endisset
                        </select>
                      </div>
                </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-8">

                        {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d106268.77703636732!2d73.00161135445224!3d33.65977150027881!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38df95ed2304d9bf%3A0xef453f4e841674d2!2sLensPK.com!5e0!3m2!1sen!2s!4v1668503352988!5m2!1sen!2s"
                            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade" id="map"> </iframe> --}}

                        <div id="googleMap" style="width:100%;height:453px;"></div>

                    </div>
                    <div class="col-md-4">
                        <div class="scrollbar" id="style-3">
                            <div id="offlineStores">
                                <div class="Location_address" id="location_address">
                                    @foreach ($stores as $store)
                                        <ul class="d-flex ps-0 store_ul">
                                            <li class="d-block pe-3">
                                                <i class="fa-solid fa-location-dot location_pin"></i>
                                            </li>
                                            <li class="d-block store_li store_id" data-name="{{ $store['name'] }}"
                                                data-address="{{ $store['address'] }}" data-lat={{ $store['latitude'] }}
                                                data-lng={{ $store['longitude'] }}>
                                                <div class="Location_address">
                                                    <h2> {{ $store['name'] }}</h2>
                                                    <p>{{ $store['address'] }}</p>
                                                </div>
                                            </li>
                                            <hr class="hr" />
                                        </ul>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
