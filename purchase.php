<?php
session_start();

// Connect to the database
$conn = mysqli_connect('localhost', 'admin', '2003', 'gym');

// Check the connection
if (!$conn) {
    die("Connection failed: ". mysqli_connect_error());
}

// Function to confirm the purchase
function confirmPurchase($planValue, $userId, $purchaseAmount, $paymentMethod, $duration) {
    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO purchases (user_id, plan_id, purchase_date, purchase_amount, payment_method, plan_start_date, plan_end_date) VALUES (?, ?, NOW(), ?, ?, NOW(), DATE_ADD(NOW(), INTERVAL ? MONTH))");

    // Bind the parameters
    $stmt->bind_param("iiidi", $userId, $planValue, $purchaseAmount, $paymentMethod, $duration);

    // Execute the statement
    $result = $stmt->execute();

    // Close the statement and the connection
    $stmt->close();
    mysqli_close($conn);

    // Return the result
    if ($result) {
        return 'success';
    } else {
        return 'error: '. $conn->error;
    }
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $planValue = $_POST['plan'];
    $userId = $_SESSION['user_id'];
    $purchaseAmount = $_POST['purchase_amount'];
    $paymentMethod = $_POST['payment_method'];
    $duration = $_POST['duration'];
    $purchaseResult = confirmPurchase($planValue, $userId, $purchaseAmount, $paymentMethod, $duration);

    // Update the user's membership status
    if ($purchaseResult == 'success') {
        $stmt = $conn->prepare("UPDATE users SET membership_status = 'active' WHERE id =?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $stmt->close();
    }
}

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
                  <a href="ui.php" class="logo">FlexFit<em> Center</em></a>
                  <ul class="nav">
                      <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                      <li>
                      <form method="post" action="logout.php" id="logout">
                        <button type="button" class="btn btn-danger" onclick="confirmLogout()">Logout</button>
                        </form>
                        </li>
                  </ul>
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
    <div class="containe-fluid">
<div class="card-body text-black">
    <span class="float-right summary_icon"><i class="fa fa-users"></i></span>
    <h4><b>
        Purchase Plan
    </b></h4>
    <p><b>Select a Plan:</b></p>
    <select class="form-control" name="plan" required>
        <option value="" selected disabled hidden>Select a Plan</option>
        <option value="1">Plan 1 - Fitness Class</option>
        <option value="2">Plan 2 - Muscle Training</option>
        <option value="3">Plan 3 - Body Building</option>
        <option value="4">Plan 4 - Yoga Training Class</option>
        <option value="5">Plan 5 - Advanced Training</option>
    </select>
    <p><b>Purchase Amount:</b></p>
    <input type="number" name="purchase_amount" required>
    <p><b>Payment Method:</b></p>
    <select class="form-control" name="payment_method" required>
        <option value="" selected disabled hidden>Select a Payment Method</option>
        <option value="credit_card">Credit Card</option>
        <option value="debit_card">Debit Card</option>
        <option value="cash">Cash</option>
    </select>
    <p><b>Duration:</b></p>
    <select class="form-control" name="duration" required>
        <option value="" selected disabled hidden>Select a Duration</option>
        <option value="1">1 Month</option>
        <option value="3">3 Months</option>
        <option value="6">6 Months</option>
        <option value="12">12 Months</option>
    </select>
    <button type="button" class="btn btn-primary" id="confirm-purchase-button">Confirm Purchase</button>
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
    $(document).ready(function() {
        $('#confirm-purchase-button').on('click', function() {
            var planValue = $('select[name="plan"]').val();
            $.ajax({
                type: 'POST',
                url: 'purchase.php',
                data: { plan: planValue },
                success: function(response) {
                    if (response == 'success') {
                        alert('Purchase successful! Your membership has been activated.');
                        window.location.href = 'membership.php';
                    } else {
                        alert('Error: ' + response);
                    }
                }
            });
        });
    });
</script>



  <script>
function confirmLogout() {
  if (confirm("Are you sure you want to logout?")) {
    document.forms["logout"].submit();
  }
}
</script>
	</body>
</html>

