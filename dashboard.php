<?php
session_start();

include 'functions.php';

?>

<!doctype html>
<html lang="en">
  <head>
  	<title>FlexFit Center</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="assets/css/style.css">

    <link rel="stylesheet" href="assets/css/side.css">

	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-training-studio.css">


	</head>

<header class="header-area header-sticky">
  <div class="container">
      <div class="row">
          <div class="col-12">
              <nav class="main-nav">
                  <a href="index.html" class="logo">FlexFit<em> Center</em></a>
                  <ul class="nav">
                      <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                      <li>
                      <form method="post" action="logout.php" id="logout">
                        <button type="button" class="btn btn-danger" onclick="confirmLogout()">Logout</button>
                        </form>
                        </li>
                  </ul>
                  
                  <button id="toggle-sidebar"><span class='icon-field'><i class="fa fa-list"></i></span></button>        
                  <nav id="sidebar" class='mx-lt-20 bg-transparent' >
                    <div class="sidebar-list">
                      <a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-home"></i></span> Home</a>
                      <a href="index.php?page=members" class="nav-item nav-members"><span class='icon-field'><i class="fa fa-users"></i></span> Members</a>
                      <a href="index.php?page=registered_members" class="nav-item nav-registered_members"><span class='icon-field'><i class="fa fa-id-card"></i></span> Membership Validity</a>
                      <a href="index.php?page=schedule" class="nav-item nav-schedule"><span class='icon-field'><i class="fa fa-calendar"></i></span> Schedule</a>
                      <a href="index.php?page=plans" class="nav-item nav-plans"><span class='icon-field'><i class="fa fa-th-list"></i></span> Plans</a>
                      <a href="index.php?page=packages" class="nav-item nav-packages"><span class='icon-field'><i class="fa fa-list"></i></span> Packages</a>
                      <a href="index.php?page=trainer" class="nav-item nav-trainer"><span class='icon-field'><i class="fa fa-user"></i></span> Trainers</a>
                      <a href="index.php?page=users" class="nav-item nav-users"><span class='icon-field'><i class="fa fa-users"></i></span> Users</a>
                    </div>
                  </nav>
                  
                  
  </div>
</header>
<div class="main-banner" id="top">
    <video autoplay muted loop id="bg-video">
        <source src="/training-studio-1.0.0/assets/images/gym-video.mp4" type="video/mp4" />
    </video>
<body>
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
          <span class="dot"></span>
          <div class="dots">
            <span></span>
            <span></span>
            <span></span>
          </div>
        </div>
      </div>

      
    <div class="video-overlay header-text">
        <div class="caption">
        <div class="container-fluid">
        <div class="row mt-3 ml-3 mr-3">
            <div class="col-md-10 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <?php
                        // Assuming you have a session variable that stores the admin's username
                        $username = $_SESSION['adname'];
                       ?>
                        <h3><strong>Welcome back </strong> <?php echo $username;?></h3>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body bg-info">
                                        <div class="card-body text-danger">
                                            <span class="float-right summary_icon"><i class="fa fa-users"></i></span>
                                            <h4><b>
                                                Member Profiles
                                            </b></h4>
                                            <p ><b>Active Members: <?php echo getTotalUsers();?> </b></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body bg-info">
                                        <div class="card-body text-danger">
                                            <span class="float-right summary_icon"><i class="fa fa-th-list"></i></span>
                                            <h4><b>
                                                Membership Plans
                                            </b></h4>
                                            <p><b>Active Plans: <?php echo getTotalActivePlans();?></b></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>	
    
                        
                    </div>
                </div>      			
            </div>
        </div>
    </div>
    
        </div>
    </div>
</body>



<footer>
  <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <p>Copyright &copy; 2024 FlexFit Center

                  - Designed by <a rel="nofollow" href="https://templatemo.com" class="tm-text-link"
                                   target="_parent">DeCode</a><br>

                  Distributed by <a rel="nofollow" href="https://themewagon.com" class="tm-text-link"
                                    target="_blank">DeCode</a>

              </p>


          </div>
      </div>
  </div>
</footer>

  <!-- jQuery -->
  <script src="assets/js/jquery-2.1.0.min.js"></script>
  <script src="assets/js/jquery.min.js"></script>

  <!-- Bootstrap -->
  <script src="assets/js/popper.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>

  <!-- Plugins -->
  <script src="assets/js/scrollreveal.min.js"></script>
  <script src="assets/js/waypoints.min.js"></script>
  <script src="assets/js/jquery.counterup.min.js"></script>
  <script src="assets/js/imgfix.min.js"></script> 
  <script src="assets/js/mixitup.js"></script> 
  <script src="assets/js/accordions.js"></script>
  
  <!-- Global Init -->
  <script src="assets/js/custom.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/side.js"></script>


  <script>
function confirmLogout() {
  if (confirm("Are you sure you want to logout?")) {
    document.forms["logout"].submit();
  }
}
</script>

	</body>
</html>

