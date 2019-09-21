<?php 
include("includes/includedFiles.php");
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

    <div class="colorSectionItem">
            <h3>Main background color:</h3>
            <div id="cp1" class="input-group colorpicker-component">
                <input type="hidden" name="cp1" value="#3e3e3e" class="form-control" />
                <span class="input-group-addon"><i></i></span>
            </div>
    </div>

       <div class="colorSectionItem">
            <h3>Sidebar background color:</h3>
            <div id="cp2" class="input-group colorpicker-component">
                <input type="hidden" name="cp2" value="#000" class="form-control" />
                <span class="input-group-addon"><i></i></span>
            </div>
    </div>

       <div class="colorSectionItem">
            <h3>Now Playing Bar background color:</h3>
            <div id="cp3" class="input-group colorpicker-component">
                <input type="hidden" name="cp3" value="#282828" class="form-control" />
                <span class="input-group-addon"><i></i></span>
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