
<?php /*
    include "database.php";
    $sql = "select * from journey";
    $result = $conn->query($sql);
    if(!$result){
         die("Invalid query!" .$conn->error);
    }
    while ($row = $result->fetch_assoc()) { 
    echo "
       <!-- <tr>
        <th>{$row['ID']}</th>
        <td>{$row['User_name']}</td>
        <td>{$row['start_pos']} TO {$row['end_pos']}</td>
        <td>{$row['mobile']}</td>
        <td>{$row['ID_no']}</td>
        <td>
            <a class='btn btn-success' href='delete.php?ID=$row[ID]'>Edit</a> 
            <a class='btn btn-danger' href='delete.php?ID=$row[ID]'>Delete</a>
        </td>
        </tr>
        ";
        }
        --> */
 
// Include your database connection or any necessary configurations here

// Perform the database query to retrieve data from the "journey" table
include('database.php');
$sql = "SELECT * FROM accepted_rides";
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
        <th>Initial Reading</th>
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
         <td>{$row['Initial_Reading']} <b>Km</b>.<br> <b>Updated On:</b> {$row['Initial_Reading_Timestamp']}</td>
         </tr>
         ";
    }
    ?>
</table>