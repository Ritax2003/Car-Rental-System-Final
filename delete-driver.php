<?php
    include "database.php";
    if(isset($_GET['ID_no'])){
        $id = $_GET['ID_no'];
        $sql = "DELETE from driver_ride_list where ID_no=$id";
        $conn->query($sql);
        $sql2 = "DELETE from accepted_rides where ID_no=$id";
        $conn->query($sql2);
    }
    header('location:driver.php');
    exit;
?>