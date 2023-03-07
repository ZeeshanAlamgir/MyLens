<div class="row mb-1">
    <div class="col-lg-6 col-md-6 col-sm-6 position-relative">
        <label class="form-label fs-5" for="name">Name</label>
        <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" id="name"
            name="name" placeholder="Name" value="{{ isset($replacement_cycle) ? $replacement_cycle['name'] : old('name') }}" />
            @error('name')
                <div class="invalid-tooltip">{{ $message }}</div>
            @enderror
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 position-relative">
        <label class="form-label fs-5" for="name">Slug</label>
        <input type="text" class="form-control form-control-lg @error('slug') is-invalid @enderror" placeholder="Slug" name="slug" id="slug" value="{{ isset($replacement_cycle) ? $replacement_cycle['slug'] : old('slug') }}" readonly>
        @error('slug')
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
    </div>
</div>
