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
