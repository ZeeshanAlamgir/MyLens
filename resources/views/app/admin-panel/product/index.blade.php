@extends('app.layout.layout')

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'product.index') }}
@endsection

@section('page-title', 'Product')

@section('page-vendor')

    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets') }}/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets') }}/vendors/css/tables/datatable/responsive.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets') }}/vendors/css/tables/datatable/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets') }}/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css">
        <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets') }}/vendors/css/extensions/swiper.min.css">

@endsection

@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/plugins/forms/form-number-input.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/vendors/filepond/filepond.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/vendors/filepond/plugins/filepond.preview.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/plugins/extensions/ext-component-swiper.min.css">
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

    .swiper_img {
        width: inherit;
    }

</style>
@endsection

@section('breadcrumbs')
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Product</h2>
                <div class="breadcrumb-wrapper">
                    {{ Breadcrumbs::render('product.index') }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <form id="products-datatable" action="{{ route('product.destroy')}}" method="get">
                {{ $dataTable->table() }}
            </form>
        </div>
    </div>

    @include('app.admin-panel.image-modal.modal')
    @include('app.admin-panel.product.product-detail')

@endsection

@section('vendor-js')
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/responsive.bootstrap5.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/datatables.checkboxes.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/buttons.colVis.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/jszip.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/pdfmake.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/vfs_fonts.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/buttons.html5.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/buttons.print.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/dataTables.rowGroup.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/filepond/plugins/filepond.preview.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/filepond/plugins/filepond.typevalidation.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/filepond/plugins/filepond.imagecrop.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/filepond/plugins/filepond.imagesizevalidation.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/filepond/plugins/filepond.filesizevalidation.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/filepond/filepond.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/extensions/swiper.min.js"></script>

@endsection

@section('page-js')
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/buttons.server-side.js"></script>
    <script src="{{ asset('app-assets') }}/js/scripts/extensions/ext-component-swiper.min.js"></script>
    <script src="{{ asset('app-assets') }}/js/scripts/components/components-modals.min.js"></script>

@endsection

@section('custom-js')
{{ $dataTable->scripts() }}
<script>

    function createNewProduct()
    {
        location.href = "{{ route('product.create') }}";
    }

    $(document).on('click','#product_detail__close___btn',function(){
        $('#product_details')[0].reset();
        $('#product_detail__modal').modal('hide');
    })

    function addDetailsToModal(id)
    {
        let colors = '';
        let types = '';
        let materials = '';
        $.ajax({
            type: "GET",
            data: {
                id : id
            },
            url: '{{route('product.detail')}}',
            success: function (response) {
                console.log(response);
                $('#product_detail__modal').modal('show');
                $('#name').val(response.data.name);
                $('#description').html(response.data.description);

                $('#tone_id').append('<option id='+response.data.tone.id+' selected>'+response.data.tone.label+'</option>');

                let iteration = 0;
                response.data.colors.forEach(function(color){
                    if(iteration > 0){
                        colors += ', ' + color.name;
                    }
                    else{
                        colors += color.name;
                    }
                    iteration++;
                });
                $('#color_id').val(colors);
                iteration = 0;
                response.data.types.forEach(function(type){
                    if(iteration > 0){
                        types +=  ', '+type.label;
                    }
                    else{
                        types +=  type.label;
                    }
                    iteration++;
                });
                $('#type_id').val(types);
                $('#style_id').append('<option id='+response.data.style.id+' selected>'+response.data.style.label+'</option>');
                $('#replacement_cycle_id').append('<option id='+response.data.replacement_cycle.id+' selected>'+response.data.replacement_cycle.name+'</option>');
                $('#collection_id').append('<option id='+response.data.collection.id+' selected>'+response.data.collection.name+'</option>');
                // $('#price').val(response.data.price);
                // $('#price_by').val(response.data.price_by);
                $('#lens_material').val(response.lens_material);
                $('#base_curve').val(response.data.base_curve);
                $('#diameter').val(response.data.diameter);
                $('#oxygen_permeability').val(response.data.oxygen_permeability);
                $('#center_thickness').val(response.data.center_thickness);
                $('#power').val(response.data.power);
            }
        });
    }

    function addBeforeImageToModal(id)
    {
        $.ajax({
            type: "GET",
            url: '{{ route('product.beforeImage') }}',
            data: {
                id : id
            },
            success: function (response) 
            {
                if(response.status)
                {
                    $('#images_modal_body').empty();
                        $('#images_modal_body').append(`
                            <img class="img-fluid swiper_img" src="{{ asset('app-assets/images/products/before/${response.before}') }}" alt="'Before Image'" />
                        `);
                    $('#image-modal').modal('show');
                }
            }
        });
    }

    function addAfterImageToModal(id)
    {
        $.ajax({
            type: "GET",
            url: '{{ route('product.afterImage') }}',
            data: {
                id : id
            },
            success: function (response) 
            {
                if(response.status)
                {
                    $('#images_modal_body').empty();
                        $('#images_modal_body').append(`
                            <img class="img-fluid swiper_img" src="{{ asset('app-assets/images/products/after/${response.after}') }}" alt="'Before Image'" />
                        `);
                    $('#image-modal').modal('show');
                }
            }
        });
    }

    function addImageToModal(id)
    {
        $.ajax({
            type: "GET",
            data: {
                id: id
            },
            url: '{{ route('product.image') }}',
            success: function(response) {
                if (response.status) 
                {
                    $('#images_modal_body').empty();
                        $('#images_modal_body').append(`
                            <img class="img-fluid swiper_img" src="{{ asset('app-assets/images/products/images/${response.data}') }}" alt="'image'" />
                        `);
                    $('#image-modal').modal('show');
                }

            }
        });
    }
    

    var swiper;
    $(document).ready(function() {
        swiper = new Swiper('.swiper-container', {
            paginationClickable: true,
            spaceBetween: 30,
            autoplay: {
                delay: 2500,
                disableOnInteraction: !1
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: !0
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            }
        });

        $('#image-modal').on('shown.bs.modal', function(e) {
            swiper.update();
            var $invoker = $(e.relatedTarget);
            swiper.slideTo($invoker.data('slider'));
            swiper.update();
        });

    });

    function addGalleryImagesToModal(id)
    {
        $.ajax({
            type: "GET",
            data: {
                id : id
            },
            url: '{{route('product.detail')}}',
            success: function (response) {
                $('#images_modal_body').empty();
                response.data.gallery.forEach(gallery=>{
                    $('#images_modal_body').append(
                    `<div class="swiper-slide">
                        <img class="img-fluid" src="{{ asset('app-assets/images/products/gallery/${gallery.image}') }}" alt="banner" />
                    </div>`);
                });
                $('#image-modal').modal('show');
            }
        });
    }

    function deleteSelected() 
    {
        var selectedCheckboxes = $('.dt-checkboxes:checked').length;
        if (selectedCheckboxes > 0) {

            Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: 'Are you sure you want to delete the selected items?',
                showCancelButton: true,
                cancelButtonText: 'No, cancel!',
                confirmButtonText: 'Yes, delete it!',
                confirmButtonClass: 'btn-danger',
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#products-datatable').submit();
                }
            });
        } else {
            Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: 'Please select at least one item!',
            });
        }
    }

    $(document).ready(function () {
        $(".js-example-tokenizer").select2({
            tags: true,
            tokenSeparators: [',', ' ']
        });
    });

</script>
@endsection
