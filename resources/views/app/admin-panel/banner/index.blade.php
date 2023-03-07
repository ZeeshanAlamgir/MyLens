@extends('app.layout.layout')

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'banner.index') }}
@endsection

@section('page-title', 'Banner')

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
                <h2 class="content-header-title float-start mb-0">Banner</h2>
                <div class="breadcrumb-wrapper">
                    {{ Breadcrumbs::render('banner.index') }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <form id="banners-datatable" action="{{ route('banner.delete')}}" method="get">
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

    function createNewBanner()
    {
        location.href = "{{ route('banner.create') }}";
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
            url: '{{route('banner.images')}}',
            success: function (response) {
                console.log(response.data);
                $('#images_modal_body').empty();
                    $('#images_modal_body').append(
                    `<div class="swiper-slide">
                        <img class="img-fluid" src="{{ asset('app-assets/images/banner/${response.data}') }}" alt="banner" />
                    </div>`);
                $('#image-modal').modal('show');
            }
        });
    }

    function deleteSelected() {
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
                    $('#banners-datatable').submit();
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

</script>
@endsection
