<?php 
include("includes/config.php");
include("includes/classes/Constants.php");  
include("includes/classes/Account.php");   
$account = new Account();
include("includes/handlers/register-handler.php");
include("includes/handlers/login-handler.php");

function getInputValue($name){
    if(isset($_POST[$name])){
        echo $_POST[$name];
    }  
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Music Player - Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
    <script src="main.js"></script>
</head>

<body>
    <div id="inputContainer">
        <form id="loginForm" action="register.php" method="POST">
            <h2>Login to Your account</h2>
            <p>
                <label for="loginUsername">Username:</label>
                <input id="loginUsername" name="loginUsername" type="text" placeholder="Your username" required>
            </p>
            <p>
                <label for="loginPassword">Password:</label>
                <input id="loginPassword" name="loginPassword" type="password" required>
            </p>
            <button type="submit" name="loginButton">LOG IN</button>
        </form>

        <form id="registerForm" action="register.php" method="POST">
            <h2>Create free account</h2>
            <p>
                <?php echo $account->getError(Constants::$usernameCharacters); ?>
                <label for="username">Username:</label>
                <input id="username" name="username" type="text" value="<?php getInputValue('username');?>" placeholder="Your username" required>
            </p>
              <p>
                 <?php echo $account->getError(Constants::$firstNameCharacters); ?>
                <label for="firstName">First name:</label>
                <input id="firstName" name="firstName" type="text" value="<?php getInputValue('firstName');?>" placeholder="Your First Name" required>
            </p>
              <p>
                 <?php echo $account->getError(Constants::$lastNameCharacters); ?>
                <label for="lastName">Last name:</label>
                <input id="lastName" name="lastName" type="text" value="<?php getInputValue('lastName');?>" placeholder="Your Last Name" required>
            </p>
              <p>
                <?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
                <?php echo $account->getError(Constants::$emailInvalid); ?>
                <label for="email">Email:</label>
                <input id="email" name="email" type="email" value="<?php getInputValue('email');?>" placeholder="Your email" required>
            </p>
              <p>
                <label for="email2">Confirm email:</label>
                <input id="email2" name="email2" type="email" placeholder="Confirm email" required>
            </p>
              <p>
                 <?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
                <?php echo $account->getError(Constants::$passwordNotAplhanumeric); ?>
                 <?php echo $account->getError(Constants::$passwordCharacters); ?>
                <label for="password">Password:</label>
                <input id="password" name="password" type="password" value="<?php getInputValue('password');?>" placeholder="Your Password" required>
            </p>
              <p>
                <label for="password2">Confirm password:</label>
                <input id="password2" name="password2" type="password" placeholder="Confirm password" required>
            </p>
            <button type="submit" name="registerButton">SIGN UP</button>
        </form>

    </div>
</body>

</html>