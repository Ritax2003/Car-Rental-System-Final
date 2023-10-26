<?php
    include "database.php";
    session_start();
    if(isset($_GET['ID_no'])){
        $id = $_GET['ID_no'];
        $sql = "DELETE from journey where ID_no = $id";
        $conn->query($sql);
    }
    echo '<script>
            window.location.href = "user.php";
            alert("Ride has been canceled!")
            </script>';
    exit;
?>