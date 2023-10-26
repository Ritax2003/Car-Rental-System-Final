<?php
    include "database.php";
    if(isset($_GET['ID_no'])){
        $id = $_GET['ID_no'];
        $sql = "DELETE from accepted_rides where ID=$id";
        $conn->query($sql);
    }
    header('location:driver.php');
    exit;
?>