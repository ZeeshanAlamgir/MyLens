
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
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-lg-12 col-sm-12 position-relative">
                                                    <label for="">Company</label>
                                                    <input type="text" name="company" id="company" class="form-control" placeholder="Company">
                                                </div>
                                            </div>
                                            <div class="distributor-data">
                                                <div>
                                                    <div>
                                                        <div class="row d-flex align-items-end">
                                                            <div class="row">
                                                                <input type="hidden" name="city_indexes[]" value="0">
                                                                <div class="col-lg-5 col-md-5 col-sm-12 mt-2 position-relative">
                                                                    <label class="form-label fs-5" for="name">City</label>
                                                                    <input type="text" class="form-control form-control-lg @error('city') is-invalid @enderror" id="city_name"
                                                                        name="city_name[]" value="{{isset($city) ? ($city['name']) : ''}}" placeholder="City" />
                                                                    @error('name')
                                                                        <div class="invalid-tooltip">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-lg-5 col-md-5 col-sm-12 mt-2 position-relative">
                                                                    <div class="phone-div">
                                                                        <label class="form-label" for="select2-basic">Phone No</label>
                                                                        <select class="form-control js-example-tokenizer select2-input" name="phone_no_0[]" id="phone_no" multiple="multiple">
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
                                                            </div>
                                                            <div id="phone_div_row"></div>
                                                            <div class="col-lg-3 col-md-3 col-sm-6 mt-5 position-relative">
                                                                <button class="btn btn-icon btn-primary create_city_btn" data-item="1" type="button" >
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
                                                        name="email" placeholder="Email"  />
                                                    @error('name')
                                                        <div class="invalid-tooltip">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 col-lg-6 col-sm-12 position-relative">
                                                    <label for="description">Address</label>
                                                    <textarea class="form-control" id="address" name="address" rows="3" placeholder="Address"></textarea>
                                                </div>
                                            </div>

                                            <div class="row mt-2 mb-2">
                                                <div class="col-md-6 col-lg-6 col-sm-12 position-relative">
                                                    <label class="form-label fs-5" for="name">Instagram Link</label>
                                                    <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" id="instagram_link"
                                                        name="instagram_link" placeholder="Instagram Link"  />
                                                    @error('name')
                                                        <div class="invalid-tooltip">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 col-lg-6 col-sm-12 position-relative">
                                                    <label class="form-label fs-5" for="name">Website Link</label>
                                                    <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" id="website_link"
                                                        name="website_link" placeholder="Website Link"  />
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