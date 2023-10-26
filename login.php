<?php
    include('database.php');
    session_start();

    if (isset($_POST['submit'])) {
        $username = $_POST['email'];
        $password = $_POST['passwd'];

        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM swe_userlist WHERE Email = ? AND Pass = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if there's a matching record in the database
        if ($result->num_rows == 1) {
            // Authentication successful
            $_SESSION['authenticated'] = true;
            header("Location: user.php");
            // After a successful login
              session_start();
                $username = ''; // Initialize the variable
                $usersurname = '';
                $mobile = '';
                $idnumber = '';

                     // Retrieve the first name from the database based on the email
                     // Modify this part to match your database structure
                 include('database.php');
                 $email = $_POST['email'];

$stmt = $conn->prepare("SELECT First_name, Last_name, Mobile,IDNO FROM swe_userlist WHERE Email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row) {
    $username = $row['First_name'];
    $usersurname = $row['Last_name'];
    $mobile = $row['Mobile'];
    $idnumber = $row['IDNO'];
}

$_SESSION['username'] = $username; // Store the first name in the session
$_SESSION['usersurname'] = $usersurname;
$_SESSION['usermobile'] = $mobile;
$_SESSION['userID'] = $idnumber;
header("Location: user.php"); // Redirect to the user page


        } else {
            if (isset($_SESSION['login_attempts']) && $_SESSION['login_attempts'] >= 1) {
                // Second login attempt
                unset($_SESSION['login_attempts']);
                header("Location: forget-pass.php"); // Redirect to a different page
            } else {
                // First login attempt
                $_SESSION['login_attempts'] = 1;
                echo '<script>
                window.location.href = "index2.php";
                alert("Login failed. Invalid username or password!!")
                 </script>';
            }
        }
    }
    
?>
