
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Confirm your journey!!</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/car (2).png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	

<!--===============================================================================================-->
</head>
<body>
    <div id="loading-overlay">
        <div id="loading-icon"></div>
        <div id="loading-text">Please Wait while we are confirming your ride..</div>
    </div>
    
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<span class="login100-form-title">
					<?php 
                        session_start();

                         if (isset($_SESSION['username'])) {
                               $username = $_SESSION['username'];
                              echo "Have A Safe Journey " . htmlspecialchars($username) . "!";
                         } else {
                             // Handle the case where the username is not set in the session, e.g., user is not logged in
                           header("Location: login.php"); // Redirect to the login page
                           }
						if(isset($_SESSION['userID'])){
							$id = $_SESSION['userID'];
							echo "Have A Safe Journey " . htmlspecialchars($id) . "!";
						}
                    ?>
				</span>
				<form class="login100-form validate-form" id="nameform">
					<main>
                        <section id="ride-details">
							<div class="text-box">
								<h2><u>Ride Details</u></h2>
                            <!-- Display ride details, car details, car number, driver name, and driver contact here -->
                            <p><b>Ride ID: </b>12345</p>
							<p><b>Security Code:</b> 7APK90</p>
                            <p><b>Car: </b>Toyota Camry</p>
                            <p><b>Number: </b>ABC-123</p>
                            <p><b>Driver:</b> John Doe</p>
                            <p><b>Driver Contact:</b> +1 123-456-7890</p>
							</div>
                            
                        </section>
                        &nbsp;
	                        
                            <h2><u>Cancel Ride</u></h2>
                            <p>You have 5 minutes to cancel the ride:</p>
							<div id="clock-icon">
								<i class="fa fa-clock-o" aria-hidden="true"></i>
							</div>
                            <div id="countdown-timer">5:00</div>
                           <!-- <button  class="login100-form-btn" id ="cancel-button-end">Cancel Ride</button> -->
						   <?php
						   echo "<a class='btn btn-success' id='cancel-button-end' href='delete-cancel.php?ID_no=$_SESSION[userID]'>Cancel Ride</a>";
							?>
                        
                        &nbsp;
						<div class="container-login100-form-btn2">
							<a target="_blank" href="update-final-reading.php"
							<button  class="btn-danger  login100-form-btn2">
								End Ride
							</button></a>
						</div>
                        &nbsp;
                    </main>
                
					</form>
			
				&nbsp;
                &nbsp;
				
				
			</div>
			
		</div>
	</div>
	
	

<link rel="stylesheet" type="text/css" href="css/loading.css">
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 0.8
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
    <script src="js/loadingscript.js"></script>
	<script src="js/script-ride.js"></script>
<!--===============================================================================================-->


</body>
<footer>
	<p>Author: Pankaj Goel, Sankalpa Pramanik, Sewanti Dutta, Ritabrata Dey</p>
	<p> Made as part of Software Engineering project (PCC-CS591)</p>
	<p><a href="mailto:hege@example.com"></a></p>
  </footer>
</html>
