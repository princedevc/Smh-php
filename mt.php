<?php

echo "Mediacal team content display here";
?>
<form>
    <p> 
    <label for="name">Add user Name </label>
    <input 
    <?php 
              if(isset($_SESSION['names']))
           {
               echo "value =". $_SESSION['name'];
           } ?>
    type="text" name="fullname" Placeholder="Fullname"> </input> 
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

</form>
