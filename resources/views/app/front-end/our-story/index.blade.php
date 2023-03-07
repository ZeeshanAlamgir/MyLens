@extends('app.front-end.layout.layout', ['data' => $data])

@section('content')
    <section>
        <div class="contact_banner">
            <img class="img-fluid w-100" src="{{asset('app-assets')}}/images/ourstory/banner.jpg" alt="">
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
                <h3 class="heading_3 text-center">OUR STORY </h3>
            </div>


            <div class="story_content">
                <span>Joli is an American brand of colored contact lenses that has been approved by the US FDA and is ISO compliant. We are proud to offer a wide range of colors that have been carefully researched to cater to the needs of every customer. Our colors are vibrant and long-lasting, and we make no compromise on quality.</span>
            </div>
            <div class="story_content">
                <p>Our lenses are certified by the US FDA and CE, ensuring that they meet the highest standards of safety and performance. This means that our customers can trust that our products are safe for use and will provide a comfortable wearing experience. Our lenses are also manufactured in accordance with strict ISO standards, ensuring that they are of the highest quality.
                </p>
            </div>
            <div class="story_content">
                <p>Our products have been used by celebrities worldwide and are a favorite among those who want to make a fashion statement with their eyes. Whether you're looking to change your eye color for a special event or simply want to add a pop of color to your everyday look, we have a color that will suit your needs.</p>
            </div>
            <div class="story_content">
                <p>At Joli, we are committed to providing our customers with the best possible experience. We strive to offer top-quality products at affordable prices and our customer service team is always available to answer any questions you may have. We invite you to explore our wide range of colors and find the perfect pair of lenses to suit your style. Thanks for choosing Joli!
                </p>
            </div>

        </div>

    </section>

    {{ view('app.front-end.home-page.map', ['stores' => $data['stores'], 'cities'=>$data['cities']]) }}
@endsection
