
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Welcome User!!</title>
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
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<style>
        .container {
            display: flex;
            justify-content: space-between;
        }
        .form-container {
            width: 60%;
        }
        .map-container {
            width: 40%;
        }
    </style>
<!--===============================================================================================-->
</head>


<body>
	<div id="loading-overlay">
        <div id="loading-icon"></div>
        <div id="loading-text">Please Wait while we are fetching your details..</div>
    </div>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<!--<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div> -->
				<span class="login100-form-title">
					<?php 
                        session_start();

                         if (isset($_SESSION['username'])) {
                               $username = $_SESSION['username'];
                              echo "Welcome " . htmlspecialchars($username) . "!";
                         } else {
                             // Handle the case where the username is not set in the session, e.g., user is not logged in
                           header("Location: login.php"); // Redirect to the login page
                           }
						if(isset($_SESSION['userID'])){
							$id = $_SESSION['userID'];
						}
                    ?> 
					</span>
				<form class="login100-form validate-form" id="nameform" action="journey-list.php" method="post">
				    <!--<div class="wrap-input100 validate-input" data-validate = "Valid name is required">
						<input class="input100" type="text" name="rname" placeholder="Reciever's name" >
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Valid surname is required">
						<input class="input100" type="text" name="rsurname" placeholder="Reciever's surname" >
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user-o" aria-hidden="true"></i>
						</span>
					</div>-->
					<div class="wrap-input100 validate-input" data-validate = "Valid phone is required">
						<input class="input100" type="text" name="rmno" placeholder="Reciever's phone number" >
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-phone" aria-hidden="true"></i>
						</span>
					</div>
					<!--<div class="wrap-input100 validate-input" data-validate = "Driver License Number is required">
						<input class="input100" type="text" name="rid" placeholder="Reciever's Valid ID number" >
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-id-card-o" aria-hidden="true"></i>
						</span>
					</div> -->
                    <div class="wrap-input100 validate-input" data-validate = "Valid address is required">
						<input class="input100" type="text" name="start" placeholder="Start Address" >
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-map" aria-hidden="true"></i>
						</span>
					</div>
                    <div class="wrap-input100 validate-input" data-validate = "Valid address is required">
						<input class="input100" type="text" name="end" placeholder="Ending Address" >
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-map" aria-hidden="true"></i>
						</span>
					</div>
					<div class="container-login100-form-btn1"  >
						<button class="login100-form-btn"  type="submit" >
							Rent Ride
						</button>
					</div>
				</form>
				
				&nbsp;
				<div class="map-conatiner">
				<div class="map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14733.77088936754!2d88.3919015!3d22.599937049999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1694008628914!5m2!1sen!2sin" width="400" height="400" style="border: 1px" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				</div>
				</div>
				&nbsp;
				&nbsp;
				<a href="logout.php">
				<button class="btn btn-danger" id="view-ride-details-button">
						Logout
						</button>
				</a>
				<!--<div class="container-login100-form-btn1" >
					<button class="login100-form-btn" id="view-ride-details-button">
						Previous Rides
					</button>
				</div>
				<div class="container-login100-form-btn1">
    Button to open feedback form 
    <button class="login100-form-btn" id="open-feedback-form-button">
        Give Feedback
    </button> -->
    </div>

<!-- Feedback form, initially hidden -->
<!-- <div id="feedback-form" style="display: none;">
    <form class="login100-form validate-form" id="feedbackform">
        <span class="login100-form-title">
            Feedback
        </span>
        <div class="wrap-input100 validate-input" data-validate="Feedback is required">
            <textarea class="input100" name="feedback" placeholder="Enter your feedback"></textarea>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
                <i class="fa fa-comment" aria-hidden="true"></i>
            </span>
        </div>

        <div class="container-login100-form-btn1">
            Button to send feedback 
            <button type="button" class="login100-form-btn" id="send-feedback-button">
                Send Feedback
            </button>
        </div>
    </form>
	
</div>
-->

				
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
	<script src ="js/main.js"></script> 
<!--	<script src ="js/script-goride.js"></script> -->
	<script src ="js/loadingscript.js"></script>

</body>
<footer>
	<p>Author: Pankaj Goel, Sankalpa Pramanik, Sewanti Dutta, Ritabrata Dey</p>
	<p> Made as part of Software Engineering project (PCC-CS591)</p>
	<p><a href="mailto:hege@example.com"></a></p>
</footer>
</html>