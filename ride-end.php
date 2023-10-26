<!DOCTYPE html>
<html lang="en">
<head>
	<title>Thank you for using our!!</title>
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
<style>/* Style for the payment methods container */
    .container-payment-methods {
        background-color: #f2f2f2;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 10px;
        margin-top: 20px;
        width:350px;
    }
    
    /* Style for individual payment methods */
    .payment-method {
       
        text-align: center;
        margin-right: 20px;
        margin-bottom: 20px;
    }
    
    /* Style for payment method images */
    .payment-method img {
        width: 50px; /* Adjust the image width as needed */
        height: 50px; /* Adjust the image height as needed */
    }
    
    /* Style for payment method text */
    .payment-method p {
        margin-top: 5px;
        font-weight: bold;
    }
    .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh; /* Make the container fill the viewport height */
        }
        table {
            border-collapse: collapse;
            width: 120%; /* Adjust the width as needed */
            border: 1px solid #000; /* Border style */
        }

        th, td {
            border: 1px solid #000; /* Border style for table cells */
            padding: 8px; /* Add padding for cell content */
            text-align: center; /* Center align cell content */
        }

        th {
            background-color: #f2f2f2; /* Background color for table header */
        }
        .info-box {
            border: 1px solid #ccc;
            padding: 20px;
            width: 120%; /* Match the width of the table */
        }

        /* Container to group the table and info box */
        .table-container {
            display: flex;
            
            justify-content: space-between;
            align-items: flex-start;
        }
    </style>
</head>
<body>
    <div id="loading-overlay">
        <div id="loading-icon"></div>
        <div id="loading-text">Please Wait while we are doing end ride workings..</div>
    </div>
    
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
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
            <div id="navbar">
                        <button class="btn btn-success" onclick="loadTable('table-payment.php')">Check Bill</button>
                        <button class="btn btn-success" onclick="loadTable('table-history.php')">Previous Rides</button>
                        <a href="logout.php"><button class ="btn btn-danger">Log Out Sytem</button></a>
                        <!-- Add more buttons for other tables as needed -->
                    </div>
               <div id="reloadtable" class="table-container">  
         
               </div>   
            <script>
                 function loadTable(tableUrl) {
                      var container = document.getElementById("reloadtable");
                      var xhr = new XMLHttpRequest();
                      xhr.onreadystatechange = function() {
                      if (xhr.readyState === 4 && xhr.status === 200) {
                container.innerHTML = xhr.responseText;
            }
        };
        xhr.open("GET", tableUrl, true);
        xhr.send();
    }
    loadTable(tableUrl);
    setInterval(loadTable, 5000); 
    </script>

				<form class="login100-form validate-form" id="nameform">
					<main>
                            <div class="container-payment-methods">
                                <h3><u>Payment Methods</u></h3>
                                &nbsp;
                                <div id="navbar">
                        <a class='btn btn-success' href='update-payment-status.php?'><i class="fa fa-fingerprint"></i>&nbsp;UPI</a>
                        <a class='btn btn-success' href='update-payment-status.php?'><i class="fa fa-credit-card-alt"></i>&nbsp;Credit Card</a>
                        <a class='btn btn-success' href='update-payment-status.php?'><i class="fa fa-credit-card">&nbsp;</i>Debit Card</a>
                        <a class='btn btn-success' href='update-payment-status.php?'><i class="fa fa-university"></i>&nbsp;Net Banking</a>
                        <!--<a href="logout.php"><button class ="btn btn-danger">Log Out Sytem</button></a> -->
                        <!-- Add more buttons for other tables as needed -->
                                </div>
                              
                            
                        </div>
                            &nbsp;
                            <div class="container-login100-form-btn1">
                                <!-- Button to open feedback form -->
                                <button class="login100-form-btn" id="open-feedback-form-button">
                                    Give Feedback
                                </button>
                            </div>
                            
                            
                            <!-- Feedback form, initially hidden -->
                            <div id="feedback-form" style="display: none;">
                                <form class="login100-form validate-form" id="feedbackform">
                                    &nbsp;
                                    <div class="wrap-input100 validate-input" data-validate="Feedback is required">
                                        <textarea class="input100" name="feedback" id="feedback-textarea" placeholder="Enter your feedback"></textarea>
                                        <span class="focus-input100"></span>
                                        <span class="symbol-input100">
                                            <i class="fa fa-comment" aria-hidden="true"></i>
                                        </span>
                                    </div>
                            
                                    <div class="container-login100-form-btn1">
                                        <!-- Button to send feedback -->
                                        <button type="button" class="login100-form-btn" id="send-feedback-button">
                                            Send Feedback
                                        </button>
                                        &nbsp;
                                        <!-- Button to update feedback (initially hidden) -->
                                        <button type="button" class="login100-form-btn" id="update-feedback-button" style="display: none;">
                                            Update Feedback
                                        </button>
                                    </div>
                                </form>
                            </div>
                    
                            <!-- Display ride details, car details, car number, driver name, and driver contact here -->
                           
							
                            
                       
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
	<script>
		// JavaScript code to handle feedback form
		$(document).ready(function () {
			// Show feedback form when "Give Feedback" button is clicked
			$("#open-feedback-form-button").click(function () {
				// Show the send feedback button and hide the update feedback button
				$("#send-feedback-button").show();
				$("#update-feedback-button").hide();
				$("#feedback-form").show();
			});
	
			// Handle sending feedback
			$("#send-feedback-button").click(function () {
				var feedbackText = $("#feedback-textarea").val().trim();
				if (feedbackText !== "") {
					// You can send the feedback data to the server here if needed
					// For now, just display an alert
					alert("Thanks for your feedback!!have a great day!");
					// Clear the feedback form and hide it
					$("#feedbackform")[0].reset();
					$("#feedback-form").hide();
				} else {
					alert("Please enter feedback before submitting.");
				}
			});
	
			// Show the update feedback button when there is feedback to update
			$("#open-feedback-form-button").click(function () {
				// Check if there is feedback to update (you can customize this logic)
				// For now, let's assume there is feedback to update
				// Show the update feedback button and hide the send feedback button
				$("#send-feedback-button").show();
				$("#update-feedback-button").show();
			});
	
			// Handle updating feedback
			$("#update-feedback-button").click(function () {
				var feedbackText = $("#feedback-textarea").val().trim();
				if (feedbackText !== "") {
					// You can update the feedback data on the server here if needed
					// For now, just display an alert
					alert("Feedback updated!");
					// Clear the feedback form and hide it
					$("#feedbackform")[0].reset();
					$("#feedback-form").hide();
				} else {
					alert("Please enter feedback before updating.");
				}
			});
		});
	</script>
	
<!--===============================================================================================-->


</body>
<footer>
	<p>Author: Pankaj Goel, Sankalpa Pramanik, Sewanti Dutta, Ritabrata Dey</p>
	<p> Made as part of Software Engineering project (PCC-CS591)</p>
	<p><a href="mailto:hege@example.com"></a></p>
  </footer>
</html>
