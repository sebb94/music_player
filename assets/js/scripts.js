let currentPlayList = [];
let shufflePlayList = [];
let tempPlayList = [];
let audioElement;
let mouseDown = false;
let currentIndex = 0;
let repeat = false;
let shuffle = false;
let timer;

$(window).scroll(function () {
    hideOptionsMenu();    
});

$(document).on('click',function(e){
    let target = $(e.target);
    if (!target.hasClass('item') && !target.hasClass('optionsButton')){
       hideOptionsMenu();
    }
});

$(document).on("change", "select.playlist", function(){
    let playlistId = $(this).val();
    let songId = $(this).prev(".songId").val();
    console.log("p id:" +playlistId);
    console.log("s id:" + songId);

});

function openPage(url) {

    if (timer != null) {
        clearTimeout(timer);
    }

    if (url.indexOf("?") == -1) {
        url = url + "?";
    }
    let encodedUrl = encodeURI(url + "&userLoggedIn=" + userLoggedIn);
    console.log(encodedUrl);
    $("#mainContent").load(encodedUrl);
    $("body").scrollTop(0);
    history.pushState(null, null, url);

}

function createPlayList() {

    let message = prompt("Please enter the name of your Playlist");

    if (message != null) {
        $.post("includes/handlers/ajax/createPlayList.php", {
            name: message,
            username: userLoggedIn
        }).done(function (error) {
            if (error != "") {
                alert(error);
                return;
            }
            openPage("yourMusic.php");
        });
    }

}
function deletePlayList(playlistId) {

    let message = confirm("Are you sure You want to delete this Playlist");
    if (message) {
        $.post("includes/handlers/ajax/deletePlayList.php", {
           playlistId: playlistId
        }).done(function (error) {
            if (error != "") {
                alert(error);
                return;
            }
            openPage("yourMusic.php");
        });
    }

}
function hideOptionsMenu(){
     let menu = $(".optionsMenu");
     if(menu.css("display") != "none"){
         menu.css("display","none");
     }

}


function showOptionsMenu(button){

    let songId = $(button).prevAll(".songId").val();
    let menu = $(".optionsMenu");
    let menuWidth = menu.width();
    menu.find(".songId").val(songId);
    let scrollTop = $(window).scrollTop();
    let elementOffset = $(button).offset().top;
    let top = elementOffset - scrollTop;
    let left = $(button).position().left;

    menu.css({"top" : top + "px", "left" : left - menuWidth + "px", "display": "inline" })


}


function playFirstSong() {
    setTrack(tempPlayList[0], tempPlayList, true);
}

function formatTime(songsSeconds) {

    let time = Math.round(songsSeconds);
    let minutes = Math.floor(time / 60);
    let seconds = time - (minutes * 60);
    let extraZero = (seconds < 10) ? "0" : "";

    return minutes + ":" + extraZero + seconds;

}

function updateProgressBar(audio) {

    $('.progressTime.current').text(formatTime(audio.currentTime));
    $('.progressTime.remaining').text(formatTime(audio.duration - audio.currentTime));

    let progress = (audio.currentTime / audio.duration) * 100;

    $('.playbackBar .progress').css('width', progress + "%");
}

function updateVolumeProgressBar(audio) {


    let volume = audio.volume * 100;

    $('.volumeBar .progress').css('width', volume + "%");
}


function Audio() {

    this.currentlyPlaying;
    this.audio = document.createElement('audio');

    this.audio.addEventListener("ended", function () {
        nextSong();
    });

    this.audio.addEventListener("canplay", function () {
        let duration = formatTime(this.duration)
        $('.progressTime.remaining').text(duration);

    });
    this.audio.addEventListener("timeupdate", function () {

        if (this.duration) {
            updateProgressBar(this);
        }

    });

    this.audio.addEventListener("volumechange", function () {

        updateVolumeProgressBar(this);

    });

    this.setTrack = function (track) {
        this.currentlyPlaying = track;
        this.audio.src = track.path;
    }

    this.play = function () {
        this.audio.play();
    }

    this.pause = function () {
        this.audio.pause();
    }

    this.setTime = function (seconds) {
        this.audio.currentTime = seconds;
    }
}