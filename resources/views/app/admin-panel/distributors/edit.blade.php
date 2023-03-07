{{-- @dd($phones_array) --}}
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

@endsection

@section('custom-css')
@endsection

@section('breadcrumbs')
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Update Distributor</h2>
                <div class="breadcrumb-wrapper">
                    {{ Breadcrumbs::render('distributor.edit', $distributor['id']) }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <form id="distributor_update__form" enctype="multipart/form-data">

            <div class="card-header">
            </div>

            <div class="card-body">
                @csrf
                {{-- {{ view('app.admin-panel.distributors.form-fields',['distributor'=>$distributor]) }} --}}
                <div class="card-body">
                    <div class="content-body">
                        <section class="bs-validation">
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 col-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            
                                                            <div class="row mb-2">
                                                                <div class="col-lg-6 col-md-6 col-sm-12 position-relative">
                                                                    <label class="form-label fs-5" for="name">Distributor</label>
                                                                    <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" id="name"
                                                                        name="name" placeholder="Distributor" value="{{ isset($distributor) ? $distributor['name'] : '' }}" />
                                                                    @error('name')
                                                                        <div class="invalid-tooltip">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                
                                                                <div class="col-lg-6 col-md-6 col-sm-12 position-relative">
                                                                    <label class="form-label fs-5" for="image">Image</label>
                                                                    <i>( .png, .jpg, .jpeg )</i><br>
                                                                    <input id="image" type="file" class="filepond @error('image') is-invalid @enderror"
                                                                        name="image" accept="image/png, image/jpeg, image/jpg" />
                                                                </div>
                                                                <div class="col-md-12 col-lg-12 col-sm-12 position-relative">
                                                                    <label for="">Company</label>
                                                                    <input type="text" name="company" id="company" class="form-control" placeholder="Company" value="{{isset($distributor) ? ($distributor['company']) : ' '}}">
                                                                </div>
                                                            </div>
                                                            <div class="distributor-data">
                    
                                                                <div>
                                                                    <div>
                                                                        <div class="row d-flex align-items-end">
                                                                            <div class="row">
                                                                                @if(isset($distributor['cities']))
                                                                                @foreach ($distributor['cities'] as $key=>$city)
                                                                                    <input type="hidden" name="city_indexes[]" value="{{$key}}">
                                                                                        <div class="col-lg-5 col-md-5 col-sm-12 mt-2 position-relative">
                                                                                            <label class="form-label fs-5" for="name">City</label>
                                                                                            <input type="text" class="form-control form-control-lg @error('city') is-invalid @enderror" id="city_name" data-id={{$key}}
                                                                                                name="city_name[]" value="{{isset($city) ? ($city['name']) : ''}}" placeholder="City" />
                                                                                            @error('name')
                                                                                                <div class="invalid-tooltip">{{ $message }}</div>
                                                                                            @enderror
                                                                                        </div>

                                                                                        <div class="col-lg-5 col-md-5 col-sm-12 mt-2 position-relative">
                                                                                            <div class="phone-div">
                                                                                                <label class="form-label" for="select2-basic">Phone No</label>
                                                                                                <select class="form-control js-example-tokenizer select2-input" name="phone_no_{{$key}}[]" id="phone_no_{{$city['id']}}" multiple="multiple">
                                                                                                    @foreach($city['phones'] as $phone)
                                                                                                        <option value="{{$phone['phone_no']}}" selected>{{$phone['phone_no']}}</option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-2 col-md-2 col-sm-6 mt-3 position-relative">
                                                                                            <button class="btn btn-outline-danger text-nowrap px-1 delete_updated_city_btn" data-repeater-delete
                                                                                                type="button">
                                                                                                <i data-feather="x" class="me-25"></i>
                                                                                                <span>Delete</span>
                                                                                            </button>
                                                                                        </div>
                                                                                    @endforeach
                                                                                @endif
                                                                                
                                                                            </div>
                                                                            <div id="phone_div_row"></div>
                                                                            <div class="col-lg-3 col-md-3 col-sm-6 mt-5 position-relative">
                                                                                <button class="btn btn-icon btn-primary create_city_btn" data-item="{{count($distributor['cities'])}}" type="button" >
                                                                                    <i data-feather="plus" class="me-25"></i>
                                                                                    <span>City</span>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                            
                                                            <div class="row mt-2">
                                                                <div class="col-md-6 col-lg-6 col-sm-12 position-relative">
                                                                    <label class="form-label fs-5" for="name">Email</label>
                                                                    <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" id="email"
                                                                        name="email" placeholder="Email" value="{{isset($distributor) ? ($distributor['email']) : ' '}}"  />
                                                                    @error('name')
                                                                        <div class="invalid-tooltip">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-md-6 col-lg-6 col-sm-12 position-relative">
                                                                    <label for="description">Address</label>
                                                                    <textarea class="form-control" id="address" name="address" rows="3" placeholder="Address">{{  $distributor['address'] }} </textarea>
                                                                </div>
                                                            </div>
                
                                                            <div class="row mt-2 mb-2">
                                                                <div class="col-md-6 col-lg-6 col-sm-12 position-relative">
                                                                    <label class="form-label fs-5" for="name">Instagram Link</label>
                                                                    <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" id="instagram_link"
                                                                        name="instagram_link" placeholder="Instagram Link" value="{{isset($distributor) ? ($distributor['instagram_link']) : ' '}}"  />
                                                                    @error('name')
                                                                        <div class="invalid-tooltip">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-md-6 col-lg-6 col-sm-12 position-relative">
                                                                    <label class="form-label fs-5" for="name">Website Link</label>
                                                                    <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" id="website_link"
                                                                        name="website_link" placeholder="Website Link" value="{{isset($distributor) ? ($distributor['website_link']) : ' '}}"  />
                                                                    @error('name')
                                                                        <div class="invalid-tooltip">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                                
                                                            
                                                    </div>{{--card--}}
                                                </div>{{--col-md-12 col-12--}}
                                            </div>{{--row--}}
                                        </div>{{--card body--}}
                                    </div>{{--card--}}
                                </div>{{--col-md-12 col-12--}}
                            </div> {{--row--}}
                        </section> {{--section--}}
                    </div>{{--content-body --}}
                </div>
            </div>

            <div class="card-footer d-flex align-items-center justify-content-end">
                <button type="submit" class="btn btn-relief-outline-success waves-effect waves-float waves-light me-1">
                    <i data-feather='save'></i>
                    Update Distributor
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

    $(document).on('submit','#distributor_update__form',function(e){
        e.preventDefault();
        let data = new FormData(this);
        let id = {{$distributor->id}};
        $.ajax({
            type: "post",
            url: "{{url('admin/distributor/update')}}/"+id,
            data: data,
            dataType: "json",
            contentType: false,
            processData: false,
            beforeSend : function(){
                toastr.info('File is Saving. Please wait...');
            },
            success: function (response) {
                if(response.status==201)
                {
                    toastr.success('Distributor Updated Successfully.');
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
    
    $(document).on('click', '.delete_city_btn', function(){
        $(this).parent().parent().remove();
    });

    $(document).on('click', '.delete_updated_city_btn', function(){
        $(this).parent().parent().remove();
    });

    $(".js-example-tokenizer").select2({
        tags: true,
        tokenSeparators: [',', ' ']
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
            tokenSeparators: [',', ' ']
        });
        $(this).data('item',++i);
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
                source: "{{ asset('app-assets/images/distributor/images/' . $distributor->image) }}",
            }
        ],
        
    });

</script>
@endsection
