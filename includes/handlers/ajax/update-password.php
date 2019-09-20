<?php 

include("../../config.php");
include("../../classes/Constants.php");

if (isset( $_POST['userLoggedIn']) && isset($_POST['old']) && isset($_POST['pw1'])  && isset($_POST['pw2'])){

    $username = $_POST['userLoggedIn'];
    $old = $_POST['old'];
    $pw1 = $_POST['pw1'];
    $pw2 = $_POST['pw2'];
    $sha_pw = hash('sha512', $old);
    
    $passwordQuery = mysqli_query($con, "SELECT password FROM users WHERE username='$username'");
    $result = mysqli_fetch_array($passwordQuery);

    $current_sha = $result['password'];

    if( $current_sha == $sha_pw){

            if ( $pw1 != $pw2){
                echo Constants::$passwordsDoNotMatch;
                return;
               } 
            if ( preg_match('/[^A-Za-z0-9]/', $pw1)){
                echo Constants::$passwordNotAplhanumeric;
                return;
               } 
            if( strlen($pw1) > 30  || strlen($pw1) < 5){
                echo Constants::$passwordCharacters;
                return;
            }
            $newPassword = hash('sha512', $pw1);
            $query = mysqli_query($con, "UPDATE users SET password = '$newPassword' WHERE username='$username'");

    }else{
        echo "Your curent password is incorrect!";
    }

}else{
    echo "Password update fail!";
}
?>