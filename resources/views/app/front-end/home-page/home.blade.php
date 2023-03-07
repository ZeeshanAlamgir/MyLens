@extends('app.front-end.layout.layout',['data'=>$data])

@section('custom-css')
<style>
    #map
    {
      position: absolute;
      top: 0;
      bottom: 0;
      width: 100%;
    }
</style>

@endsection

@section('content')

    {{ view('app.front-end.layout.content',['data' => $data] ) }}

@endsection

@section('custom-js')

<script>

    $(document).ready(function(){
        $('.home-slider1').owlCarousel({
        loop: true,
        margin: 11,
        stagePadding: 0,
        nav: true,
        dots: false,
        autoplayTimeout: 5000,
        autoplay: true,
        responsive: {
            0: {
                items: 3
            },

            600: {
                items: 3
            },

            1024: {
                items: 5
            },

            1366: {
                items: 5
            }
        }
    });

    $(".owl-prev").html('<img src="{{ asset('app-assets/front-end/Asset 6.png') }}">');
    $(".owl-next").html('<img src="{{ asset('app-assets/front-end/Asset 7.png') }}">');
    });

    $(document).on('change','#city_id',function(){
        let id = $(this).val();
        $.ajax({
            type: "GET",
            url: "{{route('city.cityStores')}}",
            data: {
                id:id
            },
            dataType: "JSON",
            success: function (response)
            {
                if(response.status)
                {
                    $('#location_address').empty();
                    response.stores.forEach(store=>{
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

    // $(document).on('click','.authorize_retailers',function(){
    //     $('.log_area').addClass('d-none');
    //     $('.google_map').removeClass('d-none').addClass('d-block');
    //     // $('#flexSwit').attr('checked',true);
    //     if($('#flexSwit').is(':checked'))
    //     {
    //         $('#flexSwit').attr('checked',false);
    //     }
    //     else
    //     {
    //         $('#flexSwit').attr('checked',true);
    //     }

    //     // if($('#flexSwit').is(':checked'))
    //     //     $('#flexSwit').attr('checked',true);
    // });

    // $(document).on('click','#flexSwit',function(){
    //     $('.google_map').toggleClass('d-none');
    //     if($(this).is(':checked'))
    //     {
    //         $(this).attr('checked',false);
    //     }
    //     else
    //     {
    //         $(this).attr('checked',true);
    //     }
    // })

</script>

@endsection
