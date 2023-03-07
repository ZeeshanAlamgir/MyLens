@extends('app.front-end.layout.layout', ['data' => $data])
<style>
    .custom_switch_li{
        z-index: 0 !important;
    }
</style>
@section('content')
    <section>
        <div class="contact_banner">
            <img class="img-fluid" src="{{asset('app-assets')}}/images/certification/banner.png" alt="">
        </div>


        <div class="container">
            <div class="shop_by_color">
                <h3 class="heading_3 text-center">CERTIFICATIONS</h3>
            </div>

        </div>

        <div class="container custom_cert_container" style="max-width: 85%">

            <div class="row">
                @if (isset($data['certificates']))
                    @foreach ($data['certificates'] as $certificate)
                        <div class="col-md-4 col-6">
                            <a class="" data-bs-toggle="modal" href="#exampleModalToggle" role="button">
                                <img class="img-fluid" id="certificate_img" src="{{asset('app-assets')}}/images/certification/{{$certificate['image']}}" alt="">
                            </a>
                            <div class="cert_content">
                                <span> {{$certificate['description']}} </span>
                            </div>

                        </div>
                    @endforeach
                @endif
            </div>
        </div>


        {{-- modal --}}
        <div class="container">
            <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
                tabindex="-1">
                <div class="modal-dialog modal-dialog-centered custom_crt_modal">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalToggleLabel"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <img class="img-fluid modal_preview__img" src="" alt="">
                        </div>
                    </div>
                </div>
            </div>

        </div>
        {{-- modal --}}
    </section>

    {{ view('app.front-end.home-page.map', ['stores' => $data['stores']]) }}
@endsection

@section('custom-js')
<script>
    $(document).on('click','#certificate_img',function(){
        let image = $(this).attr('src');
        $('.modal_preview__img').attr('src',image);
    })
</script>
@endsection
