<?php include_once 'header.php'; 



?>



    <div class="registerContainer" style="margin-bottom:3rem;margin-top:2rem !important;">

        <form name="loginForm" class="registerForm"  action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method="POST" enctype="multipart/form-data">
            <h2>Sign In</h2>
            <br />
            <span style="color:red" > <?php if(isset($_SESSION['loginErrorMessage'])) echo $_SESSION['loginErrorMessage']; ?></span>

            <div>
                <label for="username"><i class="fas fa-user"></i></label>
                <input type="text" name="username" value="" required placeholder="Email or Username" />
            </div>

            <div>
                <label for="password"><i class="fas fa-lock"></i></label>
                <input type="password" name="password" value=""  required placeholder="Password" />
            </div>
            

            <div style="margin-bottom:2rem;">
                <button type="submit" name="btnLoginSubmit" > Sign In </button>
            </div>
            OR
            <!-- <div class="socialSignIn">
                <button name="fbSignin" class="btnFb"><i class="fab fa-facebook"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sign In With Facebook</button>
                <button name="twitterSignin" class="btnTwitter"><i class="fab fa-twitter"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sign In With Twitter</button>
                <button name="twitterSignin" class="btnGoogle"><i class="fab fa-google-plus-g"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sign In With Google+</button>
                <span class="loginLink altLink">Not a member? <a href="register.php">Sign Up</a></span>
            </div> -->

        </form>

        <div class="loginImage">
  
            <span class="loginLink">Not a member? <a href="register.php">Sign Up</a></span>
        </div>

    </div>
    <div class="socialSignIn">
                <button name="fbSignin" class="btnFb"><i class="fab fa-facebook"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sign In With Facebook</button>
                <button name="twitterSignin" class="btnTwitter"><i class="fab fa-twitter"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sign In With Twitter</button>
                <button name="twitterSignin" class="btnGoogle"><i class="fab fa-google-plus-g"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sign In With Google+</button>
                <span class="loginLink altLink">Not a member? <a href="register.php">Sign Up</a></span>
            </div>


<?php include_once 'footer.php'; ?>