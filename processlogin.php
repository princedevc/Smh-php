<?php
print_r($_POST);

session_start();

$errorCount = 0;

$email = $_POST['email'] != "" ? $_POST['email'] :$errorCount++ ;
$password = $_POST['password'] != "" ? $_POST['password'] :$errorCount++ ;

$_SESSION['email'] = $email;

if($errorCount > 0){
    //display proper messages to the user
    $session_error =  "You have ". $errorCount . " Error";
        
    if($errorCount >1) {
        $session_error .="s";

    }
    $session_error.=  " In your form submission";
    $_SESSION['error'] = $session_error;
    
    header("Location: login.php");
}
else
{ 
    if(empty($name) && empty($email)){
        echo "All fields are compulsory"
    }

    $allUsers = scandir("db/users/");
    $countAllusers =count($allUsers);

    for ($counter=0; $counter < $countAllusers; $counter++){
         
        $currentUser = $allUsers[$counter];
  
        if ($currentUser == $email . ".json"){
          //check the user password.
          $userString = file_get_contents("db/users/".$currentUser);
          $userObject = json_decode($userString);
          $passwordFromDB = $userObject->password;

          $passwordFromUser =password_verify($password, $passwordFromDB);
          
          if($passwordFromDB == $passwordFromUser){
              //redirect to dashboard
              $_SESSION['loggedIn'] = $userObject ->id;
              $_SESSION['fullname'] = $userObject ->first_name . " " . $userObject->last_name;
              $_SESSION['role'] = $userObject ->designation;
            
            $loginTime = "login time is " . date("h:i:sa") . "<br>";
            $loginDate = "Login date is " . date("Y.m.d") . "<br>";
              // Access control level
            if($userObject->dsignation == 'Patient'){
                header("Location: patients.php");
            }else{
                header("Location: mt.php");
            }
            header("Location: dashboard.php");
              die();
          }
            }
        }
     
        //$_SESSION["error"] = "invalid email or password";
      header("Location: login.php");
      die();
      if(empty($name) && empty($email)){
        echo "All fields are compulsory"; //must not be blank
    }
    if(strlen($name) <2 && strlen($email) <5){
   echo "Field cannot be less than two numbers"; //must be up to a particular length;
        }
    if(preg_match("/^[a-z]+$/i", $name) ){ //checks for invalid character
        return true;
        
    }   
    else { echo "Enter valid username";
    } 
    $reg = '/^[_a-z0-9-]+(_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
    if(preg_match($reg, $email)   ){
        echo $email . " Email id is accepted. ";
    }else{
        echo $email . " Invalid email";
    }

}


?>