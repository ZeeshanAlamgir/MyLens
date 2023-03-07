{{-- @dd($product['gallery']->toArray()) --}}
@extends('app.layout.layout')

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'product.create') }}
@endsection

@section('page-title', 'Update Product')

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

@endsection

@section('custom-css')
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
</style>
@endsection

@section('breadcrumbs')
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Update Product</h2>
                <div class="breadcrumb-wrapper">
                    {{ Breadcrumbs::render('product.edit', $product['id']) }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <form id="product_update__form" enctype="multipart/form-data">

            <div class="card-header">
            </div>

            <div class="card-body">
                @csrf
                {{ view('app.admin-panel.product.form-fields',['product'=>$product, 'data'  => $data]) }}
            </div>

            <div class="card-footer d-flex align-items-center justify-content-end">
                <button type="submit" class="btn btn-relief-outline-success waves-effect waves-float waves-light me-1">
                    <i data-feather='save'></i>
                    Update Product
                </button>
                <a href="{{ route('product.index') }}"
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
    <script src="{{ asset('app-assets') }}/js/scripts/validation/validation.js"></script>
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

    $(document).on('submit','#product_update__form',function(e){
        e.preventDefault();
        let data = new FormData(this);
        let id = {{ $product['id'] }};
        $.ajax({
            type: "post",
            url: "{{url('admin/product/update')}}/"+id,
            data: data,
            dataType: "json",
            contentType: false,
            processData: false,
            beforeSend : function(){
                toastr.info('File is Saving. Please wait...');
            },
            success: function (response) {
                if(response.status==204)
                {
                    toastr.success('Product Updated Successfully.');
                    location.href = '{{ route('product.index') }}';
                }
                else if(response.status==400)
                {
                    Validation('#name','#description','#color_id','#type_id','#tone_id','#style_id','#replacement_cycle_id','#collection_id','#price','#price_by','#features');
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
        files: [
            {
                source: "{{ asset('app-assets/images/products/images/' . $product['image']) }}",
            }
        ], 
    });

    @isset($product)
        FilePond.create(document.getElementById('galleries'), {
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
            files: [
                @foreach ($product['gallery'] as $gallery)
                {
                    source: "{{ asset('app-assets/images/products/gallery/') }}{{ '/' . $gallery->image }}",
                },
                @endforeach
            ],
        });
    @endisset

    $(document).on("keyup","#name",function() {
        var Text = $(this).val();
        Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
        Text = Text.toLowerCase();
        // let random_number = Math.floor(Math.random() * 10);
        $('#slug').val(Text);
        // document.getElementById("slug").innerHTML = Text.concat(random_number);
    });

    
    $(document).ready(function () {
        $(".js-example-tokenizer").select2({
            tags: true,
            tokenSeparators: [',']
        });
    });

    FilePond.create(document.getElementById('before'), {
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
        files: [
            {
                source: "{{ asset('app-assets/images/products/before/' . $product['before_image']) }}",
            }
        ], 
        
    });

    FilePond.create(document.getElementById('after'), {
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
        files: [
            {
                source: "{{ asset('app-assets/images/products/after/' . $product['after_image']) }}",
            }
        ], 
        
    });

</script>
@endsection
