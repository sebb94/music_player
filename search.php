<?php include("includes/includedFiles.php");

if( isset($_GET['term'])){

    $term = urldecode($_GET['term']);
}else{
    $term = "";
}
?>

<section class="searchContainer">

    <h4>Search for an artist, album or song</h4>
    <input type="text" class="searchInput" value="<?php echo $term;?>" placeholder="Start typing..." onfocus="var temp_value=this.value; 
this.value=''; this.value=temp_value">

</section>

<script>
    

     $('.searchInput').focus();
       $(function () {
        var timer;
        $(".searchInput").keyup(function(){
            $(".searchInput").focus();
            clearTimeout(timer);

            timer = setTimeout(function(){
                var val = $(".searchInput").val();
                openPage("search.php?term=" + val);
            },1000);
               
        });


    });

</script>

<div class="tracklistContainer borderBottom">
    <h2>Songs</h2>
    <ul class="tracklist">

    <?php 
    
    $songsQuery = mysqli_query($con, "SELECT id FROM songs WHERE lower(`title`) LIKE lower('$term%') LIMIT 10");

    if(mysqli_num_rows($songsQuery) == 0){
        echo "<span class='noResults'>No songs found matching " .  $term . "</span>";
    }
    
    $songIdArray = array();
    
        $i = 1;
        while( $row = mysqli_fetch_array($songsQuery)){

            if( $i > 15){
                break;
            }

            array_push($songIdArray, $row['id']);

            $albumSong = new Song($con, $row['id']);
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

<section class="artistsContainer borderBottom">

        <h2>Artists</h2>

        <?php 
        $artistsQuery = mysqli_query($con, "SELECT id FROM artists WHERE lower(`name`) LIKE lower('$term%') LIMIT 10");

        if(mysqli_num_rows($artistsQuery) == 0){
            echo "<span class='noResults'>No artists found matching " .  $term . "</span>";
        }    
        
        while($row = mysqli_fetch_array($artistsQuery)){

            $artistFround = new Artist($con, $row['id']);

            echo "<div class='searchResultRow'>
                <div class='artistName'>
                    <span role='link' tabindex='0' onclick='openPage(\"artist.php?id=" . $artistFround->getId() ."\")'>
                        ". $artistFround->getName() . "
                    </span>
                </div>
            
            </div>";
        }
        
    ?>


</section>