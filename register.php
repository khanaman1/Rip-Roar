<?php include_once 'header.php'; 

    

?>
    <?php 
    if($register_errors['password'] != null || $register_errors['confirm_password'] != null) {
        ?>
        <div class="registerFailed">REGISTRATION FAILED</div>
        <?php
    }
    ?>


    <div class="registerContainer" style="margin-top:3rem;">

        <form name="registerForm" class="registerForm"  action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method="POST" enctype="multipart/form-data">
            <h2>Sign Up</h2>

            <div>
                <label for="name"><i class="fas fa-user"></i></label>
                <input type="text" name="name"  value="<?php echo isset($_POST['name']) ? $_POST['name'] : '' ?>" placeholder="Your Name" required  />
            </div>

            <div>
                <label for="email"><i class="fas fa-envelope"></i></label>
                <input type="email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>"  placeholder="Your Email" required />
            </div>  

            <div>
                <label for="username"><i class="fas fa-user-circle"></i></label>
                <input type="text" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>" required  placeholder="Your Username"/>
            </div>

            <div>
                <label for="country"><i class="fas fa-lock" style="color:#6e7c7c"></i></label>
                <input type="text" name="country" required value="<?php echo isset($_POST['country']) ? $_POST['country'] : '' ?>" placeholder="Your country name."/>
            </div>

            <div>
                <label for="age"><i class="fas fa-lock " style="color:#6e7c7c"></i></label>
                <input type="number" name="age"  required value="<?php echo isset($_POST['age']) ? $_POST['age'] : '' ?>" placeholder="Your age."/>
            </div>
            
            <div>
                <label for="password"><i class="fas fa-lock <?php if($register_errors['password'] != null) echo "iError"; ?>"></i></label>
                <input type="password" name="password" <?php if($register_errors['password'] != null) echo "class=' inputError'"; ?> value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>" required  placeholder="Password" />
                <?php if($register_errors['password'] != null) echo "<br /><span class='errorText'> Password must be more than 6 letters! </span>"; ?>
            </div>
            
            <div>
                <label for="password"><i class="fas fa-lock <?php if($register_errors['confirm_password'] != null) echo "iError"; ?>" style="color:#6e7c7c"></i></label>
                <input type="password" name="confirmPassword" <?php if($register_errors['confirm_password'] != null) echo "class=' inputError'"; ?> required value="<?php echo isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '' ?>" placeholder="Repeat your password" />
                <?php if($register_errors['confirm_password'] != null) echo "<br /><span class='errorText'> Passwords don't match! </span>"; ?>
            </div>


            <div>
                <input type="checkbox" id="agreeTerms" name="agreeTerms" required /> 
                <label for="agreeTerms" >I agree to all <a href="#">Terms of service</a></label>
            </div>

            <div style="margin-bottom:2rem;">
                <button type="submit" name="btnRegisteSubmit" > Sign Up </button>
            </div>
            OR
            <!-- <div class="socialSignIn">
                <button name="fbSignup" class="btnFb"><i class="fab fa-facebook"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sign Up With Facebook</button>
                <button name="twitterSignup" class="btnTwitter"><i class="fab fa-twitter"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sign Up With Twitter</button>
                <button name="twitterSignup" class="btnGoogle"><i class="fab fa-google-plus-g"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sign Up With Google+</button>
                <br />
                <span class="loginLink altLink">Already member? <a href="login.php">Sign In</a></span>
            </div> -->

        </form>

        <div class="registerImage" style="position:relative;top:-4rem;">
  
            <span class="loginLink">Already member? <a href="login.php">Sign In</a></span>
        </div>
       

    </div>
    <div class="socialSignIn">
                <button name="fbSignup" class="btnFb"><i class="fab fa-facebook"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sign Up With Facebook</button>
                <button name="twitterSignup" class="btnTwitter"><i class="fab fa-twitter"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sign Up With Twitter</button>
                <button name="twitterSignup" class="btnGoogle"><i class="fab fa-google-plus-g"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sign Up With Google+</button>
                
                <span class="loginLink altLink">Already member? <a href="login.php">Sign In</a></span>
            </div>


<?php include_once 'footer.php'; ?>