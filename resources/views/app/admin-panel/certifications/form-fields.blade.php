<div class="row mb-1">
    <div class="col-lg-6 col-md-6 col-sm-6 position-relative">
        <label for="description" class="">Description</label>
        <textarea class="form-control" id="description" placeholder="Description" name="description" rows="5">{{ isset($certificate) ? $certificate['description'] : '' }}</textarea>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 position-relative">
        <label class="form-label fs-5" for="image">Certificate</label>
        <i>( .png, .jpg, .jpeg )</i><br>
        <input id="image" type="file" class="filepond"
        name="image" accept="image/png, image/jpeg, image/jpg" />
    </div>
</div>


