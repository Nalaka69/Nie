@extends('app.welcome.layout.app')
@section('title')
    AlphaU - NIE Radio for Students 24/7
@endsection
@section('welcomebody')
<style>
    #closeChat{
        color: red;
        border:none;
        background-color: #fff;
        font-size: 150%
    }
</style>
    <!---Banner--->
    <div class="ms-banner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="ms_banner_img">
                        <img src="{{ asset('imgs/admn/hero-bg.jpeg') }}" alt="" class="img-fluid">
                    </div>
                    <div class="ms_banner_text ">
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

    <!-- Static Message Icon -->
    <div id="chatIcon" style="position: fixed; bottom: 100px; right: 20px; z-index: 9999;">
        <a href="#" id="openChat"
            style="display: inline-block; padding: 10px; background-color: #3BC8E7; color: #fff; border-radius: 50%; text-decoration: none;">
            <i class="bi bi-chat-dots-fill" style="font-size: 50px;"></i>
        </a>
    </div>

    <!-- Chat Box (Initially hidden) -->
    <div id="chatBox" style="display: none; position: fixed; bottom: 100px; right: 20px; z-index: 9999;">
        <div style="background-color: #fff; padding: 20px; border: 1px solid #ccc; position: relative;  border-radius:10px;">
            <button id="closeChat" style="position: absolute; top: 5px; right: 5px;">x</button>
            <!-- Check if the user is logged in -->
            @auth
                <!-- Include your chat content here -->
                @include('app.chat.chat_student')
            @else
                <p>Please <a href="{{ route('login') }}">log in</a> to send messages.</p>
            @endauth
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
    <script>
        $(document).ready(function() {
            $('#openChat').on('click', function() {
                $('#chatIcon').hide();
                $('#chatBox').show();
            });

            $('#closeChat').on('click', function() {
                $('#chatBox').hide();
                $('#chatIcon').show();
            });
        });
    </script>
@endsection
