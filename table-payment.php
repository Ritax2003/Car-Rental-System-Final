<!DOCTYPE html>
<html>
<head>
    <title>Registration Result</title>    
</head>
<body>
<?php 
include('database.php');
session_start();
if(isset($_SESSION['userID'])){
    $id = $_SESSION["userID"];
} 
$sql = "SELECT * FROM ride_fare_list WHERE ID_no=$id";
$result = $conn->query($sql);
if (!$result) {
    die("Invalid query: " . $conn->error);
}
?>
<?php 

?>
<table>
    <tr>
        <th>Reciepient Name</th>
        <th>Journey Details</th>
        <th>Mobile number</th>
        <th>Initial Meter Reading</th>
        <th>Final Meter Reading</th>
        <th>Covered Distance</th>
        <th>Elapsed Time</th>
        <th>Distance Charge</th>
        <th>Time Charge</th>
        <th>Fare</th>
        <!-- Add more columns as needed -->
    </tr>
    <?php
    while ($row = $result->fetch_assoc()) {
            $init_read = $row['Initial_Reading'];
            $final_read = $row['Final_Reading'];
            $init_read_time = $row['Initial_Reading_Timestamp'];
            $final_read_time = $row['Final_Reading_Timestamp'];
        // Convert date-time strings to DateTime objects
        
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
        $h2decimal = number_format((float)$timeDuration, 2, '.', '');
        echo "
        <tr>
         <td>{$row['User_name']}</td>
         <td>{$row['start_pos']} TO {$row['end_pos']}</td>
         <td>{$row['mobile']}</td>
         <td>{$row['Initial_Reading']} <b>Km</b>.<br> <b>Updated On:</b> {$row['Initial_Reading_Timestamp']}</td>
         <td>{$row['Final_Reading']} <b>Km</b>.<br> <b>Updated On:</b> {$row['Final_Reading_Timestamp']}</td>
         <td>$distanceTraveled Km.</td>
         <td>$h2decimal Hour.</td>
         <td> ₹. {$row['Distance_Charge']} <b>Rate:</b> $ratePerKilometer ₹./km.</td>
         <td> ₹. {$row['Time_Charge']} <b>Rate:</b> $timeChargePerHour ₹./hr.</td>    
         <td> ₹. {$row['Fare']}</td> 
         </tr>
         ";
    }
    ?>
</table>
</body>
</html>