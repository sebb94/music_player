<?php include("includes/includedFiles.php");?>
<?php if (isset( $_GET['id'])){
  $artistId = $_GET['id'];
}else{
    header("Location: index.php");
}

$artist = new Artist($con, $artistId);
?>
<section class="artistWrapper">
<div class="entityInfo borderBottom">

    <div class="centerSection">

        <div class="artistInfo">

            <h1 class="artistName"> <?php echo $artist->getName()?> </h1>

            <div class="headerButtons">
                    <button class="btn btn-deafault" onclick="playFirstSong();">PLAY</button>
            </div>

        </div>

    </div>

</div>

 <h2>SONGS</h2>
<div class="tracklistContainer borderBottom">
    <ul class="tracklist">

    <?php $songIdArray = $artist->getSongIds(); 
    
        $i = 1;
        foreach( $songIdArray as $songId){

            if( $i > 5){
                break;
            }

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
                    <i class='fa fa-ellipsis-h' aria-hidden='true'></i>
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
   <h2>ALBUMS</h2>
    <div class="gridViewContainer">
     
    <?php 
    
    $album_query = mysqli_query( $con, "SELECT * FROM albums WHERE artist='$artistId'");

    while( $row = mysqli_fetch_array($album_query) ){


        echo "<div class='gridViewItem'>
            <span role='link' tab-index='0' onclick='openPage(\"album.php?id=" . $row['id'] . "\")'>
            <img src='" . $row['artworkPath'] . "'>
            
            <div class='gridViewInfo'>
            
            " . $row['title'] . "
            
            </div>
            </span>
        </div>";
    }
    
    ?>
    </div>
</section>