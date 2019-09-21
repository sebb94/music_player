<?php 


include("../includes/config.php");
include("../includes/classes/User.php");
include("../includes/handlers/colors-handler.php");
//logout manually
//session_destroy();
if (isset($_SESSION['userLoggedIn'])){
     $userLoggedIn = new User($con, $_SESSION['userLoggedIn']);
     $username = $userLoggedIn->getUsername();
}

$main = getColors($username, 'main');
$sidebar = getColors($username, 'sidebar');
$bar = getColors($username, 'bar');




/*** set the content type header ***/
header("Content-type: text/css");





?>

#mainContainer #topContainer #navBarContainer{
    background: <?php echo $sidebar; ?>
}
#nowPlayingBarContainer {
    background: <?php echo $bar;?>
}
body{
    background: <?php echo $main;?>
}

