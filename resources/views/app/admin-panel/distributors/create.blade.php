@extends('app.layout.layout')

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'distributor.create') }}
@endsection

@section('page-title', 'Create Distributor')

@section('page-vendor')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets') }}/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets') }}/vendors/css/tables/datatable/responsive.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets') }}/vendors/css/tables/datatable/buttons.bootstrap5.min.css">
@endsection

@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/plugins/forms/form-number-input.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/vendors/filepond/filepond.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/vendors/filepond/plugins/filepond.preview.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/pages/dashboard-ecommerce.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/plugins/charts/chart-apex.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('custom-css')
@endsection

@section('breadcrumbs')
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Create Distributor</h2>
                <div class="breadcrumb-wrapper">
                    {{ Breadcrumbs::render('distributor.create') }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <form id="distributor_form" enctype="multipart/form-data">
            @csrf
            
            {{view('app.admin-panel.distributors.form-fields')}}

            <div class="card-footer d-flex align-items-center justify-content-end">
                <button type="submit" class="btn btn-relief-outline-success waves-effect waves-float waves-light me-1">
                    <i data-feather='save'></i>
                    Save Distributor
                </button>
                <a href="{{ route('distributor.index') }}"
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
    <script src="{{ asset('app-assets') }}/js/scripts/forms/form-number-input.min.js"></script>
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

    $(document).on('click','.create_city_btn',function(){
        let i = $(this).data('item');
        $(this).parent().parent().children('#phone_div_row').append(`
        <div class="row">
            <input type="hidden" name="city_indexes[]" value="${i}">
            <div class="col-lg-5 col-md-5 col-sm-12 mt-2 position-relative">
                <label class="form-label fs-5" for="name">City</label>
                <input type="text" class="form-control form-control-lg @error('city') is-invalid @enderror" id="city_name"
                    name="city_name[]" placeholder="City" />
                @error('name')
                    <div class="invalid-tooltip">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-lg-5 col-md-5 col-sm-12 mt-2 position-relative">
                <div class="phone-div">
                    <label class="form-label" for="select2-basic">Phone No</label>
                <select class="form-control js-example-tokenizer select2-input" name="phone_no_${i}[]" id="phone_no_${i}" multiple="multiple">
                </select>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-6 mt-3 position-relative">
                <button class="btn btn-outline-danger text-nowrap px-1 delete_city_btn" data-repeater-delete
                    type="button">
                    <i data-feather="x" class="me-25"></i>
                    <span>Delete</span>
                </button>
            </div>
        </div>`);

        $('#phone_no_'+i).select2({
            tags: true,
            tokenSeparators: [',']
        });
        $(this).data('item',++i);
    });

    $(document).on('click', '.delete_city_btn', function(){
        $(this).parent().parent().remove();
    });

    $(".js-example-tokenizer").select2({
        tags: true,
        tokenSeparators: [',', ' ']
    });


    $(document).on('submit','#distributor_form',function(e){
        e.preventDefault();
        let data = new FormData(this);
        $.ajax({
            type: "post",
            url: "{{route('distributor.store')}}",
            data: data,
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
                    toastr.success('Distributor Added Successfully.');
                    location.href = '{{ route('distributor.index') }}';
                }
                else if(response.status==400)
                {
                    if($('#name').val()=='' || $('#name').val()==null)
                        toastr.error('Name Field is Required.');
                    if($('#email').val()=='' || $('#email').val()==null)
                        toastr.error('Email Field is Required.');
                    if($('#address').val()=='' || $('#address').val()==null)
                        toastr.error('Address Field is Required.');
                    if($('#instagram_link').val()=='' || $('#instagram_link').val()==null)
                        toastr.error('Instagram Link Field is Required.');
                    if($('#website_link').val()=='' || $('#website_link').val()==null)
                        toastr.error('Website Link Field is Required.');
                    else
                        toastr.error('Image Field is Required.');
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
        allowMultiple: false,
        maxFiles: 1,
        required: false,
        checkValidity: true,
        credits: {
            label: '',
            url: ''
        },
        
    });

</script>
@endsection
