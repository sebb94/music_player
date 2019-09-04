<?php 
include("includes/config.php");
//logout manually
//session_destroy();
if (isset($_SESSION['userLoggedIn'])){
    $username =  $_SESSION['userLoggedIn'];
    echo "Logged as: " . $username; 
}else{
    header("Location:register.php");
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Music Player</title>
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/font-awesome.min.css" />
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c9c259af04.js"></script>
    <script src="assets/js/register.js"></script>
    <script src="main.js"></script>
</head>

<body>

    <section id="nowPlayingBarContainer">
        <div id="nowPlayingBar">
            <div id="nowPlayingLeft">
                <i class="fa fa-play" aria-hidden="true"></i>
                <i class="fa fa-pause" aria-hidden="true"></i>
                <i class="fa fa-step-forward" aria-hidden="true"></i>
                <i class="fa fa-step-backward" aria-hidden="true"></i>
                <i class="fa fa-random" aria-hidden="true"></i>
                <i class="fa fa-repeat" aria-hidden="true"></i>
                <i class="fa fa-volume-up" aria-hidden="true"></i>
                <i class="fa fa-volume-down" aria-hidden="true"></i>
                <i class="fa fa-volume-off" aria-hidden="true"></i>
            </div>

            <div id="nowPlayingCenter">
                <div class="content playerControls">

                    <div class="buttons">
                        <button class="controlButton shuffle" title="Shuffle button"><i class="fa fa-random"
                                aria-hidden="true"></i></button>
                        <button class="controlButton previous" title="Previous button"><i class="fa fa-step-backward"
                                aria-hidden="true"></i></button>
                        <button class="controlButton play" title="Play button"><i class="fa fa-play-circle"
                                aria-hidden="true"></i></button>
                        <button class="controlButton pause" style="display:none;" title="Pause button"><i
                                class="fa fa-pause" aria-hidden="true"></i></button>
                        <button class="controlButton next" title="Next button"><i class="fa fa-step-forward"
                                aria-hidden="true"></i></button>
                        <button class="controlButton repeat" title="Repeat button"><i class="fa fa-repeat"
                                aria-hidden="true"></i></button>
                    </div>
                    <div class="playbackBar">
                        <span class="progressTime current">0.00</span>
                        <div class="progressBar">
                            <div class="progressBarBg">
                                <div class="progress"></div>
                            </div>
                        </div>
                        <span class="progressTime remaining">0.00</span>
                    </div>
                </div>
            </div>

            <div id="nowPlayingRight">


            </div>
        </div>
    </section>

</body>

</html>