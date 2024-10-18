<?php
session_start();
include 'koneksi.php';

$nik = $_POST['nik'];
$password = sha1($_POST['password']);

$sql = "SELECT * FROM masyarakat WHERE nik='$nik' AND password='$password'";
$query = mysqli_query($koneksi, $sql);

if (mysqli_num_rows($query) > 0) {
    $data = mysqli_fetch_array($query);
    $_SESSION['nik'] = $nik;
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['username'] = $data['username'];

    // Check if "Remember Me" is selected
    if (isset($_POST['remember'])) {
        // Set cookies with a 30-day expiration
        setcookie("nik", $nik, time() + (86400 * 30), "/", "", false, true); // HttpOnly flag for security
        setcookie("nama", $data['nama'], time() + (86400 * 30), "/", "", false, true);
        setcookie("username", $data['username'], time() + (86400 * 30), "/", "", false, true);
    }

    header('Location: masyarakat.php');
} else {
    echo "<script>alert('Maaf, Anda Gagal Login'); window.location.assign('index.php');</script>";
}
?>
