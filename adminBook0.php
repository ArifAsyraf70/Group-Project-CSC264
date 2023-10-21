<?php 

if (isset($_POST['submit']) && isset($_FILES['my_image'])) 

{
    $courtname = $_POST['courtname'];
    $courtdescription = $_POST['courtdescription'];
    $courtprice = $_POST['courtprice'];
    
    
    
	include "dbconn.php";

	echo "<pre>";
	print_r($_FILES['my_image']);
	echo "</pre>";

	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];

	if ($error === 0) 
    
    {
		if ($img_size > 1125000) 
        {
			$em = "Sorry, your file is too large.";
		    header("Location: adminBook.php?error=$em");
		}
        else 
        {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) 
            {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				/*// Insert into Database
				$sql = "INSERT INTO images(image_url) 
				        VALUES('$new_img_name')";
                */
                
                $sql2 = "INSERT INTO court(courtname,courtpicture, courtprice, courtdescription)
	            VALUES ('" . $courtname . "','" . $new_img_name . "','" . $courtprice . "', '" . $courtdescription . "')";
               
                /*
                mysqli_query($dbconn, $sql2) or die ("Error: " . mysqli_error($dbconn));
	           /* display a message */
	           //echo "Data has been saved"; 
                
                
                
				mysqli_query($dbconn, $sql2);
                
                header("Location: adminBook.php");
			}
            else 
            {
				$em = "You can't upload files of this type";
		        header("Location: adminBook.php?error=$em");
                exit();
			}
		}
	}
    

}
else 
{
	header("Location: adminBook.php");
    exit();
}