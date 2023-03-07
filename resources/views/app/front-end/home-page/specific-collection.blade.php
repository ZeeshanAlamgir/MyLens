<?php
$urls = explode('/', URL::current());
$collection_id = ('App\Models\Collection')
    ::where('slug', $urls[5] ?? '')
    ->pluck('id')
    ->first();
$color_id = ('App\Models\Color')
    ::where('slug', $urls[5] ?? '')
    ->pluck('id')
    ->first();
$type_id = ('App\Models\Type')
    ::where('slug', $urls[5] ?? '')
    ->pluck('id')
    ->first();
$wear_id = ('App\Models\ReplacementCycle')
    ::where('slug', $urls[5] ?? '')
    ->pluck('id')
    ->first();
$style_id = ('App\Models\Style')
    ::where('slug', $urls[5] ?? '')
    ->pluck('id')
    ->first();
?>
@extends('app.front-end.layout.layout', ['data' => $data])
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

    .custom_header_container {
        background-color: white;
        box-shadow: 0 1px 0.25rem 0 rgb(0 0 0 / 34%) !important;
    }
    .page-link
    {
       border: 0px solid #dee2e6 !important;
    }

</style>
<style>
    .active {
        color: red;
    }
    .sh_by_collection .collection_color {
        padding-top: 1rem !important;
        padding-bottom: 1rem !important;
        padding-left: 1rem !important;
        padding-right: 1rem !important;
    }

    @media(max-width: 767px) {
        .sh_by_collection_col .sh_by_collection {
            display: grid !important;
        }

        .sh_by_collection_col .sh_by_collection li {
            padding-bottom: 0.9rem;
            padding-right: 0;
        }

        .collection_color_ul li,
        .shop_by_type {
            width: 100%;
        }

        .collection_section .col-md-3 {
            text-align: center
        }
    }

    .sh_by_collection .collection_color span {
        white-space: nowrap;
    }

    .loader {
        /* border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #3498db;
        width: 120px;
        height: 120px;
        -webkit-animation: spin 2s linear infinite; */
        /* Safari */
        /* animation: spin 2s linear infinite; */

        /* border: 16px solid #f3f3f3; */
        /* border-top: 16px solid blue;
        border-right: 16px solid green;
        border-bottom: 16px solid red; */
        /* border-left: 16px solid pink; */
        border-radius: 50%;
        border: 16px solid #d3bbda; /* Light grey */
        border-top: 16px solid #afcfe9;
        /* background: linear-gradient(90deg, #d3bbda, #afcfe9); */
        width: 120px;
        height: 120px;
        -webkit-animation: spin 2s linear infinite;
        animation: spin 2s linear infinite;
    }

    @-webkit-keyframes spin {
    0% { -webkit-transform: rotate(0deg); }
    100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
    }
    .click_border {
        /* border: 2px solid black !important; */
        font-weight: bold;
        color: black;
        font-weight: bold;
        border: solid 2px transparent !important;
        background-image: linear-gradient(rgba(255, 255, 255, 0), rgba(255, 255, 255, 0)), linear-gradient(90deg, #d3bbda, #afcfe9);
        background-origin: border-box;
        background-clip: content-box, border-box;
        box-shadow: 1px 1000px 1px #fff inset;
    }

    /* Safari */
    @-webkit-keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
        }
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
    .logo_2{
        display: block !important;
    }
    .logo{
        display: none !important;
    }
</style>

@section('content')
    <section class="collection_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 sh_by_collection_col">
                    <div class="shop_by_collections shop_by_color">
                        <h3 class="heading_3">Shop By <i>Collection</i></h3>
                    </div>
                    <ul class="d-flex ps-0 collection_color_ul sh_by_collection">
                        @forelse ($data['collections'] as $collection)
                            <li class="d-block @isset($collection_id) @if ($collection_id == $collection['id']) collections green @endif @endisset"
                                data-collection="{{ $collection['id'] }}">
                                <div
                                    class="collections @isset($collection_id) @if ($collection_id == $collection['id']) click_border @endif @endisset  collection_color">
                                    <span class="pt-2 p-0">{{ $collection['name'] }}</span>
                                </div>
                            </li>
                        @empty
                            <li class="d-block">
                                <div class="collections">
                                    <span class="pt-2">No Collection</span>
                                </div>
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 cok-lg-6 col-sm-12">
                    <div class="shop_by_color">
                        <h3 class="heading_3">Shop By <i>Color</i></h3>
                    </div>
                    <ul class="d-flex ps-0 collection_color_ul">
                        @forelse ($data['colors'] as $color)
                            <li class="d-block @isset($color_id) @if ($color_id == $color['id']) green @endif @endisset"
                                data-color_id={{ $color['id'] }}>
                                <div
                                    class="collection_color @isset($color_id) @if ($color_id == $color['id']) click_border @endif @endisset">
                                    <img src="{{ asset('app-assets') }}/images/colors/images/{{ $color['image'] }}"
                                        data-id="{{ $color['id'] }}" class="dropdown_color_image img-fluid color_id"
                                        alt="">
                                    <span class="pt-3">{{ $color['name'] }}</span>
                                    <input type="hidden" name="color_id[]" id="color_id">
                                </div>
                            </li>
                        @empty
                            <li class="d-block">
                                <div class="collection_color">
                                    <img src="{{ URL::to('/') }}/app-assets/images/img/Gray2.png" alt="">
                                    <span class="pt-2">green</span>
                                </div>
                            </li>
                        @endforelse
                    </ul>
                    <div class="shop_by_color">
                        <h3 class="heading_3">Shop By <i>type</i></h3>
                    </div>
                    <ul class="ps-0 collection_color_ul">
                        @forelse ($data['types'] as $type)
                            <li class="d-block shop_by_type_li @isset($type_id) @if ($type_id == $type['id']) types green @endif @endisset"
                                data-type_id="{{ $type['id'] }}" onclick="$(this).toggleClass('types')">
                                <div
                                    class="shop_by_type d-flex @isset($type_id) @if ($type_id == $type['id']) click_border @endif @endisset">
                                    <p class="emojy pe-3"><img
                                            src="{{ asset('app-assets') }}/images/type/{{ $type['image'] }}"
                                            class="dropdown_color_image img-fluid" alt="">
                                    </p>
                                    {{ $type['label'] }}
                                </div>
                            </li>
                        @empty
                            <li class="d-block">
                                <button class="shop_by_type d-flex">
                                    <p class="emojy pe-3">&#128578;</p> PERFECT EYESIGHT
                                </button>
                            </li>
                        @endforelse
                    </ul>
                </div>
                <div class="col-md-6">
                    <div class="shop_by_color">
                        <h3 class="heading_3">Shop By <i>wear Cycle</i></h3>
                    </div>
                    <ul class="d-flex ps-0 collection_color_ul">
                        @forelse ($data['wear_cycles'] as $wear_cycle)
                            <li class="d-block @isset($wear_id) @if ($wear_id == $wear_cycle['id']) wear_cycle green @endif @endisset"
                                data-wear_id="{{ $wear_cycle['id'] }}">
                                <div
                                    class="collection_color @isset($wear_id) @if ($wear_id == $wear_cycle['id']) click_border @endif @endisset">
                                    <img src="{{ asset('app-assets') }}/images/replacement-cycle/images/{{ $wear_cycle['image'] }}"
                                        class="img-fluid wear_cycle_id" alt="">
                                    <span class="pt-2">{{ $wear_cycle['name'] }}</span>
                                </div>
                            </li>
                        @empty
                            <li class="d-block">
                                <div class="collection_color">
                                    <img src="{{ URL::to('/') }}/app-assets/images/img/number-1.png" alt="">
                                    <span class="pt-2">green</span>
                                </div>
                            </li>
                        @endforelse

                    </ul>

                    <div class="shop_by_color">
                        <h3 class="heading_3">Shop By <i>Style</i></h3>
                    </div>

                    <ul class="ps-0 collection_color_ul style_collection">
                        @forelse ($data['styles'] as $style)
                            <li class="d-block @isset($style_id) @if ($style_id == $style['id']) styles_class green @endif @endisset"
                                data-style_id="{{ $style['id'] }}">
                                <button
                                    class="shop_by_type d-flex @isset($style_id) @if ($style_id == $style['id']) click_border @endif @endisset">
                                    <img src="{{ asset('app-assets') }}/images/style/{{ $style['image'] }}"
                                        id="{{ $style['id'] }}" class="shop_style_img img-fluid style_id" alt="">
                                    {{ $style['label'] }}
                                </button>
                            </li>
                        @empty
                            <li class="d-block">
                                <button class="shop_by_type d-flex"><img class="no_ball pe-3"
                                        src="{{ URL::to('/') }}/app-assets/images/img/Sandy Brown.png" alt="">
                                    PERFECT EYESIGHT</button>
                            </li>
                        @endforelse

                    </ul>
                </div>
                <div class="col-md-2 col-12 pt-3">
                    {{-- <button class="btn btn-outline-primary" id="clear_filters" onclick="clearFilters()"><i
                            class="fa fa-times pe-3" aria-hidden="true"></i>Clear Filters</button> --}}
                        {{-- <a class="by_online_btn ps-2 pe-2 pt-3 pb-3" href="" id="clear_filters" onclick="clearFilters()"><i class="fa fa-times pe-1" aria-hidden="true"></i> Clear Filters</a> --}}
                        {{-- <form action="{{ route('clear.filters') }}" method="GET"> --}}

                            <span class="by_online_btn ps-2 pe-2 pt-3 pb-3"  id="clear_filters" style="cursor: pointer"><i class="fa fa-times pe-1" aria-hidden="true"></i> Clear Filters</span>
                        {{-- </form> --}}
                </div>
            </div>
        </div>

        <div class="loader offset-5 d-none"></div>
        <?php
            $current_url = (url()->current());
            $is_contain = (str_contains($current_url,'products/'));
            // dd($is_contain);
        ?>
        @if($is_contain==true)
            <div class="container mt-5">
                <div class="no_prod_div d-none"><center><h3>No Product Found</h3></center></div>
                <div class="row" id="products-main-row">
                    @if(isset($data['collection_products']))
                    @forelse ($data['collection_products'] as $collection_product)
                        <div class="col-md-2 text-center collection_color__products  col-12">
                            <div class="card custom_pro_card">
                            <a href="{{ url('product-details') }}/{{ $collection_product['slug'] }}" class="column col-xs-6"
                                id="zoomIn">
                                <figure>
                                    <img class="text-center" id="collection_color__products___img"
                                        src="{{ asset('app-assets') }}/images/products/images/{{ $collection_product['image'] }}"
                                        alt="">
                                </figure>
                            </a>
                            <h6 id="collection_color__products___name">{{ $collection_product['name'] }}</h6>
                            <span style="margin-bottom: 2rem">@if($collection_product['replacement_cycle']) {{ $collection_product['replacement_cycle'] ? $collection_product['replacement_cycle']['name'] : '' }} USE @endif</span>
                        </div>
                        </div>
                    @empty
                        <center><h5>No Product Found</h5></center>
                    @endforelse
                    @endif
                </div>
            </div>
        @elseif($is_contain==false)
        <div class="container mt-5">
            <div class="no_prod_div d-none"><center><h3>No Product Found</h3></center></div>
            <div class="row" id="products-main-row">
                @if(isset($data['search_products']))
                @forelse ($data['search_products'] as $search_product)
                    <div class="col-md-2 text-center collection_color__products  col-12">
                        <div class="card custom_pro_card">
                        <a href="{{ url('product-details') }}/{{ $search_product['slug'] }}" class="column col-xs-6"
                            id="zoomIn">
                            <figure>
                                <img class="text-center" id="collection_color__products___img"
                                    src="{{ asset('app-assets') }}/images/products/images/{{ $search_product['image'] }}"
                                    alt="">
                            </figure>
                        </a>
                        <h6 id="collection_color__products___name">{{ $search_product['name'] }}</h6>
                        <span style="margin-bottom: 2rem">@if($search_product['replacement_cycle']) {{ $search_product['replacement_cycle'] ? $search_product['replacement_cycle']['name'] : '' }} USE @endif</span>
                    </div>
                    </div>
                @empty
                    <center><h5>No Product Found</h5></center>
                @endforelse
                @endif
            </div>
        </div>
        @endif


        @if($is_contain==true && isset($data['collection_products']))
            <div class="container mt-5 pb-5 d-flex justify-content-center links">
                <nav aria-label="...">
                    <ul class="pagination pagination-lg">
                        <li class="page-item" aria-current="page">
                            <span class="page-link">{{$data['collection_products']->links("pagination::bootstrap-4")}}</span>
                        </li>
                    </ul>
                </nav>
            </div>
        @endif
        {{view('app.front-end.home-page.map',['stores'=>$data['stores'],'cities'=>$data['cities'] ])}}

    </section>
@endsection

@section('custom-js')

    <script>
        let by = '';
        let color_push__array = [];
        let type_push__array = [];
        let wear_push__array = [];
        let style_push__array = [];
        let collection_push__array = [];

        $(document).ready(function() {
            by = "{{ $urls[4] ?? '' }}";
            if (by == "colors")
                color_push__array.push({{ $color_id }});
            else if (by == "types")
                type_push__array.push({{ $type_id }});
            else if (by == 'wear_cycle')
                wear_push__array.push({{ $wear_id }})
            else if (by == 'style')
                style_push__array.push({{ $style_id }});
            else if(by == 'collections') //new
                collection_push__array.push({{ $collection_id }}) //new
        });

        $(document).on('click', '.collection_color_ul li', function() {

            let id = $(this).data('color_id');
            let wear_id = $(this).data('wear_id');
            let type_id = $(this).data('type_id');
            let style_id = $(this).data('style_id');
            let collection = $(this).data('collection');
            if (!$(this).children().hasClass('click_border')) {
                if (wear_id) {
                    $(this).parent().children().children().removeClass('click_border');
                }

                if (style_id) {
                    $(this).parent().children().children().removeClass('click_border');
                }

                if (collection) {
                    $(this).parent().children().children().removeClass('click_border');
                }
            }

            if (wear_id) {
                if ($(this).hasClass('wear_cycle')) {
                    $(this).removeClass('wear_cycle');
                } else {
                    $(this).parent().children().removeClass('wear_cycle');
                    $(this).addClass('wear_cycle');
                }
            }

            if (collection) {
                if ($(this).hasClass('collections')) {
                    $(this).removeClass('collections');
                } else {
                    $(this).parent().children().removeClass('collections');
                    $(this).addClass('collections');
                }
            }

            if (style_id) {
                if ($(this).hasClass('styles_class')) {
                    $(this).removeClass('styles_class');
                } else {
                    $(this).parent().children().removeClass('styles_class');
                    $(this).addClass('styles_class');
                }
            }

            if (wear_id || style_id) {
                if ($(this).hasClass('green')) {
                    $(this).removeClass('green');
                } else {
                    $(this).parent().children().removeClass('green');
                    $(this).addClass('green');
                }
            } else {
                $(this).toggleClass('green');
            }

            $(this).children().toggleClass('click_border');

            if (id) {

                if ($(this).children().hasClass('click_border')) {
                    color_push__array.push(id);
                } else {
                    color_push__array = jQuery.grep(color_push__array, function(value) {
                        return value != id;
                    });
                }
            }

            if (type_id) {
                if ($(this).hasClass('types')) {
                    type_push__array.push(type_id);
                } else {
                    type_push__array = jQuery.grep(type_push__array, function(value) {
                        return value != type_id;
                    });
                }
            }

            if (wear_id) {
                if ($(this).hasClass('wear_cycle')) {
                    wear_push__array = [];
                    wear_push__array.push(wear_id);
                } else {
                    wear_push__array = [];
                }
            }

            if (collection) {
                if ($(this).hasClass('collections')) {
                    collection_push__array = [];
                    collection_push__array.push(collection);
                } else {
                    collection_push__array = [];
                }
            }

            if (style_id) {
                if ($(this).hasClass('styles_class')) {
                    style_push__array = [];
                    style_push__array.push(style_id);
                } else {
                    style_push__array = [];
                }
            }
            fetchFilterProducts(color_push__array, type_push__array, wear_push__array, style_push__array,
                collection_push__array);
        });

        function clearFilters() {
            color_push__array = [];
            type_push__array = [];
            wear_push__array = [];
            style_push__array = [];
            collection_push__array = [];
            //Remove Style Classes

            //Style
            $(".collection_color_ul li").removeClass("styles_class");

            //Type
            $(".collection_color_ul li").removeClass("types");

            //Cycle
            $(".collection_color_ul li").removeClass("wear_cycle");

            //Collection
            $(".collection_color_ul li").removeClass("collection");

            //Common
            $(".collection_color").removeClass("click_border");
            $(".shop_by_type").removeClass("click_border");
            $(".collection_color_ul li").removeClass("green");

            fetchFilterProducts(color_push__array, type_push__array, wear_push__array, style_push__array);
        }

        function fetchFilterProducts(color_push__array, type_push__array, wear_push__array, style_push__array)
        {
            let id = null;

            if ('{{ $collection_id }}') {
                id = '{{ $collection_id }}';
            }

            if ('{{ $type_id }}') {
                id = '{{ $type_id }}';
            }

            if ('{{ $color_id }}') {
                id = '{{ $color_id }}';
            }

            if ('{{ $wear_id }}') {
                id = '{{ $wear_id }}';
            }

            if ('{{ $style_id }}') {
                id = '{{ $style_id }}';
            }
            $.ajax({
                type: "GET",
                url: "{{ url('filters') }}/" + id,
                data: {
                    colors: color_push__array,
                    type_push__array: type_push__array,
                    wear_push__array: wear_push__array,
                    style_push__array: style_push__array,
                    collection_push__array: collection_push__array,
                },
                dataType: "json",
                beforeSend: function() {
                    // toastr.info('Please Wait Filter is Clearing...');
                    $(".loader").removeClass('d-none').addClass('d-block');
                },
                success: function(response) {
                    if (response.status) {
                        $(".loader").addClass('d-none');
                        $('#products-main-row').empty();
                        $('.pagination').addClass('d-none');
                        if(response.collection_products.length>0) //zeeshan new
                        {
                            $('.no_prod_div').removeClass('d-block').addClass('d-none');
                            response.collection_products.forEach(function(collection_product) {
                            $('#products-main-row').append(`
                            <div class="col-md-2 text-center collection_color__products col-12">
                                <div class="card custom_pro_card">
                                <a href = "{{ url('product-details') }}/${collection_product['slug']}" class = "column col-xs-6" id = "zoomIn">
                                    <figure>
                                        <img class="text-center" id="collection_color__products___img" src="{{ asset('app-assets') }}/images/products/images/${collection_product.image}" alt="">
                                    </figure>
                                </a>
                                <h6 id="collection_color__products___name">${collection_product.name}</h6>
                                <span style="margin-bottom: 2rem">${collection_product.replacement_cycle ? collection_product.replacement_cycle.name : ''} USE</span>
                                </div>
                                </div>
                            `);
                            });
                        }
                        else if(response.collection_products.length==0)
                        {
                            $('.no_prod_div').removeClass('d-none').addClass('d-block');
                        }
                    }
                },
                error: function(error)
                {
                    console.log(error);
                }
            });
        }

        // $(document).on('click','#clear_filters',function(){
        //     $.ajax({
        //         type: "GET",
        //         url: "{{ route('filters.clear') }}",
        //         // data: "data",
        //         // dataType: "dataType",
        //         beforeSend: function() {
        //             $('.collection_color').removeClass('click_border');
        //             $(".loader").removeClass('d-none').addClass('d-block');
        //         },
        //         success: function (response) {
        //             $(".loader").addClass('d-none');
        //             if (response.status) {
        //                 // location.reload();
        //                 $('.links').addClass('d-none')
        //                 $(".loader").addClass('d-none');
        //                 $('#products-main-row').empty();
        //                 response.products.forEach(function(product) {
        //                     $('#products-main-row').append(`
        //                     <div class="col-md-2 text-center collection_color__products  col-12">
        //                         <div class="card custom_pro_card">
        //                         <a href = "{{ url('product-details') }}/${product['slug']}" class = "column col-xs-6" id = "zoomIn">
        //                             <figure>
        //                                 <img class="text-center" id="collection_color__products___img" src="{{ asset('app-assets') }}/images/products/images/${product.image}" alt="">
        //                             </figure>
        //                         </a>
        //                         <h6 id="collection_color__products___name">${product.name}</h6>
        //                         <span style="style="margin-bottom: 2rem"">${product.replacement_cycle ? product.replacement_cycle.name : ''} USE</span>
        //                         </div>
        //                         </div>
        //                     `);
        //                 });
        //             }
        //         }
        //     });
        // });
        $(document).on('click','#clear_filters',function(){
            $.ajax({
                type: "GET",
                url: "{{ route('filters.clear') }}",
                // data: "data",
                // dataType: "dataType",
                beforeSend: function() {
                    $('.collection_color').removeClass('click_border');
                    $(".loader").removeClass('d-none').addClass('d-block');
                },
                success: function (response) {
                    $(".loader").addClass('d-none');
                    // if (response.status) {
                    //     // location.reload();
                    //     $('.links').addClass('d-none')
                    //     $(".loader").addClass('d-none');
                    //     $('#products-main-row').empty();
                    //     response.products.forEach(function(product) {
                    //         $('#products-main-row').append(`
                    //         <div class="col-md-2 text-center collection_color__products  col-12">
                    //             <div class="card custom_pro_card">
                    //             <a href = "{{ url('product-details') }}/${product['slug']}" class = "column col-xs-6" id = "zoomIn">
                    //                 <figure>
                    //                     <img class="text-center" id="collection_color__products___img" src="{{ asset('app-assets') }}/images/products/images/${product.image}" alt="">
                    //                 </figure>
                    //             </a>
                    //             <h6 id="collection_color__products___name">${product.name}</h6>
                    //             <span style="font-size: 11px;">${product.replacement_cycle ? product.replacement_cycle.name : ''} USE</span>
                    //             </div>
                    //             </div>
                    //         `);
                    //     });
                    // }
                    window.location.href = "{{ route('all.products') }}";
                }
            });
        });
    </script>
@endsection
