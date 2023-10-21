<?php
include("dbconn.php");
   
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = $_POST['password'];

    
    
    
  $sql2 = "INSERT INTO user (userfullname, useremail, username, userpassword)
	VALUES ('" . $fullname . "','" . $email . "', '" . $username . "', '" . $password . "')";
	mysqli_query($dbconn, $sql2) or die ("Error: " . mysqli_error($dbconn));
	/* display a message */
	echo "Data has been saved"; 
    header("Location: index.php");
    
  
?>
