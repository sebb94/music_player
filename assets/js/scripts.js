let currentPlayList = [];
let audioElement;

function formatTime(songsSeconds){

    let time = Math.round(songsSeconds);
    let minutes = Math.floor(time / 60);
    let seconds = time - (minutes * 60);
    let extraZero = (seconds < 10) ? "0" : "";
   
    return minutes + ":" + extraZero + seconds;

}

function Audio(){

    this.currentlyPlaying;
    this.audio = document.createElement('audio');

    this.audio.addEventListener("canplay",function(){
        let duration = formatTime(this.duration)
        $('.progressTime.remaining').text(duration);

    });

    this.setTrack = function(track){
        this.currentlyPlaying = track;
        this.audio.src = track.path;
    }

    this.play = function(){
       this.audio.play();
    }

    this.pause = function(){
        this.audio.pause();
    }
}


