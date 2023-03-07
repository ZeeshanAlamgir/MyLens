{{-- @dd($products) --}}
<div class="row mb-1">
    <div class="col-lg-6 col-md-6 col-sm-6 position-relative">
        <label class="form-label fs-5" for="name">Actor</label>
        <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" id="name"
            name="name" placeholder="Actor" value="{{ isset($actor_product) ? $actor_product['name'] : old('name') }}" />
        @error('name')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-6 col-md-6 col-lg-6 mt-1 position-relative">
        <label class="" >Products</label>
        <select class="form-select @error('product_id') is-invalid @enderror" id="product_id" name="product_id">
            <option value="" disabled selected>--Select Product--</option>
            @forelse ($products as $product)
                <option {{ (collect(old('product_id'))->contains($product->id)) ? 'selected':'' }} value="{{ $product['id'] }}" {{ isset($product_id) ? (in_array($product['id'],$product_id) ? 'selected' : '') : '' }}> {{ $product['name'] }} </option>
            @empty
                <option value="" disabled>No Data Found</option>
            @endforelse
        </select>
        @error('product_id')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>

    
</div>

<div class="row mb-1">

    <div class="col-lg-12 col-md-12 col-sm-12 position-relative">
        <label class="form-label fs-5" for="image">Image</label>
        <i>( .png, .jpg, .jpeg )</i><br>
        <input id="image" type="file" class="filepond @error('image') is-invalid @enderror"
            name="image" accept="image/png, image/jpeg, image/jpg" />
        @error('image')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>
</div>
