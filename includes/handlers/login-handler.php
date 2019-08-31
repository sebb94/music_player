<?php 
if ( isset($_POST['loginButton']) ){
    
    $username = $_POST['loginUsername'];
    $password = $_POST['loginPassword'];

    $account->login($username,$password);
}

?>