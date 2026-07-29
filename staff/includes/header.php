<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title><?php echo TITLE ?></title>
 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="../css/bootstrap.min.css">

 <!-- Font Awesome CSS -->
 <link rel="stylesheet" href="../css/all.min.css">

 <!-- Custom CSS -->
 <link rel="stylesheet" href="../css/dashboard.css"> 
</head>
<body>
  <!-- Top Navbar -->
  <nav class=" fixed-top flex-md-nowrap shadow navbarhead">   <!--bg-danger navbar navbar-dark-->
       <a href="dashboard.php" class="navbar-brand col-sm-3 col-md-2 mr-0">Eco<span class="bin">Bin</span></a>   
    </nav>

  <!-- Start Container -->
 <div class="container-fluid" style="margin-top:40px;">
  <div class="row"> <!-- Start Row -->
   <nav class="col-sm-2  sidebar py-5 d-print-none dash"> <!-- Start Side Bar 1st Column -->
    <div class="sidebar-sticky">
     <ul class="nav flex-column">
      <li class="nav-item"><a class="nav-link <?php if(PAGE == 'dashboard'){echo 'active';} ?>" href="dashboard.php"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
      <li class="nav-item"><a class="nav-link <?php if(PAGE == 'assets'){echo 'active';} ?>" href="waste_requestu.php"><i class="fas fa-users"></i>Urgent Request</a></li>
      <li class="nav-item"><a class="nav-link <?php if(PAGE == 'waste_requestr'){echo 'active';} ?>" href="waste_requestr.php"><i class="fas fa-users"></i>Regular Request</a></li>
      <li class="nav-item"><a class="nav-link <?php if(PAGE == 'work'){echo 'active';} ?>" href="confirm_request.php"><i class="fab fa-accessible-icon"></i>Request Collected</a></li>
      
      <li class="nav-item"><a class="nav-link <?php if(PAGE == 'changepass'){echo 'active';} ?>" href="changepass.php"><i class="fas fa-key"></i>Change Password</a></li>
      <li class="nav-item"><a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
     </ul>
    </div>
   </nav> <!-- End Side Bar 1st Column -->