
<style>
    .custom_men_hed{
        font-size: 23px !important;
        font-weight: bold;
    }
</style>
<div class="container">
    <div class="shop_by_color">
      <h5 class="heading_5 text-center custom_men_hed">SHOP BY <i>COLLECTION</i></h5>
    </div>
    <div class="row mb-4">

      @forelse ($collections as $collection)
        <div class="col-md-6 col-lg-2 mb-3 mb-lg-0 text-center">
          <div class="list-group list-group-flush">
            <a href="{{url('products/collections')}}/{{$collection['slug']}}"><img src="{{asset('app-assets')}}/images/collections/banner/{{$collection['banner']}}" class="img-fluid" alt=""></a>
            <span>{{$collection['name']}}</span>
          </div>
        </div>
      @empty
        <div class="col-md-3 p-0">
          <h4 style="color: red">No Collection Found</h4>
        </div>
      @endforelse

    </div>
  </div>

