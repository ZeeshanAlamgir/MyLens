@extends('app.layout.layout')

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'become-seller.create') }}
@endsection

@section('page-title', 'Become Seller')

@section('page-vendor')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets') }}/vendors/css/tables/datatable/responsive.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets') }}/vendors/css/tables/datatable/buttons.bootstrap5.min.css">
@endsection

@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/plugins/forms/form-number-input.min.css">
@endsection

@section('custom-css')
@endsection

@section('breadcrumbs')
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Become Seller</h2>
                <div class="breadcrumb-wrapper">
                    {{ Breadcrumbs::render('become-seller.create') }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
<div class="card">
    <form id="become_seller_form">
        @csrf
        <div class="card-body">
            {{ view('app.admin-panel.become-seller.form-fields',['become_seller' => $become_seller ]) }}
        </div>

        <div class="card-footer d-flex align-items-center justify-content-end">
            <button type="submit" class="btn btn-relief-outline-success waves-effect waves-float waves-light me-1">
                <i data-feather='save'></i>
                Update
            </button>
        </div>

    </form>
</div>
@endsection


@section('vendor-js')
@endsection

@section('page-js')
    <script src="{{ asset('app-assets') }}/js/scripts/forms/form-number-input.min.js"></script>
@endsection

@section('custom-js')
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    $(document).on('submit','#become_seller_form',function(e){
        e.preventDefault();
        let data = $(this).serialize();
        $.ajax({
            type: "PUT",
            url: "{{route('become-seller.update')}}",
            data: data,
            dataType: "json",
            beforeSend : function(){
                toastr.info('File is Saving. Please wait...');
            },
            success: function (response)
            {
                if(response.status == true)
                    toastr.success(response.message);
                else if(response.status == false)
                {
                    if($('#title').val() == '')
                        toastr.error('Title Field is Required.');
                    else if($('#href').val() == '')
                        toastr.error('Href Field is Required.');
                    else
                        toastr.error('sssss');
                }
            }
        });
    })



</script>
@endsection
