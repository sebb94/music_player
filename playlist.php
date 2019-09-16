<?php include("includes/includedFiles.php");?>

<?php if (isset( $_GET['id'])){
  $playlistId = $_GET['id'];
}else{
    header("Location: index.php");
}

$playlist = new Playlist($con, $playlistId );
$owner = new User($con, $playlist->getOwner());
?>
<section class="playListPage">
<div class="entityInfo">
    <div class="leftSection">
          <i class='fa fa-music' aria-hidden='true'></i>
    </div>
    <div class="rightSection">
        <h2> <?php echo $playlist->getName();?></h2>
        <p>By: <?php echo $playlist->getOwner();?></p>
        <p><?php echo $playlist->getNumberOfSongs();?> Songs</p>
        <button class="btn" onclick="deletePlayList(<?php echo $playlistId;?>)">DELETE PLAYLIST</button>
    </div>
</div>

<div class="tracklistContainer">
    <ul class="tracklist">

    <?php $songIdArray = array(); 
    
    $songIdArray = $playlist->getSongsIds();
        $i = 1;
        foreach( $songIdArray as $songId){

            $playlistSong = new Song($con, $songId);
            $songArtist =  $playlistSong->getArtist();

            echo "<li class='trackListRow'>
                <div class='trackCount'>
                    <button class='controlButton play' title='Play button'><i class='fa fa-play-circle' aria-hidden='true' onclick='setTrack(\"" .  $playlistSong->getId() . "\", tempPlayList, true)'></i></button> 
                    <span class='trackNumber'>" . $i . "</span>
                </div>

                <div class='trackInfo'>
                    <span class='trackName'>" . $playlistSong->getTitle() . "</span>
                    <span class='artistName'>" . $songArtist->getName() . "</span>
                </div>

                <div class='trackOptions'>
                    <input type='hidden' class='songId' value='" . $playlistSong->getId() . "'>
                    <i class='fa fa-ellipsis-h optionsButton' aria-hidden='true' onclick='showOptionsMenu(this)'></i>
                </div>

                <div class='trackDuration'>
                    <span class='duration'>" . $playlistSong->getDuration() . "</span>
                </div>
            </li>
            ";
            $i++;
        }
    
    ?>

    <script>
        let tempSongsIds = '<?php echo json_encode($songIdArray);?>';
        tempPlayList = JSON.parse(tempSongsIds);
        console.log(tempPlayList);
    </script>
    </ul>
</div>
</section>

<?php include("/includes/buttonOptions.php");?>