<?php

 include 'database.php';
 session_start();
 date_default_timezone_set('Asia/Kolkata');
 $currentdatetime = date('Y-m-d H:i:s');
 /*if(isset($_POST['idd'])){
    $id = $_POST['idd']; */
    if(isset($_SESSION['userID'])){
    $id = $_SESSION['userID'] ;
     if(isset($_POST['done'])){
     $speed = $_POST['Final-speed'];
     
     $q = " UPDATE completed_ride_list SET  Final_Reading='$speed',Final_Reading_Timestamp = '$currentdatetime'where ID_no=$id ";
     $query = mysqli_query($conn,$q);
     echo '<script>
     window.location.href = "ride-end.php";
     alert("Ride is now completed!")
     </script>';
 header('location:ride-end.php');
 }
}
?>

<!DOCTYPE html>
<html>
<head>
 <title></title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>

 <div class="col-lg-6 m-auto">
 
 <form method="post">
 <br><br><div class="card">
 <div class="card-header bg-dark">
 <h1 class="text-white text-center">Speedometer Reading</h1>
 </div><br>
 <!--<label>Retype ID No.: </label>
 <input type="text" name="idd" class="form-control"> <br> -->
 <label>Final Speedometer Reading: </label> 
 <input type="text" name="Final-speed" class="form-control"> <br>
 <button class="btn btn-success" type="submit" name="done"> Submit </button><br>
 </div>
 </form>
 </div>
</body>
</html>