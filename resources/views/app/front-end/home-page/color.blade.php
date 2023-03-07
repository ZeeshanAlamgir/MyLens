<section>
    <div class="container">
        <div class="shop_by_color">
            <h3 class="heading_3 text-center wow fadeInUp animate__animated animate__bounce animate__delay-1s">Shop By
                Color</h3>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            @forelse ($colors as $color)

                <div class="col-md-3 col-6 p-0 wow fadeInUp animate__animated animate__bounce animate__delay-2s">
                    <a href="{{ url('products/colors') }}/{{ $color['slug'] }}">
                        <div class="card tile_card mb-0">
                            <div class="card-body pt-0 pb-0" style="padding: 1rem 0.5rem;">
                                <div class="main_shop_color_img">
                                    <div class="destaque">
                                        <a href="{{ url('products/colors') }}/{{ $color['slug'] }}">
                                    <img class="img-fluid shop_image"
                                        src="{{ asset('app-assets') }}/images/colors/banner/{{ $color['banner'] }}"
                                        alt="">
                                        </a>
                                    </div>
                                    {{-- <img class="img-fluid shop_color_img"
                                        src="{{ asset('app-assets') }}/images/colors/images/{{ $color['image'] }}"
                                        alt="">
                                    <button class="shop_color_btn btn btn-light">{{ $color['name'] }}</button> --}}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            @empty
                <div class="col-md-3 p-0">
                    <h4 style="color: red">No Color Found</h4>
                </div>
            @endforelse
        </div>
    </div>
</section>

