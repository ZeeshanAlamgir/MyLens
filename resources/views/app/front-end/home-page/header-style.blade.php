<div class="col-md-3">
    <div class="shop_by_color">
      <h5 class="heading_5">SHOP BY <i>STYLE</i></h5>
    </div>
    <ul class="d-flex ps-0 shop_sty_ul">
      @forelse ($styles as $style)
      <a href="{{url('products/style')}}/{{$style['slug']}}" style="text-decoration:none;color:black">
        <li class="d-block ps-2 pe-2">
          <img src="{{asset('app-assets')}}/images/style/{{$style['image']}}" class="shop_style_img img-fluid" alt="">
          <span>{{$style['label']}}</span>
        </li>
      </a>
      @empty
        <div class="col-md-3 p-0">
          <h4 style="color: red">No Type Found</h4>
        </div>
      @endforelse
    </ul>
</div>
