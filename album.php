<?php include("includes/header.php");?>

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
    print_r($songIdArray);
    
    ?>

    </ul>
</div>

<?php include("includes/footer.php");?>