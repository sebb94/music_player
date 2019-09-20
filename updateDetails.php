<?php 
include("includes/includedFiles.php");
?>

<section class="userDetails">

    <div class="container borderBottom">
        <h2>EMAILS</h2>
        <input type="text" class="email" name="email" placeholder="Email address..." value="<?php echo $userLoggedIn->getEmail();?>">
        <span class="errorMessage">

        </span>
        <button class="btn" onclick="">SAVE</button>
    </div>

    <div class="container">
        <h2>PASSWORD</h2>
        <input type="password" class="oldPassword" name="oldPassword" placeholder="Current password...">
        <input type="password" class="newPasswod1" name="newPasswod1" placeholder="New password...">
        <input type="password" class="newPasswod2" name="newPasswod2" placeholder="Confirm new password...">
        <span class="errorMessage">

        </span>
        <button class="btn" onclick="">SAVE</button>
    </div>


</section>