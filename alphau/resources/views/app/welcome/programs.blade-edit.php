@extends('app.welcome.layout.app')
@section('title')
    AlphaU - NIE Radio Programs
@endsection
@section('welcomebody')
    <div class="programs-body">
        <div class="container">
            <div class="row mt-4 pb-5">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="ms_weekly_wrapper ms_free_music">
                        <div class="ms_weekly_inner">
                            <div class="row">
                                <div class="col-lg-4 col-md-12 ">
                                    <div class="ms_weekly_box">
                                        <div class="weekly_left">
                                            <div class="w_top_song">
                                                <div class="w_tp_song_img">
                                                    <img src="{{ asset('admin/images/weekly/song1.jpg') }}" alt="">
                                                    <div class="ms_song_overlay">
                                                    </div>
                                                    <div class="ms_play_icon">
                                                        <img src="{{ asset('admin/images/svg/play.svg') }}" alt="">
                                                    </div>
                                                </div>
                                                <div class="w_tp_song_name">
                                                    <h3><a href="#">Until I Met You</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="weekly_right">
                                            <span class="w_song_time">5:10</span>
                                            <span class="w_song_dwnload">
                                                <i class="ms_icon1 bi bi-play-circle-fill"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="ms_divider"></div>
                                    <div class="ms_weekly_box">
                                        <div class="weekly_left">
                                            <div class="w_top_song">
                                                <div class="w_tp_song_img">
                                                    <img src="{{ asset('admin/images/weekly/song1.jpg') }}" alt="">
                                                    <div class="ms_song_overlay">
                                                    </div>
                                                    <div class="ms_play_icon">
                                                        <img src="{{ asset('admin/images/svg/play.svg') }}" alt="">
                                                    </div>
                                                </div>
                                                <div class="w_tp_song_name">
                                                    <h3><a href="#">Until I Met You</a></h3>
                                                    <span class="w_song_time">5:10</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ms_divider"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
