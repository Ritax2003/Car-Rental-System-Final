<!DOCTYPE html>
<html lang="en">
<head>
	<title>Your Orders</title>
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
<!--===============================================================================================-->
<style>
    /* Add CSS styles for positioning the image */
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
        <div id="loading-text">Please Wait while System is fetching all your available assignemnts....
            <i class="fa fa-car" aria-hidden="true"></i>
        </div>
    </div>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
					<span class="login100-form-title">
						<h1>Driver Dashboard</h1>
					</span>
                    <span class="login100-form-title">
						<h3>John Doe #129APO9027BP</h3>
					</span>
                    <div id="navbar">
                        <button class="btn btn-success" onclick="loadTable('table-driver-list.php')">Queued Rides</button>
                        <button class="btn btn-success" onclick="loadTable('table-driver-accepted.php')">Accepted Rides</button>
                        <a href="logout.php"><button class ="btn btn-danger">Logout </button></a>
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
            <div class="info-box">
                <p><b>Today Completed Ride:</b> 10 &nbsp; <b>Car returned:</b> 8</p>
            </div>
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
	
<!--===============================================================================================-->
	<script src="js/main.js"></script>
    <script src="js/loadingscript.js"></script>

</body>
<footer>
	<p>Author: Pankaj Goel, Sankalpa Pramanik, Sewanti Dutta, Ritabrata Dey</p>
	<p> Made as part of Software Engineering project (PCC-CS591)</p>
	<p><a href="mailto:hege@example.com"></a></p>
</footer>
</html>