<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoBin</title>

 

    <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="../css/bootstrap.min.css">

 <!-- Font Awesome CSS -->
 <link rel="stylesheet" href="../css/font-awesome.min.css">

 <!-- Google Font -->
 <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">

 <!-- Custom CSS -->
 <link rel="stylesheet" href="../css/dashboard.css">


 <!-- font -->

 <link rel="stylesheet" href="../css/all.min.css">


</head>
<body class="bdy">
    <!-- logo and name -->
    <nav class=" fixed-top flex-md-nowrap shadow navbarhead">   <!--bg-danger navbar navbar-dark-->
       <a href="#" class="navbar-brand col-sm-3 col-md-2 mr-0">Eco<span class="bin">Bin</span></a>   
    </nav>

    <!-- container starts-->
    <div class="container-fluid " style="margin-top:40px;">

        <!-- Start Row -->   
        <div class="row ">   
                        <!-- Start Side Bar 1st Column -->
                        <nav class="col-sm-2  sidebar py-5 d-print-none dash"> 
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item sidep"><a class="nav-link <?php if(PAGE == 'editprofile'){echo 'active';} ?>"  href=editprofile.php><i class="fas fa-user"></i> Edit Profile</a></li>
                        <li class="nav-item sidep"><a class="nav-link <?php if(PAGE == 'subrequest'){echo 'active';} ?>"  href=subrequest.php><i class="fab fa-accessible-icon"></i>Submit Request</a></li>
                        <li class="nav-item sidep"><a class="nav-link <?php if(PAGE == 'reqstatus'){echo 'active';} ?>"  href="reqstatus.php"><i class="fas fa-align-center"></i>Service Status</a></li>
                        <li class="nav-item sidep"><a class="nav-link <?php if(PAGE == 'changepass'){echo 'active';} ?>"  href="changepass.php"><i class="fas fa-key"></i>Change Password</a></li>
                        <li class="nav-item sidep"><a class="nav-link " href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
                    </ul>
                </div>
            </nav>
            