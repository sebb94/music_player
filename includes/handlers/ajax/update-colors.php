<?php 

include("../../config.php");

if (isset($_POST['userLoggedIn']) && isset($_POST['main']) && isset($_POST['sidebar']) && isset($_POST['bar'])  ){

  $username = $_POST['userLoggedIn'];
  $main = $_POST['main'];
  $sidebar = $_POST['sidebar'];
  $bar = $_POST['bar'];

 // get userID 

 $query = mysqli_query($con, "SELECT id FROM users WHERE username='$username'");
 $row = mysqli_fetch_array($query);
 $id = $row['id'];

 $query = mysqli_query($con, "UPDATE user_colors_settings 
                      SET main_background = '$main',
                      sidebar_background = '$sidebar',
                      bar_background = '$bar'
                    WHERE username='$username' AND user_id = '$id'");





}else{
    echo "Color update fail!";
}

?>