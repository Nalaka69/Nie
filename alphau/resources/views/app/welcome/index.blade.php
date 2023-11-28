@extends('app.welcome.layout.app')
@section('title')
    AlphaU - NIE Radio for Students 24/7
@endsection
@section('welcomebody')
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap");
        @import url("https://fonts.googleapis.com/css2?family=Outfit&display=swap");

        .bg {
            background-color: #8563B9;
            padding-top: 80px;
            padding-bottom: 50px;
        }

        .welcome {
            font-family: "Luckiest Guy", sans-serif;
            color: #fff;
            font-size: 3.5vw;
        }

        .to {
            font-family: "Luckiest Guy", sans-serif;
            color: #ffd699;
            font-size: 2.5vw;
        }

        .nie-radio {
            font-family: "Luckiest Guy", sans-serif;
            color: #bc0b34;
            font-size: 3.5vw;
            text-transform: capitalize;
        }

        .by {
            font-family: "Luckiest Guy", sans-serif;
            color: #e81748;
            font-size: 2.5vw;
            text-transform: capitalize;
        }

        .btn-readmore {
            color: #835886;
            font-weight: 700;
            font-size: 1vw;
            background-color: #c9b0ea;
            border-radius: 1.5vw;
            border: 1px solid #c9b0ea;
            padding: 0.5vw 2vw;
        }

        .btn-readmore:hover {
            color: #f8faf9;
            background-color: #835886;
            border-radius: 1.5vw;
            border: 1px solid #835886;
            padding: 0.5vw 2vw;
        }

        /* Adjustments for smaller screens */
        @media (max-width: 768px) {
            .welcome,
            .nie-radio,
            .by {
                font-size: 10vw;
            }

            .to {
                font-size: 5vw;
            }

            .btn-readmore {
                font-size: 3vw;
                padding: 1vw 4vw;
            }

            .bg {
                padding-top: 50px;
                padding-bottom: 30px;
            }
        }
    </style>

    <div class="container-fluid bg">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-12 d-flex justify-content-center">
                <div class="p-4 text-center">
                    <h1 class="welcome">WELCOME</h1>
                    <h1 class="nie-radio"><span class="to">TO &nbsp;</span> AlphaU </h1>
                    <h1><span class="by">by NIE</span></h1>
                    <a href="/about" class="btn btn-primary btn-readmore mt-3">Read More</a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <img src="{{ asset('imgs/radio-nie.png') }}" class="img-fluid" alt="Hero" />
            </div>
        </div>
    </div>
@endsection
