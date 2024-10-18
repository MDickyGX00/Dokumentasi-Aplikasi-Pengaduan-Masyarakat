<?php
session_start();

// Unset only masyarakat session data
unset($_SESSION['nik']);
unset($_SESSION['nama']);
unset($_SESSION['level']);

// Destroy masyarakat session if no other data exists
if (empty($_SESSION)) {
    session_destroy();
}

// Remove cookies
setcookie("nik", "", time() - 3600, "/");
setcookie("nama", "", time() - 3600, "/");

// Redirect to login page
header('Location: index.php');
exit();
?>
