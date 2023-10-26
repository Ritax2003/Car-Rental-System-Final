<?php
 include 'database.php';
 date_default_timezone_set('Asia/Kolkata');
 $currentdatetime = date('Y-m-d H:i:s');
 if(isset($_GET['ID_no'])){
    $id = $_GET['ID_no'];
     if(isset($_POST['done'])){
     $speed = $_POST['init-speed'];
     
     $q = " UPDATE accepted_rides SET  Initial_Reading='$speed',Initial_Reading_Timestamp = '$currentdatetime'where ID_no=$id ";
     $conn->query($q);
     $q2 = " UPDATE completed_ride_list SET  Initial_Reading='$speed',Initial_Reading_Timestamp = '$currentdatetime' where ID_no=$id ";
     $conn->query($q2);

 header('location:driver.php');
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
 <label>Initial Speedometer Reading: </label>
 <input type="text" name="init-speed" class="form-control"> <br>
 <button class="btn btn-success" type="submit" name="done"> Submit </button><br>
 </div>
 </form>
 </div>
</body>
</html>