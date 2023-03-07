<section>
    <div class="main-banner">
      <div class="home-demo">
        <div class="owl-carousel owl-theme">
          @foreach ($banners as $banner)
          <div class="item">
            <img src="{{asset('app-assets')}}/images/banner/{{$banner['image']}}" class="img-fluid" alt="">
          </div>
          @endforeach
        </div>
      </div>
    </div>
</section>

