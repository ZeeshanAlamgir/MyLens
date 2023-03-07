<div class="col-md-3">
    <div class="shop_by_color">
      <h5 class="heading_5 ms-1 ps-1">SHOP BY <i>WEAR CYCLE</i></h5>
    </div>
    <ul class="d-flex ps-0 shop_cycle">
      @forelse ($wear_cycles as $wear_cycle)
      <a href="{{url('products/wear_cycle')}}/{{$wear_cycle['slug']}}" style="text-decoration:none;color:black">
        <li class="d-block ps-2 pe-2 text-start">
          <img src="{{asset('app-assets')}}/images/replacement-cycle/images/{{$wear_cycle['image']}}" class="img-fluid" alt="">
          <br>
          <span>{{$wear_cycle['name']}}</span>
        </li>
      </a>
      @empty
        <div class="col-md-3 p-0">
          <h4 style="color: red">No Type Found</h4>
        </div>
      @endforelse
    </ul>
</div>
