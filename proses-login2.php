<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Query untuk mengecek user dan password
$sql = "SELECT * FROM petugas WHERE username='$username' AND password='$password'";
$query = mysqli_query($koneksi, $sql);

if (mysqli_num_rows($query) > 0) {
    $data = mysqli_fetch_array($query);

    // Set session
    $_SESSION['nama_petugas'] = $data['nama_petugas'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['level'] = $data['level'];

    // Cek apakah checkbox "Remember Me" dicentang
    if (isset($_POST['remember_me'])) {
        // Set cookie jika remember me dicentang
        setcookie('username', $username, time() + (86400 * 30), "/"); // 30 hari
        setcookie('password', $password, time() + (86400 * 30), "/"); // 30 hari
    }

    // Redirect sesuai level user
    if ($data['level'] == "admin") {
        header("location:admin/admin.php");
    } elseif ($data['level'] == "petugas") {
        header("location:petugas/petugas.php");
    }
} else {
    // Jika login gagal
    echo "<script>alert('Maaf Anda Gagal Login'); window.location.assign('index2.php'); </script>";
}
?>
