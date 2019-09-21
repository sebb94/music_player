<?php 
include("includes/config.php");
include("includes/classes/User.php");
include("includes/classes/Playlist.php");
include("includes/classes/Artist.php");
include("includes/classes/Album.php");
include("includes/classes/Song.php");
//logout manually
//session_destroy();
if (isset($_SESSION['userLoggedIn'])){
     $userLoggedIn = new User($con, $_SESSION['userLoggedIn']);
     $username = $userLoggedIn->getUsername();
    echo "<script>let userLoggedIn = '" . $username . "'; </script>";
}else{
    header("Location:register.php");
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Music Player</title>
    <link rel="stylesheet" type="text/css" media="screen" href="css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/colorpicker.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c9c259af04.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/color.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/register.js"></script>
</head>

<body>



<div id="mainContainer">

    <div id="topContainer">
        <section id="navBarContainer">
            <?php include("includes/navBar.php");?>
        </section>

       <section id="mainViewContainer">
        <div id="mainContent">