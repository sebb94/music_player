<?php 
include("../../config.php");

if( isset($_POST['playlistId']) && isset($_POST['songId']) ){

    $playlistId = $_POST['playlistId'];
    $songId = $_POST['songId'];


    $orderIdQuery = mysqli_query($con, "SELECT IFNULL(MAX(playlistOrder) + 1,1) as playlistOrder FROM playlists_songs WHERE playlistId = '$playlistId'");
    
    $row = mysqli_fetch_array($orderIdQuery);
    $order = $row['playlistOrder'];
    $query = mysqli_query($con, "INSERT INTO playlists_songs VALUES('', '$songId', '$playlistId', '$order')");


}else{
    echo "PlaylistId parameter not passed into file";
}

?>