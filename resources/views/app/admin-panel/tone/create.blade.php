@extends('app.layout.layout')

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'tone.create') }}
@endsection

@section('page-title', 'Create Tone')

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
@endsection

@section('breadcrumbs')
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Create Tone</h2>
                <div class="breadcrumb-wrapper">
                    {{ Breadcrumbs::render('tone.create') }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <form action="{{ route('tone.store') }}" method="POST">

            <div class="card-header">
            </div>

            <div class="card-body">
                @csrf
                {{ view('app.admin-panel.tone.form-fields') }}

            </div>

            <div class="card-footer d-flex align-items-center justify-content-end">
                <button type="submit" class="btn btn-relief-outline-success waves-effect waves-float waves-light me-1">
                    <i data-feather='save'></i>
                    Save Tone
                </button>
                <a href="{{route('tone.index')}}"
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

    $(document).on('submit','#tone_form',function(e){
        e.preventDefault();
        let data = $(this).serialize();
        $.ajax({
            type: "post",
            url: "{{route('tone.store')}}",
            data: data,
            dataType: "json",
            beforeSend : function(){
                toastr.info('File is Saving. Please wait...');
            },
            success: function (response) {
                if(response.status==204)
                {
                    toastr.success('Tone Added Successfully.');
                    location.href = "{{ route('tone.index') }}";
                }
                else if(response.status==400)
                {
                    if($('#label').val()=='' || $('#label').val()==null)
                        toastr.error('Label Field is Required.');
                    // toastr.error('Something went wrong.');
                }
            }
        });
    });

    $(document).on("keyup","#label",function() {
        var Text = $(this).val();
        Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
        Text = Text.toLowerCase();
        // let random_number = Math.floor(Math.random() * 10);
        $('#slug').val(Text);
        // document.getElementById("slug").innerHTML = Text.concat(random_number);
    });

</script>
@endsection
