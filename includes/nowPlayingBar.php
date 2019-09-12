 <?php 
 $song_query = mysqli_query($con, "SELECT id FROM songs ORDER BY RAND() LIMIT 10");

 $resultArray = array();
 
 while($row = mysqli_fetch_array( $song_query )){
     array_push($resultArray, $row['id']);
 }
 
 $jsonArray = json_encode($resultArray);
 ?>
 
 <script>
 $(document).ready(function () {
    
    currentPlayList = <?php echo $jsonArray;?>;
    audioElement = new Audio();
    setTrack(currentPlayList[0], currentPlayList, false);

});
function setTrack(trackId, newPlayList, play){
    audioElement.setTrack("assets/music/bensound-dubstep.mp3");

    $.post("includes/handlers/ajax/get-song-json.php", {songId : trackId }, function(data){

     let track = JSON.parse(data);

     $('#nowPlayingBar .trackName').text(track.title);

    $.post("includes/handlers/ajax/get-artist-json.php", {artistId : track.artist }, function(data){
        let artist = JSON.parse(data);
        
         $('#nowPlayingBar .artistName').text(artist.name);
    });

     $.post("includes/handlers/ajax/get-album-json.php", {albumId : track.album }, function(data){
        let album = JSON.parse(data);
        console.log(album);
         $('#nowPlayingBar .albumLink img').attr('src',album.artworkPath);
    });



     audioElement.setTrack(track.path);
     //playSong();
    console.log(track);      

    });

    if (play == true){
        playSong();
    }
}

function playSong(){
    $('.controlButton.play').hide();
    $('.controlButton.pause').show();
    audioElement.play();
}
function pauseSong() {
    $('.controlButton.play').show();
    $('.controlButton.pause').hide();
    audioElement.pause();  
}


 </script>
 <div id="nowPlayingBar">
                <div id="nowPlayingLeft">
                    <div class="content">
                        <span class="albumLink">
                            <img class="albumArtwork" src="">
                        </span>
                        <div class="trackInfo">
                            <span class="trackName">
                                
                            </span>
                            <span class="artistName">
                               
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
                            <button class="controlButton play" title="Play button" onclick="playSong()"><i class="fa fa-play-circle"
                                    aria-hidden="true"></i></button>
                            <button class="controlButton pause" title="Pause button" onclick="pauseSong()"><i
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