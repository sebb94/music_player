<?php 
include("includes/config.php");
//logout manually
//session_destroy();
if (isset($_SESSION['userLoggedIn'])){
    $username =  $_SESSION['userLoggedIn'];
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
    <div id="mainContainer">

        <div id="topContainer">

            <section id="navBarContainer">
                <nav class="navbar">
                    <a href="index.php" class="logo">
                        <i class="fa fa-microphone" aria-hidden="true"></i>
                    </a>

                    <div class="group">
                        <div class="navItem">
                            <a href="search.php" class="navItemLink">Search <i class="fa fa-search"
                                    aria-hidden="true"></i></a>
                        </div>

                    </div>
                    <div class="group">
                        <div class="navItem">
                            <a href="browse.php" class="navItemLink">Browse</a>
                        </div>
                        <div class="navItem">
                            <a href="yourMusic.php" class="navItemLink">Your music</a>
                        </div>
                        <div class="navItem">
                            <a href="profile.php" class="navItemLink">Your profile</a>
                        </div>
                    </div> 

                </nav>

            </section>


        </div>

        <section id="nowPlayingBarContainer">
            <div id="nowPlayingBar">
                <div id="nowPlayingLeft">
                    <div class="content">
                        <span class="albumLink">
                            <img class="albumArtwork" src="assets/images/square.png">
                        </span>
                        <div class="trackInfo">
                            <span class="trackName">
                                Życie ostre jak maczeta
                            </span>
                            <span class="artistName">
                                WaszkaG
                            </span>


                        </div>
                    </div>
                </div>

                <div id="nowPlayingCenter">
                    <div class="content playerControls">

                        <div class="buttons">
                            <button class="controlButton shuffle" title="Shuffle button"><i class="fa fa-random"
                                    aria-hidden="true"></i></button>
                            <button class="controlButton previous" title="Previous button"><i
                                    class="fa fa-step-backward" aria-hidden="true"></i></button>
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
                    <div class="volumeBar">
                        <button class="controlButton volume" title="Volume button"><i class="fa fa-volume-up"
                                aria-hidden="true"></i></button>

                        <div class="progressBar">
                            <div class="progressBarBg">
                                <div class="progress"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </div>
    </div>
    </section>


    </div>



</body>

</html>