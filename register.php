<?php


include_once('lib/header.php'); ?>
<h3>Register</h3>
   <form method="POST" action="processregister.php" >
       <p>
           <?php
           if(isset($_SESSION['error']) && !empty($_SESSION['error']))
           {
               echo "<span style='color:red'>" . $_SESSION['error'] . "</span>";
           }
           //session_unset();
           session_destroy();
           ?>
</p>
        <p>
            <label>First Name</label><br/>
               <input 
              <?php 
              if(isset($_SESSION['first_name']) && !empty($_SESSION['first_name']))
           {
               echo "value =". $_SESSION['first_name'];
               $_SESSION['first_name'] ="";
               
           }
           
           ?>
               type="text" name="first_name" placeholder="firstname"  />
        </p>
        <p>
            <label>Last Name</label><br/>
            <input
            <?php 
              if(isset($_SESSION['last_name']))
           {
               echo "value =". $_SESSION['last_name'];
           } ?>
             type="text" name="last_name" placeholder="lastname"  />
        </p>
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
            <label>Password</label><br/>
            <input type="password" name="password" placeholder="password"  />
        </p>
            <hr/>
        <p>
            <label>Gender</label> <br />
            <select name="gender"  >
            
            <option value=""> Select One</option>
                <option
               
                <?php 
              if(isset($_SESSION['gender']) && $_SESSION['gender'] =='Male')
           {
               echo "selected";
           } ?>
                > Male</option>
                <option
                <?php 
              if(isset($_SESSION['gender']) && $_SESSION['gender'] =='Female')
           {
               echo "selected";
           } ?>
                > Female</option>
            </select>
        </p>
            
        <p>
            <label>Designation</label> <br/>
            <select name="designation"  >
                <option value=""> Select One</option>
                <option
                <?php 
              if(isset($_SESSION['designation']) && $_SESSION['designation'] =='Medical team(MT)')
           {
               echo "selected";
           } ?>
                > Medical team(MT)</option>
                <option
                <?php 
              if(isset($_SESSION['designation']) && $_SESSION['designation'] =='Patient')
           {
               echo "selected";
           } ?>
                > Patient</option>
            </select>
        </p>
        <p>
            <label>Department</label> <br />
            <input 
            <?php 
              if(isset($_SESSION['department']))
           {
               echo "value =". $_SESSION['department'];
           } ?>
            type ="text" name="department" placeholder="Department" />
        </p>
        <p>
            <button type="submit" name="submit"> Register</button>
        </p>

        <a href ="forgot.php"> Forgot Password </a><br />
        <a href ="login.php">Already have an acount? Login</a>
    
</form>
<?php include_once('lib/footer.php'); ?>
   
