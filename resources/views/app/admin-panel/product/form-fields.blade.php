<div class="row mb-1">

    <div class="col-lg-6 col-md-6 col-sm-6 position-relative">
        <label class="form-label fs-5" for="name">Name</label>
        <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" id="name"
            name="name" placeholder="Name" value="{{ isset($product) ? ($product ? $product['name'] : old('name')) : old('name') }}" />
        @error('name')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
        <span>
            <input type="text" class="form-control form-control-lg mt-2 @error('slug') is-invalid @enderror" placeholder="Slug" name="slug" id="slug" value="{{ isset($product) ? ($product ? $product['slug'] : old('slug')) : old('slug')}}" readonly>
            @error('slug')
                <div class="invalid-tooltip">{{ $message }}</div>
            @enderror
        </span>

    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 position-relative">
        <label for="description" class="">Description</label>
        <textarea class="form-control form-control-lg @error('description') is-invalid @enderror" id="description" name="description" rows="5" placeholder="Description">{{ isset($product) ? $product['description'] : old('description') }}</textarea>
        @error('description')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>

</div>

<div class="row mb-2">

    <div class="col-6 col-md-6 col-lg-6 position-relative">
        <label class="" for="select2-multiple">Shop By Colors</label>
        <select id="color_id" name="color_id[]" multiple class="select2 form-select @error('color_id.*') is-invalid @enderror">
            @forelse ($data['colors'] as $key=>$color)
                <option {{ (collect(old('color_id'))->contains($color->id)) ? 'selected':'' }} value="{{ $color['id'] }}" {{ isset($data['selected_colors']) ? (in_array($color['id'],$data['selected_colors']) ? 'selected' : '' ) : '' }}> {{ $color['name'] }} </option>
            @empty
                <option value="" disabled>No Data Found</option>
            @endforelse
        </select>
        @error('color_id.*')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-6 col-md-6 col-lg-6 position-relative">
        <label class="" for="select2-multiple">Shop By Types</label>
        <select class="select2 form-select  @error('type_id.*') is-invalid @enderror" id="type_id" name="type_id[]" multiple>
            @forelse ($data['types'] as $type)
                <option {{ (collect(old('type_id'))->contains($type->id)) ? 'selected':'' }} value="{{ $type['id'] }}" {{ isset($data['selected_types']) ? (in_array($type['id'], $data['selected_types']) ? 'selected' : '') : '' }} >{{ $type['label'] }}</option>
            @empty
                <option value="" disabled>No Data Found</option>
            @endforelse
        </select>
        @error('type_id.*')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>

</div>

<div class="row mb-2">

    <div class="col-6 col-md-6 col-lg-6 position-relative">
        <label for="">Shop By Tone</label>
        <select name="tone_id" id="tone_id" class="form-select @error('tone_id') is-invalid @enderror">
            <option value="" selected>--Select Tone--</option>
            @forelse ($data['tones'] as $key=>$tone)
                <option {{ (collect(old('tone_id'))->contains($tone->id)) ? 'selected':'' }} value="{{ $tone['id'] }}" {{ isset($data['selected_tone']) ? (in_array($tone['id'],$data['selected_tone']) ? 'selected' : '') : ''  }}> {{ $tone['label'] }} </option>
            @empty
                <option value="" disabled>No Data Found</option>
            @endforelse
        </select>
        @error('tone_id')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-6 col-md-6 col-lg-6 position-relative">
        <label for="">Shop By Style</label>
        <select name="style_id" id="style_id" class="form-select @error('style_id') is-invalid @enderror">
            <option value="" disabled selected>--Select Style--</option>
            @forelse ($data['styles'] as $key=>$style)
                <option {{ (collect(old('style_id'))->contains($style->id)) ? 'selected':'' }} value="{{ $style['id'] }}" {{ isset($data['selected_style']) ? (in_array($style['id'],$data['selected_style']) ? 'selected' : '') : '' }}> {{ $style['label'] }} </option>
            @empty
                <option value="" disabled>No Data Found</option>
            @endforelse
        </select>
        @error('style_id')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>

</div>

<div class="row mb-2">

    <div class="col-6 col-md-6 col-lg-6 position-relative">
        <label for="">Shop By Replacement Cycle</label>
        <select name="replacement_cycle_id" id="replacement_cycle_id" class="form-select @error('replacement_cycle_id') is-invalid @enderror">
            <option value="" disabled selected>--Select Replacement Cycle--</option>
            @forelse ($data['replacement_cycle'] as $key=>$rep_cycle)
                <option {{ (collect(old('replacement_cycle_id'))->contains($rep_cycle->id)) ? 'selected':'' }} value="{{ $rep_cycle['id'] }}" {{ isset($data['selected_rep_id']) ? (in_array($rep_cycle['id'],$data['selected_rep_id']) ? 'selected' : '') :'' }}> {{ $rep_cycle['name'] }} </option>
            @empty
                <option value="" disabled>No Data Found</option>
            @endforelse
        </select>
        @error('replacement_cycle_id')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-6 col-md-6 col-lg-6 position-relative">
        <label for="">Shop By Collection</label>
        <select name="collection_id" id="collection_id" class="form-select @error('collection_id') is-invalid @enderror">
            <option value="" disabled selected>--Select Collection--</option>
            @forelse ($data['collections'] as $key=>$collection)
                <option {{ (collect(old('collection_id'))->contains($collection->id)) ? 'selected':'' }} value="{{ $collection['id'] }}" {{ isset($data['selected_collection']) ? (in_array($collection['id'],$data['selected_collection']) ? 'selected' : '') :'' }}> {{ $collection['name'] }} </option>
            @empty
                <option value="" disabled>No Data Found</option>
            @endforelse
        </select>
        @error('collection_id')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>

</div>

{{-- <div class="row mb-2">

    <div class="col-6 col-md-6 col-lg-6">
        <label for="">Price</label>
        <input type="number" name="=" id="=" class="form-control @error('') is-invalid @enderror" placeholder="Price" />
        @error('')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-6 col-md-6 col-lg-6">
        <label for="">Price By</label>
        <input type="text" name="" id="" class="form-control @error('') is-invalid @enderror" placeholder="Price By" />
        @error('')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>

</div> (aqsa) --}}

<div class="row mb-2">

    <div class="col-md-6 col-lg-6 col-sm-6 ">
        <label for="">Lens Material</label>
        <select class="form-control js-example-tokenizer" name="lens_material[]" id="lens_material" multiple="multiple" required>
            @if(isset($data['lens_materials']))
                @forelse ($data['lens_materials'] as $lens_mate)
                    <option value="{{ $lens_mate}}" selected>{{ $lens_mate}}</option>
                @empty
                    <option value="" disabled>--No Data Found--</option>
                @endforelse
            @endif
        </select>
    </div>

    <div class="col-md-6 col-lg-6 col-sm-6 position-relative">
        <label for="">Base Curve</label>
        <input type="text" name="base_curve" id="base_curve" class="form-control @error('base_curve') is-invalid @enderror" placeholder="Base Curve" value="{{ isset($product) ? $product['base_curve'] : old('base_curve')  }}">
        @error('base_curve')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>

</div>

<div class="row mb-2">

    <div class="col-md-6 col-lg-6 col-sm-6 position-relative">
        <label for="">Diameter</label>
       <input type="text" name="diameter" id="diameter" placeholder="Diameter" class="form-control @error('diameter') is-invalid @enderror"  value="{{ isset($product) ? $product['diameter'] : old('diameter')  }}">
        @error('diameter')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 col-lg-6 col-sm-6 position-relative">
        <label for="">Oxygen Permeability</label>
        <input type="text" name="oxygen_permeability" id="oxygen_permeability" class="form-control @error('oxygen_permeability') is-invalid @enderror" placeholder="Oxygen Permeability" value="{{ isset($product) ? $product['oxygen_permeability'] : old('oxygen_permeability')  }}">
        @error('oxygen_permeability')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>

</div>

<div class="row mb-2">

    <div class="col-md-6 col-lg-6 col-sm-6 position-relative">
        <label for="">Center Thickness</label>
       <input type="text" name="center_thickness" id="center_thickness" placeholder="Center Thickness" class="form-control @error('center_thickness') is-invalid @enderror" value="{{ isset($product) ? $product['center_thickness'] : old('center_thickness')  }}">
        @error('center_thickness')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 col-lg-6 col-sm-6 position-relative">
        <label for="">Power</label>
        <input type="text" name="power" id="power" class="form-control @error('power') is-invalid @enderror" placeholder="Power" value="{{ isset($product) ? $product['power'] : old('power')  }}">
        @error('power')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>

</div>


<div class="col-lg-12 col-md-12 col-sm-12 position-relative mb-2">
    <label for="description" class="">Description</label>
    <textarea class="form-control  @error('before_after_description') is-invalid @enderror" id="before_after_description" name="before_after_description" rows="5" placeholder="Before After Description">{{ isset($product) ? $product['before_after_description'] : old('before_after_description') }}</textarea>
    @error('before_after_description')
        <div class="invalid-tooltip">{{ $message }}</div>
    @enderror
</div>

<div class="row mb-2">
    <div class="col-12 col-lg-12 col-md-12 position-relative">
        <label class="form-label fs-5" for="">Buy Online Product Link</label>
        <input type="text" name="buy_product_online_link" id="buy_product_online_link" placeholder="https://www.solotica.com/hidrocor-mel" class="form-control @error('buy_product_online_link') is-invalid @enderror" value="{{ isset($product) ? $product['buy_product_online_link'] : old('buy_product_online_link')  }}">
    @error('buy_product_online_link')    
        <div class="invalid-tooltip">{{ $message }}</div>
    @enderror
    </div>
</div>

<div class="row mb-2 mt-2">

    <div class="col-md-6 col-6 col-lg-6 position-relative">
        <label class="form-label fs-5" for="Image">Before Image</label>
        <i>( .png, .jpg, .jpeg )</i><br>
        <input id="before" type="image" class="filepond @error('before_image') is-invalid @enderror"
            name="before_image" accept="image/png, image/jpeg, image/jpg"  />
            @error('before_image')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 col-6 col-lg-6 position-relative">
        <label class="form-label fs-5" for="Image">After Image</label>
        <i>( .png, .jpg, .jpeg )</i><br>
        <input id="after" type="image" class="filepond @error('after_image') is-invalid @enderror"
            name="after_image" accept="image/png, image/jpeg, image/jpg"  />
            @error('after_image')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>

</div>

<div class="row mb-2">
    <div class="col-md-12 col-12 col-lg-12 position-relative">
        <label class="form-label fs-5" for="Image">Product Image</label>
        <i>( .png, .jpg, .jpeg )</i><br>
        <input id="image" type="image" class="filepond @error('image') is-invalid @enderror"
            name="image" accept="image/png, image/jpeg, image/jpg"  />
            @error('image')
                <div class="invalid-tooltip">{{ $message }}</div>
            @enderror
    </div>
</div>

<div class="row mb-2">

    <div class="col-md-12 col-12 col-lg-12 position-relative">
        <label class="form-label fs-5" for="Image">Gallery</label>
        <i>( .png, .jpg, .jpeg )</i><br>
        <input id="galleries" type="image" class="filepond @error('galleries') is-invalid @enderror"
            name="galleries[]" multiple accept="image/png, image/jpeg, image/jpg"  />
        @error('galleries')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>

</div>

{{-- <div class="row mb-2">
    <div class="col-12 col-lg-12 col-md-12 position-relative">
        <label class="form-label fs-5" for="features">Features</label>
        <textarea class="form-control form-control-lg features @error('') is-invalid @enderror"
            name="" id="">
                @isset($product)
                    {{ $product['features'] }}
                @else  
                    {{ old('features') }}
                @endisset
        </textarea>
        @error('')
        <div class="invalid-tooltip">{{ $message }}</div>
    @enderror
    </div>
</div> (Aqsa) --}}

