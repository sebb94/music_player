<?php 

include("../../config.php");

if (isset( $_POST['email']) && isset($_POST['userLoggedIn'])){

    if($_POST['email'] != ""){
          $email = $_POST['email'];
    }else{
        echo "Empty email!";
        return;
    }

    if( !filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "Email is invalid!";
        return;
    }
 
   $username = $_POST['userLoggedIn'];

   $allEmailsQuery = mysqli_query($con, "SELECT email from users WHERE 1");
   
   while ($row = mysqli_fetch_array($allEmailsQuery)){

    if ($row['email'] == $email){
        echo "Email already taken!";
        return;
    }

   }

    $query = mysqli_query($con, "UPDATE users SET email = '$email' WHERE username='$username'");

}else{
    echo "Email update fail!";
}

?>