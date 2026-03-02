<?php
include '../includes/config.php';


$_SESSION = array();


session_destroy();

// Deleting the remember me cookie if it exists
if (isset($_COOKIE['remember_token'])) {
    setcookie('remember_token', '', time() - 3600, '/');
}

header("Location: ../home.php");
exit();
?>