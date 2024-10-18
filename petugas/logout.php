<?php
session_start();

// Unset only petugas session data
unset($_SESSION['username']);
unset($_SESSION['nama_petugas']);
unset($_SESSION['level']);

// Destroy petugas session if no other data exists
if (empty($_SESSION)) {
    session_destroy();
}

// Remove cookies
setcookie("username", "", time() - 3600, "/");
setcookie("password", "", time() - 3600, "/");

// Redirect to login page
header('Location: ../index2.php');
exit();
?>
