<?php
session_start();
if (isset($_SESSION['authenticate']) && $_SESSION['authenticated'] === true) {
    session_destroy();
}
header("Location: index.php");
?>