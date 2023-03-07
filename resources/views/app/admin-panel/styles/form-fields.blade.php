<div class="row mb-1">
    <div class="col-lg-6 col-md-6 col-sm-6 position-relative">
        <label class="form-label fs-5" for="name">Label</label>
        <input type="text" class="form-control form-control-lg @error('label') is-invalid @enderror" id="label"
            name="label" placeholder="Label" value="{{ isset($style) ? $style['label'] : old('label') }}" />
            @error('label')
                <div class="invalid-tooltip">{{ $message }}</div>
            @enderror
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 position-relative">
        <label class="form-label fs-5" for="name">Slug</label>
        <input type="text" class="form-control form-control-lg @error('slug') is-invalid @enderror" placeholder="Slug" name="slug" id="slug" value="{{ isset($style) ? $style['slug'] : old('slug') }}" readonly>
        @error('slug')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row mb-1">
    <div class="col-lg-12 col-md-12 col-sm-12 position-relative">
        <label class="form-label fs-5" for="image">Image</label>
        <i>( .png, .jpg, .jpeg )</i><br>
        <input id="image" type="file" class="filepond"
            name="image" accept="image/png, image/jpeg, image/jpg" />
    </div>
</div>
