@extends('app.welcome.layout.app')
@section('title')
    AlphaU - NIE Radio for Students 24/7
@endsection
@section('welcomebody')
    <!---Banner--->
    <div class="ms-banner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="ms_banner_img">
                        <img src="{{ asset('imgs/admn/hero-bg.png') }}" alt="" class="img-fluid">
                    </div>
                    <div class="ms_banner_text">
                        <h1>Welcome to</h1>
                        {{-- <p>to</p> --}}
                        <h1 class="ms_color">AlphaU Radio</h1>
                        {{-- <p>by<br> NIE</p> --}}
                        <div class="ms_banner_btn">
                            <a href="#" class="ms_btn">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!---Recently Played Music--->
    <div class="ms_rcnt_slider">
        <div class="ms_heading">
            <h1>Recent Programs</h1>
            <span class="veiw_all"><a href="{{ route('welcome.programs') }}">view more</a></span>
        </div>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @forelse ($archiveslist as $item)
                    <div class="swiper-slide">
                        <div class="ms_rcnt_box">
                            <div class="ms_rcnt_box_img">
                                <img src="{{ asset($item->program_thumbanail) }}" alt="" />
                                <div class="ms_main_overlay">
                                    <div class="ms_box_overlay"></div>
                                </div>
                            </div>
                            <div class="ms_rcnt_box_text">
                                <h3><a href="{{ route('welcome.programs') }}">{{ $item->program_name }}</a></h3>
                                <p>{{ $item->program_genre }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="swiper-slide">
                        <div class="ms_rcnt_box">
                            <div class="ms_rcnt_box_img">
                                <img src="{{ asset('admin/images/music/r_music1.jpg') }}" alt="" />
                                <div class="ms_main_overlay">
                                    <div class="ms_box_overlay"></div>
                                </div>
                            </div>
                            <div class="ms_rcnt_box_text">
                                <h3><a href="#">No Program found.</a></h3>
                                <p></p>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next slider_nav_next"></div>
        <div class="swiper-button-prev slider_nav_prev"></div>
    </div>

    @section('audplayer')
        @include('app.welcome.layout.audioplayer')
    @endsection

    <!----Add Section Start---->
    {{-- <div class="ms_advr_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <a href="#"><img src="{{ asset('admin/images/adv.jpg') }}" alt=""
                            class="img-fluid" /></a>
                </div>
            </div>
        </div>
    </div> --}}

    <!----Main div close---->
@endsection
