<?php
include('database.php');

if (isset($_GET['ID_no'])) {
    $ID = $_GET['ID_no'];

    // Step 1: Delete the row from the 'journey' table
   /* $deleteSql = "DELETE FROM journey WHERE ID = $ID";
    if ($conn->query($deleteSql) === TRUE) {
        */
        // Step 2: Insert the deleted row into two different tables
        $selectSql = "SELECT * FROM completed_ride_list WHERE ID_no = $ID";
        $result = $conn->query($selectSql);
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $user_name = $row['User_name'];
            $start_pos = $row['start_pos'];
            $end_pos = $row['end_pos'];
            $mobile = $row['mobile'];
            $ID_no = $row['ID_no'];
            $init_read = $row['Initial_Reading'];
            $final_read = $row['Final_Reading'];
            $init_read_time = $row['Initial_Reading_Timestamp'];
            $final_read_time = $row['Final_Reading_Timestamp'];
            // Your two date-time string

// Convert date-time strings to DateTime objects
$date1 = new DateTime($init_read_time);
$date2 = new DateTime($final_read_time);

// Calculate the time difference
$interval = $date1->diff($date2);

// Calculate the total number of seconds in the interval
$total_seconds = $interval->s + $interval->i * 60 + $interval->h * 3600 + $interval->d * 86400;

// Check if date2 is in the daytime of the second day and the difference is negative
if ($date1 < $date2 && $total_seconds < 0) {
    // Adjust date2 by adding one day
    $date2->add(new DateInterval('P1D'));
}

// Recalculate the time difference
$interval = $date1->diff($date2);

// Get the time difference as a formatted string
$timeDifference = $interval->format('%d days, %h hours, %i minutes, %s seconds');
$totalHours = $interval->days * 24 + $interval->h;
$totalHours = (int)$totalHours;
$totalhours  = strval($totalHours);
// Display the time difference


// Define your rate per kilometer or mile (e.g., $0.10 per kilometer)
$ratePerKilometer = 0.10;

// Example initial and final speedometer readings
$initialReading = intval($row['Initial_Reading']);; // Replace with the actual initial reading
$finalReading = intval($row['Final_Reading']);   // Replace with the actual final reading

// Calculate the distance traveled (in kilometers) based on the speedometer readings
$distanceTraveled = $finalReading - $initialReading;

// Example start and end times (in Unix timestamps)
$startTime = strtotime($row['Initial_Reading_Timestamp']); // Replace with the actual start time
$endTime = strtotime($row['Final_Reading_Timestamp']);   // Replace with the actual end time

// Calculate the time duration (in hours)
$timeDuration = ($endTime - $startTime) / 3600; // 3600 seconds in an hour

// Calculate the fare based on distance and time
$fare = $distanceTraveled * $ratePerKilometer;

// You can add an additional charge for time, e.g., $5 per hour
$timeChargePerHour = 5;
$timeCharge = $timeDuration * $timeChargePerHour;

// Calculate the total fare
$totalFare = $fare + $timeCharge;

            // Insert into the first new table
            $insertSql1 = "INSERT INTO ride_fare_list (User_name, start_pos, end_pos, mobile, ID_no,Initial_Reading,Final_Reading,Initial_Reading_Timestamp,Final_Reading_Timestamp,Distance_Charge,Time_Charge,Fare) 
                           VALUES ('$user_name', '$start_pos', '$end_pos', '$mobile', '$ID_no','$init_read','$final_read','$init_read_time','$final_read_time','$fare','$timeCharge','$totalFare')";
            $conn->query($insertSql1);

            $deleteSql = "DELETE FROM completed_ride_list WHERE ID_no = $ID";
            if($conn->query($deleteSql) === TRUE){
            echo '<script>
            window.location.href = "manager.php";
            alert("Fare is calculated.!")
             </script>';
            }
        } else {
            echo "Error: Row not found in the 'journey' table.";
        }
    } else {
        echo "Error deleting the row: " . $conn->error;
    }
?>
