<style>
    .flag-icon-uk{
        background-image: url('../../../../../app-assets/front-end/flage/uk.svg') !important;
    }

    @media(max-width: 767px) {
        .bootstrap-select .dropdown-toggle .filter-option-inner-inner {
            font-size: 14px;
        }
        .bootstrap-select>.dropdown-toggle{
            padding-right: 0 !important;
        }
        .trans-section .dropdown-menu {
        right: -1rem !important;
    }
    }

    .trans-section .dropdown-menu {
        background: none !important;
        border: none !important;
    }

    .trans-section .dropdown-menu li {
        background: white;
        /* border: none; */
    }

    .bootstrap-select .dropdown-menu li {
        line-height: 35px;
    }

    .bootstrap-select .dropdown-menu li a span.text {
        display: inline-block;
        color: black;
        font-family: unset;
    }

    .bootstrap-select .dropdown-menu li a {
        padding: 0 !important;
        text-decoration: none;
        font-size: 13px !important;
        white-space: nowrap;
        line-height: 31px !important;
    }

    .inner ul {
        padding-left: 0 !important;
    }

    .bootstrap-select:not([class*=col-]):not([class*=form-control]):not(.input-group-btn) {
        width: auto;
    }

    .bootstrap-select>.dropdown-toggle {
        width: auto !important;
        padding-top: 0.7rem !important;
    }

    .bootstrap-select .dropdown-toggle:focus,
    .bootstrap-select>select.mobile-device:focus+.dropdown-toggle {
        outline: unset !important;
        outline: 0px auto -webkit-focus-ring-color !important;
        outline-offset: unset !important;
        border: none !important;
    }

    .dropdown-menu li .flag-icon {
        display: none;
    }

    .bootstrap-select .dropdown-menu li {
        text-align: start;
        padding-left: 1rem;
        padding-right: 1rem
    }

    .goog-te-banner-frame.skiptranslate {
        display: none !important;
    }

    body {
        top: 0px !important;
    }

    .goog-logo-link {
        display: none !important;
    }

    .trans-section {
        margin: 100px;
    }
</style>
<style>
    .logo_2 {
        display: none;
    }

    .custom_header_container:hover .logo {
        display: none;
    }

    .custom_header_container:hover .logo_2 {
        display: block;
    }
</style>
<style>
    @media(max-width: 1200px) {
        .custom_logo_mobile {
            display: none !important;
        }
    }

    .custom_men div {
        width: 25px;
        height: 3px;
        background-color: black;
        margin: 6px 0;
        cursor: pointer;
    }

    .custom_mobile_men {
        display: none;
    }

    .custom_mobile_ul {
        align-items: center;
        /* justify-content: space-between; */
        /* justify-content: center; */
        padding-left: 11px !important;
        padding-right: 11px !important;
    }
</style>

<div class="alert fade show mb-0 p-2 header_alert" role="alert">
    <div class="container-fluid">
        {{-- Joli leneses available for retail now! <a href="#">Click here</a> if you are interested in becoming a
        reseller. --}}
        <center>
            <a href="{{ $data['become_seller']['href'] ?? '--' }}">
                {{ $data['become_seller']['title'] ?? '--' }}
            </a>
        </center>
    </div>

</div>


<div class="main_header">
    <div class="container-fluid p-0 custom_header_container">

        <div class="nav pe-5">


            <input type="checkbox" id="nav-check" />
            <div class="nav-header custom_logo_mobile ps-5">



                <div class="nav-title">

                    <a href="/">

                        <img src="{{ asset('app-assets') }}/front-end/logo/logo.svg" class="img-fluid logo"
                            alt="">
                        <img src="{{ asset('app-assets') }}/front-end/logo/logo.png" class="img-fluid logo_2"
                            style="width: 112px;" alt="">

                    </a>
                </div>
            </div>


            <div class="d-flex justify-content-end main_header_icon_r align-items-center">

            </div>
            <div class="nav-btn custom_mobile_men w-100">
                <ul class="d-flex w-100 custom_mobile_ul">
                    <li class="d-block" style="width: 33%">
                        {{-- <button class="btn btn-primary" > toggle</button> --}}
                        <div class="d-flex align-items-center">
                            <div class="custom_men" onclick="openNav()" style="padding-right: 1.5rem;">
                                <div></div>
                                <div></div>
                                <div></div>
                            </div>
                            <a class="nav_icon search_btn ms-0 ps-0" style="margin-left: 1.5rem;" href=""
                                data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <i class="text-dark fa-solid fa-magnifying-glass" style="font-size: 20px"></i>
                            </a>
                        </div>

                    </li>
                    {{-- <li class="d-block">
                        <a class="nav_icon search_btn ms-0 ps-0" style="margin-left: 1rem;" href=""
                                data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <i class="text-dark fa-solid fa-magnifying-glass"></i>
                            </a>
                    </li> --}}
                    <li class="d-block text-end"
                        style="    width: 33%;
                    text-align: center !important;
                    justify-content: center;
                    display: flex !important;">
                        <div class="nav-title">

                            <a href="/">

                                <img src="{{ asset('app-assets') }}/front-end/logo/logo.svg" class="img-fluid logo"
                                    alt="">
                                <img src="{{ asset('app-assets') }}/front-end/logo/logo.png" class="img-fluid logo_2"
                                    style="width: 83px;" alt="">

                            </a>
                        </div>
                    </li>
                    <li class="d-block" style="width: 33%; text-align: end;">

                        {{-- <select name="" id="" class=" custom_flage_drop2" style="font-size: 22px;">
                            <option value="PK" selected>&#127477;&#127472;</option>
                            <option value="AFG">&#127462;&#127467;</option>
                            <option value="CH">&#127464;&#127475;</option>
                            <option value="IR">&#127470;&#127479;</option>
                            <option value="TR">&#127481;&#127479;</option>
                        </select> --}}

                        <div class="trans-section m-0">
                            {{-- <div id="google_translate_element" style=""></div> --}}
                            <select class="selectpicker" style="display: block !important;"
                                onchange="translateLanguage(this.value);">
                                <option data-content='<span class="flag-icon flag-icon-pk"></span> PK'
                                    {{ $data['country_flag'] ? ($data['country_flag']['country_flag'] == 'PK' ? 'selected' : '') : '' }}
                                    value="PK">PK</option>
                                <option data-content='<span class="flag-icon flag-icon-us"></span> USA'
                                    {{ $data['country_flag'] ? ($data['country_flag']['country_flag'] == 'USA' ? 'selected' : '') : '' }}
                                    value="USA">USA</option>
                                <option
                                    data-content='<span class="flag-icon flag-icon-ua"></span> UAE'{{ $data['country_flag'] ? ($data['country_flag']['country_flag'] == 'UAE' ? 'selected' : '') : '' }}
                                    value="UAE">UAE</option>
                                <option data-content='<span class="flag-icon flag-icon-uk"></span> UK'
                                    {{ $data['country_flag'] ? ($data['country_flag']['country_flag'] == 'UK' ? 'selected' : '') : '' }}
                                    value="UK">UK</option>
                                <option data-content='<span class="flag-icon flag-icon-br"></span> BRAZIL'
                                    {{ $data['country_flag'] ? ($data['country_flag']['country_flag'] == 'BRAZIL' ? 'selected' : '') : '' }}
                                    value="BRAZIL">BRAZIL</option>
                                <option data-content='<span class="flag-icon flag-icon-me"></span> MEXICO'
                                    {{ $data['country_flag'] ? ($data['country_flag']['country_flag'] == 'MEXICO' ? 'selected' : '') : '' }}
                                    value="MEXICO">MEXICO</option>

                            </select>
                        </div>

                    </li>
                </ul>

                <style>
                    @media (min-width: 767px) {
                        ul.nav li.dropdown:hover>ul.dropdown-menu {
                            display: block !important;
                        }
                    }
                </style>

            </div>



            <div class="nav-links ">

                <ul class="d-flex navbar-nav me-auto ps-lg-0 custom_drop_ul" style="display: inline-flex;">
                    <!-- Navbar dropdown -->
                    <li class="nav-item dropdown dropdown-hover position-static">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-mdb-toggle="dropdown" aria-expanded="false">
                            <span class="custom_underline" style="padding-bottom: 6px;">Colored Contact Lenses</span>
                        </a>
                        <!-- Dropdown menu -->
                        <div class="dropdown-menu w-100 mt-0 pb-0" aria-labelledby="navbarDropdown"
                            style="border-top-left-radius: 0; border-top-right-radius: 0;">

                            {{ view('app.front-end.home-page.header-collection', ['collections' => $data['collections']]) }}

                            <div class="drop_section_2">
                                <div class="container">
                                    <div class="row">

                                        {{ view('app.front-end.home-page.header-color', ['colors' => $data['colors']]) }}

                                        {{ view('app.front-end.home-page.header-type', ['types' => $data['types']]) }}

                                        {{ view('app.front-end.home-page.header-cycle', ['wear_cycles' => $data['wear_cycles']]) }}

                                        {{ view('app.front-end.home-page.header-style', ['styles' => $data['styles']]) }}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>

                <!-- Left links -->
                <div class="dropdown custom_drop_hover">
                    <a class="dropbtn about_pointer"><span class="custom_underline" style="padding-bottom: 6px;">About
                            Us</span></a>
                    <div class="dropdown-content">
                        <a href="{{ route('our-story') }}">OUR STORY</a>
                        <a href="{{ route('distributors') }}">INTERNATIONAL NETWORK</a>
                        {{-- <a href="{{ route('certificates') }}">CERTIFICATIONS</a> --}}
                    </div>
                </div>
                <a href="{{ route('merchandising') }}"><span class="custom_underline">Merchandising</span></a>
                <a href="{{ route('contact-us') }}"><span class="custom_underline">Contact us</span></a>
                <a class="nav_icon search_btn" style="margin-left: 1rem;" href="" data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </a>

                {{-- Flags Dropdown --}}
                {{-- <select class="selectpicker countrypicker" data-flag="true" ></select> --}}

                {{-- <select name="" id="" class=" custom_flage_drop2">
                    <option value="PK" selected>&#127477;&#127472;</option>
                    <option value="AFG">&#127462;&#127467;</option>
                    <option value="CH">&#127464;&#127475;</option>
                    <option value="IR">&#127470;&#127479;</option>
                    <option value="TR">&#127481;&#127479;</option>
                </select> --}}
                <div class="trans-section m-0">
                    {{-- <div id="google_translate_element" style=""></div> --}}
                    <select class="selectpicker" style="display: none !important;"
                        onchange="translateLanguage(this.value);">
                        <option data-content='<span class="flag-icon flag-icon-pk"></span> PK'
                            {{ $data['country_flag'] ? ($data['country_flag']['country_flag'] == 'PK' ? 'selected' : '') : '' }}
                            value="PK">
                            PK</option>
                        <option data-content='<span class="flag-icon flag-icon-us"></span> USA'
                            {{ $data['country_flag'] ? ($data['country_flag']['country_flag'] == 'USA' ? 'selected' : '') : '' }}
                            value="USA">
                            USA</option>
                        <option data-content='<span class="flag-icon flag-icon-ua"></span> UAE'
                            {{ $data['country_flag'] ? ($data['country_flag']['country_flag'] == 'UAE' ? 'selected' : '') : '' }}
                            value="UAE">
                            UAE</option>
                        <option data-content='<span class="flag-icon flag-icon-uk"></span> UK'
                            {{ $data['country_flag'] ? ($data['country_flag']['country_flag'] == 'UK' ? 'selected' : '') : '' }}
                            value="UK">
                            UK</option>
                        <option data-content='<span class="flag-icon flag-icon-br"></span>
                        BRAZIL'
                            {{ $data['country_flag'] ? ($data['country_flag']['country_flag'] == 'BRAZIL' ? 'selected' : '') : '' }}
                            value="BRAZIL">
                            BRAZIL</option>
                        <option data-content='<span class="flag-icon flag-icon-mx"></span> MEXICO'
                            {{ $data['country_flag'] ? ($data['country_flag']['country_flag'] == 'MEXICO' ? 'selected' : '') : '' }}
                            value="MEXICO">
                            MEXICO</option>

                    </select>
                </div>

            </div>
        </div>
    </div>


</div>

<!-- mobile menu -->
<div id="mySidenav" class="sidenav">


    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="#" class="mobile_dropdoen_main">
        <h2 class="custom_mob_men_link">Colored Contact Lenses</h2>
    </a>
    <span class="mobile_menu_label">SHOP BY <i>COLLECTION</i></span>

    @forelse ($data['collections'] as $collection)
        <a class="mobile_menu_link"
            href="{{ url('products/collections') }}/{{ $collection['slug'] }}">{{ $collection['name'] }}</a>
    @empty
    @endforelse

    <span class="mobile_menu_label">SHOP BY <i>COLOR</i></span>

    @forelse ($data['colors'] as $color)
        <a class="mobile_menu_link"
            href="{{ url('products/colors') }}/{{ $color['slug'] }}">{{ $color['name'] }}</a>
    @empty
    @endforelse

    <span class="mobile_menu_label">SHOP BY <i>TYPE</i></span>
    @forelse ($data['types'] as $type)
        <a class="mobile_menu_link" href="{{ url('products/types') }}/{{ $type['slug'] }}">{{ $type['label'] }}</a>
    @empty
    @endforelse

    <span class="mobile_menu_label">SHOP BY <i>WEAR CYCLE</i></span>
    @forelse ($data['wear_cycles'] as $wear_cycle)
        <a class="mobile_menu_link"
            href="{{ url('products/wear_cycle') }}/{{ $wear_cycle['slug'] }}">{{ $wear_cycle['name'] }}</a>
    @empty
    @endforelse


    <span class="mobile_menu_label">SHOP BY <i>STYLE</i></span>
    @forelse ($data['styles'] as $style)
        <a class="mobile_menu_link"
            href="{{ url('products/style') }}/{{ $style['slug'] }}">{{ $style['label'] }}</a>
    @empty
    @endforelse

    {{-- <span class="mobile_menu_label mb-0">About us</span> --}}
    <span class="mobile_menu_label">ABOUT US</span>
    <a class="mobile_menu_link" href="{{ route('our-story') }}">OUR STORY</a>
    <a class="mobile_menu_link" href="{{ route('distributors') }}">INTERNATIONAL NETWORK</a>
    {{-- <a class="mobile_dropdoen_main" href="{{ route('certificates') }}">CERTIFICATIONS</a> --}}
    {{-- <a class="mobile_dropdoen_main" href="{{ route('distributors') }}">Distributors</a> --}}
    <br>
    <a class=" mobile_menu_label" href="{{ route('merchandising') }}">MERCHANDISING</a>
    <a class=" mobile_menu_label" href="{{ route('contact-us') }}">CONTACT US</a>
    <br>

    <!-- mobile menu -->

    <!-- search model -->

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog pt-4">
            <div class="modal-content custom_model_content">
                <div class="modal-header custom_model_header">
                    <h5 class="modal-title" id="staticBackdropLabel"></h5>
                    <button type="button" class="custom_close_btn" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa fa-xmark"></i></button>
                </div>
                <div class="modal-body">
                    <div class="custom_main_search">
                        <i class="fa-solid fa-magnifying-glass model_search_icon"></i>
                        <form action="{{ route('collections') }}" method="GET">
                            <input type="text" name="search" id="search" required
                                class="search form-control custom_searchbar"
                                placeholder="Search Product...">
                        </form>
                    </div>
                </div>
                <div class="modal-footer pt-4 pb-4">

                </div>
            </div>
        </div>
    </div>
    <!-- search model -->
</div>


<style>
    .custom_mob_men_link {
        font-weight: bold;
        font-size: 22px;
    }
</style>
