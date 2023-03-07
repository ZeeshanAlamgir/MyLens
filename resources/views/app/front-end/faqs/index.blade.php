@extends('app.front-end.layout.layout', ['data' => $data])

@section('content')
    <section>
        <div class="contact_banner">
            <img class="img-fluid" src="{{ asset('app-assets') }}/images/faqs/banner.jpg" alt="">
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
                <h3 class="heading_3 text-center">FAQS </h3>
            </div>



            <div class="accordion" id="accordionExample">
                <div class="accordion-item custom_accourding_item custom_main_faq_acc">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button faq_according" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Q. Where can I buy Joli Contact Lenses?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <span>Joli lenses are available online, as well as at authorized resellers. Please click here to see where they are available.</span>
                        </div>
                    </div>
                </div>
                <div class="accordion-item custom_accourding_item custom_main_faq_acc">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed faq_according" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Q. Are Joli Contact Lenses US FDA approved?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <span>Yes, Joli Colored Lenses have undergone rigorous testing to ensure the best quality possible! Joli Contact Lenses are manufactured under the control of a qualified management system, and therefore are European CE certified and US FDA approved.</span>
                        </div>
                    </div>
                </div>
                <div class="accordion-item custom_accourding_item custom_main_faq_acc">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed faq_according" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Q. Are colored contact lenses safe to use?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <span>Colored contact lenses can be safe to use if they are purchased from a reputable source and used as directed by an eye care professional. However, it is important to note that improper use or poor hygiene when handling the lenses can lead to serious eye infections or other complications. It is always recommended to consult with an eye doctor before using any type of contact lens.</span>
                        </div>
                    </div>
                </div>
                <div class="accordion-item custom_accourding_item custom_main_faq_acc">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed faq_according" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            Q. Which colors are your best-sellers?
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <span>Although all of our colors are adored by customers, there are some that truly stand out: Joli Angelic Blue, Joli Mint Gray, Joli Queen Gold and Joli Lush Green</span>
                        </div>
                    </div>
                </div>
                <div class="accordion-item custom_accourding_item custom_main_faq_acc">
                    <h2 class="accordion-header" id="headingFive">
                        <button class="accordion-button collapsed faq_according" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            Q. What are the dimensions of the lenses?
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <span>Our lenses have a base curve of 8.60mm whereas the diameter ranges from 14.0 to 14.5mm. Each lens’ specifications are mentioned on its product page, including parameters such as lens thickness, oxygen permeability etc.</span>
                        </div>
                    </div>
                </div>
                <div class="accordion-item custom_accourding_item custom_main_faq_acc">
                    <h2 class="accordion-header" id="headingSix">
                        <button class="accordion-button collapsed faq_according" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                            Q. Are the lenses one-size-fits-all?
                        </button>
                    </h2>
                    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <span>No, contact lenses are not one-size-fits-all. They come in different sizes and prescriptions to fit the unique shape and curvature of each individual's eye. It is important to get a proper fitting from an eye care professional to ensure the comfort and proper function of the contact lenses.</span>
                        </div>
                    </div>
                </div>
                <div class="accordion-item custom_accourding_item custom_main_faq_acc">
                    <h2 class="accordion-header" id="headingSeven">
                        <button class="accordion-button collapsed faq_according" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                            Q. What color lens will suit me?
                        </button>
                    </h2>
                    <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <span>The best color contact lens for you will depend on your natural eye color, your skin tone, and the desired effect you want to achieve. You should consider factors such as your complexion, hair color and your iris color help you choose the perfect color contact lens for you. Typically, those with fair complexion opt for Green and Blue shades, whereas those with tan complexion go for natural colors like Gray and Brown. For better guidance, feel free to reach out to our customer support :)</span>
                        </div>
                    </div>
                </div>
                <div class="accordion-item custom_accourding_item custom_main_faq_acc">
                    <h2 class="accordion-header" id="headingEaght">
                        <button class="accordion-button collapsed faq_according" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseEaght" aria-expanded="false" aria-controls="collapseEaght">
                            Q. How long do the lenses last?
                        </button>
                    </h2>
                    <div id="collapseEaght" class="accordion-collapse collapse" aria-labelledby="headingEaght"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <span>Each collection has a different duration that the lenses will last. Joli – Exotic collection lenses are yearly disposable, Joli – Natural collection lenses are quarterly disposable, Joli – One Day Collections lenses are 1 day disposable, and Joli – Clear lenses are bi-yearly disposable.</span>
                        </div>
                    </div>
                </div>
                <div class="accordion-item custom_accourding_item custom_main_faq_acc">
                    <h2 class="accordion-header" id="headingNine">
                        <button class="accordion-button collapsed faq_according" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                            Q. Do Joli Lenses come in power/prescription?
                        </button>
                    </h2>
                    <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <span>Prescription lenses are for people with weak eyesight. We have lenses for both: people who have perfect eyesight and people who have weak eyesight. Most of our contact lenses are available in 0.00 to -6.00 whereas some have an even extended range at +5.00 to -10.00. These details can be found in the product page under “product specifications”</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section>

    {{ view('app.front-end.home-page.map', ['stores' => $data['stores'], 'cities'=>$data['cities']]) }}
@endsection
