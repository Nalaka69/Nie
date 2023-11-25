<!DOCTYPE html>
<html>

<head>
    <title>Administrator - AlphaU Radio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta content="{{ csrf_token() }}"name=csrf-token>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.5/sweetalert2.min.css"
        integrity="sha512-InYSgxgTnnt8BG3Yy0GcpSnorz5gxHvT6OEoRWj91Gg+RvNdCiAharnBe+XFIDS754Kd9TekdjXw3V7TAgh6Vw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            padding: 10px
                /* Add some spacing between the images */
        }

        .rdo {
            /* width: 140% */
        }

        .rdo_lbl {
            color: #fff;
            font-size: 18px;
            font-weight: 700;
        }

        .crrnt_stts {
            color: #fff;
            font-size: 24px;
        }
        .crrnt_stts p{
           font-weight: 400;
        }
        .crrnt_stts span{
           font-weight: 600;
           background-color:#fff;
           color:#303030;
           padding: 5px;
           border-radius:5px;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <div class="container text-center">
        <div class="crrnt_stts">
            <p>current mode : <span>Automation</span></p>
        </div>
    </div>
    <div class="centered-image">
        <span class="rdo_lbl">Online</span>
        <input class="rdo" type="radio" name="play_status" id="rdio_top_left" value="Online" disabled>
        <img src="{{ asset('imgs/admn/gear-l.png') }}" alt="alphauradio" width="100" height="100">
        <input class="rdo" type="radio" name="play_status" id="rdio_top_right" value="Automation" disabled>
        <span class="rdo_lbl">Automation</span>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.5/sweetalert2.all.min.js"
        integrity="sha512-2JsZvEefv9GpLmJNnSW3w/hYlXEdvCCfDc+Rv7ExMFHV9JNlJ2jaM+uVVlCI1MAQMkUG8K83LhsHYx1Fr2+MuA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
    <script>
        $(document).ready(function() {
            $('.rdo').change(function(e) {
                e.preventDefault();
                var formData = new FormData();
                formData.append('current_status', $('input[name="play_status"]:checked').val());
                console.log(formData);
                $.ajax({
                    type: 'PUT',
                    url: '{{ route('current_status.change') }}',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data, status, xhr) {
                        var statusCode = xhr.status;
                        if (statusCode === 200) {
                            // Do something with success message here
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                // title: "Success",
                                text: "Streaming mode changed.",
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function() {
                                // Reload the page
                                // location.reload();
                            });
                        } else if (statusCode === 422) {
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'Error',
                                text: 'Input Valid Data!',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        } else {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: "Error",
                                text: "File Submission Failed",
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    },
                });
            });
        });
    </script>
</body>

</html>
