<?php include("includes/header.php");?>

<?php if (isset( $_GET['id'])){
  $albumId = $_GET['id'];
}else{
    header("Location: index.php");
}
$albumQuery = mysqli_query($con, "SELECT * FROM albums WHERE id='$albumId'");
$album = mysqli_fetch_array($albumQuery);
echo $album['title'] . "<br>";
$artist = new Artist($con, $album['artist']);
echo $artist->getName();
?>

<?php include("includes/footer.php");?>