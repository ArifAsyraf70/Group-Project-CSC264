<?php
/* include db connection file */
include("dbconn.php");

if(isset($_POST['Delete'])){

	echo "delete";
	
	$id = $_POST['id'];
	
	$sql0 = "SELECT *  FROM user WHERE userid= $id";
	
	echo $sql0;
	$query0 = mysqli_query($dbconn, $sql0) or die ("Error: " . mysqli_error($dbconn));
	$row0 = mysqli_num_rows($query0);
	if($row0 == 0){
	echo "Record is not existed";
	}
	else{
	/* execute SQL DELETE command */
	$sql2 = "DELETE FROM user WHERE userid= $id";
	
	echo $sql2;
	mysqli_query($dbconn, $sql2) or die ("Error: " . mysqli_error($dbconn));
	/* display a message */
	echo "Data has been deleted <br>";
	echo"<a href='mainpage.php'>Main page</a>";
	}
}

	
// close if isset()
	/* close db connection */
	mysqli_close($dbconn);
	
?>
