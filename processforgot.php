<?php session_start();

//collecting the data
$errorCount = 0;

$email = $_POST['email'] != ? $_POST['email'] : $errorCount++;
$_SESSION['email'] = $email;

if($errorCount >0){
    $session_error =  "You have ". $errorCount . " Error";
        
    if($errorCount >1) {
        $session_error .="s";

    }
    $session_error.=  " In your form submission";
    $_SESSION['error'] = $session_error;
    header("Location: forgot.php");

}else {
 //Checks if the user is registered
    $allUsers = scandir("db/users/");
$countAllusers =count($allUsers);
    for ($counter=0; $counter < $countAllusers; $counter++){
         
        $currentUser = $allUsers[$counter];
  
    if ($currentUser == $email . ".json"){
     //if user is registered send the email and redirect
    $subject = "Password reset link";
    $message = " A password rest has been initiated from your account, if you did not initiatae this reset please ignore
    this message, otherwise visit: localhost/snh/reset.php";
    $headers = "From: no-reply@snh.org" . "\r\n". 
    "CC : emmanuelolajide@snh.org";

    $try = mail($email,$subject,$message,$headers);

    if ($try){

        $_SESSION["error"] = "Password reset has been sent to your email:" .$email;
        
        header("Location: login.php");
    }else {
        $_SESSION["error"] = "Something went wrong, we could not send password reset to : " . $email;
        header("Location: forgot.php");
        //mailtrap //sendmail

    }
     die();
              }
        }
        $_SESSION["error"] = "Email not registered with us " . $email;
        header("Location: forgot.php");
}



?>