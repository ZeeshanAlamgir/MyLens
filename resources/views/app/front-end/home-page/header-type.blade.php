<div class="col-md-3">
    <div class="shop_by_color">
      <h5 class="heading_5 ">SHOP BY <i>TYPE</i></h5>
    </div>
    <ul class="d-flex ps-0 dropdown_main_ul">
      @forelse ($types as $type)
        <li class="d-block text-start">
          <a href="{{url('products/types')}}/{{$type['slug']}}" style="text-decoration:none;color:black"><img src="{{asset('app-assets')}}/images/type/{{$type['image']}}" class="dropdown_color_image img-fluid" alt="" >
            <br>
            <span>{{$type['label']}}</span>
          </a>
        </li>
      @empty
        <div class="col-md-3 p-0">
          <h4 style="color: red">No Type Found</h4>
        </div>
      @endforelse
    </ul>
</div>
