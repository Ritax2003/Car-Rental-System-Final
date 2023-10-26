<!DOCTYPE html>
<html>
<head>
    <title>Registration Result</title>    
</head>
<body>
<?php 
session_start();
if(isset($_SESSION['userID'])){
    $id = $_SESSION['userID'];
}
include('database.php');
$sql = "SELECT * FROM ride_history WHERE ID_no = $id";
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
        <th>Journey Details</th>
        <th>Fare</th>
        <!-- Add more columns as needed -->
    </tr>

    <?php
    $serialNo = 1; 
    while ($row = $result->fetch_assoc()) {
        echo "
        <tr>
         <th>$serialNo</th>
         <td>{$row['User_name']}</td>
         <td>{$row['start_pos']} TO {$row['end_pos']}</td>
         <td>{$row['Fare']}</td>        
         </tr>
         ";
         $serialNo++;
    }
    ?>
</table>

</body>
</html>