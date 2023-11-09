<!DOCTYPE html>
<html>

<head>
    <title>Administrator - AlphaU Radio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        /* Set background color to grey */
        body {
            background-color: rgb(48, 48, 48);
        }

        /* Set page height and width to device screen height and width */
        body,
        html {
            height: 100%;
            width: 100%;
        }

        /* Center the image vertically and horizontally */
        .centered-image {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .centered-image img {
            width: 200px;
            height: 200px;
        }

        .bottom-images {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            text-align: center;
        }

        /* Adjust the size and spacing of the small images */
        .bottom-images img {
            height: 70px;
            width: 70px;
            margin: 0 10px;
            padding: 10px /* Add some spacing between the images */
        }
        .rdo{
            /* width: 140% */
        }
    </style>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
     integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
     crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <div class="centered-image">
        <input class="rdo" type="radio" name="xxx" id="rdio_top_left">
        {{-- <input class="rdo" type="radio" name="xxx" id="rdio_top_right"> --}}
        <img src="{{ asset('imgs/admn/u1.png') }}" alt="alphauradio" width="100" height="100">
        <input class="rdo" type="radio" name="xxx" id="rdio_top_right">
    </div>
    <div class="container">
        <div class="bottom-images d-flex justify-content-between">
            <div class="bottom-left btn">
                <img src="{{ asset('imgs/admn/u6.png') }}" alt="alphauradio" id="btn_left">
            </div>
            <div class="bottom-center btn">
                <img src="{{ asset('imgs/admn/u8.png') }}" alt="alphauradio" id="btn_middle">
            </div>
            <div class="bottom-right btn">
                <img src="{{ asset('imgs/admn/u7.png') }}" alt="alphauradio" id="btn_right">
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
          $('#btn_left').click(function() {
            window.location.href = '/admin/automation';
          });
          $('#btn_middle').click(function() {
            window.location.href = '/';
          });
          $('#btn_right').click(function() {
            window.location.href = '/admin/dashboard';
          });
        });
        </script>
</body>

</html>
