<section>
    <div class="container">
        <div class="shop_by_color wow fadeInUp animate__animated animate__bounce animate__delay-1s">
            <h3 class="heading_3 text-center">
                <img src="{{ asset('app-assets') }}/front-end/Asset 5.png" class="img-fluid" alt="">
            </h3>
        </div>

        <div class="text-center wow fadeInUp animate__animated animate__bounce animate__delay-1s">
            <p>US FDA approved and European CE marked American Brand. Each color is unique and been carefully researched
                and designed to cater to every “customer’s want! Happy shopping :)
            </p>
        </div>
    </div>

    <div class="main_joly wow fadeInUp animate__animated animate__bounce animate__delay-3s">
        <div class="main_video">
            {{-- <button id="youtube_btn">
                <img src="{{ asset('app-assets') }}/front-end/Video.jpg" class="img-fluid video_img" alt="">
                <div class="youtube_link container wow fadeInUp animate__animated animate__bounce animate__delay-4s">
                    YOUTUBE LINKED VIDEO
                </div>
            </button> --}}
            <div class="container video_container">
                {{-- <iframe id="youtube_video" class="responsive-iframe d-none"
                    src="https://www.youtube.com/embed/lXyWsGoTuIY" title="YouTube video player"></iframe> --}}
                    <iframe id="youtube_video" class="responsive-iframe d-block" src="https://www.youtube.com/embed/lXyWsGoTuIY" title="YouTube video player" style="display: inline;"></iframe>
            </div>
           {{-- <iframe id="youtube_video" width="100%" height="615" src="https://www.youtube.com/embed/lXyWsGoTuIY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}
        </div>
    </div>
</section>
