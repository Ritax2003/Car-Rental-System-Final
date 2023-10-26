<?php
include('database.php');

if (isset($_GET['ID_no'])) {
    $ID = $_GET['ID_no'];

    // Step 1: Delete the row from the 'journey' table
   /* $deleteSql = "DELETE FROM journey WHERE ID = $ID";
    if ($conn->query($deleteSql) === TRUE) {
        */
        // Step 2: Insert the deleted row into two different tables
        $selectSql = "SELECT * FROM journey WHERE ID_no = $ID";
        $result = $conn->query($selectSql);
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $user_name = $row['User_name'];
            $start_pos = $row['start_pos'];
            $end_pos = $row['end_pos'];
            $mobile = $row['mobile'];
            $ID_no = $row['ID_no'];

            // Insert into the first new table
            $insertSql1 = "INSERT INTO accepted_rides (User_name, start_pos, end_pos, mobile, ID_no) 
                           VALUES ('$user_name', '$start_pos', '$end_pos', '$mobile', '$ID_no')";
            $conn->query($insertSql1);

            // Insert into the second new table
            $insertSql2 = "INSERT INTO driver_ride_list (User_name, start_pos, end_pos, mobile, ID_no) 
                           VALUES ('$user_name', '$start_pos', '$end_pos', '$mobile', '$ID_no')";
            $conn->query($insertSql2);

            //insert into third new table
            $insertSql3 = "INSERT INTO completed_ride_list (User_name, start_pos, end_pos, mobile, ID_no) 
                           VALUES ('$user_name', '$start_pos', '$end_pos', '$mobile', '$ID_no')";
            $conn->query($insertSql3);

            $deleteSql = "DELETE FROM journey WHERE ID_no = $ID";
            if($conn->query($deleteSql) === TRUE){
            echo '<script>
            window.location.href = "manager.php";
            alert("Ride has been aceepted!")
             </script>';
            }
        } else {
            echo "Error: Row not found in the 'journey' table.";
        }
    } else {
        echo "Error deleting the row: " . $conn->error;
    }
?>
