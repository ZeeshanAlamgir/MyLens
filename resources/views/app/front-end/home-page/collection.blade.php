<section>
  
  <div class="container wow fadeInUp">
    <div class="shop_by_color">
      <h3 class="heading_3 text-center wow fadeInUp animate__animated animate__bounce animate__delay-1s">Shop By collection</h3>
    </div>
  </div>

  <div class="main_shop_collection">
    <div class="container">
      <div class="row">

        {{-- Start --}}
        @forelse ($collections as $key => $collection)
            @if ($key < 4)
            <div class="col-md-3 col-6 wow fadeInUp animate__animated animate__bounce animate__delay-2s">
                <a href="{{url('products/collections')}}/{{$collection['slug']}}" style="text-decoration:none;color:black">
                  <div class="card pt-0 pb-0">
                    <div class="card-body">
                        {{-- <h2 class="shop_collection_card_heading">{{$collection['name']}}</h2> --}}
                    {{-- <span>Collection</span> --}}
                      <img class="mt-0 img-fluid" src="{{asset('app-assets')}}/images/collections/images/{{$collection['image']}}" onerror="this.onerror=null;this.src='{{ asset('app-assets/images/collections/images/default.png') }}';" class="img-fluid" alt="">
                    </div>
                  </div>
                </a>
            </div>
            @endif
          @empty
          <div class="col-md-3 p-0">
            <center><img src="{{ asset('app-assets/images/collections/images/default.png') }}" alt=""></center>
          </div>
        @endforelse
        {{-- End --}}

      </div>
    </div>
  </div>
</section>
