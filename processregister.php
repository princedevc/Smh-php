<?php
session_start();
//colleccting the data
$errorCount = 0;

//verifying the data
$first_name = $_POST['first_name'] != "" ? $_POST['first_name'] :$errorCount++ ;
$last_name = $_POST['last_name'] != "" ? $_POST['last_name'] :$errorCount++ ;
$email = $_POST['email'] != "" ? $_POST['email'] :$errorCount++ ;
$password = $_POST['password'] != "" ? $_POST['password'] :$errorCount++ ;
$gender = $_POST['gender'] != "" ? $_POST['gender'] :$errorCount++ ;
$designation = $_POST['designation'] != "" ? $_POST['designation'] :$errorCount++ ;
$department = $_POST['department'] != "" ? $_POST['department'] :$errorCount++ ;

$_SESSION['first_name'] = $first_name;
$_SESSION['last_name'] = $last_name;
$_SESSION['email'] = $email;
$_SESSION['gender'] = $gender;
$_SESSION['designation'] = $designation;
$_SESSION['department'] = $department;



if($errorCount > 0){
    //display proper messages to the user
    
    $session_error =  "You have ". $errorCount . " Error";
        
    if($errorCount >1) {
        $session_error .="s";

    }
    $session_error.=  " In your form submission";
    $_SESSION['error'] = $session_error;
    header("Location: register.php");
}
else{
 
 
    //count all users  
 
 $allUsers = scandir("db/users/");
    
    $countAllusers =count($allUsers);

    print_r($allUsers);
    die();
    $newUserId = ($countAllusers);

    $userObject = [
        'id'=>$newUserId,
        'first_name'=>$first_name,
        'last_name'=>$last_name,
        'email'=>$email,
        'password'=>password_hash($password, PASSWORD_DEFAULT), //password hashing
        'gender'=>$gender,
        'designation'=>$designation,
        'department'=>$department

    ];
    //check if user exists
   //using a loop
   for ($counter=0; $counter < $countAllusers; $counter++){
         
      $currentUser = $allUsers[$counter];

      if ($currentUser == $email . ".json"){
        
    $_SESSION["error"] = "Registeration failed, user already exists";
    header("Location: register.php");
    die();
            }
      }
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
file_put_contents("db/users/". $email. ".json". json_encode($userObject) );

    $_SESSION["message"] = "Registeration successful, you can now login" . $first_name;
    header("Location: login.php");
    die();
?>