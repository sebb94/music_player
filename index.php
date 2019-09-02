<?php 
include("includes/config.php");
//logout manually
//session_destroy();
if (isset($_SESSION['userLoggedIn'])){
    $username =  $_SESSION['userLoggedIn'];
    echo "Logged as: " . $username; 
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
    <script src="main.js"></script>
</head>
<body>
   
    <section id="nowPlayingBarContainer">
    
    
    
    
    </section>

</body>
</html>