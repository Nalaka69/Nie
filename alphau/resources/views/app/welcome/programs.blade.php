@extends('app.welcome.layout.app')
@section('title')
    AlphaU - NIE Radio for Students 24/7
@endsection
@section('welcomebody')
    <div class="hero-section">
        <style>
            .radio_box {
                border: 4px solid #cbcbcb;
            }
        </style>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="hero-content mt-5">
                        <h1 class="welcome">WELCOME</h1>
                        <h1 class="nie-radio"><span class="to">TO </span> AlphaU <span class="by">by NIE</span></h1>

                        <Link to="/about" class="btn-readmore">Read More</Link>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="hero-image mt-2">
                        <img src="{{ asset('imgs/radio-nie.png') }}" alt="Hero" />
                    </div>
                    <div class="radio-box">
                        <audio src="http://143.244.134.209:8000/stream" controls autoPlay=false volume=0.5 class="">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
