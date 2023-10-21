<?php
include("dbconn.php");
   
  $courtid = $_POST['court'];
  $bookingdate = $_POST['bdate'];
  $starttime = $_POST['start'];
  $endtime = $_POST['end'];
  $userid = $_POST['id'];


  $totaltime = round((strtotime($endtime) - strtotime($starttime))/60, 1)/60; //calculate total time
  
      
  $price = $totaltime * $_POST['courtprice'];  
  //echo $price;
  

  $sql2 = "INSERT INTO booking ( courtid, bookingdate, bookingstart, bookingend,bookingprice,userid)
	VALUES ('" . $courtid . "','" . $bookingdate . "', '" . $starttime . "', '" . $endtime . "','" . $price . "','" . $userid . "')";
	mysqli_query($dbconn, $sql2) or die ("Error: " . mysqli_error($dbconn));
	/* display a message */
	echo "Data has been saved";  

  
?>