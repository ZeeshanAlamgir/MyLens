<div class="row mb-1">
    <div class="col-lg-6 col-md-6 col-sm-6 position-relative">
        <label class="form-label fs-5" for="name">Name</label>
        <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" id="name"
            name="name" placeholder="Name" value="{{ isset($collection) ? $collection['name'] : null }}" />
        <span><input type="text" class="form-control form-control-lg mt-2" placeholder="Slug" name="slug" id="slug" value="{{ isset($collection) ? $collection['slug'] : null }}" readonly></span>
        
        @error('name')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 position-relative">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Description" name="description" rows="5">{{ isset($collection) ? $collection['description'] : null }}</textarea>
        @error('description')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>
    
</div>

<div class="row mb-1">
    <div class="col-lg-6 col-md-6 col-sm-6 position-relative">
        <label class="form-label fs-5" for="banner">Banner</label>
        <i>( .png, .jpg, .jpeg )</i><br>
        <input id="banner" type="file" class="filepond"
            name="banner" accept="image/png, image/jpeg, image/jpg" />
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 position-relative">
        <label class="form-label fs-5" for="image">Image</label>
        <i>( .png, .jpg, .jpeg )</i><br>
        <input id="image" type="file" class="filepond"
            name="image" accept="image/png, image/jpeg, image/jpg" />
    </div>
</div>
