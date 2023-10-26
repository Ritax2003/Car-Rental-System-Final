<!DOCTYPE html>
<html>
<head>
    <title>Registration Result</title>
</head>
<body>

<?php

session_start();
$startp = $_POST["start"];
$endp = $_POST["end"];
$username = $_SESSION['username']; // Store the first name in the session
$usersurname = $_SESSION['usersurname'] ;
/*$username = $_POST["rname"];
$usersurname = $_POST["rsurname"];*/
$mobile = $_POST["rmno"];
if(isset($_SESSION['userID'])){
    $id = $_SESSION["userID"];
} 
// Concatenation Of String 
$userfullname = $username." ".$usersurname; 

$conn2 = mysqli_connect("localhost", "root", "", "database_form") or die("Connection failed");


    $sql = "INSERT INTO journey (User_name,start_pos,end_pos,mobile,ID_no) VALUES ('{$userfullname}','{$startp}','{$endp}','{$mobile}','{$id}')";

    $result = mysqli_query($conn2, $sql);
    
    if ($result) {
        // Registration was successful, show a success alert
       echo '<script>
                window.location.href = "ride-final.php";
                alert("Booking Successful.")
                 </script>';
    } else {
        // Registration failed, show an error alert
        
        echo '<script>
        window.location.href  = "user.php";
        alert("Error: Registration failed.");</script>';
    }


mysqli_close($conn2);
?>
</body>
</html>