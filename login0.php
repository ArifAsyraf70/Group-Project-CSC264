<?php
session_start();
/* include db connection file */
include("dbconn.php");

  /* capture values from HTML form */
  $username = $_POST['username'];
  $password = $_POST['password'];
  
  if($username == "admin" && $password == "admin")
  {
    $_SESSION['username'] = "Administrator";  
    header("Location: mainPageAdmin.php");
  }

  else
  {
    /* execute SQL command */
    $sql = "SELECT * FROM user WHERE username = '$username'
        AND userpassword = '$password'";
    echo $sql;
    $query = mysqli_query($dbconn, $sql) or die("Error: " . mysqli_error($dbconn));
    $row = mysqli_num_rows($query);
      
    if($row == 0)
    {
      echo "Invalid Username/Password";
    }
    else
    {
      $r = mysqli_fetch_assoc($query);
      $_SESSION['username'] = $r['username'];
      $_SESSION['userpassword'] = $r['userpassword'];
      header("Location: mainPage.php");
    }
  }


mysqli_close($dbconn);
?>