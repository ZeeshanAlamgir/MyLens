<div class="row mb-1">

    <div class="col-lg-6 col-md-6 col-sm-6 position-relative">
        <label class="form-label fs-5" for="name">Name</label>
        <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" id="name"
            name="name" placeholder="Name" value="{{ isset($store) ? $store['name'] : old('name') }}" />
        @error('name')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 position-relative">
        <label class="form-label fs-5" for="name">Address</label>
        <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" id="address"
            name="address" placeholder="Address" value="{{ isset($store) ? $store['address'] : old('address') }}" />
        @error('address')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>

</div>

<div class="row mb-2">

    <div class="col-lg-6 col-md-6 col-sm-6 position-relative">
        <label class="form-label fs-5" for="name">Latitude</label>
        <input type="text" class="form-control form-control-lg @error('latitude') is-invalid @enderror" id="latitude"
            name="latitude" placeholder="Latitude"  value="{{ isset($store) ? $store['latitude'] : old('latitude') }}" />
        @error('latitude')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 position-relative">
        <label class="form-label fs-5" for="name">Longitude</label>
        <input type="text" class="form-control form-control-lg @error('longitude') is-invalid @enderror" id="longitude"
            name="longitude" placeholder="Longitude" value="{{ isset($store) ? $store['longitude'] : old('longitude') }}" />
        @error('longitude')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>

</div>
<div class="row mb-3">
    <div class="col-lg-6 col-md-6 col-sm-6 position-relative">
        <label class="form-label fs-5" for="order">City</label>
        <select name="city_id" id="city_id" class="form-select">
            <option disabled>--Select City--</option>
            @isset($cities)
                @foreach ($cities as $city)
                    <option value="{{$city['id']}}" {{isset($city_id) ? (in_array($city['id'],$city_id) ? 'selected' : '') : ''}} >{{$city['name']}}</option>
                @endforeach
            @endisset
        </select>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 position-relative">
        <label class="form-label fs-5" for="order">Order No</label>
        <input type="number" class="form-control form-control-lg @error('name') is-invalid @enderror" id="order"
            name="order" placeholder="e.g 1" value="{{ isset($store) ? $store['order'] : old('order') }}" />
        @error('order')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>
</div>
