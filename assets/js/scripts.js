function Audio(){

    this.currentlyPlaying;
    this.audio = document.createElement('audio');

    this.setTrack = function(src){
        this.audio.src = src;
    }
}

var audioElement = new Audio();
audioElement.setTrack("assets/music/bensound-goinghigher.mp3");
//audioElement.audio.play();