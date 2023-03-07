<div class="row mb-1">

    <div class="col-lg-12 col-md-12 col-sm-12 position-relative">
        <label class="form-label fs-5" for="name">Name</label>
        <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" id="name"
            name="name" placeholder="Name" value="{{ isset($store_city) ? $store_city['name'] : old('name')}}" />
        @error('name')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>

</div>


