  {{view('app.front-end.home-page.banner',['banners'=>$data['banner']])}}

  {{view('app.front-end.home-page.color',['colors'=>$data['colors']])}}

  {{view('app.front-end.home-page.collection',['collections'=>$data['collections']])}}

  {{view('app.front-end.home-page.exotic')}}

  {{view('app.front-end.home-page.celebrities',['actors'=>$data['actors']])}}

  {{view('app.front-end.home-page.map',['stores'=>$data['stores'],'cities'=>$data['cities'] ])}}
