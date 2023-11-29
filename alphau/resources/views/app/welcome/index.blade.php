@extends('app.welcome.layout.app')
@section('title')
    AlphaU - NIE Radio for Students 24/7
@endsection
@section('welcomebody')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        @import url(https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap);@import url(https://fonts.googleapis.com/css2?family=Outfit&display=swap);.by,.nie-radio{font-family:"Luckiest Guy",sans-serif;text-transform:capitalize}.bg{background-color:#8563b9;padding-top:80px;padding-bottom:50px}.welcome{font-family:"Luckiest Guy",sans-serif;color:#fff;font-size:3.5vw}.to{font-family:"Luckiest Guy",sans-serif;color:#ffd699;font-size:2.5vw}.nie-radio{color:#bc0b34;font-size:3.5vw}.by{color:#e81748;font-size:2.5vw}.btn-readmore{color:#835886;font-weight:700;font-size:1vw;background-color:#c9b0ea;border-radius:1.5vw;border:1px solid #c9b0ea;padding:.5vw 2vw}.btn-readmore:hover{color:#f8faf9;background-color:#835886;border-radius:1.5vw;border:1px solid #835886;padding:.5vw 2vw}@media (max-width:768px){.by,.nie-radio,.welcome{font-size:10vw}.to{font-size:5vw}.btn-readmore{font-size:3vw;padding:1vw 4vw}.bg{padding-top:50px;padding-bottom:30px}}.rdo_img{width:200px}.card{position:relative}.card-img-overlay{position:absolute;bottom:0;transform:translateX(-50%);transform:translateY(52%);width:100%;text-align:center;padding:10px}.buttons{display:flex;flex-direction:row;align-items:center;margin-bottom:10px}.active,.randomActive{color:#000}.playpause-track{padding:2px;opacity:.8;color:#664728;transition:opacity .2s}.playpause-track:hover,.volume_slider:hover{opacity:1}.player_container{display:flex;justify-content:center;align-items:center;width:max-content}.volume_slider{-webkit-appearance:none;-moz-appearance:none;appearance:none;height:10px;border-radius:10px;background:#a887d2;-webkit-transition:.2s;transition:opacity .2s;width:100px}.volume_slider::-webkit-slider-thumb{-webkit-appearance:none;-moz-appearance:none;appearance:none;width:15px;height:15px;background:#fff;border:3px solid #634098;cursor:grab;border-radius:100%}.current-time,.total-duration{padding:10px}i.fa-volume-down,i.fa-volume-up{padding:2px}i,i.fa-pause-circle,i.fa-play-circle,i.fa-step-backward,i.fa-step-forward,p{cursor:pointer}.rotate{animation:8s linear infinite rotation}@keyframes rotation{from{transform:rotate(0)}to{transform:rotate(359deg)}}.loader{height:40px;display:flex;justify-content:center;align-items:center}.loader .stroke{background:#f1f1f1;height:150%;width:4px;border-radius:50px;margin:0 5px;animation:1.4s linear infinite animate}@keyframes animate{50%{height:20%;background:#5c355e}100%{background:#835886;height:100%}}.stroke:first-child,.stroke:nth-child(7){animation-delay:0s}.stroke:nth-child(2),.stroke:nth-child(6){animation-delay:.3s}.stroke:nth-child(3),.stroke:nth-child(5){animation-delay:.6s}.stroke:nth-child(4){animation-delay:.9s}
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
                <div class="d-flex justify-content-center">
                    <div class="card"
                        style="--bs-card-bg: none !important; --bs-card-border-color: none !important; --bs-card-border-width: 0 !important; position: relative;">
                        <img src="{{ asset('imgs/radio_long.png') }}" class="rdo_img card-img img-fluid" alt="">
                        <div class="card-img-overlay">
                            <div class="">
                                <div class="details">
                                    <div class="track-art"></div>
                                </div>




                                <div class="sldr_cntnr">
                                    <div class="slider_container">
                                        <input type="range" min="1" max="100" value="0"
                                            class="seek_slider" onchange="seekTo()" hidden>
                                    </div>

                                    <div class="slider_container">
                                        <i class="fa fa-volume-down"></i>
                                        <input type="range" min="1" max="100" value="99"
                                            class="volume_slider" onchange="setVolume()">
                                        <i class="fa fa-volume-up"></i>
                                    </div>
                                    <div class="playpause-track" onclick="playpauseTrack()">
                                        <i class="fa fa-play-circle fa-3x"></i>
                                    </div>
                                </div>
                                <div id="wave" class="">
                                    <span class="stroke"></span>
                                    <span class="stroke"></span>
                                    <span class="stroke"></span>
                                    <span class="stroke"></span>
                                    <span class="stroke"></span>
                                    <span class="stroke"></span>
                                    <span class="stroke"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    function checkStreamAvailability(a){fetch(a).then(a=>{a.ok||handleStreamNotAvailable()}).catch(a=>{handleStreamNotAvailable()})}function handleStreamNotAvailable(){wave.removeClass("loader"),playpause_btn.html('<i class="fa fa-play-circle fa-3x"></i>')}checkStreamAvailability("http://143.244.134.209:8000/stream");let now_playing=$(".now-playing"),track_art=$(".track-art"),track_name=$(".track-name"),track_artist=$(".track-artist"),playpause_btn=$(".playpause-track"),next_btn=$(".next-track"),prev_btn=$(".prev-track"),seek_slider=$(".seek_slider"),volume_slider=$(".volume_slider"),wave=$("#wave"),randomIcon=$(".fa-random"),curr_track=$("<audio></audio>").get(0),track_index=0,isPlaying=!1,isRandom=!1,updateTimer;const music_list=[{img:"images/stay.png",name:"Stay",artist:"The Kid LAROI, Justin Bieber",music:"http://143.244.134.209:8000/stream"}];function loadTrack(a){clearInterval(updateTimer),reset(),curr_track.src=music_list[a].music,curr_track.load(),track_art.css("background-image","url("+music_list[a].img+")"),track_name.text(music_list[a].name),track_artist.text(music_list[a].artist),now_playing.text("Playing music "+(a+1)+" of "+music_list.length),updateTimer=setInterval(setUpdate,1e3),$(curr_track).on("ended",nextTrack),random_bg_color()}function random_bg_color(){let a=["0","1","2","3","4","5","6","7","8","9","a","b","c","d","e"];function r(r){for(let t=0;t<6;t++)r+=a[Math.round(14*Math.random())];return r}let t=r("#"),e=r("#");$("body").css("background","linear-gradient(to right,"+t+", "+e+")")}function reset(){seek_slider.val(0)}function playpauseTrack(){isPlaying?pauseTrack():playTrack()}function playTrack(){curr_track.play(),isPlaying=!0,track_art.addClass("rotate"),wave.addClass("loader"),playpause_btn.html('<i class="fa fa-pause-circle fa-3x"></i>'),checkStreamAvailability("http://143.244.134.209:8000/stream")}function pauseTrack(){curr_track.pause(),isPlaying=!1,track_art.removeClass("rotate"),wave.removeClass("loader"),playpause_btn.html('<i class="fa fa-play-circle fa-3x"></i>')}function seekTo(){let a=curr_track.duration*(seek_slider.val()/100);curr_track.currentTime=a}function setVolume(){curr_track.volume=volume_slider.val()/100}function setUpdate(){let a=0;if(!isNaN(curr_track.duration)){a=curr_track.currentTime*(100/curr_track.duration),seek_slider.val(a);let r=Math.floor(curr_track.currentTime/60),t=Math.floor(curr_track.currentTime-60*r),e=Math.floor(curr_track.duration/60),c=Math.floor(curr_track.duration-60*e);t<10&&(t="0"+t),c<10&&(c="0"+c),r<10&&(r="0"+r),e<10&&(e="0"+e)}}loadTrack(track_index);
                </script>
            </div>
        </div>
    </div>
@endsection
