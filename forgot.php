<?php include_once('lib/header.php') ?>

<h3> Forgot Password</h3>
<p>Provide the email address associated with your account </p>

<form action="processforgot.php" method="POST"> 

<p>
            <label>Email</label><br/>
            <input 
            <?php 
              if(isset($_SESSION['email']))
           {
               echo "value =". $_SESSION['email'];
           } ?>
           
            type="text" name="email" placeholder="Email"  />
        </p>
        <p>
            <button type="submit" name="submit"> Send resend code</button>
        </p>

</form>

<?php include_once('lib/footer.php') ?>    