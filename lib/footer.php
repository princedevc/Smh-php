<p>
    <a href="index.php">Home </a>|
    <?php if(isset($_SESSION['Loggedin'])){ ?>

    <a href="login.php">Login</a>|
    <a href="register.php">REGISTER </a>|
    <a href="forgot.php">Forgot Password</a>
    <?php }else{ ?>
    
    <a href="logout.php">Logout </a>|
    <a href="reset.php">Reset Password</a>
    <?php   } ?>
    
    </p>   
 </body>