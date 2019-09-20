<?php 
include("includes/includedFiles.php");
?>
<section class="settingsWrapper">
    <div class="entityInfo">
        <div class="centerSection">
                <div class="userInfo">
                    <h1><?php echo $userLoggedIn->getFirstAndLastName();?></h1>
                </div>
        </div>

        <div class="buttonItems">
            <button class="btn" onclick="openPage('updateDetails.php')">USER DETAILS</button>
            <button class="btn" onclick="logout();">Logout</button>
        </div>

    </div>
</section>
