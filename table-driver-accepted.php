<!DOCTYPE html>
<html>
<head>
    <title>Registration Result</title>    
</head>
<body>
<?php 
include('database.php');
$sql = "SELECT * FROM driver_accepted_ride_list";
$result = $conn->query($sql);

if (!$result) {
    die("Invalid query: " . $conn->error);
}
?>

<table>
    <tr>
        <th>Serial No.</th>
        <th>Reciepient Name</th>
        <th>Journey Details</th>
        <th>Mobile number</th>
        <th>Driving License Number</th>
        <th>Enter Initial Meter Reading</th>
        <!-- Add more columns as needed -->
    </tr>

    <?php
    while ($row = $result->fetch_assoc()) {
        echo "
        <tr>
         <th>{$row['ID']}</th>
         <td>{$row['User_name']}</td>
         <td>{$row['start_pos']} TO {$row['end_pos']}</td>
         <td>{$row['mobile']}</td>
         <td>{$row['ID_no']}</td>
         
         <td>
         <a class='btn btn-success' href='update-fare-journey.php?ID_no=$row[ID_no]'>Update</a> 
         </td>        
         </tr>
         ";
    }
    ?>
</table>

</body>
</html>