<?php
session_start();
if(isset($_SESSION['username']))
{
	// store session in var
	$user = $_SESSION['username'];
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with Pigga landing page.">
    <meta name="author" content="Devcrud">
    <title>Razer Futsal Sdn. Bhd.</title>
    <!-- font icons -->
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">
    <!-- Bootstrap + Pigga main styles -->
	<link rel="stylesheet" href="assets/css/razer.css">
    <link rel="stylesheet" href="assets/css/login.css">

    <style>
        input[type=text], [type=date], [type=time], select {
          width: 100%;
          padding: 12px 20px;
          margin: 10px 0;
          display: inline-block;
          border: 1px solid #ccc;
          border-radius: 4px;
          box-sizing: border-box;
        }
        
        input[type=submit] {
          width: 100%;
          background-image: linear-gradient(to right, #b6854a 0%, #b6854a  51%, #b6854a  100%);
          color: white;
          padding: 14px 20px;
          margin: 8px 0;
          border: none;
          border-radius: 4px;
          cursor: pointer;
        }
        
        
        </style>

</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
    
    <!-- First Navigation -->
    <nav class="navbar nav-first navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="assets/imgs/navbar-brand.svg" alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, Pigga Landing page">
            </a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-primary" href="#home">Hello, <span class="pl-2 text-muted"><?php echo $_SESSION['username']; ?> </span></a>
                </li>                   
            </ul>
        </div>
    </nav>
    <!-- End of First Navigation --> 
    <!-- Second Navigation -->
    <nav class="nav-second navbar custom-navbar navbar-expand-sm navbar-dark bg-dark sticky-top">
        <div class="container">
            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
           
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto"> 
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#service">Our Service</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#team">Our Team</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testmonial">Testmonials</a>
                    </li>
                    
                    <?php
                    /* include db connection file*/
                    include("dbconn.php");
                    
                    $username = $_SESSION['username'];
                    $sql= "SELECT userid FROM user WHERE username= '$username'";
                    $result = mysqli_query($dbconn, $sql);
                    
                    if (mysqli_num_rows($result) > 0) 
                    {
                        while($row = mysqli_fetch_assoc($result)) 
                        {
                             $userid=$row["userid"];
                        }
                    }
                    //$row = mysqli_num_rows($query);
                    echo"<li class='nav-item'><a class='nav-link' href='editUser.php?snumber=".$userid."'>Manage Account</a></li>";
                    ?>
                </ul> 
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="logout.php" class="btn btn-primary btn-sm">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Of Second Navigation --> 
    <!-- Page Header -->

    <!-- log in section -->
    
    <?php
	    include("dbconn.php");
	    $sql="select * from court";
	    $query = mysqli_query($dbconn, $sql) or die ("Error: " . mysqli_error());
	    $row = mysqli_num_rows($query);
    ?>
    <section>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 d-none d-md-block">
                    
                    <?php
                    if(isset($_POST['Submit']))
                    {
                    $i = $_POST['court'];
                    $s = "select * from court where courtid = '$i'";
                    $q = mysqli_query($dbconn, $s) or die ("Error: " . mysqli_error());
                    $r = mysqli_fetch_assoc($q);
                        
                        //echo $r['courtprice'];
                        
                        $file = $r['courtpicture'];
                        $pathx = "uploads/";
                        echo "    ";
                        echo '<img src="'.$pathx.$file.'">';  
                        echo '<br><br><b>Price:</b> RM'.$r['courtprice'];
                        echo '<br><br><u><b>Description</b></u>';
                        echo '<br><justify>'.$r['courtdescription'].'</justify>';
                        echo '<br><br>';
                    }
                    
                    else
                    {
                    $i = 2;
                    $s = "select * from court where courtid = '$i'";
                    $q = mysqli_query($dbconn, $s) or die ("Error: " . mysqli_error());
                    $r = mysqli_fetch_assoc($q);
                        
                        //echo $i;
                        
                       $file = $r['courtpicture'];
                        $pathx = "uploads/";
                        echo "    ";
                        echo '<img src="'.$pathx.$file.'">';  
                        echo '<br><br><b>Price:</b> RM'.$r['courtprice'];
                        echo '<br><br><u><b>Description</b></u>';
                        echo '<br><justify>'.$r['courtdescription'].'</justify>';
                        echo '<br><br>';
                    }
                
                
                    echo "<form method='post' action=''>";
                    echo "<label name='courtname'>Select a court for your booking:</label>";
                    echo "<select name='court'>";
                        while ($row = mysqli_fetch_array($query))
                        {
                        echo "<option value='".$row['courtid']."'>";
                        echo $row['courtname'];
                        echo "</option>";
                        }
                    echo"</select>";
                    echo"</label><input type='submit' name='Submit' value='Select'></form>";
                    ?>
                    
                </div>
                <div class="col-md-6">
                    <form method="post" action="bookingPage0.php">
                        <label for="bdate">Booking Date</label>
                        <input type="date"  id="bookingdate" name="bdate">

                        <label for="start">Starting Time</label >
                        <input type="time" id="starttime" name="start"  min="08:00" max="23:00" step=3600 required>
                    
                        <label for="end">Ending Time</label>
                        <input type="time" id="endtime" name="end"  min="08:00" max="23:00" step=3600 required>  
                        <input type="submit" value="Book Now">
                        <input type="hidden" id="court" name ="court" value=<?php echo $r['courtid']?>>
                        <input type="hidden" id="court" name ="courtprice" value=<?php echo $r['courtprice']?>>
                        <input type="hidden" id="id" name = "id" value=<?php echo $_REQUEST['snumber']?>>
                      </form>
                </div>
            </div>
        </div>
    </section>

    <!-- End of log in Section -->

    <!-- Prefooter Section  -->
    <div class="py-4 border border-lighter border-bottom-0 border-left-0 border-right-0 bg-dark" style="width: 100%;" >
        <div class="container">
            <div class="row justify-content-between align-items-center text-center">
                <div class="logo-footer">
                    <img src="assets/imgs/navbar-brand.svg" width="100">
                </div>
            </div>
        </div>
    </div>
    <!-- End of PreFooter Section -->

    <!-- Page Footer -->
    <footer class="border border-dark border-left-0 border-right-0 border-bottom-0 p-4 bg-dark" style="width: 100%;">
        <div class="container">
            <div class="row align-items-center text-center text-md-left">
                <div class="col">
                    <p class="mb-0 small">&copy; <script>document.write(new Date().getFullYear())</script>, <a href="https://www.devcrud.com" target="_blank">Razer Futsal,</a>  All rights reserved </p> 
                </div>
                <div class="d-none d-md-block">
                    <h6 class="small mb-0">
                        <a href="javascript:void(0)" class="px-2"><i class="ti-facebook"></i></a>
                        <a href="javascript:void(0)" class="px-2"><i class="ti-twitter"></i></a>
                        <a href="javascript:void(0)" class="px-2"><i class="ti-instagram"></i></a>
                        <a href="javascript:void(0)" class="px-2"><i class="ti-google"></i></a>
                    </h6>
                </div>
            </div>
        </div>
        
    </footer>
    <!-- End of Page Footer -->


        

    <!-- core  -->
    <script src="assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="assets/vendors/bootstrap/bootstrap.bundle.js"></script>

    <!-- bootstrap affix -->
    <script src="assets/vendors/bootstrap/bootstrap.affix.js"></script>

    <!-- Pigga js -->
    <script src="assets/js/pigga.js"></script>

</body>
</html>

