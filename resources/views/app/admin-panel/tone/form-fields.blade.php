<div class="row mb-1">
    <div class="col-lg-6 col-md-6 col-sm-6 position-relative">
        <label class="form-label fs-5" for="name">Label</label>
        <input type="text" class="form-control form-control-lg @error('label') is-invalid @enderror" id="label"
            name="label" placeholder="Label" value="{{ isset($tone) ? $tone['label'] : old('label') }}" />
        @error('label')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="col-lg-6 col-md-6 col-sm-6 position-relative">
        <label class="form-label fs-5" for="name">Slug</label>
        <input type="text" class="form-control form-control-lg @error('slug') is-invalid @enderror" id="slug"
            name="slug" placeholder="Slug" value="{{ isset($tone) ? $tone['slug'] : old('slug') }}" readonly/>
        @error('slug')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>
</div>