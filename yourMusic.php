<?php include("includes/includedFiles.php");?>
<section class="playlistsContainer">

    <div class="gridViewContainer">
        <h2 >Playlists</h2>

        <div class="buttonItems">
        
            <button class="btn btn-deafault" onclick="createPlayList();">New Playlist</button>

        </div>
    
    

     <?php 
    
    $username = $userLoggedIn->getUsername();

    $playlistsQuery = mysqli_query( $con, "SELECT * FROM playlists WHERE `owner` ='$username'");
    if(mysqli_num_rows( $playlistsQuery) == 0){
            echo "<span class='noResults'>You don't have any playlists yet.</span>";
        }    
        

    while( $row = mysqli_fetch_array($playlistsQuery) ){

        $playlist = new Playlist($con, $row);
        echo "<div class='gridViewItem'>

            <div class='playListImage'>
                <img src='assets/images/playlist.png'>
            
            </div>
          
            <div class='gridViewInfo'>
            
            " . $playlist->getName() . "
            
            </div>
           
        </div>";
    }
    
    ?>

    </div>
</section>