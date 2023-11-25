@extends('app.welcome.layout.app')
@section('title')
    AlphaU - NIE Radio Programs
@endsection
@section('welcomebody')
    <style>
        .albmart {
            height: 50px;
            width: 50px;
            border-radius: 10px;
        }

        .albmart_lg {
            height: 130px;
            width: 150px;
            border-radius: 10px;
        }

        .li_play_btn {
            cursor: pointer;
            color: #f3f3f3;
            font-size: 28px;
        }

        .li_play_btn:hover {
            color: #d2b4ff;
        }

        .single_play_btn i {
            color: #fff;
        }

        .playback_song-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto;
            text-align: center;
        }

        .list-group-item {
            width: 100%;
        }

        .li_bg {
            background-color: #372158;
        }

        .li_text {
            color: #fff;
        }

        /* calendar */
        /* .program_calender {
                                        height: 600px;
                                        overflow: hidden;
                                    } */
        #calendar {
            color: #fff;
            background-color: #583e81;
            padding: 15px;
            border-radius: 20px;
            border: none;
        }

        #calendar table {
            border: 2px solid #583e81;
            border-radius: 20px;
        }

        #calendar a {
            color: #fff;
            text-decoration: none;
        }

        .fc-dayGridMonth-view {
            background-color: #4a3270;

        }

        /* audio element */
        /* Default styles for the audio element */
        audio {
            width: 600px;
            height: 50px;
            border: none;
            border-radius: 50px;
            padding: 10px;
            background-color: #4a3270;
            color: #fff;
        }

        /* Media query for large screens (lg) */
        @media (min-width: 1200px) {
            audio {
                width: 800px;
                /* Adjust width for large screens */
            }
        }

        /* Media query for medium-sized screens (md) */
        @media (max-width: 1199px) and (min-width: 768px) {
            audio {
                width: 500px;
                /* Adjust width for medium screens */
            }
        }

        /* Media query for small screens (sm) */
        @media (max-width: 767px) {
            audio {
                width: 300px;
                /* Adjust width for small screens */
            }
        }


        audio::-webkit-slider-thumb {
            background-color: #000;
            border: 1px solid #fff;
            cursor: pointer;
        }

        audio::-webkit-media-controls-play-button,
        audio::-webkit-media-controls-pause-button {
            /* background-color: #000; */
            border: none;
            cursor: pointer;
            color: #000;
        }

        audio::-webkit-media-controls {
            color: #fff;
        }

        /* audio:hover::-webkit-media-controls {
                    display: block;
                } */
    </style>
    <div class="programs-body">
        <div class="container">
            <div class="row">
                <div class="playback_song-container">
                    <div class="playback_song">
                        <img src={{ asset('imgs/albumart.jpg') }} class="albmart_lg mt-5 mb-2">
                        <div class=" align-items-center">
                            <h3 id="songname" class="li_text"></h3>
                            <audio controls autoplay=false volume="0.5">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4 pb-5">
                <div class="col-md-5 col-lg-5 col-sm-12">
                    <div class="program_calender">
                        <div id="calendar"></div>
                    </div>
                </div>
                <div class="col-md-7 col-lg-7 col-sm-12">
                    <ol class="list-group list-group-flush programs-list">
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js"></script>
    <script>
        $(document).ready(function() {
            var calendarEl = $('#calendar')[0];
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                selectable: true,
                select: function(info) {
                    var selectedDate = info.startStr;
                    fetchProgramsForDate(selectedDate);
                }
            });
            calendar.render();
            fetchProgramsForDate(getFormattedDate(new Date()));

            function fetchProgramsForDate(selectedDate) {
                $.ajax({
                    url: '{{ route('welcome.programs.list') }}',
                    method: 'GET',
                    data: {
                        selectedDate: selectedDate
                    },
                    success: displayPrograms,
                    error: function(error) {
                        console.error('Error fetching programs:', error);
                    }
                });
            }

            function displayPrograms(response) {
                var programsList = $('.programs-list').empty();
                if (response.programs.length > 0) {
                    response.programs.forEach(function(program) {
                        var listItem = $('<li>', {
                            class: 'list-group-item d-flex justify-content-between align-items-start li_bg'
                        }).append(
                            $('<img>', {
                                src: '/imgs/albumart.jpg',
                                class: 'albmart',
                                alt: program.program_name
                            }),
                            $('<div>', {
                                class: 'ms-2 me-auto li_text'
                            }).append(
                                $('<div>', {
                                    class: 'fw-bold',
                                    text: program.program_name + '-e' + program.episode
                                })
                            ),
                            $('<span>').append(
                                $('<i>', {
                                    class: 'bi bi-play-circle-fill btn btn-sm single_play_btn li_play_btn',
                                    'data-audio-src': program.program_file
                                })
                            )
                        );
                        programsList.append(listItem);
                    });
                } else {
                    programsList.append($('<li>', {
                        class: 'list-group-item',
                        html: '<div class="ms-2 me-auto fw-bold">No programs available for this date.</div>'
                    }));
                }
            }

            function getFormattedDate(date) {
                return date.toISOString().split('T')[0];
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.programs-body').on('click', '.single_play_btn', function() {
                var audioSource = $(this).data('audio-src');
                var programName = $(this).closest('.list-group-item').find('.fw-bold').text();
                $('.playback_song img').attr('src', '{{ asset('imgs/albumart.jpg') }}');
                $('#songname').text(programName);
                $('.playback_song audio').attr('src', audioSource);
                $('.playback_song audio')[0].play();
            });
        });
    </script>
@endsection
