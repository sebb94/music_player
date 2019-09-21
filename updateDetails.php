<?php 
include("includes/includedFiles.php");
include("includes/handlers/colors-handler.php");
$username = $userLoggedIn->getUsername();
?>

<section class="userDetails">

    <div class="container email-container borderBottom">
        <h2>EMAILS</h2>
        <input type="email" class="email" name="email" placeholder="Email address..." value="<?php echo $userLoggedIn->getEmail();?>" required>
        <span class="errorMessage">

        </span>
        <button class="btn" onclick="updateEmail();">SAVE</button>
    </div>

    <div class="container password-container">
        <h2>PASSWORD</h2>
        <input type="password" class="oldPassword" name="oldPassword" placeholder="Current password...">
        <input type="password" class="newPassword1" name="newPassword1" placeholder="New password...">
        <input type="password" class="newPassword2" name="newPassword2" placeholder="Confirm new password...">
        <span class="errorMessage">

        </span>
        <button class="btn" onclick="updatePassword();">SAVE</button>
    </div>


    <div class="colorSection">

   <?php 

    $main = "main";
    $sidebar = "sidebar";
    $bar = "bar";

   ?>

    <div class="colorSectionItem">
            <h3>Main background color:</h3>
            <div id="cp1" class="input-group colorpicker-component">
                <input type="hidden" class="cp1" name="cp1" value="<?php echo getColors($username, $main);?>" class="form-control" />
                <span class="input-group-addon"><i style="background-color:<?php echo getColors($username, $main);?>"></i></span>
            </div>
    </div>

       <div class="colorSectionItem">
            <h3>Sidebar background color:</h3>
            <div id="cp2" class="input-group colorpicker-component">
                <input type="hidden" class="cp2" name="cp2" value="<?php echo getColors($username, $sidebar);?>" class="form-control" />
                <span class="input-group-addon"><i style="background-color:<?php echo getColors($username, $sidebar);?>"></i></span>
            </div>
    </div>

       <div class="colorSectionItem">
            <h3>Now Playing Bar background color:</h3>
            <div id="cp3" class="input-group colorpicker-component">
                <input type="hidden" class="cp3" name="cp3" value="<?php echo getColors($username, $bar);?>" class="form-control" />
                <span class="input-group-addon"><i style="background-color:<?php echo getColors($username, $bar);?>"></i></span>
            </div>
    </div>


<button class="btn" onclick="updateColors();">SAVE</button>
    
    </div>
</section>

<script>
  $(function () {
    $('#cp1,#cp2,#cp3')
        .colorpicker();
  });
</script>