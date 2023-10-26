<!DOCTYPE html>
<html>
<head>
    <title>Registration Result</title>    
</head>
<body>
<?php 
include('database.php');
$sql = "SELECT * FROM ride_fare_list";
$result = $conn->query($sql);

if (!$result) {
    die("Invalid query: " . $conn->error);
}
?>
<?php 


?>
<table>
    <tr>
        <th>Serial No.</th>
        <th>Reciepient Name</th>
        <!--<th>Journey Details</th> -->
        <th>Mobile number</th>
        <th>Driving License Number</th>
        <th>Initial Meter Reading</th>
        <th>Final Meter Reading</th>
        <th>Distance Charge</th>
        <th>Time Charge</th>
        <th>Fare</th>
        <th>Payment Done?</th>
        <!-- Add more columns as needed -->
    </tr>

    <?php
    while ($row = $result->fetch_assoc()) {
        echo "
        <tr>
         <th>{$row['ID']}</th>
         <td>{$row['User_name']}</td>
         
         <td>{$row['mobile']}</td>
         <td>{$row['ID_no']}</td>
         <td>{$row['Initial_Reading']} <b>Km</b>.<br> <b>Updated On:</b> {$row['Initial_Reading_Timestamp']}</td>
         <td>{$row['Final_Reading']} <b>Km</b>.<br> <b>Updated On:</b> {$row['Final_Reading_Timestamp']}</td>
         <td> ₹. {$row['Distance_Charge']}</td>
         <td> ₹. {$row['Time_Charge']}</td>    
         <td> ₹. {$row['Fare']}</td>
         <td>{$row['Pay_Done']}</td>
         </tr>
         ";
    }
    ?>
</table>

</body>
</html>