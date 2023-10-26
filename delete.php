<?php
    include "database.php";
    if(isset($_GET['ID_no'])){
        $id = $_GET['ID_no'];
        $sql = "DELETE from journey where ID_no = $id";
        $conn->query($sql);
    }
    
    header('location:manager.php');
    exit;
?>