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

         let newPlayList = <?php echo $jsonArray; ?>;
         audioElement = new Audio();
         setTrack(newPlayList[0], newPlayList, false);
         updateVolumeProgressBar(audioElement.audio);

         $("#nowPlayingBarContainer").on('mousedown touchstart mousemove touchmove', function (e) {
             e.preventDefault();
         });

         $('.playbackBar .progressBar').mousedown(function () {
             mouseDown = true;
         });
         $('.playbackBar .progressBar').mousemove(function (e) {
             if (mouseDown) {
                 timeFromOffset(e, this);
             }
         });
         $('.playbackBar .progressBar').mouseup(function (e) {
             timeFromOffset(e, this);

         });

         $('.volumeBar .progressBar').mousedown(function () {
             mouseDown = true;

         });
         $('.volumeBar .progressBar').mousemove(function (e) {
             if (mouseDown) {
                 let percentege = e.offsetX / $(this).width();
                 audioElement.audio.volume = percentege;
             }

         });
         $('.volumeBar .progressBar').mouseup(function (e) {
             let percentege = e.offsetX / $(this).width();

             if (percentege >= 0 && percentege <= 1) {
                 audioElement.audio.volume = percentege;
             }


         });
         $(document).mouseup(function () {
             mouseDown = false;

         });

     });

     function timeFromOffset(mouse, progressBar) {
         let percentege = mouse.offsetX / $(progressBar).width() * 100;
         let seconds = audioElement.audio.duration * (percentege / 100);
         audioElement.setTime(seconds);
     }

     function prevSong() {
         if (repeat == true) {
             audioElement.setTime(0);
             playSong();
             return;
         }

         if (currentIndex == 0) {
             currentIndex = currentPlayList.length;
         }
         if (audioElement.audio.currentTime >= 10) {
             audioElement.setTime(0);
         } else {
             currentIndex--;
             setTrack(currentPlayList[currentIndex], currentPlayList, true);
         }
     }

     function nextSong() {
         if (repeat == true) {
             audioElement.setTime(0);
             playSong();
             return;
         }
        
         if (currentIndex == currentPlayList.length - 1) {
             currentIndex = 0;
         } else {
             currentIndex++;
         }

         let trackToPlay = shuffle ? shufflePlayList[currentIndex] : currentPlayList[currentIndex];
         setTrack(trackToPlay, currentPlayList, true);
         console.log(currentIndex);
     }

     function setRepeat() {
         repeat = !repeat;
         let repeatButton = $("#nowPlayingBar .playerControls .controlButton.repeat i");
         console.log(repeatButton);
         console.log(repeat);
         let repeatClasses = repeat ? repeatButton.addClass('fa-repeat-active') : repeatButton.removeClass(
             'fa-repeat-active');
     }
     function setMute() {
         audioElement.audio.muted = !audioElement.audio.muted
         let volumeButton = $("#nowPlayingBar .volumeBar .volume i");
         let volumeClasses = audioElement.audio.muted ? volumeButton.attr('class', 'fa fa-volume-off') : volumeButton
             .attr('class', 'fa fa-volume-up');
     }

     function setShuffle() {
         shuffle = !shuffle;
         let shuffleButton = $("#nowPlayingBar .playerControls .controlButton.shuffle i");
         let shuffleClasses = shuffle ? shuffleButton.addClass('fa-shuffle-active') : shuffleButton.removeClass(
             'fa-shuffle-active');

         if (shuffle) {
             shuffleArray(shufflePlayList);
             currentIndex = shufflePlayList.indexOf(audioElement.currentlyPlaying.id);
         } else {
             currentIndex = currentPlayList.indexOf(audioElement.currentlyPlaying.id);
         }

     }

     function shuffleArray(a) {
         let j, x, i;

         for (i = a.length; i; i--) {
             j = Math.floor(Math.random() * i);
             x = a[i - 1];
             a[i - 1] = a[j];
             a[j] = x;
         }
     }
     function setTrack(trackId, newPlayList, play) {

         if (newPlayList != currentPlayList) {
             currentPlayList = newPlayList;
             shufflePlayList = currentPlayList.slice();
             shuffleArray(shufflePlayList);
         }
         if (shuffle) {
             currentIndex = shufflePlayList.indexOf(trackId);
         } else {
             currentIndex = currentPlayList.indexOf(trackId);
         }
         pauseSong();
         $.post("includes/handlers/ajax/get-song-json.php", {
             songId: trackId
         }, function (data) {

             let track = JSON.parse(data);

             $('#nowPlayingBar .trackName').text(track.title);

             $.post("includes/handlers/ajax/get-artist-json.php", {
                 artistId: track.artist
             }, function (data) {
                 let artist = JSON.parse(data);

                 $('#nowPlayingBar .artistName').text(artist.name);
                 $('#nowPlayingBar .artistName').attr('onclick','openPage("artist.php?id=' + artist.id + '")');
             });

             $.post("includes/handlers/ajax/get-album-json.php", {
                 albumId: track.album
             }, function (data) {
                 let album = JSON.parse(data);
                 $('#nowPlayingBar .albumLink img').attr('src', album.artworkPath);
                  $('#nowPlayingBar .albumLink img').attr('onclick','openPage("album.php?id=' + album.id + '")');
                  $('#nowPlayingBar .trackName').attr('onclick','openPage("album.php?id=' + album.id + '")');
             });
             audioElement.setTrack(track);
             if (play == true) {
                 playSong();
             }

         });


     }

     function playSong() {

         if (audioElement.audio.currentTime == 0) {
             $.post("includes/handlers/ajax/update-plays.php", {
                 songId: audioElement.currentlyPlaying.id
             }, function (data) {});
         }


         $('#nowPlayingBar .controlButton.play').hide();
         $('#nowPlayingBar .controlButton.pause').show();
         audioElement.play();
     }

     function pauseSong() {
         $('#nowPlayingBar .controlButton.play').show();
         $('#nowPlayingBar .controlButton.pause').hide();
         audioElement.pause();
     }
 </script>
 <div id="nowPlayingBar">
     <div id="nowPlayingLeft">
         <div class="content">
              <span role="link" tab-index="0" class="albumLink">
                 <img class="albumArtwork" src="">
             </span>
             <div class="trackInfo">
                  <span role="link" tab-index="0"  class="trackName">

                 </span>
                 <span role="link" tab-index="0"  class="artistName">

                 </span>


             </div>
         </div>
     </div>

     <div id="nowPlayingCenter">
         <div class="content playerControls">

             <div class="buttons">
                 <button class="controlButton shuffle" title="Shuffle button" onclick="setShuffle();"><i
                         class="fa fa-random" aria-hidden="true"></i></button>
                 <button class="controlButton previous" title="Previous button"><i class="fa fa-step-backward"
                         aria-hidden="true" onclick="prevSong();"></i></button>
                 <button class="controlButton play" title="Play button" onclick="playSong()"><i
                         class="fa fa-play-circle" aria-hidden="true"></i></button>
                 <button class="controlButton pause" title="Pause button" onclick="pauseSong()"><i class="fa fa-pause"
                         aria-hidden="true"></i></button>
                 <button class="controlButton next" title="Next button" onclick="nextSong();"><i
                         class="fa fa-step-forward" aria-hidden="true"></i></button>
                 <button class="controlButton repeat" title="Repeat button" onclick="setRepeat();"><i
                         class="fa fa-repeat" aria-hidden="true"></i></button>
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
             <button class="controlButton volume" title="Volume button" onclick="setMute();"><i class="fa fa-volume-up"
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