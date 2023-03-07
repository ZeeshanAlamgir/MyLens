<div class="row">
    <div class="col-md-6">
        <input type="hidden" name="id" id="id" value="{{ isset($become_seller) ? $become_seller['id'] : 0 }}">
        <label for="">Title</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ isset($become_seller) ?  $become_seller['title'] : '' }}">
    </div>
    <div class="col-md-6">
        <label for="">Href</label>
        <input type="text" name="href" id="href" class="form-control" value="{{ isset($become_seller) ? $become_seller['href'] : '' }}" >
    </div>
</div>
