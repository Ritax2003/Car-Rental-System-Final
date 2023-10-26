<?php
 include 'database.php';
 session_start();

 if(isset($_SESSION['userID'])){
    $id = $_SESSION['userID'];
     $q2 = " UPDATE ride_fare_list SET  Pay_Done = 'Yes' where ID_no=$id ";
     $conn->query($q2);
    
    $q3 = "SELECT * FROM ride_fare_list where ID_no = $id";
    $result = $conn->query($q3);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user_name = $row['User_name'];
        $start_pos = $row['start_pos'];
        $end_pos = $row['end_pos'];
        $mobile = $row['mobile'];
        $ID_no = $row['ID_no'];
        $init_read = $row['Initial_Reading'];
        $final_read = $row['Final_Reading'];
        $fare = $row['Fare'];

        // Insert into the first new table
        $insertSql1 = "INSERT INTO ride_history (User_name, ID_no, start_pos, end_pos,Fare) VALUES ('$user_name','$ID_no', '$start_pos', '$end_pos','$fare')";
        $conn->query($insertSql1);
    }
     if($conn->query($q2) === TRUE){
        echo '<script>
        window.location.href = "ride-end.php";
        alert("Payment Succesful! Have a great day!!")
         </script>';
        } 
     //$q3 = "DELETE from ride_fare_list where ID_no = $id";
     //$conn->query($q3);
 }
 ?>