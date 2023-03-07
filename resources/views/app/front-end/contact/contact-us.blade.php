@extends('app.front-end.layout.layout', ['data' => $data])

@section('page-vendor')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/vendors/css/extensions/toastr.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets') }}/css/plugins/extensions/ext-component-toastr.min.css">
@endsection

@section('page-css')
@endsection

@section('custom-css')
@endsection

@section('content')
    <style>
        /* .custom_header_container {
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
        } */

.form-label{
  font-weight: 500;
}
    </style>
    <section>
        <div class="contact_banner">
            <img class="img-fluid w-100" src="{{ asset('app-assets') }}/images/contactus/banner.jpg" alt="">
        </div>

        <div class="container">
            <div class="shop_by_color">
                <h3 class="heading_3 text-center">contact us</h3>
            </div>
            <div class="pt-4 pb-5">
                <form id="contact_us__form">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">FULL NAME</label>
                        <input type="text" class="form-control" id="full_name" name="full_name" >
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">PHONE NO</label>
                        <input type="number" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">SHOP NAME</label>
                        <input type="text" class="form-control" id="shop_name" name="shop_name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">CITY</label>
                        <input type="text" class="form-control" id="city_name" name="city_name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">SUBJECT</label>
                        <input type="text" class="form-control" id="subject" name="subject">
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">MESSAGE</label>
                        <textarea class="form-control" id="message" name="message" id="message" rows="7"></textarea>
                    </div>

                    <div class="text-center pt-3 pb-3">
                        <a class="form_btn_send" href="#"> <button class="btn">SEND</button></a>
                    </div>
                </form>
            </div>

        </div>
    </section>

    {{ view('app.front-end.home-page.map', ['stores' => $data['stores'], 'cities'   => $data['cities']]) }}
@endsection

@section('vendor-js')
    <script src="{{ asset('app-assets') }}/vendors/filepond/plugins/filepond.preview.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/filepond/plugins/filepond.typevalidation.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/filepond/plugins/filepond.imagecrop.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/filepond/plugins/filepond.imagesizevalidation.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/filepond/plugins/filepond.filesizevalidation.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/filepond/filepond.min.js"></script>
@endsection

@section('page-js')
    <script src="{{ asset('app-assets') }}/vendors/js/extensions/toastr.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection

@section('custom-js')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        $(document).on('submit', '#contact_us__form', function(e) {
            e.preventDefault();
            let data = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "{{ route('contact-us.store') }}",
                data: data,
                dataType: "json",
                success: function(response) {
                    if (response.status == 204) {
                        toastr.success('Contact Us Added Successfully.');
                        $('#contact_us__form')[0].reset();
                    } else if (response.status == 400) {
                        if ($('#full_name').val() == '' || $('#full_name').val() == null)
                            toastr.error('First Name is Required.');
                        else if ($('#email').val() == '' || $('#email').val() == null)
                            toastr.error('Email is Required.');
                        else if ($('#subject').val() == '' || $('#subject').val() == null)
                            toastr.error('Subject is Required.');
                        else if ($('#message').val() == '' || $('#message').val() == null)
                            toastr.error('Message is Required.');
                    }
                },
                error: function() {
                    toastr.error('Some Field Are Missing.');
                }
            });
        })
    </script>
@endsection
