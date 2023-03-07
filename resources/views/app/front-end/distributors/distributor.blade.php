@extends('app.front-end.layout.layout', ['data' => $data])

@section('content')
<style>
    .custom_header_container {
        position: unset !important;
        background: #fff;
    }

    .nav>.nav-links>a,
    .dropbtn,
    .dropdown-toggle {
        color: #000 !important;
    }

    path {
        fill: black !important;
    }

    .nav>.nav-btn>label>span {
        border-top: 2px solid #000 !important;
    }
    .custom_header_container{
    background-color: white;
    box-shadow: 0 1px 0.25rem 0 rgb(0 0 0 / 34%) !important;
}
.logo_2{
        display: block !important;
    }
    .logo{
        display: none !important;
    }
</style>
    <section>

        <div class="row w-100 custom_flage_row">
            <div class="col-md-2 custom_sidebar">
                <nav class="pt-5">
                    <div class="nav nav-tabs mb-3 scrollbar_2" id="nav-tab" role="tablist" style="min-height: 70vh">
                        <ul class="d-grid nav nav-tabs custom_tab_ul text-center justify-content-center">
                            @isset($data['distributors'])
                                @forelse ($data['distributors'] as $key=>$distributor)
                                    <li class="d-block">
                                        <a class="nav-link @if ($key == 0) active @endif d-grid align-items-center justify-content-center"
                                            data-bs-toggle="tab"
                                            href="#distributor-{{ $distributor['id'] }}">{{ $distributor['name'] }}
                                            <img class="w-100"
                                                src="{{ asset('app-assets') }}/images/distributor/images/{{ $distributor['image'] }}"
                                                alt="">
                                        </a>
                                    </li>
                                @empty
                                    <li class="d-block">
                                        <a class="nav-link d-grid align-items-center justify-content-center"
                                            data-bs-toggle="tab" href="#country-2">QATAR
                                            <img class="w-100"
                                                src="https://upload.wikimedia.org/wikipedia/commons/6/65/Flag_of_Qatar.svg"
                                                alt="">
                                        </a>
                                    </li>
                                @endforelse
                            @endisset
                        </ul>
                    </div>
                </nav>


                <!-- mobile menu -->
                <div id="mySidenav2" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav2()">&times;</a>
                    <div class="nav-tabs">
                        <ul class="d-grid nav nav-tabs " style="display: block !important;">
                            @isset($data['distributors'])
                                @forelse ($data['distributors'] as $key=>$distributor)
                                    <li class="d-block">
                                        <a class="nav-link model_dist @if ($key == 0) active @endif "
                                            data-bs-toggle="tab" href="#distributor-{{ $distributor['id'] }}"
                                            onclick="closeNav2()">{{ $distributor['name'] }}
                                            <img class="w-100"
                                                src="{{ asset('app-assets') }}/images/distributor/images/{{ $distributor['image'] }}"
                                                alt="">
                                        </a>
                                    </li>
                                @empty
                                    <li class="d-block">
                                        <a class="nav-link model_dist" data-bs-toggle="tab" onclick="closeNav2()"
                                            href="#country-2">LEBANON
                                            <img class="w-100"
                                                src="https://upload.wikimedia.org/wikipedia/commons/5/59/Flag_of_Lebanon.svg"
                                                alt=""></a>
                                    </li>
                                @endforelse
                            @endisset
                        </ul>
                    </div>
                </div>




                <!-- mobile menu -->

            </div>
            <div class="col-md-10">
                <div class="text-start ps-3 pt-3">
                    <i class="fa-solid fa-bars sidebar_menu" onclick="openNav2()"></i>
                </div>
                <div class="container" style="margin-top: 10px; margin-left: 0 !important; margin-right: 0 !important">
                    <!-- Tab panes -->
                    <div class="tab-content pt-4 pb-4">
                        @isset($data['distributors'])
                            @forelse ($data['distributors'] as $key=>$distributor)
                                <div class="tab-pane container @if ($key == 0) active @endif"
                                    id="distributor-{{ $distributor['id'] }}">
                                    <h1 class="pb-4">{{ $distributor['name'] }}</h1>
                                    <div class="page-body d-flex">
                                        <table style="height: 132px;" width="658">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <p>
                                                            <span style="font-size: 18pt; color: #000000;">
                                                                {{ $distributor['company'] }}
                                                            </span>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p class="mb-0" style="text-align: justify;">
                                                            <span class="custom_span_label">Telephones: </span>
                                                        </p>
                                                        {{-- Phone No Start --}}
                                                        @isset($distributor)
                                                            @foreach ($distributor['cities'] as $city)
                                                                <p style="text-align: justify;">
                                                                    <span class="custom_span_label">
                                                                        <span class="pe-1">{{ $city['name'] }}</span>
                                                                        @isset($city)
                                                                            @foreach ($city['phones'] as $phone)
                                                                                {{-- <a href="Tel:+966590118298">+966590118298</a> --}}
                                                                                <a
                                                                                    href="Tel:+{{ $phone['phone_no'] }}">{{ $phone['phone_no'] }}</a>
                                                                            @endforeach
                                                                        @endisset
                                                                    </span>
                                                                </p>
                                                            @endforeach
                                                        @endisset
                                                        {{-- Phone No End --}}
                                                        <p style="text-align: justify;">
                                                            <span class="custom_span_label">Email:
                                                                <a class="email newicon"
                                                                    href="mailto:{{ $distributor['email'] }}">{{ $distributor['email'] }}</a>
                                                            </span>
                                                        </p>
                                                        <p style="text-align: justify;">
                                                            <span class="custom_span_label">Address:
                                                                {{ $distributor ? $distributor['address'] : 'xyz@gmail.com' }}
                                                            </span>
                                                        </p>
                                                        <h2 class="_aacl _aacs _aact _aacx _aada" style="text-align: justify;">
                                                            <span class="custom_span_label">Instagram:
                                                                <a
                                                                    href="{{ $distributor['instagram_link'] }}">{{ $distributor['instagram_link'] }}</a>

                                                            </span>
                                                        </h2>
                                                        <h2 class="tiktok-b7g450-H2ShareTitle ekmpd5l5"
                                                            style="text-align: justify;" data-e2e="user-title">
                                                            <span class="custom_span_label">Website:
                                                                <a
                                                                    href="{{ $distributor['website_link'] }}">{{ $distributor['website_link'] }}</a>
                                                            </span>
                                                        </h2>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            @empty
                                <h4 style="color: red">No Data Found</h4>
                            @endforelse
                        @endisset
                    </div>
                </div>
            </div>
        </div>

        @isset($data['distributors'])
        <div class="container pt-5 pb-5 custom_flage_main">
            <div class="accordion" id="accordionExample">
                <div class="row">
            @foreach ($data['distributors'] as $distributor)
                    {{-- <div class="accordion" id=""> --}}
                        <div class="col-md-6 col-6 col-lg-6">
                        {{-- Start --}}
                            <img class="w-100" src="{{ asset('app-assets') }}/images/distributor/images/{{ $distributor['image'] }}" alt="">
                            <div class="accordion-item custom_accourding_item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="mt-2 mb-2 accordion-button collapsed custom_flage_drop" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#accordion-{{$distributor['id']}}" aria-expanded="false"
                                        aria-controls="collapseTwo">
                                        {{$distributor ? $distributor['name'] : ''}}
                                    </button>
                                </h2>
                                <div id="accordion-{{$distributor['id']}}" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    {{-- data-bs-parent="#"> --}}
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul class="ps-0 flage_mobile_ul">
                                            <li class="d-block">
                                            <a href=""> {{$distributor ? $distributor['company'] : ''}}</a>
                                            </li>
                                            <li class="d-block">
                                                <a href="">{{$distributor ? $distributor['address'] : ''}}
                                                </a>
                                            </li>
                                            <li class="d-block">
                                            <a href="">
                                                @isset($distributor)
                                                    @foreach ($distributor['cities'] as $city)
                                                        <p style="text-align: justify;">
                                                            <span class="custom_span_label">
                                                                {{-- <span class="pe-1">{{ $city['name'] }}</span> --}}
                                                                @isset($city)
                                                                    @foreach ($city['phones'] as $phone)
                                                                        <a href="Tel:+{{$phone['phone_no']}}">{{ $phone['phone_no'] }}</a>
                                                                    @endforeach
                                                                @endisset
                                                            </span>
                                                        </p>
                                                    @endforeach
                                                @endisset
                                            </a>
                                            </li>
                                            <li class="d-block">
                                                <a href="">{{$distributor['website_link']}}</a>
                                            </li>
                                            <li class="d-block"><a href="">{{$distributor['email']}}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    </div>
                </div>
                    @endisset
    </section>

    {{view('app.front-end.home-page.map',['stores'=>$data['stores'], 'cities'=>$data['cities']])}}

@endsection

