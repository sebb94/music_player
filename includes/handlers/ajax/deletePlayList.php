<?php 
include("../../config.php");

if( isset($_POST['playlistId']) ){

    $playlistId = $_POST['playlistId'];

    $query = mysqli_query($con, "DELETE FROM playlists_songs WHERE playlistId='$playlistId'");
    $query = mysqli_query($con, "DELETE FROM playlists WHERE id='$playlistId'");
    

}else{
    echo "PlaylistId parameter not passed into file";
}

?>