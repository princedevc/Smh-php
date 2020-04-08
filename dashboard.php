<?php include_once('lib/header.php'); 

if(!isset($_SESSION['loggedIn']) ){
    //redirect to Dashboard
    header("Location: login.php");
}

?>
<h3> Dashboard </h3>

    loggedIn User ID: <?php echo $_SESSION['loggedIn'] ?>
Welcome, <?php echo $_SESSION['fullname'] ?>, You are logged in as (<?php echo $_SESSION['role'] ?>), name and office.
and your id is <?php echo $_SESSION['loggedIn'] ?>.
Your last Login time is: <?php echo $loginTime ."<br>";?>
Your last Login Date is: <?php  echo $loginDate ."<br>";?>          
<?php include_once('lib/footer.php'); ?>