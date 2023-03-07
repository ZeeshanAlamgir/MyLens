@extends('app.front-end.layout.layout', ['data' => $data])

@section('content')
<style>
    .custom_header_container {
        position: unset !important;
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
    .custom_header_container{
    background-color: white;
    box-shadow: 0 1px 0.25rem 0 rgb(0 0 0 / 34%) !important;
}
.logo_2{
        display: block !important;
    }
    .logo{
        display: none !important;
    }
</style>
    <section>
        {{-- <div class="contact_banner">
            <img class="img-fluid" src="{{asset('app-assets')}}/images/privacy-policy/banner.png" alt="">
        </div> --}}

        <div class="container">
            <div class="shop_by_color">
                <h3 class="heading_3 text-center">TERMS AND conditions </h3>
            </div>


            <div class="story_content">
                <h5 class="text-start custom_story_title">Effective Date: May 2021 </h3>
                <span>Joli is a US FDA approved and ISO compliant American brand. Our lenses have undergone rigorous testing
                    to ensure the best
                    quality possible. Each lens has been custom designed after extensive research to cater to every
                    customer’s need. We oer more
                    than 75 shades, so a plethora of colors to choose from!</span>
            </div>
            <div class="story_content">
                <p>The only colored lenses brand to oer lens applicator and Lens tweezer within the lens box!
                </p>
            </div>
            <div class="story_content">
                <p>Joli Colored Lenses are available in 3 dierent collections: Exotic, Natural, and Bold (coming soon).
                    Exotic collection features 25
                    shades, and are designed to completely cover your natural eye and give you a new look. Natural
                    collection features 18 shades,
                    and are designed to blend in with your natural eye color, hence giving a quite natural, awe-inspiring
                    look.</p>
            </div>

            <h5 class="text-start custom_story_title">Effective Date: May 2021 </h3>
            <div class="story_content">
                <p>Beauty is not about looks. Beauty is about self expression. Being proud of everything that’s you. Showing
                    all sides of your personality. All the facets. All the nuances. Because true beauty has no set standard.
                    Only the empowerment to change at will. From Hollywood starlet to natural beauty and back again.
                    Breaking free from norms and boundaries. Free to wear what you feel. To be your own kind of beautiful.
                </p>
            </div>

            <div class="story_content">
                <p>Joli Colored Lenses are available in 3 dierent collections: Exotic, Natural, and Bold (coming soon).
                    Exotic collection features 25
                    shades, and are designed to completely cover your natural eye and give you a new look. Natural
                    collection features 18 shades,
                    and are designed to blend in with your natural eye color, hence giving a quite natural, awe-inspiring
                    look.</p>
            </div>

            <h5 class="text-start custom_story_title">Effective Date: May 2021 </h3>
            <div class="story_content">
                <p>Beauty is not about looks. Beauty is about self expression. Being proud of everything that’s you. Showing
                    all sides of your personality. All the facets. All the nuances. Because true beauty has no set standard.
                    Only the empowerment to change at will. From Hollywood starlet to natural beauty and back again.
                    Breaking free from norms and boundaries. Free to wear what you feel. To be your own kind of beautiful.
                </p>
            </div>

            <div class="story_content">
                <p>Joli Colored Lenses are available in 3 dierent collections: Exotic, Natural, and Bold (coming soon).
                    Exotic collection features 25
                    shades, and are designed to completely cover your natural eye and give you a new look. Natural
                    collection features 18 shades,
                    and are designed to blend in with your natural eye color, hence giving a quite natural, awe-inspiring
                    look.</p>
            </div>

            <h5 class="text-start custom_story_title">Effective Date: May 2021 </h3>
            <div class="story_content">
                <p>Beauty is not about looks. Beauty is about self expression. Being proud of everything that’s you. Showing
                    all sides of your personality. All the facets. All the nuances. Because true beauty has no set standard.
                    Only the empowerment to change at will. From Hollywood starlet to natural beauty and back again.
                    Breaking free from norms and boundaries. Free to wear what you feel. To be your own kind of beautiful.
                </p>
            </div>

            <div class="story_content">
                <p>Joli Colored Lenses are available in 3 dierent collections: Exotic, Natural, and Bold (coming soon).
                    Exotic collection features 25
                    shades, and are designed to completely cover your natural eye and give you a new look. Natural
                    collection features 18 shades,
                    and are designed to blend in with your natural eye color, hence giving a quite natural, awe-inspiring
                    look.</p>
            </div>

            <h5 class="text-start custom_story_title">Effective Date: May 2021 </h3>
            <div class="story_content">
                <p>Beauty is not about looks. Beauty is about self expression. Being proud of everything that’s you. Showing
                    all sides of your personality. All the facets. All the nuances. Because true beauty has no set standard.
                    Only the empowerment to change at will. From Hollywood starlet to natural beauty and back again.
                    Breaking free from norms and boundaries. Free to wear what you feel. To be your own kind of beautiful.
                </p>
            </div>

        </div>
    </section>

    {{ view('app.front-end.home-page.map', ['stores' => $data['stores'], 'cities'=>$data['cities']]) }}
@endsection
