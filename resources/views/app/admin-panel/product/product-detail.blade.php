<div class="modal fade modal-primary text-start" id="product_detail__modal" tabindex="-1"
        aria-labelledby="myModalLabel130" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel130">Product Details</h5>
                <button type="button" class="btn-close" id="product_detail__close___btn" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="desc_modal__body">

                <form id="product_details">
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-6">
                            <label for="">Product Name</label>
                            <input type="text" name="name" id="name" class="form-control" disabled>
                        </div>
                        <div class="col-md-6 col-lg-6 col-6">
                            <label for="description" class="">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" disabled></textarea>
                            @error('name')
                                <div class="invalid-tooltip">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-2">

                        <div class="col-6 col-md-6 col-lg-6">
                            <label class="" for="">Shop By Colors</label>
                            <input type="text" class="form-control" name="color_id" id="color_id" disabled>
                        </div>

                        <div class="col-6 col-md-6 col-lg-6">
                            <label class="" for="select2-multiple">Shop By Types</label>
                            <input type="text" class="form-control" name="type_id" id="type_id" disabled>
                        </div>

                    </div>

                    <div class="row mt-2">

                        <div class="col-md-6 col-lg-6 col-6">
                            <label for="">Shop By Tone</label>
                            <select name="tone_id" id="tone_id" class="form-select" disabled>
                            </select>
                        </div>

                        <div class="col-md-6 col-lg-6 col-6">
                            <label for="">Shop By Style</label>
                            <select name="style_id" id="style_id" class="form-select" disabled>
                            </select>
                        </div>

                    </div>

                    <div class="row mt-2">

                        <div class="col-6 col-md-6 col-lg-6">
                            <label for="">Shop By Replacement Cycle</label>
                            <select name="replacement_cycle_id" id="replacement_cycle_id" class="form-select" disabled>
                            </select>
                        </div>

                        <div class="col-6 col-md-6 col-lg-6">
                            <label for="">Shop By Collection</label>
                            <select name="collection_id" id="collection_id" class="form-select" disabled>
                            </select>
                        </div>

                    </div>

                    {{-- <div class="row mt-2">

                        <div class="col-6 col-md-6 col-lg-6">
                            <label for="">Price</label>
                            <input type="number" name="price" id="price" class="form-control @error('name') is-invalid @enderror" placeholder="Price" disabled />
                        </div>

                        <div class="col-6 col-md-6 col-lg-6">
                            <label for="">Price By</label>
                            <input type="text" name="price_by" id="price_by" class="form-control @error('price_by') is-invalid @enderror" placeholder="Price By" disabled />
                        </div>
                    </div> --}}

                    <div class="row mt-2">
                        <div class="col-6 col-md-6 col-lg-6">
                            <label for="">Lens Material</label>
                            <input type="text" name="lens_material" id="lens_material" class="form-control @error('name') is-invalid @enderror" placeholder="Lens Material" disabled />
                        </div>

                        <div class="col-6 col-md-6 col-lg-6">
                            <label for="">Base Curve</label>
                            <input type="text" name="base_curve" id="base_curve" class="form-control @error('price_by') is-invalid @enderror" placeholder="Base Curve" disabled />
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-6 col-md-6 col-lg-6">
                            <label for="">Diameter</label>
                            <input type="text" name="diameter" id="diameter" class="form-control @error('name') is-invalid @enderror" placeholder="Diameter" disabled />
                        </div>

                        <div class="col-6 col-md-6 col-lg-6">
                            <label for="">Oxygen Permeability</label>
                            <input type="text" name="oxygen_permeability" id="oxygen_permeability" class="form-control @error('price_by') is-invalid @enderror" placeholder="Oxygen Permeability" disabled />
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-6 col-md-6 col-lg-6">
                            <label for="">Center thickness</label>
                            <input type="text" name="center_thickness" id="center_thickness" class="form-control @error('name') is-invalid @enderror" placeholder="Center Thickness" disabled />
                        </div>

                        <div class="col-6 col-md-6 col-lg-6">
                            <label for="">Power</label>
                            <input type="text" name="power" id="power" class="form-control @error('price_by') is-invalid @enderror" placeholder="Power" disabled />
                        </div>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="product_detail__close___btn">Close</button>
            </div>
        </div>
    </div>
</div>
