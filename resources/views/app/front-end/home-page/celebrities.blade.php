<section>
    <div class="container">
      <div class="shop_by_color">
        <h3 class="heading_3 text-center wow fadeInUp animate__animated animate__bounce animate__delay-1s">as worn by celebrities</h3>
        <p class="text-center wow fadeInUp animate__animated animate__bounce animate__delay-2s">
            Joli Color Contact Lenses have been worn by celebrities and influencers across the world! Our Exotic collection has been a fan favorite amongst customers and celebrities alike!
        </p>
      </div>
    </div>
    <div class="celebrities_main">
    <div class="container">
      <div class="row">
          <div class="col-md-12 p-0 wow fadeInUp animate__animated animate__bounce animate__delay-3s">
              <div class="owl-carousel owl-theme home-slider1 text-center" id="slider1">
                @forelse ($actors as $actor)
                  <div class="item">
                    <div class="slider-div">
                      <a href="{{ url('product-details') }}/{{ $actor['product']['slug'] }}" class="column col-xs-6"
                          id="zoomIn">
                        <img src="{{asset('app-assets')}}/images/actor-product/{{$actor['image']}}" class="img-fluid" alt="">
                    </a>
                        <span>{{$actor['name']}}</span>

                    </div>
                  </div>
                @empty
                  <div class="col-md-3 p-0">
                    <h4 style="color: red">No Celebrity Found</h4>
                  </div>
                @endforelse

              </div>
          </div>
      </div>
    </div>
    </div>

    </section>


