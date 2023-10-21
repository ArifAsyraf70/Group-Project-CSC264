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
                    <a class="nav-link" href="mainPageAdmin.php">Home</a>
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
  

    <!-- Menu Section -->
    <section class="has-img-bg">
        <div class="container">
            <h6 class="section-subtitle text-center">Administrator Menu</h6>
            <h3 class="section-title mb-6 text-center">All users that have logged in</h3>
            
            <center>
            <?php
	       include("dbconn.php");
	
	       $sql="select * from court";
	       $query = mysqli_query($dbconn, $sql) or die ("Error: " . mysqli_error());
	       $row = mysqli_num_rows($query);
	       if($row == 0)
           {
		      echo "No record found";
	       }
	       else
           {

		      while($row = mysqli_fetch_array($query)) 
              {
                  echo"<table style=width:100%;>";
                  echo"<tr style=text-align:center;>";
		          echo"<td>".$row["courtname"]."</td>";
		          echo"<td>".$row["cost"]."</td>";
		          echo"<td>".$row["location"]."</td>";
		          echo"<td>".$row["description"]."</td>";
                  echo"<td><a href='bookingpage.php?snumber=".$row["courtid"]."'>View</a></td>";
                  echo"</tr>";
		      }
              echo"</table>";
              
	       }
		
            ?>
            </center>
            
        </div>
    </section>
    <!-- End of Menu Section -->

    <!-- Team Section -->
    <section id="team">
        <div class="container">
            <h6 class="section-subtitle text-center">Great Team</h6>
            <h3 class="section-title mb-5 text-center">Our Developer</h3>
            <div class="row">
                <div class="col-md-4 my-3">
                    <div class="team-wrapper text-center">
                        <img src="assets/imgs/chef-1.jpg" class="circle-120 rounded-circle mb-3 shadow" alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, Pigga Landing page">
                        <h5 class="my-3">Aiman Hafizzudin</h5>
                        <p>Project Manager</p>
                        <h6 class="socials mt-3">
                            <a href="javascript:void(0)" class="px-2"><i class="ti-facebook"></i></a>
                            <a href="javascript:void(0)" class="px-2"><i class="ti-twitter"></i></a>
                            <a href="javascript:void(0)" class="px-2"><i class="ti-instagram"></i></a>
                            <a href="javascript:void(0)" class="px-2"><i class="ti-google"></i></a>
                        </h6>
                    </div>
                </div>
                <div class="col-md-4 my-3">
                    <div class="team-wrapper text-center">
                        <img src="assets/imgs/chef-2.jpg" class="circle-120 rounded-circle mb-3 shadow" alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, Pigga Landing page">
                        <h5 class="my-3">Muhammad Zulfaqar</h5>
                        <p>Database Designer 1</p>
                        <h6 class="socials mt-3">
                            <a href="javascript:void(0)" class="px-2"><i class="ti-facebook"></i></a>
                            <a href="javascript:void(0)" class="px-2"><i class="ti-twitter"></i></a>
                            <a href="javascript:void(0)" class="px-2"><i class="ti-instagram"></i></a>
                            <a href="javascript:void(0)" class="px-2"><i class="ti-google"></i></a>
                        </h6>
                    </div>
                </div>
                <div class="col-md-4 my-3">
                    <div class="team-wrapper text-center">
                        <img src="assets/imgs/chef-3.jpg" class="circle-120 rounded-circle mb-3 shadow" alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, Pigga Landing page">
                        <h5 class="my-3">Mohd Faiezuan</h5>
                        <p>Database Designer 2</p>
                        <h6 class="socials mt-3">
                            <a href="javascript:void(0)" class="px-2"><i class="ti-facebook"></i></a>
                            <a href="javascript:void(0)" class="px-2"><i class="ti-twitter"></i></a>
                            <a href="javascript:void(0)" class="px-2"><i class="ti-instagram"></i></a>
                            <a href="javascript:void(0)" class="px-2"><i class="ti-google"></i></a>
                        </h6>
                    </div>
                </div> 
                <div class="col-md-4 my-3">
                    <div class="team-wrapper text-center">
                        <img src="assets/imgs/chef-4.jpg" class="circle-120 rounded-circle mb-3 shadow" alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, Pigga Landing page">
                        <h5 class="my-3">Faris Akmal</h5>
                        <p>Database Programmer 1</p>
                        <h6 class="socials mt-3">
                            <a href="javascript:void(0)" class="px-2"><i class="ti-facebook"></i></a>
                            <a href="javascript:void(0)" class="px-2"><i class="ti-twitter"></i></a>
                            <a href="javascript:void(0)" class="px-2"><i class="ti-instagram"></i></a>
                            <a href="javascript:void(0)" class="px-2"><i class="ti-google"></i></a>
                        </h6>
                    </div>
                </div> 
                <div class="col-md-4 my-3">
                    <div class="team-wrapper text-center">
                        <img src="assets/imgs/chef-5.jpg" class="circle-120 rounded-circle mb-3 shadow" alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, Pigga Landing page">
                        <h5 class="my-3">Arif Aysraf</h5>
                        <p>Database Programmer 2</p>
                        <h6 class="socials mt-3">
                            <a href="javascript:void(0)" class="px-2"><i class="ti-facebook"></i></a>
                            <a href="javascript:void(0)" class="px-2"><i class="ti-twitter"></i></a>
                            <a href="javascript:void(0)" class="px-2"><i class="ti-instagram"></i></a>
                            <a href="javascript:void(0)" class="px-2"><i class="ti-google"></i></a>
                        </h6>
                    </div>
                </div> 
    <section id="testmonial" class="pattern-style-3">
        <div class="container">
       
                    </div>
                </section>
            </div>
        </div>
    </section>
    <!-- End of Testmonial Section -->


    <!-- Book Table Section -->
    <section id="book-table" class="bg-white">
        
    </section>
    <!-- End OF Book Table Section -->

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


