<!DOCTYPE html>
<html>
<head>
    <title>Registration Result</title>
</head>
<body>

<?php
$firstname = $_POST["uname"];
$lastname = $_POST["usurname"];
$mobile = $_POST["mno"];
$id = $_POST["idcard"];
$dob = $_POST["date"];
$email = $_POST["email"];
$passwd = $_POST["pass"];
$conn = mysqli_connect("localhost", "root", "", "database_form") or die("Connection failed");

// Check if the email is already registered
$checkEmailQuery = "SELECT Email FROM swe_userlist WHERE Email = '{$email}'";
$checkEmailResult = mysqli_query($conn, $checkEmailQuery);

if (mysqli_num_rows($checkEmailResult) > 0) {
    // Email is already in use, show an alert
    echo'<script>
                window.location.href = "create-acc.php";
                alert("Email is already registered!!!")
                 </script>';
    } 
    else {
    // Email is not in use, proceed with registration
    $sql = "INSERT INTO swe_userlist (First_name, Last_name, Mobile, IDNO, DOB, Email, Pass) 
            VALUES ('{$firstname}', '{$lastname}', '{$mobile}', '{$id}', '{$dob}', '{$email}', '{$passwd}')";

    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        // Registration was successful, show a success alert
       echo '<script>
                window.location.href = "index2.php";
                alert("Registration successful. Now login using registered email and password!!!")
                 </script>';
    } else {
        // Registration failed, show an error alert
        echo '<script>alert("Error: Registration failed.");</script>';
    }
}

mysqli_close($conn);
?>
</body>
</html>