<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Joli® Official Store | Colored Lenses | FDA Approved | Comfortable Lenses</title>
    <link rel="icon" type="image/x-icon" href="{{asset('app-assets')}}/images/icons/Fav-Icon.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/vendors/css/extensions/toastr.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets') }}/css/plugins/extensions/ext-component-toastr.min.css">
    @yield('page-css')
    <style>
        /* .remove_underline
        {
            text-decoration: none !important;
        } */
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="{{ asset('app-assets') }}/css/style/style.css" />
    <link rel="stylesheet" href="{{ asset('app-assets') }}/css/style/animate.css" />
    <link href="//cdn.shopify.com/s/files/1/0669/0471/9651/t/23/assets/font.css?v=59849267649409343101667891144" rel="stylesheet" type="text/css" media="all" />
    {{-- <link rel="stylesheet" href="https://jsuites.net/v4/jsuites.css" type="text/css" /> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css" rel="stylesheet" type="text/css" />
    <!-- Google tag (gtag.js) -->

    {{-- <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script> --}}
    {{-- <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit" type="text/javascript"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function(){
            $('.selectpicker').selectpicker();
        });
    </script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-LGYGLBKNFR"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-LGYGLBKNFR');
    </script>

</head>

<body>
    {{ view('app.front-end.layout.header', ['data' => $data]) }}
    @yield('content')
    {{ view('app.front-end.layout.footer') }}

    @yield('page-js')



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

 {{-- }}/js/wow.js"></script> --}}
    <script src="{{ asset('app-assets') }}/js/wow.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/extensions/toastr.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/extensions/polyfill.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/extensions/toastr.min.js"></script>


    {{-- @yield('vendor-js') --}}

    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets') }}/css/plugins/extensions/ext-component-toastr.min.css">

    @yield('custom-js')


    <script>
        $(function() {
            // Owl Carousel
            var owl = $(".owl-carousel");
            owl.owlCarousel({
                items: 1,
                margin: 10,
                loop: true,
                nav: true,
                arrow: false,
                dots: true,
                autoplay: true,
            });
        });
    </script>


    <!-- mobile Menu -->
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "100%";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>
    <!-- mobile Menu -->

    <!-- sidebar -->
    <script>
        function openNav2() {
            document.getElementById("mySidenav2").style.width = "100%";
        }

        function closeNav2() {
            document.getElementById("mySidenav2").style.width = "0";
        }
    </script>
    <!-- sidebar -->

    <!-- youtube video  -->

    <script>
        $(document).ready(function() {
            $("#youtube_btn").click(function() {
                $("#youtube_video").show();
                $("#youtube_video").removeClass('d-none').addClass('d-block');
                $("#youtube_btn").hide();
            });

        });
    </script>


    <script>
        wow = new WOW({
            animateClass: 'animated',
        });
        wow.init();
    </script>

    <script>
        let map;
        let marker;

        function myMap() {

            var mapProp = {
                center: new google.maps.LatLng(33.565319265152965, 73.01831717229476),
                zoom: 5,
            };

            map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

        }

        $(document).on('click', '.store_ul', function() {

            let lat = $(this).children('.store_li').data('lat');
            let lng = $(this).children('.store_li').data('lng');

            let name = $(this).children('.store_li').data('name');
            let address = $(this).children('.store_li').data('address');

            let url = 'https://www.google.com/maps/?q=' + lat + ',' + lng;

            if (marker && marker.setMap) {
                marker.setMap(null);
            }

            marker = new google.maps.Marker({
                position: {
                    lat: lat,
                    lng: lng
                },
                animation: google.maps.Animation.BOUNCE
            });

            marker.setMap(map);

            var infowindow = new google.maps.InfoWindow({
                content: '<h3>' + name + '</h3><p>' + address + '</p><a target="blank" href="' + url +
                    '" style="text-decoration:none;" >View larger map</a>',

            });

            infowindow.open(map, marker);

        });
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwpDMOezsYP1l-pqetH8Gc3aMMIc0iuB8&callback=myMap"></script>


    <script>
        $(document).on('click', '.authorize_retailers', function() {
            $('.google_map').removeClass('d-none').addClass('d-block');
            if (!$('#flexSwit').is(':checked'))
                $("#flexSwit").trigger('click');
        });

        $("#flexSwit").click(function() {
            if ($(this).is(':checked')) {
                $('.google_map').removeClass('d-none').addClass('d-block');
                $('.log_arrea').removeClass('d-block').addClass('d-none');
                $(this).attr('checked', false);
            } else {
                $('.google_map').removeClass('d-block').addClass('d-none');
                $('.log_arrea').removeClass('d-none').addClass('d-block');
                $(this).attr('checked', true);
            }
        });


        $(document).on('change', '#city_id', function() {
            let id = $(this).val();
            $.ajax({
                type: "GET",
                url: "{{ route('city.cityStores') }}",
                data: {
                    id: id
                },
                dataType: "JSON",
                success: function(response) {
                    if (response.status) {
                        $('#location_address').empty();
                        response.stores.forEach(store => {
                            $('#location_address').append(`
                                    <ul class="d-flex ps-0 store_ul">
                                        <li class="d-block pe-3">
                                            <i class="fa-solid fa-location-dot location_pin"></i>
                                        </li>
                                        <li class="d-block store_li store_id" data-name="${store.name}" data-address="${store.address}" data-lat="${store.latitude}" data-lng="${store.longitude}">
                                            <div class="Location_address">
                                                <h2>${store.name}</h2>
                                                <p>${store.address}</p>
                                            </div>
                                        </li>
                                        <hr/>
                                    </ul>`);
                        });
                    }
                }
            });
        })

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        $(document).on('submit', '#search_form', function(e) {
            e.preventDefault();
            let search = $(this).serialize();
            $.ajax({
                type: "GET",
                url: "{{ route('collections') }}",
                data: search,
                dataType: "dataType",
                success: function(response) {

                }
            });
        });

        $('.custom_searchbar').keypress(function(event) {
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if (keycode == 13)
                $('#search_form').trigger('submit');
        });

        // Country Start

        // Country End

        function translateLanguage(flag)
        {
            $.ajax({
                type: "GET",
                url: "{{ route('country-flag') }}",
                data: {
                    flag: flag
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    </script>

</body>

</html>
