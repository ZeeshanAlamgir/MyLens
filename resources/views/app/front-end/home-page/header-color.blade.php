<div class="col-md-3">
    <div class="shop_by_color">
      <h5 class="heading_5 ">SHOP BY <i>COLOR</i></h5>
    </div>
    <ul class="d-flex ps-0 shop_color_ul">
      @forelse ($colors as $color)
      <a href="{{url('products/colors')}}/{{$color['slug']}}" style="text-decoration:none;color:black">
        <li class="d-block">
          <img src="{{asset('app-assets')}}/images/colors/images/{{$color['image']}}" class="dropdown_color_image img-fluid" alt="" >
          <span>{{$color['name']}}</span>
        </li>
      </a>
      @empty
        <div class="col-md-3 p-0">
          <h4 style="color: red">No Color Found</h4>
        </div>
      @endforelse

    </ul>
</div>
