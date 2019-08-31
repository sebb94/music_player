<?php 

function sanitizeFormPassword($inputText){
    $inputText = strip_tags( $inputText );
    return $inputText;
}

function sanitizeFormUsername($inputText){
    $inputText = strip_tags( $inputText );
    $inputText = str_replace( " " , "" , $inputText);
    return $inputText;
}

function sanitizeString($inputText){
    $inputText = strip_tags( $inputText );
    $inputText = str_replace( " " , "" , $inputText);
    $inputText =  ucfirst(strtolower( $inputText ));
    return $inputText;
}
function sanitizeEmail($inputText){
    $inputText = strip_tags( $inputText );
    $inputText = str_replace( " " , "" , $inputText);
    return $inputText;
}

if ( isset($_POST['loginButton']) ){
    echo "Login button was pressed";
}
if ( isset($_POST['registerButton']) ){
    $username = sanitizeFormUsername( $_POST['username'] );
    $firstName = sanitizeString( $_POST['firstName'] );
    $lastName = sanitizeString( $_POST['lastName'] ) ; 
    $email = sanitizeEmail( $_POST['email'] ) ; 
    $email2 = sanitizeEmail( $_POST['email2'] ) ; 
    $password = sanitizeFormPassword( $_POST['password']);
    $password2 = sanitizeFormPassword( $_POST['password2']);

    $wasSucessfull = $account->register($username, $firstName, $lastName, $email, $email2, $password, $password2);

    if ( $wasSucessfull ){
        header("Location: index.php");
    }
}
?>