<?php include("includes/includedFiles.php");?>

<?php if (isset( $_GET['id'])){
  $albumId = $_GET['id'];
}else{
    header("Location: index.php");
}

$album = new Album($con, $albumId );
$artist =  $album->getArtist();
?>

<div class="entityInfo">
    <div class="leftSection">
        <img src="<?php echo $album->getArtworkPath();?>">
    </div>
    <div class="rightSection">
        <h2> <?php echo $album->getTitle();?></h2>
        <p>By: <?php echo $artist->getName();?></p>
        <p><?php echo $album->getNumberOfSongs();?> Songs</p>
    </div>
</div>

<div class="tracklistContainer">
    <ul class="tracklist">

    <?php $songIdArray = $album->getSongIds(); 
    
        $i = 1;
        foreach( $songIdArray as $songId){

            $albumSong = new Song($con, $songId);
            $albumArtist =  $albumSong->getArtist();

            echo "<li class='trackListRow'>
                <div class='trackCount'>
                    <button class='controlButton play' title='Play button'><i class='fa fa-play-circle' aria-hidden='true' onclick='setTrack(\"" .  $albumSong->getId() . "\", tempPlayList, true)'></i></button> 
                    <span class='trackNumber'>" . $i . "</span>
                </div>

                <div class='trackInfo'>
                    <span class='trackName'>" . $albumSong->getTitle() . "</span>
                    <span class='artistName'>" . $albumArtist->getName() . "</span>
                </div>

                <div class='trackOptions'>
                    <input type='hidden' class='songId' value='" . $albumSong->getId() . "'>
                    <i class='fa fa-ellipsis-h optionsButton' aria-hidden='true' onclick='showOptionsMenu(this)'></i>
                </div>

                <div class='trackDuration'>
                    <span class='duration'>" . $albumSong->getDuration() . "</span>
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

<?php include("/includes/buttonOptions.php");?>