@extends('app.layout.layout')

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'banner.create') }}
@endsection

@section('page-title', 'Create Banner Image')

@section('page-vendor')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets') }}/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets') }}/vendors/css/tables/datatable/responsive.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets') }}/vendors/css/tables/datatable/buttons.bootstrap5.min.css">
@endsection

@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/pages/dashboard-ecommerce.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/plugins/charts/chart-apex.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/vendors/filepond/filepond.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/vendors/filepond/plugins/filepond.preview.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/plugins/forms/form-number-input.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('custom-css')
<style>
    .customizer .customizer-toggle{
        display: none !important;
    }
    <style>
    .customizer .customizer-toggle {
        display: none !important;
    }
    .filepond--drop-label {
        color: #7367F0 !important;
    }

    .filepond--item-panel {
        background-color: #7367F0;
    }

    .filepond--panel-root {
        background-color: #e3e0fd;
    }

    .filepond--item {
        width: calc(20% - 0.5em);
    }

    .swiper_img {
        width: inherit;
    }
</style>
@endsection

@section('breadcrumbs')
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Create Banner Image</h2>
                <div class="breadcrumb-wrapper">
                    {{ Breadcrumbs::render('banner.create') }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
<div class="card">
    <form id="banner_form" enctype="multipart/form-data">

        <div class="card-body">
            @csrf
            {{ view('app.admin-panel.banner.form-fields') }}

        </div>

        <div class="card-footer d-flex align-items-center justify-content-end">
            <button type="submit" class="btn btn-relief-outline-success waves-effect waves-float waves-light me-1">
                <i data-feather='save'></i>
                Save Banner
            </button>
            <a href="{{ route('banner.index') }}"
                class="btn btn-relief-outline-danger waves-effect waves-float waves-light">
                <i data-feather='x'></i>
                Cancel
            </a>
        </div>

    </form>
</div>
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
    <script src="{{ asset('app-assets') }}/js/scripts/pages/dashboard-ecommerce.min.js"></script>
    <script src="{{ asset('app-assets') }}/js/scripts/jquery/jquery.min.js"></script>
    <script src="{{ asset('app-assets') }}/js/scripts/repeater/jquery.repeater.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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


    $(document).on('submit','#banner_form',function(e){
        e.preventDefault();
        let formData = new FormData(this);
        $.ajax({
            type: "post",
            url: "{{route('banner.store')}}",
            data: formData,
            dataType: "json",
            contentType: false,
            processData: false,
            beforeSend : function(){
                toastr.info('File is Saving. Please wait...');
            },
            success: function (response) 
            {
                if(response.status==204)
                {
                    toastr.success('Banner Added Successfully.');
                    location.href = '{{ route('banner.index') }}';
                }
                else if(response.status==400)
                {
                    toastr.error('Banner Field is Required.');
                }
            }
        });
    });
    FilePond.registerPlugin(
        FilePondPluginImagePreview,
        FilePondPluginFileValidateType,
        FilePondPluginFileValidateSize,
        FilePondPluginImageValidateSize,
        FilePondPluginImageCrop,
    );

    FilePond.create(document.getElementById('image'), {
        styleButtonRemoveItemPosition: 'right',
        imageCropAspectRatio: '1:1',
        acceptedFileTypes: ['image/png', 'image/jpeg', 'image/jpg'],
        maxFileSize: '1000KB',
        ignoredFiles: ['.ds_store', 'thumbs.db', 'desktop.ini'],
        storeAsFile: true,
        allowMultiple: true,
        maxFiles: 10,
        required: false,
        checkValidity: true,
        credits: {
            label: '',
            url: ''
        },
        
    });

</script>
@endsection
