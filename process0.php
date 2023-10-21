<?php
/* include db connection file */
include("dbconn.php");


if(isset($_POST['Update']))
{
	/* capture values from HTML form */
    $id = $_POST['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$sql0 = "SELECT userid FROM user WHERE userid= $id";
    
    
	$query0 = mysqli_query($dbconn, $sql0) or die ("Error: " . mysqli_error($dbconn));
	$row0 = mysqli_num_rows($query0);
	if($row0 == 0)
    {
	echo "Record is existed";
	}
    
	else
    {
	/* execute SQL UPDATE command */
	$sql2 = "UPDATE user SET userfullname = '" . $name . "',
	useremail= '" . $email . "',
	username = '" . $username . "',userpassword= '" . $password . "' where userid = '" . $id . "'";
	
	echo $sql2;
	mysqli_query($dbconn, $sql2) or die ("Error: " . mysqli_error($dbconn));
	/* display a message */
	
    echo "<script type='text/javascript'>alert('Data has been saved');</script>";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
}

else if(isset($_POST['Delete'])){
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
	echo"<a href='adminPage.php'>Main page</a>";
	}
}


	
// close if isset()
	/* close db connection */
	mysqli_close($dbconn);
	
?>
