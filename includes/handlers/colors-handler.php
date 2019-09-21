<?php 

function getColors($username, $color){
  
    $con = mysqli_connect("localhost","root","","music_player");
    $query = mysqli_query($con, "SELECT * FROM user_colors_settings WHERE username='$username'");
    $row = mysqli_fetch_array($query);
 
    $main = $row['main_background'];
    $sidebar = $row['sidebar_background'];
    $bar = $row['bar_background'];

    if ($color == 'main'){
        
        return $main;
    }else if ($color == 'sidebar'){
         
        return $sidebar;
    }else if ($color == 'bar'){
            
        return $bar;
    }
 

}


?>